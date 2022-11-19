<?php

use App\Controllers\CarController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarController();
echo $controller->createCar();
?>

<p>Création d'une voiture</p>
<form method="post" action="car_create.php" name ="carCreateForm">
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="mineral">Plaque minéralogique :</label>
    <input type="text" name="mineral">
    <br />
    <label for="idOwner">ID du propriétaire :</label>
    <input type="text" name="idOwner">
    <br />
    <input type="submit" value="Créer une voiture">
</form>