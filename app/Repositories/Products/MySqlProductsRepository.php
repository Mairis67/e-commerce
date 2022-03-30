<?php

namespace App\Repositories\Products;

use App\Database;
use App\Models\Product;

class MySqlProductsRepository implements ProductsRepository
{
    public function list(): array
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
                $productsData['available'],
                $productsData['price'],
                $productsData['id']
            );
        }
        return $products;
    }

    public function show(int $productId): Product
    {
        $productQuery = Database::connection()
            ->createQueryBuilder()
            ->select('*')
            ->from('products')
            ->where('id = ?')
            ->setParameter(0, $productId)
            ->executeQuery()
            ->fetchAssociative();

        return new Product(
          $productQuery['name'],
          $productQuery['description'],
          $productQuery['available'],
          $productQuery['price'],
          $productQuery['id']
        );
    }

    public function store(Product $product): void
    {
        Database::connection()
            ->insert('products', [
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'available' => $product->getAvailable(),
                'price' => $product->getPrice(),
                'id' => $product->getId()
            ]);
    }

    public function getAvailable(int $productId): int
    {
        $productQuery = Database::connection()
            ->createQueryBuilder()
            ->select('available')
            ->from('products')
            ->where('id = ?')
            ->setParameter(0, $productId)
            ->executeQuery()
            ->fetchAssociative();

        return (int) $productQuery["available"];
    }

    public function purchase(int $productId, int $available): void
    {
        Database::connection()
            ->update('products', [
                'available' => $available
            ], ['id' => $productId]);
    }
}