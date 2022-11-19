<?php

namespace App\Controllers;

use App\Services\ReservationService;

class ReservationController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idOffer']) &&
        isset($_POST['idUser']) &&
        isset($_POST['isPaid'])
            ) {
            // Create the reservation :
            $reservationService = new ReservationService();
            $isOk = $reservationService->setReservation(
                null,
                $_POST['idOffer'],
                $_POST['idUser'] ,
                $_POST['isPaid'] 
            );
            if ($isOk) {
                $html = 'Reservation créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservation(): string
    {
        $html = '';

        // Get all Reservation :
        $reservationService = new ReservationService();
        $reservation = $reservationService->getReservation();

        // Get html :
        foreach ($reservation as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getIdOffer() . ' ' .
                $reservation->getIdUser() . ' ' .
                $reservation->getIsPaid() . ' ' .
                 '<br />';
        }

        return $html;
    }

    /**
     * Update the reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
        isset($_POST['idOffer']) &&
        isset($_POST['idUser']) &&
        isset($_POST['isPaid'])) {
            // Update the reservation :
            $ReservationService = new ReservationService();
            $isOk = $reservationService->setReservation(
                $_POST['id'],
                $_POST['idOffer'],
                $_POST['idUser'] ,
                $_POST['isPaid'] 
            );
            if ($isOk) {
                $html = 'Réservation mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $ReservationService = new ReservationService();
            $isOk = $reservationService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
