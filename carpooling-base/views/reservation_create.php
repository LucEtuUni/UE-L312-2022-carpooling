<?php

use App\Controllers\ReservationController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationController();
echo $controller->createReservation();
?>

<p>Création d'une réservation</p>
<form method="post" action="reservation_create.php" name ="reservationCreateForm">
    <label for="idOffer">ID Annonce :</label>
    <input type="text" name="idOffer">
    <br />
    <label for="idUser">ID de l'utilisateur :</label>
    <input type="text" name="idUser">
    <br />
    <label for="isPaid">Est payé :</label>
    <input type="checkbox" name="isPaid">
    <br />
    <input type="submit" value="Créer une réservation">
</form>