<?php

namespace Tutorial\SimpleNews\Controller\Adminhtml\News;

use Tutorial\SimpleNews\Controller\Adminhtml\News;
use Magento\Framework\Controller\ResultFactory;

class Save extends News
{
    /**
     * @return void
     */
    public function execute()
    {
        $isPost = $this->getRequest()->getPost();
        if ($isPost) {
            $newsModel = $this->_objectManager->create('Tutorial\SimpleNews\Model\News');

            $newsId = $this->getRequest()->getParam('id');

            if ($newsId) {
                $newsModel->load($newsId);
            }

            $formData = $this->getRequest()->getParam('news');
            $formData['display_in'] = implode(',',$formData['display_in']);
            $newsModel->setData($formData);

            try {
                // Save news
                $newsModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $newsModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $newsId]);
        }
    }
}