<?php


namespace SSJewels\PriceCalculator\Api;

/**
 * Interface ProductDetailsInterface
 * @package SSJewels\PriceCalculator\Api
 *
 * @author Avinash Thakur
 */
interface ProductDetailsInterface
{

    /**
     * @return string
     */
    public function getCategory(): string;

    /**
     * @param string $category
     */
    public function setCategory(string $category): void;

    /**
     * @return string
     */
    public function getMetalName(): string;

    /**
     * @param string $metalName
     */
    public function setMetalName(string $metalName);

    /**
     * @return string
     */
    public function getGoldKarat(): string;

    /**
     * @param string $goldKarat
     */
    public function setGoldKarat(string $goldKarat): void;

    /**
     * @return float
     */
    public function getSelectedSize(): float;

    /**
     * @param float $selectedSize
     */
    public function setSelectedSize(float $selectedSize): void;

    /**
     * @return float
     */
    public function getDefaultSize(): float;

    /**
     * @param float $defaultSize
     */
    public function setDefaultSize(float $defaultSize): void;

    /**
     * @return float
     */
    public function getDefaultWeight(): float;

    /**
     * @param float $defaultWeight
     */
    public function setDefaultWeight(float $defaultWeight): void;


    /**
     * @return string
     */
    public function getDiamondType(): string;

    /**
     * @param string $diamondType
     */public function setDiamondType(string $diamondType): void;

    /**
     * @return \SSJewels\PriceCalculator\Api\DiamondDetailInterface[]
     */
    public function getDiamondDetail(): array;

    /**
     * @param \SSJewels\PriceCalculator\Api\DiamondDetailInterface[] $diamondDetail
     *
     * @return void
     */
    public function setDiamondDetail(array $diamondDetail);

}
