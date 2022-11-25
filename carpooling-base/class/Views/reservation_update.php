<?php
    use App\Controllers\ReservationController;
    
    require 'header.php';
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    $controller = new ReservationController();
    echo $controller->updateReservation();
    ?>
<br/>
<p class="h1">Modifier une réservation</p>
<br/>

<form method="post" action="reservation_update.php" name ="reservationUpdateForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter reservation ID" value="<?php echo $id; ?>">
    </div>
    
    <div class="form-group">
        <label for="idOffer">Choisissez une offre</label>
        <input type="text" class="form-control" name="idOffer" placeholder="">
    </div>
    
    <div class="form-group">
    	<label for="idUser">Choisissez un utilisateur</label>
    	<input type="text" class="form-control" name="idUser" placeholder="">
    </div>

    <div class="form-group">
        <label for="isPaid">est payé ?</label>
        <input type="checkbox" class="form-control" name="isPaid" placeholder="">
    </div>
   
    
    <input type="submit" class="btn btn-primary" value="Modifier une réservation"/>
</form>


<?php
    require 'footer.php';
?>