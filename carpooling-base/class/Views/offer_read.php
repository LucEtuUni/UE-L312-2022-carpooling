<?php
    use App\Controllers\OfferController;
    
    require 'header.php';
?>

<br/>
<p class="h1">Offre</p>
<br/>

<table>
	<tr>
		<th>idCar</th>
    	<th>idPublicateur</th>
    	<th>nom</th>
        <th>prix</th>
        <th>Endroit de départ</th>
        <th>Endroit d'arriver</th>
        <th>Date départ</th>
        <th>Date Arriver</th>
        <th>Est disponible</th>
	</tr>

    <?php
        $controller = new OfferController();
        echo $controller->getOffer();
    ?>
</table>

<?php
    require 'footer.php';
?>