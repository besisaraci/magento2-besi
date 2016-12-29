<?php

namespace Tutorial\SimpleNews\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;


class Yesno implements ArrayInterface
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {


        $options = [
            '1' => 'No',
            '2' => 'Yes',


        ];
        return $options;
    }

}