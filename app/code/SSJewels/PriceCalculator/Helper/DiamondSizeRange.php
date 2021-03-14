<?php


namespace SSJewels\PriceCalculator\Helper;

/**
 * Class DiamondSizeRange - Binds together diamond size range with price attribute code.
 * priceAttrCode - unique code to retrieve price for given range.
 * from, to - defines diamond size range
 * @package SSJewels\PriceCalculator\Helper
 *
 * @author Avinash Thakur
 */
class DiamondSizeRange
{

    public array $PRICE_0p003_0p11 = array(
        "priceAttrCode" => "diamond_size_0p003_0p11",
        "from" => 0.003,
        "to" => 0.11
    );

    public array $PRICE_0p12_0p15 = array(
        "priceAttrCode" => "diamond_size_0p12_0p15",
        "from" => 0.12,
        "to" => 0.15
    );

    public array $PRICE_0p16_0p23 = array(
        "priceAttrCode" => "diamond_size_0p16_0p23",
        "from" => 0.16,
        "to" => 0.23
    );

    public array $PRICE_0p24_0p29 = array(
        "priceAttrCode" => "diamond_size_0p24_0p29",
        "from" => 0.24,
        "to" => 0.29
    );
}
