<?php

namespace App\Services\Products\Show;

use App\Repositories\Products\MySqlProductsRepository;
use App\Repositories\Products\ProductsRepository;

class ShowProductService
{
    private ProductsRepository $productsRepository;

    public function __construct()
    {
        $this->productsRepository = new MySqlProductsRepository();
    }

    public function execute(): array
    {
        $request = $this->productsRepository->show();

        $products = new ShowProductRequest($request);

        return $products->getProducts();
    }

}