<?php


namespace SSJewels\Calculation\Helper;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\GroupedProduct\Model\Product\Type\Grouped;
use Psr\Log\LoggerInterface;

/**
 * Class DiamondPrice - Utility to retrieve Diamond price.
 * @package SSJewels\Calculation\Helper
 *
 * @author Avinash Thakur
 */
class DiamondPrice
{

    protected $productRepo;
    protected $grouped;
    protected $logger;
    protected $diamondSizeRangeList;

    const DIAMOND_CONFIG_SKU = "Diamond Price Details";
    const DIAMOND_TYPE_PREFIX = "diamond_type_";
    const DIAMOND_SIZE_PREFIX = "diamond_size_";

    /**
     * DiamondPrice constructor.
     * @param DiamondSizeRange $diamondSizeRangeList
     * @param ProductRepositoryInterface $productRepo
     * @param Grouped $grouped
     * @param LoggerInterface $logger
     */
    public function __construct(DiamondSizeRange $diamondSizeRangeList, ProductRepositoryInterface $productRepo, Grouped $grouped, LoggerInterface $logger)
    {
        $this->diamondSizeRangeList = $diamondSizeRangeList;
        $this->productRepo = $productRepo;
        $this->grouped = $grouped;
        $this->logger = $logger;
    }

    /**
     * @param string $diamondType
     * @param float $diamondSize
     * @return float
     * @throws NotFoundException
     */
    public function getPrice(string $diamondType, float $diamondSize): float
    {
//        $diamondType = "SI-GH";
//        $diamondSize = 10;
        $this->logger->info("Retrieving Diamond Price: Type: " . $diamondType . " Size: " . $diamondSize);
        $diamondTypeConfig = $this->getDiamondType($diamondType);

        if (null == $diamondTypeConfig) {
            throw new NotFoundException(__('No Config Found for Diamond Type : %1', $diamondType));
        }

        $this->logger->info("Retrieving Price from Config: " . $diamondTypeConfig->getName());
        return $this->getDiamondPrice($diamondTypeConfig, $diamondSize);
    }

    private function getDiamondType(string $diamondType)
    {
        $diamondTypeSKU = $this->getDiamondTypeSKU($diamondType);
        $diamondConfig = $this->productRepo->get(self::DIAMOND_CONFIG_SKU);
        $diamondTypes = $this->grouped->getAssociatedProducts($diamondConfig);

        foreach ($diamondTypes as $diamondType) {
            if ($diamondType->getSku() == $diamondTypeSKU) {
                return $diamondType;
            }
        }
        return null;
    }

    /**
     * @param $diamondTypeConfig
     * @param float $diamondSize
     * @return float
     * @throws NotFoundException
     */
    private function getDiamondPrice($diamondTypeConfig, float $diamondSize)
    {
        $productManager = $this->getProductManager();
        $diamondType = $productManager->load($diamondTypeConfig->getId());
        $priceAttr = $this->getPriceAttrBySize($diamondSize);
        if (null == $priceAttr) {
            throw new NotFoundException(__('No Price Attribute Code found for diamond size : %1', $diamondType));
        }
        return $diamondType->getData($priceAttr);
    }

    private function getPriceAttrBySize(float $diamondSize)
    {
        foreach ($this->diamondSizeRangeList as $priceProperty => $size) {
            if ($diamondSize >= $size["from"] && $diamondSize <= $size["to"]) {
                $this->logger->info("Price attribute code for size " . $diamondSize . " is " . $size["priceAttrCode"]);
                return $size["priceAttrCode"];
            }
        }
        $this->logger->info("No Price attributes code found for size: " . $diamondSize);
        return null;
    }

    private function getProductManager()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager->create('Magento\Catalog\Model\Product');
    }

    private function getDiamondTypeSKU(string $diamondType): string
    {
        return self::DIAMOND_TYPE_PREFIX . $diamondType;
    }

}
