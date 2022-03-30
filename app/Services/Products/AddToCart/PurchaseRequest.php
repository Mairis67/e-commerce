<?php

namespace App\Services\Products\AddToCart;

class PurchaseRequest
{
    private int $productId;
    private int $available;

    public function __construct(int $productId, int $available)
    {
        $this->productId = $productId;
        $this->available = $available;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getAvailable(): int
    {
        return $this->available;
    }
}