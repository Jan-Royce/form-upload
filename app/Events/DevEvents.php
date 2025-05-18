<?php /** @noinspection PhpUnused */

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Services\Events\EventSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;

/**
 * Actions to perform when environment = "dev".
 */
class DevEvents extends EventSubscriber implements EventSubscriberInterface
{

    /**
     * The container will resolve any dependencies.
     */

    public function __construct()
    {

    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {

        if (App::environment() != App::ENV_DEV) {
            return [];
        }

        return [
            new EventSubscription('app.bootstrap', [$this, 'sampleMethod'], 10)
        ];

    }

    /**
     * This is a placeholder and can be removed.
     *
     * @return void
     */

    public function sampleMethod(): void
    {
        // Do something amazing
    }

}