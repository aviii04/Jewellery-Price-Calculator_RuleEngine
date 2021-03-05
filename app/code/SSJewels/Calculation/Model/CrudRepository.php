<?php


namespace SSJewels\Calculation\Model;


use SSJewels\Calculation\Api\CrudRepositoryInterface;
use SSJewels\Calculation\Model\CrudRepositoryDataFactory as CrudModelFactory;
use SSJewels\Calculation\Model\ResourceModel\CrudRepositoryData as CrudResourceModel;
use SSJewels\Calculation\Model\ResourceModel\CrudRepository\CollectionFactory as CrudCollectionFactory;

class CrudRepository implements CrudRepositoryInterface
{

    protected $modelFactory;
    protected $collectionFactory;
    protected $resourceModel;

    /**
     * CrudRepository constructor.
     * @param CrudModelFactory $modelFactory
     * @param CrudCollectionFactory $collectionFactory
     * @param CrudResourceModel $resourceModel
     */
    public function __construct(CrudModelFactory $modelFactory, CrudCollectionFactory $collectionFactory, CrudResourceModel $resourceModel)
    {
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @inheritDoc
     */
    public function getById($id)
    {
        $object = $this->modelFactory->create();
        $this->resourceModel->load($object, $id);
        return $object;
    }

}
