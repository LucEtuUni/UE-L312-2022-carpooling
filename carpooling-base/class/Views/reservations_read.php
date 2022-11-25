<?php
    use App\Controllers\ReservationController;
    
    require 'header.php';
?>

<br/>
<p class="h1">View of "reservations" table</p>
<br/>

<table>
	<tr>
		<th>Reservation ID</th>
		<th>Offer ID</th>
    	<th>Buyer ID</th>
    	<th>Is paid?</th>
    	<th>Actions</th>
	</tr>

    <?php
        $controller = new ReservationController();
        echo $controller->getReservations();
    ?>
</table>

<?php
    require 'footer.php';
?>