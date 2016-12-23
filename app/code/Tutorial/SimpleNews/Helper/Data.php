<?php
namespace Tutorial\SimpleNews\Helper;


use  Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfigInterface)
    {
        $this->scopeConfig = $scopeConfigInterface;
    }

    public function isModuleEnabled ()
    {
        $enable = $this->scopeConfig->getvalue('simplenews/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $enable == 1 ? true : false;
    }

}