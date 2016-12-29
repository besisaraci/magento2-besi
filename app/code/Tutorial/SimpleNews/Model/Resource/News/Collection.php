<?php

namespace Tutorial\SimpleNews\Model\Resource\News;



class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Tutorial\SimpleNews\Model\News',
            'Tutorial\SimpleNews\Model\Resource\News'
        );
    }
}