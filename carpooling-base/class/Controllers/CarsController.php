<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['mineral']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrslots'])) {
            // Create the car :
            $carService = new CarsService();
            $isOk = $carService->setCar(
                null,
                $_POST['brand'],
                $_POST['model'] ,
                $_POST['mineral'],
                $_POST['color'],
                $_POST['nbrslots']
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Car successfully created.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Car creation failed.</div>';
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

        // Get all cars :
        $carService = new CarsService();
        $cars = $carService->getCars();

        // Get html :
        foreach ($cars as $car) {
            
            $html .=
            '<tr>'.
            '<td>'.$car->getId().'</td>'.
            '<td>'.$car->getBrand().'</td>'.
            '<td>'.$car->getModel().'</td>'.
            '<td>'.$car->getMineral().'</td>'.
            '<td>'.$car->getColor().'</td>'.
            '<td>'.$car->getNbrSlots().'</td>'.
            '<td>'.
            '<a href="cars_update.php?id='.$car->getId().'">Update</a>'.
            ' | '.
            '<a href="cars_delete.php?id='.$car->getId().'">Delete</a>'.
            '</td>';
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
            isset($_POST['mineral']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrslots'])) {
            // Update the car :
            $carService = new CarsService();
            $isOk = $carService->setCar(
                $_POST['id'],
                $_POST['brand'],
                $_POST['model'] ,
                $_POST['mineral'],
                $_POST['color'],
                $_POST['nbrslots']
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Car successfully updated.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Car updating failed.</div>';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
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
                $html = '<div class="alert alert-success" role="alert">Car successfully deleted.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Car deletion failed.</div>';
            }
        }

        return $html;
    }
}
