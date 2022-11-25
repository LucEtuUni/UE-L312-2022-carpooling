<?php

namespace App\Controllers;

use App\Services\ReservationsService;

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
            isset($_POST['idBuyer'])) {
            // Create the reservation :
            $reservationService = new ReservationsService();
            $isOk = $reservationService->setReservation(
                null,
                $_POST['idOffer'],
                $_POST['idBuyer'] ,
                "0"
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Reservation successfully created.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Reservation creation failed.</div>';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservations(): string
    {
        $html = '';

        // Get all Reservation :
        $reservationService = new ReservationsService();
        $reservations = $reservationService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {
            $stringPaid = 'Not paid';
            if($reservation->isPaid()) $stringPaid = 'Paid';
            
            $html .=
            '<tr>'.
            '<td>'.$reservation->getId().'</td>'.
            '<td>'.$reservation->getIdOffer().'</td>'.
            '<td>'.$reservation->getIdUser().'</td>'.
            '<td>'.$stringPaid.'</td>'.
            '<td>'.
            '<a href="reservations_update.php?id='.$reservation->getId().'">Update</a>'.
            ' | '.
            '<a href="reservations_delete.php?id='.$reservation->getId().'">Delete</a>'.
            '</td>';
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
            isset($_POST['idBuyer']) &&
            isset($_POST['isPaid'])) {
            // Update the reservation :
            $reservationService = new ReservationsService();
            $isOk = $reservationService->setReservation(
                $_POST['id'],
                $_POST['idOffer'],
                $_POST['idBuyer'] ,
                $_POST['isPaid'] 
            );
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Reservation successfully updated.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Reservation update failed.</div>';
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
            $reservationService = new ReservationsService();
            $isOk = $reservationService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = '<div class="alert alert-success" role="alert">Reservation successfully deleted.</div>';
            } else {
                $html = '<div class="alert alert-danger" role="alert">Reservation deletion failed.</div>';
            }
        }

        return $html;
    }
}
