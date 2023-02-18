<?php

declare(strict_types=1);

namespace Me\CustomConfig\Model\Config;

use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Config\Data as DataConfig;
use Magento\Framework\Config\ReaderInterface;
use Magento\Framework\Serialize\SerializerInterface;

/**
 * Class Data
 */
class Data extends DataConfig
{
public function __construct(ReaderInterface $reader, CacheInterface $cache, $cacheId, SerializerInterface $serializer = null)
{
    parent::__construct($reader, $cache, $cacheId, $serializer);
}
}
