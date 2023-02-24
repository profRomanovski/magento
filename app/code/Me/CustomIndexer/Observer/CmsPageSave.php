<?php

declare(strict_types=1);

namespace Me\CustomIndexer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Indexer\IndexerRegistry;

/**
 * Class CmsPageSave runs indexer cms_popular for specific cms page
 */
class CmsPageSave implements ObserverInterface
{
    /**
     * @var string
     */
    const INDEXER_ID = 'cms_popular';

    /**
     * @param IndexerRegistry $indexerRegistry
     */
    public function __construct(
        private readonly IndexerRegistry $indexerRegistry
    ){
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $page = $observer->getData('page');
        $indexer = $this->indexerRegistry->get(self::INDEXER_ID);
        if (!$indexer->isScheduled()) {
            $indexer->reindexRow($page->getId());
        }
    }
}
