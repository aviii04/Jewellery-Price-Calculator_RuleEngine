<?php


namespace SSJewels\Calculation\Model\Services\ProductPrice\Calculator;

use Psr\Log\LoggerInterface;
use SSJewels\Calculation\Domain\ProductCategory;
use SSJewels\Calculation\Api\ProductDetailsInterface;
use SSJewels\Calculation\Helper\CustomVariable\CustomVariableManager;
use SSJewels\Calculation\Model\Services\ProductPrice\MetalPrice\GoldPrice;
use SSJewels\Calculation\Model\Services\ProductPrice\PriceCalculatorInterface;
use SSJewels\Calculation\Model\Services\ProductPrice\Utils\GenericCalculator;

/**
 * Class RingPriceCalculator
 * @package SSJewels\Calculation\Model\Services\ProductPrice\Calculator
 *
 * @author Avinash Thakur
 */
class RingPriceCalculator implements PriceCalculatorInterface
{
    private GenericCalculator $genericCalculator;
    private CustomVariableManager $customVariableManager;
    private GoldPrice $goldPrice;
    private LoggerInterface $logger;

    public function __construct(CustomVariableManager $customVariableManager, GenericCalculator $genericCalculator, GoldPrice $goldPrice, LoggerInterface $logger){
        $this->customVariableManager = $customVariableManager;
        $this->genericCalculator = $genericCalculator;
        $this->goldPrice = $goldPrice;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function getPrice(ProductDetailsInterface $productDetailsInterface) : string
    {
        $goldKarat = "14K";
        $selectedSize = 5;
        $defaultSize = 7;
        $defaultWeight = 10;
        $diamondType = "SI-GH";

        $this->logger->info("=========== Starting Price Calculation for Product: Dummy ================");

        $metalPrice = $this->goldPrice->getGoldPrice($goldKarat);
        $metalWeight = $this->weightByRingSize($selectedSize, $defaultSize, $defaultWeight);
        $makingCharge = $this->makingCharge($metalWeight);
        $diamondPrice = $this->totalDiamondPrice($diamondType, $productDetailsInterface->getDiamondDetail());
        $ringPrice = $this->ringPrice($metalPrice, $diamondPrice, $makingCharge);

        $this->logger->info("Ring Price: ". $ringPrice);
        $this->logger->info("=========== Price Calculation complete ================");
        return $ringPrice;
    }

    private function makingCharge(float $metalWeight): float
    {
        $makingCharge = $this->customVariableManager->makingCharge(ProductCategory::RING);
        $totalMakingCharge = $makingCharge * $metalWeight;
        $this->logger->info("Total Making Charge: " . $totalMakingCharge);
        return $totalMakingCharge;
    }

    private function weightByRingSize(float $selectedSize, float $defaultSize, float $defaultWeight): float
    {
        $this->logger->info("Computing Metal Weight...");

        $percentIncrease = $this->customVariableManager->percentWeightIncrease(ProductCategory::RING);
        $metalWeight = GenericCalculator::getWeightBySize($selectedSize, $defaultSize, $defaultWeight, $percentIncrease);

        $this->logger->info("Computed Metal Weight in gram: " . $metalWeight,
            ['selectedSize' => $selectedSize, 'defaultSize' => $defaultSize, 'defaultWeight' => $defaultWeight, 'percentIncrease' => $percentIncrease]);

        return $metalWeight;
    }

    private function totalDiamondPrice(string $diamondType, array $diamondDetails): float
    {
        $totalDiamondPrice = $this->genericCalculator->getTotalDiamondPrice($diamondType, $diamondDetails);
        $this->logger->info("Total Diamond Price: " . $totalDiamondPrice);
        return $totalDiamondPrice;
    }

    private function ringPrice(float $metalPrice, float $diamondPrice, float $makingCharge) : float
    {
        return $metalPrice + $diamondPrice + $makingCharge;
    }

}

