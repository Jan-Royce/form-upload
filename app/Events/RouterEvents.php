<?php /** @noinspection PhpUnused */

namespace App\Events;

use App\Controllers\Home;
use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Services\Events\EventSubscription;
use Bayfront\Bones\Application\Services\Filters\FilterService;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;
use Bayfront\HttpResponse\Response;
use Bayfront\RouteIt\Router;

/**
 * Router-related events.
 */
class RouterEvents extends EventSubscriber implements EventSubscriberInterface
{

    protected FilterService $filter;
    protected Response $response;
    protected Router $router;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(FilterService $filter, Response $response, Router $router)
    {
        $this->filter = $filter;
        $this->response = $response;
        $this->router = $router;
    }

    /**
     * NOTE:
     * Technically, routes do not have to be added until the app.http event,
     * however, if they are to be available via CLI, such as with the
     * route:list command, they need to be added earlier.
     *
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            new EventSubscription('app.bootstrap', [$this, 'addRoutes'], 10)
        ];
    }

    /**
     * Define routes.
     *
     * @return void
     */

    public function addRoutes(): void
    {

        $this->router->setHost(App::getConfig('router.host'))
            ->setRoutePrefix(App::getConfig('router.route_prefix')) // Unfiltered
            ->addNamedRoute('/storage', 'storage')
            ->get('/status', function () {
                $this->response->sendJson([
                    'data' => [
                        'status' => 'OK'
                    ],
                    'meta' => [
                        'version' => App::getConfig('app.version'),
                        'elapsed' => App::getElapsedTime(),
                        'time' => date('c')
                    ]
                ]);
            }, ['locale_exclude' => true])
            ->setRoutePrefix($this->filter->doFilter('router.route_prefix', App::getConfig('router.route_prefix'))) // Filtered
            ->addFallback('ANY', function () {
                App::abort(404);
            })
            ->get('/', [Home::class, 'index'], [], 'home');

    }

}