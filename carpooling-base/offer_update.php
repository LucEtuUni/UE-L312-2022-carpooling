<?php

use App\Controllers\OfferController;

require __DIR__ . '/vendor/autoload.php';

$controller = new OfferController();
echo $controller->updateOffer();
?>

<p>Mise à jour d'un utilisateur</p>
<form method="post" action="offer_update.php" name ="offerUpdateForm">
    <label for="id">ID :</label>
    <input type="text" name="id">
    <br />
    <label for="idCar">ID Voiture :</label>
    <input type="text" name="idCar">
    <br />
    <label for="idPublisher">ID du publicateur :</label>
    <input type="text" name="idPublisher">
    <br />
    <label for="name">Nom :</label>
    <input type="text" name="name">
    <br />
    <label for="price">Prix :</label>
    <input type="text" name="price">
    <br />
    <label for="locationFrom">Lieu de départ :</label>
    <input type="text" name="locationFrom">
    <br />
    <label for="locationTo">Lieu d'arrivée :</label>
    <input type="text" name="locationTo">
    <br />
    <label for="dateDepart">Date de départ :</label>
    <input type="text" name="dateDepart">
    <br />
    <label for="dateArrival">Date d'arrivée :</label>
    <input type="text" name="dateArrival">
    <br />
    <label for="isAvailable">Disponible ? :</label>
    <input type="text" name="isAvailable">
    <br />
    <input type="submit" value="Modifier une annonce">
</form>