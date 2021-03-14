<?php

namespace SSJewels\PriceCalculator\Helper\CustomVariable;

use Magento\Framework\App\ObjectManager;
use Psr\Log\LoggerInterface;

/**
 * Class GlobalCustomVariableExtractor
 * @package SSJewels\PriceCalculator\Helper\CustomVariable
 *
 * @author Avinash Thakur
 */
class GlobalCustomVariableExtractor
{
    private LoggerInterface $logger;

    /**
     * GlobalExtractor constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function getValue(string $customVariableCode)
    {
        $variableObjectManager = $this->getVariableObjectManager();
        $model = $variableObjectManager->loadByCode($customVariableCode);
        return $model->getPlainValue();
    }

    private function getVariableObjectManager()
    {
        $objectManager = ObjectManager::getInstance();
        return $objectManager->get('Magento\Variable\Model\Variable');
    }
}

