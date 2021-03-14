<?php

namespace SSJewels\PriceCalculator\Service\ProductPrice\Calculator;

use SSJewels\PriceCalculator\Api\ProductDetailsInterface;

/**
 * Interface PriceCalculatorInterface
 * @package SSJewels\PriceCalculator\Service\ProductPrice\Calculator
 *
 * @author Avinash Thakur
 */
interface PriceCalculatorInterface
{

    /**
     * @param ProductDetailsInterface $productDetails
     * @return string
     */
    public function getPrice(ProductDetailsInterface $productDetails) : string;

}

