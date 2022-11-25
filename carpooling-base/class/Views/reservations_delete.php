<?php
    use App\Controllers\ReservationController;
    
    require 'header.php';
    
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    
    $controller = new ReservationController();
    echo $controller->deleteReservation();
?>

<br/>
<p class="h1">Delete a reservation</p>
<br/>

<form method="post" action="reservations_delete.php" name ="reservationDeleteForm">

    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter reservation ID" value="<?php echo $id; ?>">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Delete selected reservation"/>
</form>

<?php
    require 'footer.php';
?>