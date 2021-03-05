<?php


namespace SSJewels\Calculation\Model\ResourceModel\CrudRepository;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SSJewels\Calculation\Model\CrudRepositoryData as Model;
use SSJewels\Calculation\Model\ResourceModel\CrudRepositoryData as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(Model::class, ResourceModel::class);
    }

}
