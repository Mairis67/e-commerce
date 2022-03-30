<?php

namespace App\Services\Products\Store;

class StoreProductRequest
{
    private string $name;
    private string $description;
    private int $price;
    private int $available;

    public function __construct(string $name, string $description,int $available, int $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->available = $available;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAvailable(): int
    {
        return $this->available;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}