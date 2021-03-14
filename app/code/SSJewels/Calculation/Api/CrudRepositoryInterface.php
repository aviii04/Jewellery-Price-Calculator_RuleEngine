<?php


namespace SSJewels\Calculation\Api;

use SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface;
use SSJewels\Calculation\Api\ProductDetailsInterface;

interface CrudRepositoryInterface
{

    /**
     * @param int $id
     * @return SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface
     */
    public function getById($id);

    /**
     * @param CrudRepositoryDataInterface $entity
     * @return SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface
     */
    public function save(CrudRepositoryDataInterface $entity);

    /**
     * @param int $id
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function  delete($id);

    /**
     * @param ProductDetailsInterface $productDetailsInterface
     * @return void
     */
    public function getProductDetails(ProductDetailsInterface $productDetailsInterface);

}
