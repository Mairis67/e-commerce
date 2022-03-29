<?php

namespace App\Controllers;


use App\Redirect;
use App\Services\Products\Store\StoreProductRequest;
use App\Services\Products\Store\StoreProductService;
use App\View;

class AddProductsController
{
    private StoreProductService $storeProductService;

    public function __construct(StoreProductService $storeProductService)
    {
        $this->storeProductService = $storeProductService;
    }

    public function add(): View
    {
        return new View('Products/add');
    }

    public function store(): Redirect
    {
        $this->storeProductService->execute(new StoreProductRequest(
                $_POST['name'],
                $_POST['description'],
                $_POST['price'],
                $_POST['available'],)
        );

        return new Redirect('/');
    }
}