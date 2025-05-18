<?php /** @noinspection PhpUnhandledExceptionInspection */

use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Translation\Adapters\Local;
use Bayfront\Translation\Translate;

/** @var Bayfront\Container\Container $container */

/*
 * This file is used to bootstrap the app, and is required by Bones.
 * Bootstrapping is primarily done by interacting with the service container
 * by adding all the required dependencies which will be used throughout the app,
 * and defining their alias, if desired.
 *
 * The service container is available in this file as $container, which already contains
 * all the default services.
 *
 * For more information, see:
 * https://github.com/bayfrontmedia/container#usage
 */

/*
|--------------------------------------------------------------------------
| Add services
|--------------------------------------------------------------------------
*/

// Translate

$adapter = new Local(App::resourcesPath('/translations'));
$translate = new Translate($adapter, App::getConfig('webapp.locale.default', 'en'), true);

$container->set('Bayfront\Translation\Translate', $translate);
$container->setAlias('translate', 'Bayfront\Translation\Translate');

// WebApp service

$webAppService = $container->make('Bayfront\BonesService\WebApp\WebAppService', [
    'config' => (array)App::getConfig('webapp', [])
]);

$container->set('Bayfront\BonesService\WebApp\WebAppService', $webAppService);
$container->setAlias('webAppService', 'Bayfront\BonesService\WebApp\WebAppService');