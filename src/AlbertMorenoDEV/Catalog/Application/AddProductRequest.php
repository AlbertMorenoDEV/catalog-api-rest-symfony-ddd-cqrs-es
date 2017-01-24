<?php
namespace AMD\Catalog\Application;

use AMD\Catalog\Domain\Model\Family\FamilyId;
use AMD\Catalog\Domain\Model\Product\ProductId;

class AddProductRequest
{
    private $productId;
    private $description;
    private $familyId;

    public function __construct(string $productId, string $description, string $familyId)
    {
        $this->productId = ProductId::create($productId);
        $this->description = $description;
        $this->familyId = FamilyId::create($familyId);
    }

    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getFamilyId(): FamilyId
    {
        return $this->familyId;
    }
}