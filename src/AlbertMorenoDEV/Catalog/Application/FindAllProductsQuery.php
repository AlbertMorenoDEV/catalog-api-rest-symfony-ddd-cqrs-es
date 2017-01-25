<?php
namespace AMD\Catalog\Application;

use AMD\Catalog\Domain\Model\ProductRepository;

class FindAllProductsQuery
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findAll();
    }
}