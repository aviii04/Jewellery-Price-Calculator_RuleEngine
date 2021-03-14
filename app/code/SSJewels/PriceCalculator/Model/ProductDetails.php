<?php


namespace SSJewels\PriceCalculator\Model;

use SSJewels\PriceCalculator\Api\ProductDetailsInterface;

/**
 * Class ProductDetails
 * @package SSJewels\PriceCalculator
 *
 * @author Avinash Thakur
 */
class ProductDetails implements ProductDetailsInterface
{

    private string $category;
    private string $metalName;
    private string $goldKarat;
    private float $selectedSize;
    private float $defaultSize;
    private float $defaultWeight;
    private string $diamondType;
    private array $diamondDetail;


    /**
     * @inheritDoc
     */
    public function getMetalName(): string
    {
        return $this->metalName;
    }

    /**
     * @inheritDoc
     */
    public function setMetalName(string $metalName)
    {
        $this->metalName = $metalName;
    }

    /**
     * @inheritDoc
     */
    public function getGoldKarat(): string
    {
        return $this->goldKarat;
    }

    /**
     * @inheritDoc
     */
    public function setGoldKarat(string $goldKarat): void
    {
        $this->goldKarat = $goldKarat;
    }

    /**
     * @inheritDoc
     */
    public function getDiamondDetail(): array{
        return $this->diamondDetail;
    }

    /**
     * @inheritDoc
     */
    public function setDiamondDetail(array $diamondDetail){
        $this->diamondDetail = $diamondDetail;
    }

    /**
     * @inheritDoc
     */
    public function getDiamondType(): string
    {
        return $this->diamondType;
    }

    /**
     * @inheritDoc
     */
    public function setDiamondType(string $diamondType): void
    {
        $this->diamondType = $diamondType;
    }

    /**
     * @inheritDoc
     */
    public function getSelectedSize(): float
    {
        return $this->selectedSize;
    }

    /**
     * @inheritDoc
     */
    public function setSelectedSize(float $selectedSize): void
    {
        $this->selectedSize = $selectedSize;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultSize(): float
    {
        return $this->defaultSize;
    }

    /**
     * @inheritDoc
     */
    public function setDefaultSize(float $defaultSize): void
    {
        $this->defaultSize = $defaultSize;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultWeight(): float
    {
        return $this->defaultWeight;
    }

    /**
     * @inheritDoc
     */
    public function setDefaultWeight(float $defaultWeight): void
    {
        $this->defaultWeight = $defaultWeight;
    }

    /**
     * @inheritDoc
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @inheritDoc
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

}
