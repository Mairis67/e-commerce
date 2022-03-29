<?php

namespace App\Services\Products\Store;

class StoreProductRequest
{
    private string $name;
    private string $description;
    private int $price;
    private int $available;

    public function __construct(string $name, string $description, int $price, int $available)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->available = $available;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getAvailable(): int
    {
        return $this->available;
    }
}