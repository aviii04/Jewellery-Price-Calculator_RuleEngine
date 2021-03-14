<?php

namespace SSJewels\PriceCalculator\Service\ProductPrice;

use Magento\Framework\Exception\NotFoundException;
use SSJewels\PriceCalculator\Service\ProductPrice\Calculator\PriceCalculatorInterface;
use SSJewels\PriceCalculator\Service\ProductPrice\Calculator\RingPriceCalculator;
use SSJewels\PriceCalculator\Service\ProductPrice\Calculator\BanglePriceCalculator;

/**
 * Class PriceCalculatorFactory
 * @package SSJewels\PriceCalculator\Service\ProductPrice
 *
 * @author Avinash Thakur
 */
class PriceCalculatorFactory
{

    protected RingPriceCalculator $ringPriceCalculator;
    protected BanglePriceCalculator $banglePriceCalculator;

    /**
     * @param RingPriceCalculator $ringPriceCalculator
     * @param BanglePriceCalculator $banglePriceCalculator
     */
    public function __construct(RingPriceCalculator $ringPriceCalculator, BanglePriceCalculator $banglePriceCalculator){

        $this->ringPriceCalculator = $ringPriceCalculator;
        $this->banglePriceCalculator = $banglePriceCalculator;

    }

    /**
     * @param string $product
     *
     * @return PriceCalculatorInterface
     */
    public function getPriceCalculator(string $product): PriceCalculatorInterface
    {
        switch($product){

            case "RING": return $this->ringPriceCalculator;

            case "BANGLES": return $this->banglePriceCalculator;

            default : throw new NotFoundException(__('No Price Calculator found for Product : %1', $product));

        }

    }

}
