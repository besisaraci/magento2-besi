<?php
namespace Shero\Ip\Block;

//magento default
use \Magento\Backend\Block\Template\Context;
//magento default template for extend
use \Magento\Framework\View\Element\Template;
// to take data of store
use \Magento\Store\Model\StoreManagerInterface;

class Ip extends Template
{
    protected $_storeManager;

    //constructor
    public function __construct(Context $context, StoreManagerInterface $storeManager, array $data = [])
    {
        //default
        parent::__construct($context, $data);

        //storemanager
        $this->_storeManager = $storeManager;
    }

    // desciption of block message
    public function getDescription()
    {
        return ' Is currently not available in your country!';
    }

    // getting name from domain
    public function getStoreName()
    {
        //base url
        $url_store = $this->_storeManager->getStore()->getBaseUrl();
        //removing https or http
        $str_url = preg_replace('#^https?://#', '', $url_store);
        //removing www or .com
        $store_name = preg_replace('#^www\.|\.com/$#', '', $str_url);
        //return name of domain
        return $store_name;
    }


}