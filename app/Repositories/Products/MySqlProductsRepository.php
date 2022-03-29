<?php

namespace App\Repositories\Products;

use App\Database;
use App\Models\Product;

class MySqlProductsRepository implements ProductsRepository
{
    public function show(): array
    {
        $productsQuery = Database::connection()
            ->createQueryBuilder()
            ->select('*')
            ->from('products')
            ->executeQuery()
            ->fetchAllAssociative();

        $products = [];

        foreach ($productsQuery as $productsData) {
            $products[] = new Product(
                $productsData['name'],
                $productsData['description'],
                $productsData['price'],
                $productsData['available'],
                $productsData['id']
            );
        }
        return $products;
    }

    public function store(Product $product): void
    {
        Database::connection()
            ->insert('products', [
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'available' => $product->getAvailable(),
                'id' => $product->getId()
            ]);
    }
}