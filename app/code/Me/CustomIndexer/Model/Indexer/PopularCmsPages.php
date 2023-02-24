<?php

declare(strict_types=1);

namespace Me\CustomIndexer\Model\Indexer;

use Magento\Framework\Indexer\ActionInterface;
use Magento\Framework\Mview\ActionInterface as ActionInterfaceMview;
use Me\CustomIndexer\Logger\CustomIndexerLogger;

/**
 * Class PopularCmsPages implements Indexer Action Interface
 */
class PopularCmsPages implements ActionInterface, ActionInterfaceMview
{
    /**
     * @param CustomIndexerLogger $logger
     */
    public function __construct(
      private readonly CustomIndexerLogger $logger
    ){
    }

    /**
     * @inheritDoc
     */
    public function executeFull()
    {
        $this->logger->info('Method executeFull');
    }

    /**
     * @inheritDoc
     */
    public function executeList(array $ids)
    {
        $this->logger->info('Method executeList');
        foreach ($ids as $id) {
            $this->logger->info("CMS page with ID = " . $id . ' changed');
        }
    }

    /**
     * @inheritDoc
     */
    public function executeRow($id)
    {
        $this->logger->info('Method executeRow');
        $this->logger->info("CMS page with ID = " . $id . ' changed');
    }

    /**
     * @inheritDoc
     */
    public function execute($ids)
    {
        $this->logger->info('Method execute');
        foreach ($ids as $id) {
            $this->logger->info("CMS page with ID = " . $id . ' changed');
        }
    }
}
