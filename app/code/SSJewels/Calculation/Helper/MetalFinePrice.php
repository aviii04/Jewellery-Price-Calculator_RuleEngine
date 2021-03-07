<?php


namespace SSJewels\Calculation\Helper;

use Psr\Log\LoggerInterface;

/**
 * Class MetalFinePrice - Utility to retrieve Metal's Fine Prices from Custom Variables
 * @package SSJewels\Calculation\Helper
 *
 * @author Avinash Thakur
 */
class MetalFinePrice
{

    private $logger;

    /**
     * MetalFinePrice constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getFinePrice(string $metalCustomVariableCode)
    {
        $this->logger->info("Retrieving Fine Price for Metal: ". $metalCustomVariableCode);
        $variableObjectManager = $this->getVariableObjectManager();
        $model = $variableObjectManager->loadByCode($metalCustomVariableCode);
        return $model->getPlainValue();
    }

    private function getVariableObjectManager()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager->get('Magento\Variable\Model\Variable');
    }



}
