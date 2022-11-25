<?php
    use App\Controllers\OfferController;
    
    require 'header.php';
    
    $controller = new OfferController();
    echo $controller->createOffer();
?>

<br/>
<p class="h1">Creer une offre</p>
<br/>

<form method="post" action="offer_create.php" name ="offerCreateForm">
   
    <div class="form-group">
        <label for="idCar">Choisissez une voiture</label>
        <input type="text" class="form-control" name="idCar" placeholder="">
    </div>

    <div class="form-group">
        <label for="idPublisher">Choisissez un publicateur</label>
        <input type="text" class="form-control" name="idPublisher" placeholder="">
    </div>

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="name" placeholder="">
    </div>

    <div class="form-group">
        <label for="price">Prix</label>
        <input type="text" class="form-control" name="price" placeholder="">
    </div>

    <div class="form-group">
        <label for="locationFrom">Endroit de départ</label>
        <input type="text" class="form-control" name="locationFrom" placeholder="">
    </div>

    <div class="form-group">
        <label for="locationTo">Endroit d'arrivé</label>
        <input type="text" class="form-control" name="locationTo" placeholder="">
    </div>

    <div class="form-group">
        <label for="dateDepart">Date de départ</label>
        <input type="date" class="form-control" name="dateDepart" placeholder="">
    </div>

    <div class="form-group">
        <label for="dateArrival">Date d'arrivé</label>
        <input type="date" class="form-control" name="dateArrival" placeholder="">
    </div>

    <input type="submit" class="btn btn-primary" value="Creez une offre"/>
</form>

<?php
    require 'footer.php';
?>