<?php

namespace App\Controllers;

use App\Services\Products\Show\ShowProductService;
use App\View;

class ListProductsController
{
    private ShowProductService $showProductService;

    public function __construct(ShowProductService $showProductService)
    {
        $this->showProductService = $showProductService;
    }

    public function list(): View
    {
//        $service = new ShowProductService();
//        $products = $service->execute();

        $products = $this->showProductService->execute();

        return new View('Products/products-list', [
            'products' => $products,
        ]);
    }

}