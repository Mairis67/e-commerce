<?php

namespace App\Controllers;

use App\Services\Products\Show\ShowProductRequest;
use App\Services\Products\Show\ShowProductService;
use App\View;

class ShowProductController
{
    private ShowProductService $showProductService;

    public function __construct(ShowProductService $showProductService)
    {
        $this->showProductService = $showProductService;
    }

    public function show(array $vars): View
    {
        $productId = (int) $vars['id'];

        $product = $this->showProductService->execute(new ShowProductRequest($productId));

        return new View('Products/show-product', [
            'product' => $product
        ]);
    }
}