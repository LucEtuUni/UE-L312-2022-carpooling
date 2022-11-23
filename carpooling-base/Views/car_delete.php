<?php

use App\Controllers\CarController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarController();
echo $controller->deleteCar();
?>

<p>Supression d'une annnonce</p>
<form method="post" action="car_delete.php" name ="carDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une voiture">
</form>