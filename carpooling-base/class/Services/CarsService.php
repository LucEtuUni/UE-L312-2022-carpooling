<?php

namespace App\Services;

use App\Entities\Car;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $id, string $brand, string $model, string $mineral, string $color, string $nbrSlots): bool
    {
        $isOk = false;
        $dataBaseService = new DataBaseService();
        
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($brand, $model, $mineral, $color, $nbrSlots);
        } else {
            $isOk = $dataBaseService->updateCar($id, $brand, $model, $mineral, $color, $nbrSlots);
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
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setMineral($carDTO['mineral']);
                $car->setColor($carDTO['color']);
                $car->setNbrSlots($carDTO['nbrSlots']);
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