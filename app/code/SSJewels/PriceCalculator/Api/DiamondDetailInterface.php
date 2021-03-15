<?php

namespace SSJewels\PriceCalculator\Api;

/**
 * Interface DiamondDetailInterface
 * @package SSJewels\PriceCalculator\Api
 *
 * @author Avinash Thakur
 */
interface DiamondDetailInterface
{
    /**
     * Get the value of size
     * @return float
     */
    public function getSize();


    /**
     * Set the value of size
     * @param float $size
     * @return  void
     */
    public function setSize($size);

    /**
     * Get the value of count
     * @return integer
     */
    public function getCount();

    /**
     * Set the value of count
     * @param int $size
     * @return  void
     */
    public function setCount($count);
}

