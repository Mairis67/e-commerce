<?php

namespace App\Controllers;

use App\Services\Products\Listed\ListedProductsService;
use App\View;

class ListProductsController
{
    private ListedProductsService $showProductService;

    public function __construct(ListedProductsService $showProductService)
    {
        $this->showProductService = $showProductService;
    }

    public function list(): View
    {
        $products = $this->showProductService->execute();

        return new View('Products/products-list', [
            'products' => $products,
        ]);
    }

}