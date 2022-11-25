<?php
    use App\Controllers\OfferController;
    
    require 'header.php';
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    $controller = new OfferController();
    echo $controller->updateOffer();
    ?>
<br/>
<p class="h1">Modifier une offre</p>
<br/>

<form method="post" action="offer_update.php" name ="offerUpdateForm">
    
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter offer ID" value="<?php echo $id; ?>">
    </div>

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

    <div class="form-group">
        <label for="isAvailable">Est disponible ?</label>
        <input type="checkbox" class="form-control" name="isAvailable" placeholder="">
    </div>

    <input type="submit" class="btn btn-primary" value="Modifier une offre"/>
</form>


<?php
    require 'footer.php';
?>