<?php
namespace AMD\Catalog\Application\Product;

class ProductResponseCollection
{
    private $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @param \AMD\Catalog\Domain\Model\Product\Product[] $products
     * @return \self
     */
    public static function createFromProductArray(array $products): self
    {
        $new_collection = new self();

        if (count($products)) {
            foreach ($products as $product) {
                $new_collection->add(ProductResponse::createFromProduct($product));
            }
        }

        return $new_collection;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function add($product)
    {
        $this->assertResponseType($product);

        $this->items[] = $product;
    }

    /**
     * @param $response
     * @throws InvalidProductResponseException
     */
    protected function assertResponseType($response)
    {
        if (false === is_a($response, ProductResponse::class)) {
            throw new InvalidProductResponseException($response);
        }
    }
}