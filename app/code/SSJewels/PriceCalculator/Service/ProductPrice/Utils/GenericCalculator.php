<?php

namespace SSJewels\PriceCalculator\Service\ProductPrice\Utils;

use Magento\Framework\Exception\NotFoundException;
use SSJewels\PriceCalculator\Api\DiamondDetailInterface;
use SSJewels\PriceCalculator\Helper\DiamondPrice;

/**
 * Class GenericCalculator
 * @package SSJewels\PriceCalculator\Service\ProductPrice\Utils
 *
 * @author Avinash Thakur
 */
class GenericCalculator
{

    private DiamondPrice $diamondPrice;

    /**
     * GenericCalculator constructor.
     * @param DiamondPrice $diamondPrice
     */
    public function __construct(DiamondPrice $diamondPrice)
    {
        $this->diamondPrice = $diamondPrice;
    }


    /**
     * Calcualtes total weight of Metal for given size.
     *
     * @param float $selectedSize
     * @param float $defaultSize
     * @param float $defaultWeight
     * @param float $percentIncrease
     *
     * @return float Weight of metal.
     */
    public static function getWeightBySize(float $selectedSize, float $defaultSize, float $defaultWeight, float $percentIncrease): float
    {
        $increaseInWeight = ($defaultWeight * $percentIncrease) / 100;
        $sizeDiff = $selectedSize - $defaultSize;
        return $defaultWeight + ($sizeDiff * $increaseInWeight);
    }


    /**
     * Calculates total diamond price based on type & no. of diamonds for corresponding size.
     *
     * @param string $diamondType
     * @param DiamondDetailInterface[] $diamondDetails
     * @return float Total diamond price
     * @throws NotFoundException
     */
    public function getTotalDiamondPrice(string $diamondType, array $diamondDetails): float
    {
        $totalPrice = 0;
        foreach ($diamondDetails as $diamondDetail) {
            if ($diamondDetail->getCount() != 0) {
                $diamondSize = $diamondDetail->getSize();
                $price = $this->diamondPrice->getPrice($diamondType, $diamondSize);
                $totalPrice = $totalPrice + ($price * $diamondSize * $diamondDetail->getCount());
            }
        }
        return $totalPrice;
    }
}

