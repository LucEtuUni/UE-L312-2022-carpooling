<?php

namespace App\Entities;

use DateTime;

class Offer
{
    private $id;
    private $idCar;
    private $idPublisher;
    private $name;
    private $price;
    private $locationFrom;
    private $locationTo;
    private $dateDepart;
    private $dateArrival;
    private $isAvailable;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getIdCar(): int
    {
        return $this->idCar;
    }

    public function setIdCar(int $idCar): void
    {
        $this->idCar = $idCar;
    }

    public function getIdPublisher(): int
    {
        return $this->idPublisher;
    }

    public function setIdPublisher(int $idPublisher): void
    {
        $this->idPublisher = $idPublisher;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getLocationFrom(): string
    {
        return $this->locationFrom;
    }

    public function setLocationFrom(string $locationFrom): void
    {
        $this->locationFrom = $locationFrom;
    }

    public function getLocationTo(): string
    {
        return $this->locationTo;
    }

    public function setLocationTo(string $locationTo): void
    {
        $this->locationTo = $locationTo;
    }

    public function getDateDepart(): DateTime
    {
        return $this->dateDepart;
    }

    public function setDateDepart(DateTime $dateDepart): void
    {
        $this->dateDepart = $dateDepart;
    }

    public function getDateArrival(): DateTime
    {
        return $this->dateArrival;
    }

    public function setDateArrival(DateTime $dateArrival): void
    {
        $this->dateArrival = $dateArrival;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }
}
