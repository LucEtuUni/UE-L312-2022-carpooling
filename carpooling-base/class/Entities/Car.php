<?php

namespace App\Entities;

class Car
{
    private $id;
    private $brand;
    private $model;
    private $mineral;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel($model): void
    {
        $this->model = $model;
    }

    public function getMineral(): string
    {
        return $this->mineral;
    }

    public function setMineral($mineral): void
    {
        $this->mineral = $mineral;
    }
}
