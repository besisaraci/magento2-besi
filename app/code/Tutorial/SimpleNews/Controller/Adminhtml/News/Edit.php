<?php

namespace Tutorial\SimpleNews\Controller\Adminhtml\News;

use Magento\Framework\Controller\ResultFactory;
use Tutorial\SimpleNews\Controller\Adminhtml\News;

class Edit extends News
{
    /**
     * @return void
     */
    public function execute()
    {
        $newsId = (int) $this->getRequest()->getParam('id');
        /** @var \Tutorial\SimpleNews\Model\News $model */
        $model = $this->_objectManager->create('Tutorial\SimpleNews\Model\News');

        if ($newsId) {
            $model = $model->load($newsId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('simplenews_news', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Tutorial_SimpleNews::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Simple News'));

        return $resultPage;
    }
}