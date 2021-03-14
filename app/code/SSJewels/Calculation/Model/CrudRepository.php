<?php


namespace SSJewels\Calculation\Model;


use SSJewels\Calculation\Api\Data\CrudRepositoryDataInterface;
use SSJewels\Calculation\Api\CrudRepositoryInterface;
use SSJewels\Calculation\Helper\DiamondPrice;
use SSJewels\Calculation\Helper\Metal;
use SSJewels\Calculation\Helper\MetalFinePrice;
use SSJewels\Calculation\Model\CrudRepositoryDataFactory as CrudModelFactory;
use SSJewels\Calculation\Model\ResourceModel\CrudRepositoryData as CrudResourceModel;
use SSJewels\Calculation\Model\ResourceModel\CrudRepository\CollectionFactory as CrudCollectionFactory;

use SSJewels\Calculation\Model\Services\ProductPrice\PriceCalculatorFactory;

use Magento\GroupedProduct\Model\Product\Type\Grouped;
use Magento\Catalog\Api\ProductRepositoryInterface;

use SSJewels\Calculation\Api\ProductDetailsInterface;


class CrudRepository implements CrudRepositoryInterface
{

    protected $modelFactory;
    protected $collectionFactory;
    protected $resourceModel;

    protected $grouped;
    protected $productRepo;

    protected $diamondPrice;
    protected $metalFinePrice;

    protected $priceCalculatorFactory;

    /**
     * CrudRepository constructor.
     * @param MetalFinePrice $priceCalculatorFactory
     * @param MetalFinePrice $metalFinePrice
     * @param DiamondPrice $diamondPrice
     * @param ProductRepositoryInterface $productRepo
     * @param Grouped $grouped
     * @param CrudModelFactory $modelFactory
     * @param CrudCollectionFactory $collectionFactory
     * @param CrudResourceModel $resourceModel
     */
    public function __construct(PriceCalculatorFactory $priceCalculatorFactory, MetalFinePrice $metalFinePrice, DiamondPrice $diamondPrice, ProductRepositoryInterface $productRepo, Grouped $grouped, CrudModelFactory $modelFactory, CrudCollectionFactory $collectionFactory, CrudResourceModel $resourceModel)
    {
        $this->priceCalculatorFactory = $priceCalculatorFactory;
        $this->metalFinePrice = $metalFinePrice;
        $this->diamondPrice = $diamondPrice;
        $this->productRepo = $productRepo;
        $this->grouped = $grouped;
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


//        ==============Retrieving global object===============
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $model = $objectManager->get('Magento\Variable\Model\Variable')->loadByCode('finePriceGold');
//        $plain_value = $model->getPlainValue();
//        $object->setFinePrice($plain_value);

        //============Retrieving grouped product==============
        $sku = "Diamond Price Details";
        $attributeCode = "Diamond Price Details";
        $diamondPriceDetail = $this->productRepo->get($sku);
//        $diamondPriceDetail->getName();
//        $associatedProducts = $this->grouped->getAssociatedProducts($diamondPriceDetail);
//        $product = $associatedProducts[0];
//        $object->setMetalName($product->getName());


//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $productt = $objectManager->create('Magento\Catalog\Model\Product')->load($product->getId());
//        $attrValue = $productt->getData('typeA_size2');


//        foreach($associatedProducts as $product) {
//           $object->setMetalName($product->getCustomAttribute('typeA_size1')->getValue());
//        }
        // $object->setMetalName($this->diamondPrice->getPrice());

        // ===============
        $productCalc = $this->priceCalculatorFactory->getPriceCalculator("RING");
        $object->setMetalName($productCalc->getPrice());



        return $object;
    }

    /**
     * @inheritDoc
     */
    public function save(CrudRepositoryDataInterface $entity)
    {
        $this->resourceModel->save($entity);
        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {

        $object = $this->modelFactory->create();
        $this->resourceModel->load($object, $id);
        try {
            $this->resourceModel->delete($object);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }
        return true;
    }

     /**
     * @inheritDoc
     */
    public function getProductDetails(ProductDetailsInterface $productDetailsInterface)
    {
        $productCalc = $this->priceCalculatorFactory->getPriceCalculator("RING");
        $productCalc->getPrice($productDetailsInterface);
    }
}
