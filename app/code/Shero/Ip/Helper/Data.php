<?php
namespace Shero\Ip\Helper;

//to save the value of fields from system.xml
use  Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfigInterface)
    {
        $this->scopeConfig = $scopeConfigInterface;
    }

    public function isEnabled ()
    {
        $enable = $this->scopeConfig->getvalue('shero_ip/ip_general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $enable == 1 ? true : false;
    }

    public function isCountry()
    {
        $country = $this->scopeConfig->getvalue('shero_ip/ip_general/country', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return explode( ',', $country );
    }

    public function redirectUrl()
    {
        $string = $this->scopeConfig->getValue('shero_ip/ip_general/redirect_url',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        if(!isset($string))
        {
            return false;
        }
        return $string;
    }
}