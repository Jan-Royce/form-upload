<?php

namespace App\Controllers;

use Bayfront\BonesService\WebApp\Abstracts\WebAppController;
use Bayfront\BonesService\WebApp\Exceptions\WebAppServiceException;
use Bayfront\BonesService\WebApp\WebAppService;

/**
 * Home controller.
 */
class Home extends WebAppController
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
     * @param array $params
     * @return void
     * @throws WebAppServiceException
     */
    public function index(array $params): void
    {

        $this->respond('examples/pages/home', [
            'page' => [
                'title' => 'Home'
            ],
            'params' => $params
        ]);

    }

}