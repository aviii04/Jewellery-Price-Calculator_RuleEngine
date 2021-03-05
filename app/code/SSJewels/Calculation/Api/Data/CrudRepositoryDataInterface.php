<?php


namespace SSJewels\Calculation\Api\Data;


interface CrudRepositoryDataInterface
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
     * @return string
     */
    public function getFinePrice();

    /**
     * @param double $finePrice
     * @return $this
     */
    public function setFinePrice($finePrice);
}
