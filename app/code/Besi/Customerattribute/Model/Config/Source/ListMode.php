<?php

namespace Besi\Customerattribute\Model\Config\Source;

use \Magento\Framework\Option\ArrayInterface;

class ListMode implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return [
            ['value' => 'edit_account', 'label' => __('Customer Edit Account')],
            ['value' => 'register_account', 'label' => __('Register Account Form')],
            ['value' => 'checkout', 'label' => __('Checkout Page')],
            ['value' => 'edit_account_admin', 'label' => __('Edit Account in Admin')]
        ];
    }
}