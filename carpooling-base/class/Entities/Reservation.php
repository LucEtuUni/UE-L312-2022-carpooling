<?php

namespace App\Entities;

class Offer
{
    private $id;
    private $idOffer;
    private $idUser;
    private $isPaid;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getIdOffer(): int
    {
        return $this->idOffer;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function isPaid(): bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): void
    {
        $this->isPaid = $isPaid;
    }
}
