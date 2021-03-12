<?php


namespace SSJewels\Calculation\Model\Services\ProductPrice\Calculator;

use SSJewels\Calculation\Helper\MetalFinePrice;
use SSJewels\Calculation\Model\Services\ProductPrice\MetalPrice\GoldPrice;
use SSJewels\Calculation\Model\Services\ProductPrice\PriceCalculatorInterface;


class RingPriceCalculator extends GoldPrice implements PriceCalculatorInterface
{


    /**
     * @inheritDoc
     */
    public function getPrice() : string
    {
        $price = $this->getGoldPrice("14K");

            return $price;
    }

}

