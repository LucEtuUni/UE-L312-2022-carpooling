<?php

namespace App\Services;

use App\Entities\Car;

class CarService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $id, string $brand, string $model, string $mineral, string $idOwner): bool
    {
        $isOk = false;

        if (empty($id)) {
            $isOk = $dataBaseService->createCar($brand, $model, $mineral, $idOwner);
        } else {
            $isOk = $dataBaseService->updateCar($id, $brand, $model, $mineral, $idOwner);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCar(): array
    {
        $car = [];

        $dataBaseService = new DataBaseService();
        $carDTO = $dataBaseService->getCar();
        if (!empty($carDTO)) {
            foreach ($carDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setMineral($carDTO['mineral']);
                $car->setIdOwner($carDTO['idOwner']);
                $car[] = $car;
            }
        }

        return $car;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}