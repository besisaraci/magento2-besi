<?php

namespace Tutorial\SimpleNews\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;


class Fieldtype implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {


        $options = [

            '1' => 'Textarea',
            '2' => 'Text Field',
            '3' => 'Multiselect',
            '4' => 'File Upload',
            '5' => 'Dropdown'


        ];
        return $options;
    }

}