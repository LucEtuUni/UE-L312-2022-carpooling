<?php

use App\Controllers\OfferController;

require __DIR__ . '/vendor/autoload.php';

$controller = new OfferController();
echo $controller->updateOffer();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservation_update.php" name ="reservationUpdateForm">
    <label for="idOffer">ID Annonce :</label>
    <input type="text" name="idOffer">
    <br />
    <label for="idUser">ID de l'utilisateur :</label>
    <input type="text" name="idUser">
    <br />
    <label for="isPaid">Est payé :</label>
    <input type="checkbox" name="isPaid">
    <br />
    <input type="submit" value="Modifier une réservation">
</form>