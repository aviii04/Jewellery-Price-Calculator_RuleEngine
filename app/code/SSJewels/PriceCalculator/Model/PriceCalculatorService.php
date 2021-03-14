<?php


namespace SSJewels\PriceCalculator\Model;

use SSJewels\PriceCalculator\Api\PriceCalculatorServiceInterface;
use SSJewels\PriceCalculator\Api\ProductDetailsInterface;
use SSJewels\PriceCalculator\Service\ProductPrice\PriceCalculatorFactory;

/**
 * Class PriceCalculatorService
 * @package SSJewels\PriceCalculator\Model
 *
 * @author Avinash Thakur
 */
class PriceCalculatorService implements PriceCalculatorServiceInterface
{

    private PriceCalculatorFactory $priceCalculatorFactory;

    /**
     * PriceCalculatorService constructor.
     * @param PriceCalculatorFactory $priceCalculatorFactory
     */
    public function __construct(PriceCalculatorFactory $priceCalculatorFactory)
    {
        $this->priceCalculatorFactory = $priceCalculatorFactory;
    }


    /**
     * @inheridoc
     */
    public function getProductPrice(ProductDetailsInterface $productDetails): float
    {
        $productCalc = $this->priceCalculatorFactory->getPriceCalculator("RING");
        return $productCalc->getPrice($productDetails);
    }
}
