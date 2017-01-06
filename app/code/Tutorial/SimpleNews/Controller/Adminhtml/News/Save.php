<?php

namespace Tutorial\SimpleNews\Controller\Adminhtml\News;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Tutorial\SimpleNews\Controller\Adminhtml\News;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\AttributeFactory;
use Tutorial\SimpleNews\Controller\Adminhtml\NewsFactory;
//use Magento\Eav\Model\Entity;
use Magento\Eav\Model\Entity\AttributeFactory as Eav;


class Save extends News
{
    protected $_customerattribute;
    protected $_entityId;
    protected $_rmAtr;


    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, NewsFactory $newsFactory, AttributeFactory $attributeFactory, Eav $entityId)

    {
        $this->_customerattribute = $attributeFactory;
        $this->_entityId = $entityId;
        parent::__construct($context, $coreRegistry, $resultPageFactory, $newsFactory);

    }

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
            $formData['display_in'] = implode(',', $formData['display_in']);
            //put the used in forms as an array
            $usedinforms [] = explode(',', $formData['display_in']);
            $newsModel->setData($formData);
            $entity = $this->_entityId->create();
            $entity->setData('attribute_code', 'besi_attribute');
            $attributet = $this->_customerattribute->create();
            $attributet->setData('is_visible', 1);
            $attributet->setEntityTypeId(1);
            $attributet->setIsUserDefined(1);


            try {
                // Save news
                //$newsModel->save();
                $attributet->save();
                $entity->save();

                var_dump($attributet->getData('attribute_id'));
                die();

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