<?php
namespace AMD\Catalog\Application\Product;

use AMD\Catalog\Domain\Model\Product\ProductRepository;
use AMD\Common\Application\Query;
use AMD\Common\Application\QueryHandler;

class FindAllProductsHandler implements QueryHandler
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Query|FindAllProductsQuery $query
     * @return ProductResponseCollection
     */
    public function handle(Query $query)
    {
        $products = $this->repository->findAll();

        return ProductResponseCollection::createFromProductArray($products);
    }
}