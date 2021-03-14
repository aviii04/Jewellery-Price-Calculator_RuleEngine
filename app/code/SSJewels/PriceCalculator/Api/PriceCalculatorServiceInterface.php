<?php


namespace SSJewels\PriceCalculator\Api;

/**
 * Class PriceCalculatorServiceInterface
 * @package SSJewels\PriceCalculator\Api
 *
 * @author Avinash Thakur
 */
interface PriceCalculatorServiceInterface
{
    /**
     * @param ProductDetailsInterface $productDetails
     * @return float
     */
    public function getProductPrice(ProductDetailsInterface $productDetails): float;

}
