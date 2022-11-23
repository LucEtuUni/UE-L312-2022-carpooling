<?php

namespace App\Services;

use App\Entities\Reservation;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $idOffer, string $idUser, bool $isPaid): bool
    {
        $isOk = false;

        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($idOffer, $idUser, $isPaid);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $idOffer, $idUser, $isPaid);
        }

        return $isOk;
    }

    /**
     * Return all reservation.
     */
    public function getReservation(): array
    {
        $reservation = [];

        $dataBaseService = new DataBaseService();
        $reservationDTO = $dataBaseService->getReservation();
        if (!empty($reservationDTO)) {
            foreach ($reservationDTO as $reservation) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setIdOffer($reservationDTO['idOffer']);
                $reservation->setIdUser($reservationDTO['idUser']);
                $reservation->setIsPaid($reservationDTO['isPaid']);
                $reservation[] = $reservation;
            }
        }

        return $reservation;
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