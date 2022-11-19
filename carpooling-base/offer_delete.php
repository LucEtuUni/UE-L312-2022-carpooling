<?php

use App\Controllers\OfferController;

require __DIR__ . '/vendor/autoload.php';

$controller = new OfferController();
echo $controller->deleteOffer();
?>

<p>Supression d'une annnonce</p>
<form method="post" action="offer_delete.php" name ="offerDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une annnonce">
</form>