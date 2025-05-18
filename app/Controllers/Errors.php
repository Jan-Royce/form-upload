<?php

namespace App\Controllers;

use Bayfront\BonesService\WebApp\Abstracts\WebAppController;
use Bayfront\BonesService\WebApp\Exceptions\WebAppServiceException;
use Bayfront\BonesService\WebApp\WebAppService;
use Bayfront\Translation\TranslationException;

/**
 * Errors Controller.
 *
 * This controller should only be resolved by the exception handler,
 * which will have already set the response status code.
 */
class Errors extends WebAppController
{

    /**
     * The container will resolve any dependencies.
     *
     * @param WebAppService $webAppService
     */
    public function __construct(WebAppService $webAppService)
    {
        parent::__construct($webAppService);
    }

    /**
     * @inheritDoc
     */
    public function isPrivate(): bool
    {
        return false;
    }

    /**
     * 404
     *
     * @param array $data (Exception data)
     * @return void
     * @throws WebAppServiceException
     * @throws TranslationException
     */

    public function error404(array $data): void
    {

        $this->respond('examples/pages/404', [
            'page' => [
                'title' => $this->webAppService->translate->get('common.404_title')
            ],
            'exception' => $data
        ]);

    }

}