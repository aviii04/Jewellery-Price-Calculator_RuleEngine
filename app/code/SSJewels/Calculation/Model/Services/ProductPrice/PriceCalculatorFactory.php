<?php

namespace SSJewels\Calculation\Model\Services\ProductPrice;

use Magento\Framework\Exception\NotFoundException;
use SSJewels\Calculation\Model\Services\ProductPrice\Calculator\RingPriceCalculator;
use SSJewels\Calculation\Model\Services\ProductPrice\Calculator\BanglePriceCalculator;

class PriceCalculatorFactory
{

    /**
     * @param string $product
     *
     * @return PriceCalculatorInterface
     */
    public function getPriceCalculator(string $product): PriceCalculatorInterface
    {
        switch($product){

            case "RING": return new RingPriceCalculator();

            case "BANGLES": return  new BanglePriceCalculator();

            default : throw new NotFoundException(__('No Price Calculator found for Product : %1', $product));

        }

    }

}
