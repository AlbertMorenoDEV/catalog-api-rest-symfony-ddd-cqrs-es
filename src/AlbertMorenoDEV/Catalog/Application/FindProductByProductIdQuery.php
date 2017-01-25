<?php
namespace AMD\Catalog\Application;

use AMD\Catalog\Domain\Model\Product;
use AMD\Catalog\Domain\Model\Product\ProductId;
use AMD\Catalog\Domain\Model\ProductNotFoundException;
use AMD\Catalog\Domain\Model\ProductRepository;

class FindProductByProductIdQuery
{
    private $repository;
    private $productId;

    public function __construct(ProductRepository $repository, ProductId $productId)
    {
        $this->repository = $repository;
        $this->productId = $productId;
    }

    public function execute(): Product
    {
        $product = $this->repository->findByProductId($this->productId);

        if (!$product) {
            throw new ProductNotFoundException('No product found for id '.$this->productId);
        }

        return $product;
    }
}