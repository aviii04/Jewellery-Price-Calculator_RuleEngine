<?php

namespace SSJewels\Calculation\Model\Services\ProductPrice\Calculator;
use SSJewels\Calculation\Api\ProductDetailsInterface;


use SSJewels\Calculation\Model\Services\ProductPrice\PriceCalculatorInterface;

/**
 * Class BanglePriceCalculator
 * @package SSJewels\Calculation\Model\Services\ProductPrice\Calculator
 *
 * @author Avinash Thakur
 */
class BanglePriceCalculator implements PriceCalculatorInterface
{
    /**
     * @inheritDoc
     */
    public function getPrice(ProductDetailsInterface $productDetailsInterface) : string
    {
            return "Not Implemented yet";
    }
}

