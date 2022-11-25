<?php
    use App\Controllers\ReservationController;
    
    require 'header.php';
    
    $controller = new ReservationController();
    echo $controller->createReservation();
?>

<br/>
<p class="h1">Creer une réservation</p>
<br/>

<form method="post" action="reservation_create.php" name ="reservationCreateForm">
    <div class="form-group">
        <label for="idOffer">Choisissez une offre</label>
        <input type="text" class="form-control" name="idOffer" placeholder="">
    </div>
    
    <div class="form-group">
    	<label for="idUser">Choisissez un utilisateur</label>
    	<input type="text" class="form-control" name="idUser" placeholder="">
    </div>
    

    <input type="submit" class="btn btn-primary" value="Creez une réservation"/>
</form>

<?php
    require 'footer.php';
?>