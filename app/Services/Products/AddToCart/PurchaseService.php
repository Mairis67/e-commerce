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

    public function execute(PurchaseRequest $request)
    {
        $this->productsRepository->purchase($request->getProductId(), $request->getAvailable());
    }
}