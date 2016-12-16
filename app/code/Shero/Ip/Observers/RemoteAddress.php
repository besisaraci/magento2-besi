<?php
namespace Shero\Ip\Observers;

//Remoteaddress is the file that we can find ip of user. we used "as" because the class that i created is the same with Remote Address of PhpEnvironment
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress as Remotez;
//ObserverInterface is the place that we can implement observers
use Magento\Framework\Event\ObserverInterface ;
//This file is for debuginig in debug file
use Psr\Log\LoggerInterface;
//we use it for execute function
use Magento\Framework\Event\Observer;
//use it for external connection , url
use Magento\Framework\HTTP\Client\Curl;
//to decode  json
use Magento\Framework\Json\Decoder;
//use it for take data from helper
use Shero\Ip\Helper\Data;
//for redirect external link
use Magento\Framework\App\ResponseFactory;
//for magento url
use Magento\Framework\UrlInterface;


class RemoteAddress implements ObserverInterface

{
    protected  $_log;
    protected  $_remotez;
    protected  $_curl;
    protected  $_decoder;
    protected  $_helper;
    protected  $_responseFactory;
    protected  $_urlInterface;

    public function __construct(Remotez $remotez, LoggerInterface $logger, Curl $curl, Decoder $decoder, Data $helper, ResponseFactory $responseFactory, UrlInterface $url)
    {
        $this->_remotez = $remotez;
        $this->_log = $logger;
        $this->_decoder = $decoder;
        $this->_curl = $curl;
        $this->_helper = $helper;
        $this->_responseFactory = $responseFactory;
        $this->_urlInterface = $url;
    }

    public function execute(Observer $observer)
    {
        //from helper
        $isEnable           = $this->_helper->isEnabled();
        $isCountry          = $this->_helper->isCountry();
        $redirectUrl        = $this->_helper->redirectUrl();

        $checkinstance = $this->_remotez;

        //find the ip of each user that access the site
        $ip = $checkinstance->getRemoteAddress();

        //calling function  for catching country code
        $contr_code = $this->_getJsonCountry($ip);

        if ($isEnable == true && in_array($contr_code,$isCountry))
        {

            if ($redirectUrl != false){
                //use external link
                $this->_responseFactory->create()->setRedirect($redirectUrl)->sendResponse();
            }else{
                //use default shero  page
                $default_url = $this->_urlInterface->getUrl('ipshe/index/ip');
                //check current url
                $current_url = $this->_urlInterface->getCurrentUrl();
                //if current url is different from default url, it should redirect to default url
                if($current_url != $default_url){
                    $this->_responseFactory->create()->setRedirect($default_url)->sendResponse();
                }
            }

        }


    }

    //display json and decode it for displaying contry name
    private function _getJsonCountry($ip)
    {
      //get ip from external linl
      $this->_curl->get('freegeoip.net/json/' . $ip);

      //after it takes result it check them to decode or to return false
      if ($body = $this->_curl->getBody())
          {
           $result = $this->_decoder->decode($body);
          }else{
          return false;
          }
      //if it is not equal with result value it display false otherwise it return country code
      if (!$result || !is_array($result))
          {
              return false;
          }else
          {
              return(isset($result['country_code'])) ? $result['country_code'] : false;
          }
    }
}

