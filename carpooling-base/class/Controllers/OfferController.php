<?php

namespace App\Controllers;

use App\Services\OffersService;

class OfferController
{
    /**
     * Return the html for the create action.
     */
    public function createOffer(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['name']) &&
            isset($_POST['idCar']) &&
            isset($_POST['idPublisher']) &&
            isset($_POST['price']) &&
            isset($_POST['locationFrom']) &&
            isset($_POST['locationTo']) &&
            isset($_POST['dateDepart']) &&
            isset($_POST['dateArrival']) && 
            $_POST['dateDepart']<$_POST['dateArrival'] ) {
            // Create the offer :
            $offerService = new OffersService();
            $isOk = $offerService->setOffer(
                null,
                $_POST['idCar'] ,
                $_POST['idPublisher'] ,
                $_POST['name'],
                $_POST['price'],
                $_POST['locationFrom'] ,
                $_POST['locationTo'] ,
                $_POST['dateDepart'] ,
                $_POST['dateArrival'] ,
                false
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Offer successfully created.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Offer creation failed.</div>';
            }
        } 

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getOffers(): string
    {
        $html = '';

        // Get all offer :
        $offerService = new OffersService();
        $offers = $offerService->getOffers();

        // Get html :
        foreach ($offers as $offer) {
                $html .=
                '<tr>'.
                '<td>'.$offer->getId().'</td>'.
                '<td>'.$offer->getIdCar().'</td>'.
                '<td>'.$offer->getIdPublisher().'</td>'.
                '<td>'.$offer->getName().'</td>'.
                '<td>'.$offer->getPrice().'</td>'.
                '<td>'.$offer->getLocationFrom().'</td>'.
                '<td>'.$offer->getLocationTo().'</td>'.
                '<td>'.$offer->getDateDepart()->format('d/m/Y - H:i').'</td>'.
                '<td>'.$offer->getDateArrival()->format('d/m/Y - H:i').'</td>'.
                '<td>'.$offer->isAvailable().'</td>'.
                '<td>'.
                '<a href="offers_update.php?id='.$offer->getId().'">Update</a>'.
                ' | '.
                '<a href="offers_delete.php?id='.$offer->getId().'">Delete</a>'.
                '</td>';
        }

        return $html;
    }

    /**
     * Update the offer.
     */
    public function updateOffer(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['name']) &&
        isset($_POST['idCar']) &&
        isset($_POST['idPublisher']) &&
            isset($_POST['price']) &&
            isset($_POST['locationFrom']) &&
            isset($_POST['locationTo']) &&
            isset($_POST['dateDepart']) &&
            isset($_POST['dateArrival']) &&
            isset($_POST['isAvailable']) && 
            $_POST['dateDepart']<$_POST['dateArrival']) {
            // Update the offer :
            $offerService = new OffersService();
            $isOk = $offerService->setOffer(
               $_POST['id'],
                $_POST['name'],
                $_POST['idCar'] ,
                $_POST['idPublisher'] ,
                    $_POST['price'],
                    $_POST['locationFrom'] ,
                    $_POST['locationTo'] ,
                    $_POST['dateDepart'] ,
                    $_POST['dateArrival'] ,
                    $_POST['isAvailable']
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Offer successfully updated.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Offer update failed.</div>';
            }
        } 

        return $html;
    }

    /**
     * Delete an offer.
     */
    public function deleteOffer(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the offer :
            $offerService = new OffersService();
            $isOk = $offerService->deleteoffer($_POST['id']);
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Offer successfully deleted.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Offer deletion failed.</div>';
            }
        }


        return $html;
    }
}
