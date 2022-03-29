<?php

namespace App\Repositories\Products;

use App\Models\Product;

interface ProductsRepository
{
    public function show(): array;

    public function store(Product $product): void;
}