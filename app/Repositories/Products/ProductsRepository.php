<?php

namespace App\Repositories\Products;

use App\Models\Product;

interface ProductsRepository
{
    public function list(): array;

    public function store(Product $product): void;

    public function show(int $productId): Product;

    public function getAvailable(int $productId): int;

    public function purchase(int $productId, int $available): void;
}