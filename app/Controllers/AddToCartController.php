<?php

namespace App\Controllers;

use App\Services\Products\AddToCart\PurchaseRequest;
use App\Services\Products\AddToCart\PurchaseService;
use App\Services\Products\AddToCart\AvailableService;
use App\Services\Products\Show\ShowProductRequest;
use App\Services\Products\Show\ShowProductService;
use App\View;

class AddToCartController
{
    private AvailableService $availableService;
    private ShowProductService $showProductService;
    private PurchaseService $addToCartService;

    public function __construct(AvailableService $availableService, ShowProductService $showProductService,
                                PurchaseService  $addToCartService)
    {
        $this->showProductService = $showProductService;
        $this->availableService = $availableService;
        $this->addToCartService = $addToCartService;
    }

    public function addToCart(array $vars): View
    {
        $productId = (int) $vars['id'];
        $quantity = (int) $_POST['quantity'];

        $this->availableService->execute($productId);

        $showProduct = $this->showProductService->execute(new ShowProductRequest($productId));

        $total = $showProduct->getPrice() * $quantity;

        return new View('Products/cart', [
            'product' => $showProduct,
            'quantity' => $quantity,
            'total' => $total
        ]);
    }

    public function confirmed(array $vars): View
    {
        $productId = (int) $vars['id'];
        $quantity = (int) $_POST['quantity'];

        $available = $this->availableService->execute($productId);

        $availableAfterPurchase = $available - $quantity;

        $this->addToCartService->execute(new PurchaseRequest($productId, $availableAfterPurchase));

        return new View('Products/confirmed');
    }
}