<?php
    use App\Controllers\ReservationController;
    
    require 'header.php';
?>

<br/>
<p class="h1">Reservation</p>
<br/>

<table>
	<tr>
		<th>IdOffre</th>
    	<th>IdUtilisateur</th>
    	<th>est Payé</th>
	</tr>

    <?php
        $controller = new ReservationController();
        echo $controller->getReservation();
    ?>
</table>

<?php
    require 'footer.php';
?>