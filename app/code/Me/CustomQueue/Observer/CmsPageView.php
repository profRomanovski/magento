<?php

declare(strict_types=1);

namespace Me\CustomQueue\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

/**
 * Class CmsPageView publishes a new message to queue on cms page view event
 */
class CmsPageView implements ObserverInterface
{
    /**
     * @var string
     */
    const TOPIC_NAME = 'me.cms.page.view';

    /**
     * @param PublisherInterface $publisher
     */
    public function __construct(
        private readonly PublisherInterface $publisher
    ){
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $this->publisher->publish(self::TOPIC_NAME, $observer->getData('page')->getData('title'));
    }
}
