<?php
    use App\Controllers\OfferController;
    
    require 'header.php';
?>

<br/>
<p class="h1">View of "offers" table</p>
<br/>

<table>
	<tr>
		<th>Offer ID</th>
		<th>Car ID</th>
    	<th>Publisher ID</th>
    	<th>Name</th>
        <th>Price</th>
        <th>Departure location</th>
        <th>Arrival location</th>
        <th>Departure date</th>
        <th>Arrival date</th>
        <th>Available</th>
        <th>Actions</th>
	</tr>

    <?php
        $controller = new OfferController();
        echo $controller->getOffers();
    ?>
</table>

<?php
    require 'footer.php';
?>