<?php

declare(strict_types=1);

namespace Me\CustomRouter\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

/**
 * Class Router uses for matching blog pages
 */
class Router implements RouterInterface
{
    /**
     * @var array
     */
    const pages = [
        'about-us',
        'how-to-buy',
        'contact-us',
        'presentation',
        'overview'
    ];

    /**
     * @param ActionFactory $actionFactory
     */
    public function __construct(
        private readonly ActionFactory $actionFactory,
    ){
    }

    /**
     * @inheritDoc
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');
        if (in_array($identifier, self::pages)) {
            $request->setModuleName('blog');
            $request->setControllerName('index');
            $request->setActionName('view');
            $request->setParams([
                'identifier' => $identifier,
            ]);

            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        }
        return null;
    }
}
