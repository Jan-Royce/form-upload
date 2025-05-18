<?php

namespace App\Filters;

use Bayfront\Bones\Abstracts\FilterSubscriber;
use Bayfront\Bones\Application\Services\Filters\FilterSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\FilterSubscriberInterface;

/**
 * Filters used within the console.
 */
class ConsoleFilters extends FilterSubscriber implements FilterSubscriberInterface
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

        return [
            new FilterSubscription('about.bones', [$this, 'addAppVersion'], 10)
        ];

    }

    /**
     * Add app version to the about:bones console command.
     *
     * @param array $data
     * @return array
     */

    public function addAppVersion(array $data): array
    {
        $data['App version'] = App::getConfig('app.version', 'UNKNOWN');
        return $data;
    }

}