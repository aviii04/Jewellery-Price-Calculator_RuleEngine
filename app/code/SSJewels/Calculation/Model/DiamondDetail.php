<?php

namespace SSJewels\Calculation\Model;

use SSJewels\Calculation\Api\DiamondDetailInterface;

/**
 * Class DiamondDetail
 * @package SSJewels\Calculation\Model
 *
 * @author Avinash Thakur
 */
class DiamondDetail implements DiamondDetailInterface
{
    protected $size;
    protected $count;

    /**
     * @inheritDoc
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @inheritDoc
     */
    public function setSize($size)
    {
        $this->size = $size;

    }

    /**
     * @inheritDoc
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @inheritDoc
     */
    public function setCount($count)
    {
        $this->count = $count;

    }
}

