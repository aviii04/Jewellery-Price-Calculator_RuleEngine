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

    public array $PRICE_00_02 = array(
        "priceAttrCode" => "diamond_size_00_02",
        "from" => 0,
        "to" => 2
    );

    public array $PRICE_02_08 = array(
        "priceAttrCode" => "diamond_size_02_08",
        "from" => 2,
        "to" => 8
    );

    public array $PRICE_08_10 = array(
        "priceAttrCode" => "diamond_size_08_10",
        "from" => 8,
        "to" => 10
    );
}
