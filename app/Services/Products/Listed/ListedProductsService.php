<?php

namespace App\Services\Products\Listed;

use App\Repositories\Products\MySqlProductsRepository;
use App\Repositories\Products\ProductsRepository;

class ListedProductsService
{
    private ProductsRepository $productsRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute(): array
    {
        $request = $this->productsRepository->list();

        $products = new ListedProductsRequest($request);

        return $products->getProducts();
    }

}