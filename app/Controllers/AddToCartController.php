<?php

namespace App\Controllers;

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
        $amount = (int) $_POST['amount'];

        $this->availableService->execute($productId);

        $showProduct = $this->showProductService->execute(new ShowProductRequest($productId));

        $total = $showProduct->getPrice() * $amount;


        return new View('Products/cart', [
            'product' => $showProduct,
            'amount' => $amount,
            'total' => $total
        ]);
    }

    public function confirmed(array $vars): View
    {
        $productId = (int) $vars['id'];
        $amount = (int) $_POST['amount'];

        $availableAmount = $this->availableService->execute($productId);

        $availableAfterPurchase = $availableAmount - $amount;

        $this->addToCartService->execute($productId, $availableAfterPurchase);

        return new View('Products/confirmed');
    }
}