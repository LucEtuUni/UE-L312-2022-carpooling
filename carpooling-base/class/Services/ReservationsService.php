<?php

namespace App\Services;

use App\Entities\Reservation;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $idOffer, string $idBuyer, string $isPaid): bool
    {
        $isOk = false;
        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($idOffer, $idBuyer, $isPaid);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $idOffer, $idBuyer, $isPaid);
        }

        return $isOk;
    }

    /**
     * Return all reservation.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setIdOffer($reservationDTO['idOffer']);
                $reservation->setIdUser($reservationDTO['idBuyer']);
                $reservation->setIsPaid($reservationDTO['isPaid']);
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteReservation($id);

        return $isOk;
    }
}