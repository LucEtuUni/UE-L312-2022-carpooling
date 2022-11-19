<?php

namespace App\Controllers;

use App\Services\OfferService;

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
            isset($_POST['isAvailable'])) {
            // Create the offer :
            $offerService = new OfferService();
            $isOk = $offerService->setOffer(
                null,
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
                $html = 'Offre créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'offre.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getOffer(): string
    {
        $html = '';

        // Get all offer :
        $offerService = new OfferService();
        $offer = $offerService->getOffer();

        // Get html :
        foreach ($offer as $offer) {
            $html .=
                '#' . $offer->getId() . ' ' .
                $offer->getName() . ' ' .
                $offer->getIdCar() . ' ' .
                $offer->getIdPublisher() . ' ' .
                $offer->getPrice() . ' ' .
                $offer->getLocationFrom() . ' ' .
                $offer->getLocationTo() . ' ' .
                $offer->getDateDepart() . ' ' .
                $offer->getDateArrival() . ' ' .
                $offer->getIsAvailable() . '<br />';
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
            isset($_POST['isAvailable'])) {
            // Update the offer :
            $offerService = new OfferService();
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
                $html = 'Offre mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'offre.';
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
            $offerService = new OfferService();
            $isOk = $offerService->deleteoffer($_POST['id']);
            if ($isOk) {
                $html = 'Offre supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'offre.';
            }
        }

        return $html;
    }
}