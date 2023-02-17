<?php

declare(strict_types=1);

namespace Me\CustomConfig\Service;

use Me\CustomConfig\Model\Config\Data as TopicsConfig;

/**
 * Class TopicsService provides topics list
 */
class TopicsService
{
    /**
     * @param TopicsConfig $topicsConfig
     */
    public function __construct(
        private readonly TopicsConfig $topicsConfig
    ){
    }

    /**
     * @return array
     */
    public function getTopicsList(): array
    {
        return $this->topicsConfig->get('topics');
    }
}
