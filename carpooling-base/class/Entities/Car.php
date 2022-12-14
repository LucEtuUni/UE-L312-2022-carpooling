<?php

namespace App\Entities;

class Car
{
    private $id;
    private $brand;
    private $model;
    private $mineral;
    private $color;
    private $nbrSlots;
    
    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getBrand(): string
    {
        return $this->brand;
    }
    
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        
        return $this;
    }
    
    public function getModel(): string
    {
        return $this->model;
    }
    
    public function setModel(string $model): self
    {
        $this->model = $model;
        
        return $this;
    }
    
    public function getMineral(): string
    {
        return $this->mineral;
    }
    
    public function setMineral(string $mineral): self
    {
        $this->mineral = $mineral;
        
        return $this;
    }
    
    public function getColor(): string
    {
        return $this->color;
    }
    
    public function setColor(string $color): self
    {
        $this->color = $color;
        
        return $this;
    }
    
    public function getNbrSlots(): int
    {
        return $this->nbrSlots;
    }
    
    public function setNbrSlots(int $nbrSlots): self
    {
        $this->nbrSlots = $nbrSlots;
        
        return $this;
    }
}
