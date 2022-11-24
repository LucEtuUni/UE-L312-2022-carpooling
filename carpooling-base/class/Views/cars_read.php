<?php
    use App\Controllers\CarsController;
    
    require 'header.php';
?>

<br/>
<p class="h1">View of "cars" table</p>
<br/>

<table>
	<tr>
		<th>Car ID</th>
    	<th>Brand</th>
    	<th>Model</th>
    	<th>Mineral</th>
    	<th>Color</th>
    	<th>Number of seats</th>
    	<th>Actions</th>
	</tr>

    <?php
        $controller = new CarsController();
        echo $controller->getCars();
    ?>
</table>

<?php
    require 'footer.php';
?>