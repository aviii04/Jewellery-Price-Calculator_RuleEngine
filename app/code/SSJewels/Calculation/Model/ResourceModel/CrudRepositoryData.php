<?php


namespace SSJewels\Calculation\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CrudRepositoryData extends AbstractDb
{

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('metal_fine_price', 'metal_id');
    }
}
