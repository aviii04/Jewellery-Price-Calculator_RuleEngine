<?php


namespace SSJewels\Calculation\Api;

/**
 * Interface ProductDetailsInterface
 * @package SSJewels\Calculation\Api
 *
 * @author Avinash Thakur
 */
interface ProductDetailsInterface
{

    /**
     * @return string
     */
    public function getMetalName();

    /**
     * @param string $metalName
     * @return $this
     */
    public function setMetalName($metalName);

    /**
     * @return \SSJewels\Calculation\Api\DiamondDetailInterface[]
     */
    public function getDiamondDetail();

    /**
     * @param \SSJewels\Calculation\Api\DiamondDetailInterface[] $diamondDetail
     *
     * @return void
     */
    public function setDiamondDetail(array $diamondDetail);

}

