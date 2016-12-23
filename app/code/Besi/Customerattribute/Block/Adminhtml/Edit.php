<?php

namespace Besi\Customerattribute\Block\Adminhtml;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Magento\Backend\Block\Widget\Form\Container
{

    protected $_objectId;
    protected $_blockGroup;
    protected $_controller;


    protected function _construct()
    {
        $this->_objectId = 'besi_customerattr';
        $this->_blockGroup = 'Besi_Customerattribute';
        $this->_controller = 'adminhtml_save';

        parent::_construct();

        $this->addButton(
            'besi_customerattr_button',
            [
                'label' => __('Save Attribute'),
                'onclick' => 'setLocation(\'' . $this->getUrl('router/controller/action') . '\')',
                'class' => 'back'
            ],
            -1
        );
    }


}
