<?php

namespace SSJewels\Calculation\Api;

/**
 * Interface DiamondDetailInterface
 * @package SSJewels\Calculation\Api
 *
 * @author Avinash Thakur
 */
interface DiamondDetailInterface
{
    /**
     * Get the value of size
     * @return integer
     */
    public function getSize();


    /**
     * Set the value of size
     * @param integer $size
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

