<?php

namespace App\Controllers;

use Bayfront\Bones\Abstracts\Controller;
use Bayfront\Bones\Application\Services\Events\EventService;
use Bayfront\HttpResponse\Response;
use Bayfront\HttpRequest\Request;
use Bayfront\Bones\Application\Utilities\Constants;
use Bayfront\Bones\Application\Utilities\App;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\Sdk;

/**
 * Upload Controller.
 *
 * Created with Bones v5.3.3
 */
class Upload extends Controller
{

    protected EventService $events;
    protected Response $response;

    /**
     * The container will resolve any dependencies.
     * EventService is required by the abstract controller.
     */

    public function __construct(EventService $events, Response $response)
    {
        $this->events = $events;
        $this->response = $response;

        parent::__construct($events);
    }
    
    /**
     * @param array $params
     * @return string
     */
    public function store(array $params)
    {
        $imageData = Request::getFile();
        $fields = Request::getPost();
        
        $errors = $this->_validate($fields, $imageData);
        
        if(count($errors) == 0) {
            $img = $this->_uploadImage($imageData);
            $data = [
                "file_name" => $fields["name"],
                "visibility" => $fields["visibility"],
                "url" => $img
            ];
            
            $file = str_replace("\\", "/", Constants::get('APP_PUBLIC_PATH')) . "/uploads/" . str_replace(" ", "_", strtolower($fields["name"])) . "_" . time() . ".json";
            
            file_put_contents($file, json_encode($data));
        }
        
        return json_encode([
            "success" => count($errors) == 0,
            "errors" => $errors
        ]);
    }
    
    /**
     * @param array $fields
     * @param array $imageData
     * @return array
     */
    private function _validate($fields, $imageData): array
    {
        $formIds = [
            "name" => "file-name",
            "visibility" => "select-visibility"
        ];
        
        $emptyFieldsMessage = [
            "name" => "File name must not be empty.",
            "visibility" => "File visibility must be set."
        ];
        
        $errors = [];
        
        foreach($fields as $key => $val) {
            if(empty($val)) {
                $errors[$formIds[$key]] = $emptyFieldsMessage[$key];
            }
        }
        
        if(empty($imageData)) {
            $errors["file"] = "Image upload is required.";
        } else if(count($imageData) > 1) {
            $errors["file"] = "Only one (1) image is allowed per upload.";
        }
        
        return $errors;
    }
    
    /**
     * @param array $imageData
     * @return string
     */
    private function _uploadImage($imageData): string
    {
        $tempFile = $imageData["file"]["tmp_name"];
        $fileName = basename($imageData["file"]['name']);
        $fileType = $imageData["file"]['type'];
        $fileSize = $imageData["file"]['size'];

        $fileKey = 'uploads/' . uniqid() . '/' . $fileName;
        
        $region = App::getConfig('app.s3_region');
        $host = App::getConfig('app.s3_host');
        $bucket = App::getConfig('app.s3_bucket');
        $accessKey = App::getConfig('app.s3_access_key');
        $secretKey = App::getConfig('app.s3_secret_key');
        $useCert = App::getConfig('app.s3_use_cert');
        
        $sharedConfig = [
            'region' => $region,
            'credentials' => [
                'key' => $accessKey,   
                'secret' => $secretKey   
            ],
            'endpoint' => $host
        ];
        
        if($useCert) {
            $cert = str_replace("\\", "/", Constants::get('APP_PUBLIC_PATH')) . "/cacert.pem";
            $sharedConfig['http'] = [
                'verify' => $cert
            ];
        }
        
        $sdk = new Sdk($sharedConfig);
        $s3 = $sdk->createS3();
        
        try {
            $upload = $s3->putObject([
                'Bucket' => $bucket,
                'Key' => $fileKey,
                'SourceFile' => $tempFile
            ]);
            
            return $upload['ObjectURL'];
        } catch (Exception $exception) {
            echo "Failed to upload $fileName with error: " . $exception->getMessage();
        }
    }
}