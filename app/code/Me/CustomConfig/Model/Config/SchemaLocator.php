<?php

declare(strict_types=1);

namespace Me\CustomConfig\Model\Config;

use Magento\Framework\Config\SchemaLocatorInterface;
use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Module\Dir;

/**
 * Class SchemaLocator provides xml file location
 */
class SchemaLocator implements SchemaLocatorInterface
{
    /**
     * XML schema for config file.
     */
    const CONFIG_FILE_SCHEMA = 'topics_list.xsd';

    /**
     * @var string
     */
    private string $configDir;

    public function __construct(
        Reader $moduleReader
    ){
        $this->configDir = $moduleReader->getModuleDir(Dir::MODULE_ETC_DIR, 'Me_CustomConfig');
    }

    /**
     * @inheritDoc
     */
    public function getSchema(): ?string
    {
        return $this->configDir . DIRECTORY_SEPARATOR . self::CONFIG_FILE_SCHEMA;
    }

    /**
     * @inheritDoc
     */
    public function getPerFileSchema(): ?string
    {
        return $this->configDir . DIRECTORY_SEPARATOR . self::CONFIG_FILE_SCHEMA;
    }
}
