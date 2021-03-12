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
        $goldKarat = "14K";

        $metalPrice = $this->getGoldPrice($goldKarat);
        $metalWeight = $this->weightByRingSize();
        $makingCharge = $this->makingCharge($metalWeight);
        $diamondPrice = $this->totalDiamondPrice();

        return $this->ringPrice($metalPrice, $diamondPrice, $makingCharge);
    }

    private function makingCharge(float $metalWeight) : float
    {
        $makingCharge = 10;
        return $makingCharge * $metalWeight;
    }

    private function totalDiamondPrice() : float
    {
        // TODO:
    }

    private function weightByRingSize() : float
    {
        // TODO:
    }

    private function ringPrice(float $metalPrice, float $diamondPrice, float $makingCharge) : float
    {
        return $metalPrice + $diamondPrice + $makingCharge;
    }


}

