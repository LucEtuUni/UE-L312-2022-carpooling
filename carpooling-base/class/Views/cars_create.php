<?php
    use App\Controllers\CarsController;
    
    require 'header.php';
    
    $controller = new CarsController();
    echo $controller->createCar();
?>

<br/>
<p class="h1">Create car</p>
<br/>

<form method="post" action="cars_create.php" name ="carCreateForm">
    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" name="brand" placeholder="Enter brand">
    </div>
    
    <div class="form-group">
    	<label for="model">Model</label>
    	<input type="text" class="form-control" name="model" placeholder="Enter model">
    </div>
    
    <div class="form-group">
    	<label for="mineral">Mineral</label>
    	<input type="text" class="form-control" name="mineral" placeholder="Enter mineral">
    </div>
    
    <div class="form-group">
    	<label for="color">Color</label>
    	<input type="text" class="form-control" name="color" placeholder="Enter color">
    </div>
    
    <div class="form-group">
    	<label for="nbrslots">Number of seats</label>
    	<input type="text" class="form-control" name="nbrslots" placeholder="Enter the number of seats">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Create car"/>
</form>

<?php
    require 'footer.php';
?>