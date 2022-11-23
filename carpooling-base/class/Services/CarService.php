<?php

namespace App\Services;

use App\Entities\Car;

class CarService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $id, string $brand, string $model, string $mineral): bool
    {
        $isOk = false;

        if (empty($id)) {
            $isOk = $dataBaseService->createCar($brand, $model, $mineral);
        } else {
            $isOk = $dataBaseService->updateCar($id, $brand, $model, $mineral);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carDTO = $dataBaseService->getCars();
        if (!empty($carDTO)) {
            foreach ($carDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setMineral($carDTO['mineral']);
                $cars[] = $car;
            }
        }

        return $cars;
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