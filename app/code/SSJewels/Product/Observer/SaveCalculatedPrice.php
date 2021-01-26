<?php

namespace SSJewels\Product\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveCalculatedPrice implements \Magento\Framework\Event\ObserverInterface
{
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		$product = $observer->getProduct();
        $product->setPrice(1000);
	}
}