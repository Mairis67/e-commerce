<?php

namespace App\Services\Products\Store;

use App\Models\Product;
use App\Repositories\Products\ProductsRepository;

class StoreProductService
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute(StoreProductRequest $request): Product
    {
        $product = new Product(
            $request->getName(),
            $request->getDescription(),
            $request->getPrice(),
            $request->getAvailable(),
        );

        $this->productsRepository->store($product);

        return $product;
    }
}