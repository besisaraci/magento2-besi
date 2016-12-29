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
            ['value' => 'Customer Account', 'label' => 'Customer Account'],
            ['value' => 'Admin Customer Form', 'label' => 'Admin Customer Form'],
            ['value' => 'Customer Registration', 'label' => 'Customer Registration'],

        ];
        return $options;
    }

}