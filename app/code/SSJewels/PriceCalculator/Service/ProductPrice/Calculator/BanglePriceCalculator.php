<?php

namespace SSJewels\PriceCalculator\Service\ProductPrice\Calculator;

use SSJewels\PriceCalculator\Api\ProductDetailsInterface;

/**
 * Class BanglePriceCalculator
 * @package SSJewels\PriceCalculator\Service\ProductPrice\Calculator
 *
 * @author Avinash Thakur
 */
class BanglePriceCalculator implements PriceCalculatorInterface
{
    /**
     * @inheritDoc
     */
    public function getPrice(ProductDetailsInterface $productDetails) : string
    {
            return "Not Implemented";
    }
}

