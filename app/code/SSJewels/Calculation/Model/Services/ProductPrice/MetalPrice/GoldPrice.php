<?php

namespace SSJewels\Calculation\Model\Services\ProductPrice\MetalPrice;

use SSJewels\Calculation\Helper\Metal;
use Magento\Framework\App\Helper\AbstractHelper;
use SSJewels\Calculation\Helper\MetalFinePrice;


class GoldPrice extends AbstractHelper
{

    private static $_18_KARAT = "18K";
    private static $_14_KARAT = "14K";

    protected $metalFinePrice;

    /**
     * GoldPrice constructor.
     * @param MetalFinePrice $metalFinePrice
     */
    public function __construct(MetalFinePrice $metalFinePrice)
    {
        $this->metalFinePrice = $metalFinePrice;
    
    }


    protected function getGoldPrice(string $karat) : double
    {
        switch($karat){

            case self::$_14_KARAT: return goldPriceByKarat(58.60);
            
            case self::$_18_KARAT: return goldPriceByKarat(75.20);
            
            default: "";
        }
    }

    private function goldPriceByKarat($multiplier) : double
    {
        $goldFinePrice = $this->metalFinePrice->getFinePrice(Metal::GOLD);
        return ($goldFinePrice * $multiplier) / 99.5;
    }

 

}

