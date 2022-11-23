<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
        isset($_POST['brand']) &&
    isset($_POST['model']) &&
    isset($_POST['mineral'])) {
            // Create the car :
            $carService = new CarsService();
            $isOk = $carService->setCar(
                null,
                $_POST['id'],
                $_POST['brand'],
                $_POST['model'] ,
                $_POST['mineral']
            );
            if ($isOk) {
                $html = 'Voiture créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all car :
        $carService = new CarsService();
        $car = $carService->getCars();

        // Get html :
        foreach ($car as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getBrand() . ' ' .
                $car->getModel() . ' ' .
                $car->getMineral() . '<br />';
        }

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['mineral'])) {
            // Update the car :
            $carService = new CarsService();
            $isOk = $carService->setCar(
               $_POST['id'],
                $_POST['brand'],
                $_POST['model'] ,
                $_POST['mineral']
            );
            if ($isOk) {
                $html = 'Voiture mis � jour avec succ�s.';
            } else {
                $html = 'Erreur lors de la mise � jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete an car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $carService = new CarsService();
            $isOk = $carService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}
