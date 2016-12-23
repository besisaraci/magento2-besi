<?php
use Magento\Framework\ObjectManagerInterface;

$helper = $this->objectManager->create('Tutorial\Simplenews\Helper\Data');
echo "Eshte enabled:".$helper->getGeneralConfig('enable');

?>

