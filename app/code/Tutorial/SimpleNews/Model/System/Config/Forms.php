<?php

namespace Tutorial\SimpleNews\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;


class Forms implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {


        $options = [
            ['value' => 'customer_account_edit', 'label' => 'Customer Account'],
            ['value' => 'adminhtml_customer', 'label' => 'Admin Customer Form'],
            ['value' => 'customer_account_create', 'label' => 'Customer Registration'],

        ];
        return $options;
    }

}