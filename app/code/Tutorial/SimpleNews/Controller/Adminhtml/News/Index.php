<?php

namespace Tutorial\SimpleNews\Controller\Adminhtml\News;

use Tutorial\SimpleNews\Controller\Adminhtml\News;

class Index extends News
{
    /**
     * @return void
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Tutorial_SimpleNews::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Attributes'));

        return $resultPage;
    }

}