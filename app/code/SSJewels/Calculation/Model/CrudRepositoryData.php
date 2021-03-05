<?php


namespace SSJewels\Calculation\Model;


use Magento\Framework\Model\AbstractModel;
use SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface;
use SSJewels\Calculation\Model\ResourceModel\CrudRepositoryData as ResourceModel;

class CrudRepositoryData extends AbstractModel implements CrudRepositoryDataInterface
{
    /**
     * CrudRepositoryData constructor.
     */
    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }


    /**
     * @inheritDoc
     */
    public function getMetalName()
    {
        return $this->getData('metal_name');
    }


    /**
     * @inheritDoc
     */
    public function getFinePrice()
    {
        return $this->getData('fine_price');
    }

    /**
     * @inheritDoc
     */
    public function setMetalName($metalName)
    {
        return $this->setData('metal_name', $metalName);
    }

    /**
     * @inheritDoc
     */
    public function setFinePrice($finePrice)
    {
        return $this->setData('fine_price', $finePrice);
    }
}
