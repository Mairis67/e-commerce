<?php

namespace App\Services\Products\AddToCart;

use App\Repositories\Products\ProductsRepository;

class AvailableService
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute(int $productId): int
    {
        return $this->productsRepository->getAvailable($productId);
    }
}