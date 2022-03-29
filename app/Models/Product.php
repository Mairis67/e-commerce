<?php

namespace App\Models;

class Product
{
    private string $name;
    private string $description;
    private int $available;
    private int $price;
    private ?int $id;

    public function __construct(string $name, string $description, int $price, int $available, ?int $id = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->available = $available;
        $this->price = $price;
        $this->id = $id;
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

    public function getId(): ?int
    {
        return $this->id;
    }

}