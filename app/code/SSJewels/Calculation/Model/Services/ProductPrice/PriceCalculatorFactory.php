<?php

namespace SSJewels\Calculation\Model\Services\ProductPrice;

use Magento\Framework\Exception\NotFoundException;
use SSJewels\Calculation\Model\Services\ProductPrice\Calculator\RingPriceCalculator;
use SSJewels\Calculation\Model\Services\ProductPrice\Calculator\BanglePriceCalculator;

class PriceCalculatorFactory
{

    protected $ringPriceCalculator;
    protected $banglePriceCalculator;

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
