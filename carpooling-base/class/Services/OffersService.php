<?php

namespace App\Services;

use App\Entities\Offer;
use DateTime;
class OffersService
{
    /**
     * Create or update an offer.
     */
    public function setOffer(?string $id, string $idCar, string $idPublisher, string $name, string $price, string $locationFrom, string $locationTo, string $dateDepart, string $dateArrival, bool $isAvailable): bool
    {
        $isOk = false;
        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createOffer($idCar, $idPublisher, $name, $price, $locationFrom, $locationTo, $dateDepart, $dateArrival);
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
        $offersDTO = $dataBaseService->getOffers();
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
                $dateDepart= new DateTime($offerDTO['dateDepart']);
                if ($dateDepart !== false) {
                    $offer->setdateDepart($dateDepart);
                }
                $dateArrival = new DateTime($offerDTO['dateArrival']);
                if ($dateArrival !== false) {
                    $offer->setdateArrival($dateArrival);
                }
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