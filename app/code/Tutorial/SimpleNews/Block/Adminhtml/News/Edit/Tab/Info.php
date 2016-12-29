<?php

namespace Tutorial\SimpleNews\Block\Adminhtml\News\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Tutorial\SimpleNews\Model\System\Config\Status;
use Tutorial\SimpleNews\Model\System\Config\Fieldtype;
use Tutorial\SimpleNews\Model\System\Config\Forms;
use Tutorial\SimpleNews\Model\System\Config\Yesno;

class Info extends Generic implements TabInterface
{

    protected $_wysiwygConfig;

    protected $_newsStatus;
    protected $_yesNo;
    protected $_fieldType;
    protected $_inForms;

   
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        Status $newsStatus,
        Forms  $inForms,
        Yesno $yesNo,
        FieldType $fieldType,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_newsStatus = $newsStatus;
        $this->_yesNo = $yesNo;
        $this->_fieldType = $fieldType;
        $this->_inForms = $inForms;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        /** @var $model \Tutorial\SimpleNews\Model\News */
        $model = $this->_coreRegistry->registry('simplenews_news');
        $show_in_fields = $model->getDisplayIn();

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('news_');
        $form->setFieldNameSuffix('news');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'attribute_label',
            'text',
            [
                'name'        => 'attribute_label',
                'label'    => __('Default Label'),
                'required'     => true
            ]
        );
        $fieldset->addField(
            'attribute_code',
            'text',
            [
                'name'        => 'attribute_code',
                'label'    => __('Attribute Code'),
                'required'     => true
            ]
        );
        $fieldset->addField(
            'attribute_type',
            'select',
            [
                'name'      => 'attribute_type',
                'label'     => __('Attribute Type'),
                'options'   => $this->_fieldType->toOptionArray(),
                'required'     => true
            ]
        );
        $fieldset->addField(
            'is_required',
            'select',
            [
                'name'      => 'is_required',
                'label'     => __('Value Required'),
                'options'   => $this->_yesNo->toOptionArray(),
                'required'     => true
            ]
        );
        $fieldset->addField(
            'display_in',
            'multiselect',
            [
                'name'      => 'display_in',
                'label'     => __('Display Fields in Forms'),
                'values'   => $this->_inForms->toOptionArray(),
                'value'    => $show_in_fields,
                'required'     => true
            ]
        );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig();
        $fieldset->addField(
            'description',
            'editor',
            [
                'name'        => 'description',
                'label'    => __('Description'),
                'required'     => true,
                'config'    => $wysiwygConfig
            ]
        );
        $fieldset->addField(
            'status',
            'select',
            [
                'name'      => 'status',
                'label'     => __('Attribute Status'),
                'options'   => $this->_newsStatus->toOptionArray(),
                'required'     => true
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Attribute');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Attribute');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}
