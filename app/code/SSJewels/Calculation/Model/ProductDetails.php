<?php

namespace SSJewels\Calculation\Model;

use SSJewels\Calculation\Api\ProductDetailsInterface;
use SSJewels\Calculation\Api\DiamondDetailInterface;

/**
 * Class ProductDetails
 * @package SSJewels\Calculation\Model
 *
 * @author Avinash Thakur
 */
class ProductDetails implements ProductDetailsInterface
{
    private string $metalName;
    private array $diamondDetail;


   /**
     * @inheritDoc
     */
    public function getMetalName()
    {
        return $this->metalName;
    }

    /**
     * @inheritDoc
     */
    public function setMetalName($metalName)
    {
        $this->metalName = $metalName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getDiamondDetail(){
        return $this->diamondDetail;
    }

    /**
     * @inheritDoc
     */
    public function setDiamondDetail(array $diamondDetail){
        $this->diamondDetail = $diamondDetail;
    }

}

