<?php

namespace Tutorial\SimpleNews\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class News extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_news';
        $this->_blockGroup = 'Tutorial_SimpleNews';
        $this->_headerText = __('Manage Attributes');
        $this->_addButtonLabel = __('Add Attribute');
        parent::_construct();
    }
}