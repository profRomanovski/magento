<?php

declare(strict_types=1);

namespace Me\CustomConfig\Model\Config;

use Magento\Framework\Config\ConverterInterface;

/**
 * Class Converter parses xml file and generates output array
 */
class Converter implements ConverterInterface
{
    /**
     * @inheritDoc
     */
    public function convert($source): array
    {
       $topics = $source->getElementsByTagName('topics_list');
       $topicsInfo = [];
       $iterator = 0;
       foreach ($topics as $topic) {
           foreach ($topic->childNodes as $topicInfo) {
               $topicsInfo[$iterator][$topicInfo->localName] = $topicInfo->textContent;
           }
           $iterator++;
       }
       return $topicsInfo;
    }
}
