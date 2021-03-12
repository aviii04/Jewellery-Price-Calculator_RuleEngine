<?php

namespace SSJewels\Calculation\Model\Services\ProductPrice\Calculator;


use SSJewels\Calculation\Model\Services\ProductPrice\PriceCalculatorInterface;


class BanglePriceCalculator implements PriceCalculatorInterface
{
    /**
     * @inheritDoc
     */
    public function getPrice() : string
    {
            return "from Bangles";
    }
}

