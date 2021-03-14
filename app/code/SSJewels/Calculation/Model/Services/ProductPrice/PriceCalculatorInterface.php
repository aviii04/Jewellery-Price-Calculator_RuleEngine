<?php


namespace SSJewels\Calculation\Model\Services\ProductPrice;

use SSJewels\Calculation\Api\ProductDetailsInterface;

/**
 * Interface PriceCalculatorInterface
 * @package SSJewels\Calculation\Model\Services\ProductPrice
 *
 * @author Avinash Thakur
 */
interface PriceCalculatorInterface
{

    /**
     * @param ProductDetailsInterface $productDetailsInterface
     * @return string
     */
    public function getPrice(ProductDetailsInterface $productDetailsInterface) : string;

}

