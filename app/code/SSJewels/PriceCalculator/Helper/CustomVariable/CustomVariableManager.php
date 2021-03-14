<?php

namespace SSJewels\PriceCalculator\Helper\CustomVariable;

use Psr\Log\LoggerInterface;

/**
 * Class CustomVariableManager
 * @package SSJewels\PriceCalculator\Helper\CustomVariable
 *
 * @author Avinash Thakur
 */
class CustomVariableManager
{
    const METAL_FINE_PRICE_PREFIX = "finePrice_";
    const MAKING_CHARGE_PREFIX = "makingCharge_";
    const PERCENT_WEIGHT_INCREASE_PREFIX = "weightIncrease_";

    private GlobalCustomVariableExtractor $globalCustomVariableExtractor;
    private $logger;

    /**
     * CustomVariableManager constructor.
     * @param GlobalCustomVariableExtractor $globalCustomVariableExtractor
     * @param LoggerInterface $logger
     */
    public function __construct(GlobalCustomVariableExtractor $globalCustomVariableExtractor, LoggerInterface $logger)
    {
        $this->globalCustomVariableExtractor = $globalCustomVariableExtractor;
        $this->logger = $logger;
    }

    public function metalFinePrice(string $metalName){
        $this->logger->info("Retrieving Fine Price for Metal: ". $metalName);
        return $this->globalCustomVariableExtractor->getValue(self::METAL_FINE_PRICE_PREFIX . $metalName);
    }

    public function makingCharge(string $productCategory){
        $this->logger->info("Retrieving Making Charge for Category: ". $productCategory);
        return $this->globalCustomVariableExtractor->getValue(self::MAKING_CHARGE_PREFIX . $productCategory);
    }

    public function percentWeightIncrease(string $productCategory){
        $this->logger->info("Retrieving percentage Weight Increase for Category: ". $productCategory);
        return $this->globalCustomVariableExtractor->getValue(self::PERCENT_WEIGHT_INCREASE_PREFIX . $productCategory);
    }
}

