<?php

declare(strict_types=1);

namespace Me\CustomQueue\Model;

use Me\CustomQueue\Logger\CustomQueueLogger;

/**
 * Class ViewCmsPage consumes messages from cms page view queue
 */
class ViewCmsPage
{
    /**
     * @param CustomQueueLogger $logger
     */
    public function __construct(
        private readonly CustomQueueLogger $logger
    ){
    }

    /**
     * @param string $cmsPageTitle
     * @return void
     */
    public function processMessage(string $cmsPageTitle): void
    {
        $this->logger->info("Cms page with title " . $cmsPageTitle . " was seen");
    }
}
