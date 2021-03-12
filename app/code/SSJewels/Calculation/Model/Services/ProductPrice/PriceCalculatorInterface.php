<?php


namespace SSJewels\Calculation\Model\Services\ProductPrice;


interface PriceCalculatorInterface
{

    /**
     * @return string
     */
    public function getPrice() : string;
    
}

