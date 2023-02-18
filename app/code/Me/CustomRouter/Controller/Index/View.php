<?php

declare(strict_types=1);

namespace Me\CustomRouter\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class View Controller
 */
class View implements HttpGetActionInterface
{
    /**
     * @param PageFactory $pageFactory
     * @param RequestInterface $request
     */
    public function __construct(
        private readonly PageFactory $pageFactory,
        private readonly RequestInterface $request
    ){
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $identifier = $this->request->getParam('identifier', null);
        $page = $this->pageFactory->create();
        $page->getLayout()->getBlock('custom_blog')?->setData('identifier', $identifier);
        return $page;
    }
}
