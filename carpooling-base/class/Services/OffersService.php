<?php

namespace App\Services;

use App\Entities\Offer;

class OffersService
{
    /**
     * Create or update an offer.
     */
    public function setOffer(?string $id, string $idCar, string $idPublisher, string $name, string $price, string $locationFrom, string $locationTo, string $dateDepart, string $dateArrival, bool $isAvailable): bool
    {
        $isOk = false;

        if (empty($id)) {
            $isOk = $dataBaseService->createOffer($idCar, $idPublisher, $name, $price, $locationFrom, $locationTo, $dateDepart, $dateArrival, $isAvailable);
        } else {
            $isOk = $dataBaseService->updateOffer($id, $idCar, $idPublisher, $name, $price, $locationFrom, $locationTo, $dateDepart, $dateArrival, $isAvailable);
        }

        return $isOk;
    }

    /**
     * Return all offer.
     */
    public function getOffer(): array
    {
        $offer = [];

        $dataBaseService = new DataBaseService();
        $offersDTO = $dataBaseService->getOffer();
        if (!empty($offersDTO)) {
            foreach ($offersDTO as $offerDTO) {
                $offer = new Offer();
                $offer->setId($offerDTO['id']);
                $offer->setIdCar($offerDTO['idCar']);
                $offer->setIdPublisher($offerDTO['idPublisher']);
                $offer->setName($offerDTO['name']);
                $offer->setPrice($offerDTO['price']);
                $offer->setLocationFrom($offerDTO['locationFrom']);
                $offer->setLocationTo($offerDTO['locationTo']);
                $offer->setDateDepart($offerDTO['dateDepart']);
                $offer->setDateArrival($offerDTO['dateArrival']);
                $offer->setIsAvailable($offerDTO['isAvailable']);
                $offer[] = $offer;
            }
        }

        return $offer;
    }

    /**
     * Delete an Offer.
     */
    public function deleteOffer(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteOffer($id);

        return $isOk;
    }
}