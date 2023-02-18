<?php

declare(strict_types=1);

namespace Me\CustomConfig\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;
use Me\CustomConfig\Service\TopicsService;

/**
 * Class Topics Block
 */
class Topics extends Template implements BlockInterface
{
    protected $_template = "widget/topics.phtml";

    /**
     * @param Template\Context $context
     * @param TopicsService $topicsService
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        private readonly TopicsService $topicsService,
        array $data = []
    ){
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getTopics(): array
    {
        return $this->topicsService->getTopicsList();
    }
}
