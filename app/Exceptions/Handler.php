<?php /** @noinspection PhpRedundantMethodOverrideInspection */

namespace App\Exceptions;

use Bayfront\Bones\Abstracts\ExceptionHandler;
use Bayfront\Bones\Interfaces\ExceptionHandlerInterface;
use Bayfront\HttpResponse\Response;
use Throwable;

/**
 * Exception Handler.
 */
class Handler extends ExceptionHandler implements ExceptionHandlerInterface
{

    /**
     * @inheritDoc
     */

    public function respond(Response $response, Throwable $e): void
    {
        parent::respond($response, $e);
    }

}