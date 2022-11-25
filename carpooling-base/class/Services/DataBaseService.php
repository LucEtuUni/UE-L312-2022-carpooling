<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'root';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): string
    {
        $userId = '';
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        
        
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        if ($isOk) {
            $userId = $this->connection->lastInsertId();
        }

        return $userId;
    }
    
    /**
     * Create a car.
     */
    public function createCar(string $brand, string $model, string $mineral, string $color, string $nbrSlots): string
    {
        $carId = '';
        $isOk = false;
        
        $data = [
            'brand' => $brand,
            'model' => $model,
            'mineral' => $mineral,
            'color' => $color,
            'nbrSlots' => $nbrSlots,
        ];
        
        
        $sql = 'INSERT INTO cars (brand, model, mineral, color, nbrSlots) VALUES (:brand, :model, :mineral, :color, :nbrSlots)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        if ($isOk) {
            $carId = $this->connection->lastInsertId();
        }
        
        return $carId;
    }

    /**
     * Create a Reservation.
     */
    public function createReservation(string $idOffer, string $idUser): string
    {
        $reservationId = '';
        $isOk = false;
        $isPaid = false;
        $data = [
            'idOffer' => $idOffer,
            'idUser' => $idUser,
            'isPaid' => $isPaid
        ];
        
        
        $sql = 'INSERT INTO reservation (idOffer, idUser, isPaid) VALUES (:idOffer, :idUser, :isPaid)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        if ($isOk) {
            $reservationId = $this->connection->lastInsertId();
        }
        
        return $reservationId;
    }

    /**
     * Create an offer.
     */
    public function createOffer(string $idCar, string $idPublisher, string $name, string $price, string $locationFrom, string $locationTo, string $dateDepart, string $dateArrival): string
    {
        $isAvailable = true;
        $offerId = '';
        $isOk = false;
        
        $data = [
            'idCar' => $idCar,
            'idPublisher' => $idPublisher,
            'names' => $name,
            'price' => $price,
            'locationFrom' => $locationFrom,
            'locationTo' => $locationTo,
            'dateDepart' => $dateDepart,
            'dateArrival' => $dateArrival,
            'isAvailable' => $isAvailable,
        ];
        
        
        $sql = 'INSERT INTO offer (idCar, idPublisher, name, price, locationFrom, locationTo, dateDepart, dateArrival, isAvailable) VALUES (:idCar, :idPublisher, :names, :price, :locationFrom, :locationTo, :dateDepart, :dateArrival, :isAvailable)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        if ($isOk) {
            $offerId = $this->connection->lastInsertId();
        }
        
        return $offerId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }
    
    /**
     * Return all reservations.
     */
    public function getReservations(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM reservation';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Return all offers.
     */
    public function getOffers(): array
    {
        $offers = [];
        
        $sql = 'SELECT * FROM offer';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $offers = $results;
        }
        
        return $offers;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Update a car.
     */
    public function updateCar(string $id, string $brand, string $model, string $mineral, string $color, string $nbrSlots): bool
    {
        $isOk = false;
        
        $data = [
            'id' => $id,
            'brand' => $brand,
            'model' => $model,
            'mineral' => $mineral,
            'color' => $color,
            'nbrSlots' => $nbrSlots,
        ];
        
        
        $sql = 'UPDATE cars SET brand = :brand, model = :model, mineral = :mineral, color = :color, nbrSlots = :nbrSlots WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        return $isOk;
    }

    /**
     * Update a reservation.
     */
    public function updateReservation(string $id, string $idOffer, string $idUser, bool $isPaid): bool
    {
        $isOk = false;
        
        $data = [
            'id' => $id,
            'idOffer' => $idOffer,
            'idUser' => $idUser,
            'isPaid' => $isPaid
        ];
        
        
        $sql = 'UPDATE reservation SET idOffer = :idOffer, idUser = :idUser, isPaid = :isPaid WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        return $isOk;
    }

     /**
     * Update an offer.
     */
    public function updateOffer(string $id, string $idCar, string $idPublisher, string $name, string $price, string $locationFrom, string $locationTo, string $dateDepart, string $dateArrival, bool $isAvailable): bool
    {
        
        $isOk = false;
        
        $data = [
            'id' => $id,
            'idCar' => $idCar,
            'idPublisher' => $idPublisher,
            'name' => $name,
            'price' => $price,
            'locationFrom' => $locationFrom,
            'locationTo' => $locationTo,
            'dateDepart' => $dateDepart,
            'dateArrival' => $dateArrival,
            'isAvailable' => $isAvailable,
        ];
        
        
        $sql = 'UPDATE offer SET  idCar = :idCar, idPublisher = :idPublisher, `name` = :`name`, price = :price, locationFrom = :locationFrom, locationTo = :locationTo, dateDepart = :dateDepart, dateArrival = :dateArrival, isAvailable = :isAvailable WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        
        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;
        
        $data = [
            'id' => $id
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        return $isOk;
    }
    
      /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;
        
        $data = [
            'id' => $id
        ];
        $sql = 'DELETE FROM reservation WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        return $isOk;
    }
    
      /**
     * Delete an offer.
     */
    public function deleteOffer(string $id): bool
    {
        $isOk = false;
        
        $data = [
            'id' => $id
        ];
        $sql = 'DELETE FROM offer WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        return $isOk;
    }
    
    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;
        
        $data = [
            'userId' => $userId,
            'carId' => $carId
        ];
        $sql = 'INSERT INTO users_cars (user_id, car_id) VALUES (:userId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        
        return $isOk;
    }
    
    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];
        
        $data = [
            'userId' => $userId
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.car_id = c.id
            WHERE uc.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCars = $results;
        }
        
        return $userCars;
    }
}
