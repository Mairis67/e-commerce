<?php

namespace App\Services\Products\AddToCart;

use App\Repositories\Products\ProductsRepository;

class PurchaseService
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute(int $productId, int $available)
    {
        $this->productsRepository->purchase($productId, $available);
    }
}