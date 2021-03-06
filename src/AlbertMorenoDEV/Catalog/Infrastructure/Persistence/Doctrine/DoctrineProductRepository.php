<?php
namespace AMD\Catalog\Infrastructure\Persistence\Doctrine;

use AMD\Catalog\Domain\Model\Product\Product;
use AMD\Catalog\Domain\Model\Product\ProductId;
use AMD\Catalog\Domain\Model\Product\ProductRepository;
use Doctrine\ORM\EntityRepository;

class DoctrineProductRepository extends EntityRepository implements ProductRepository
{
    public function nextIdentity(): ProductId
    {
        return ProductId::create();
    }

    public function add(Product $product)
    {
        $this->_em->persist($product);
        $this->_em->flush(); // ToDo: Must be moved to Application layer, but where exactly?
    }

    public function update(Product $product)
    {
        $this->_em->flush(); // ToDo: Must be moved to Application layer, but where exactly?
    }

    public function remove(Product $product)
    {
        $this->_em->remove($product);
        $this->_em->flush(); // ToDo: Must be moved to Application layer, but where exactly?
    }

    public function findByProductId(ProductId $productId)
    {
        return $this->find($productId);
    }
}
