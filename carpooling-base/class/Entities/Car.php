<?php

namespace App\Entities;

class Car
{
    private $id;
    private $brand;
    private $model;
    private $mineral;
    private $idOwner;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
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

    public function getIdOwner(): string
    {
        return $this->idOwner;
    }

    public function setIdOwner($idOwner): void
    {
        $this->idOwner = $idOwner;
    }
}
