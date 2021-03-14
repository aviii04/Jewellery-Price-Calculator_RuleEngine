<?php

namespace SSJewels\Calculation\Model\Services\ProductPrice\MetalPrice;

use Psr\Log\LoggerInterface;
use SSJewels\Calculation\Helper\CustomVariable\CustomVariableManager;
use SSJewels\Calculation\Domain\Metal;

/**
 * Class GoldPrice
 * @package SSJewels\Calculation\Model\Services\ProductPrice\MetalPrice
 *
 * @author Avinash Thakur
 */
class GoldPrice
{

    private static string $_18_KARAT = "18K";
    private static string $_14_KARAT = "14K";

    private const _18_KARAT_MULTIPLIER = 75.20;
    private const _14_KARAT_MULTIPLIER = 58.60;

    private CustomVariableManager $customVariableManager;
    private LoggerInterface $logger;

    /**
     * GoldPrice constructor.
     * @param CustomVariableManager $customVariableManager
     */
    public function __construct(CustomVariableManager $customVariableManager, LoggerInterface $logger)
    {
        $this->customVariableManager = $customVariableManager;
        $this->logger = $logger;
    }

    public function getGoldPrice(string $karat) : float
    {
        switch($karat){

            case self::$_14_KARAT:
                $this->logger->info("Retrieving Price for 14 Karat Gold");
                return $this->goldPriceByKarat(self::_14_KARAT_MULTIPLIER);

            case self::$_18_KARAT:
                $this->logger->info("Retrieving Price for 18 Karat Gold");
                return $this->goldPriceByKarat(self::_18_KARAT_MULTIPLIER);

            default: "";
        }
    }

    private function goldPriceByKarat(float $multiplier): float
    {
        $goldFinePrice = $this->customVariableManager->metalFinePrice(Metal::GOLD);
        $goldPrice = ($goldFinePrice * $multiplier) / 99.5;
        $this->logger->info("Gold Fine Price: " . $goldFinePrice . ". Gold Price: " . $goldPrice);
        return $goldPrice;
    }

}

