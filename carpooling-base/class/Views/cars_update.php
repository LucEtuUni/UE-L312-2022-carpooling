<?php
    use App\Controllers\CarsController;
    
    require 'header.php';
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    $controller = new CarsController();
    echo $controller->updateCar();
    ?>
<br/>
<p class="h1">Update a car</p>
<br/>

<form method="post" action="cars_update.php" name ="carUpdateForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter car ID" value="<?php echo $id; ?>">
    </div>
    
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
    
    <input type="submit" class="btn btn-primary" value="Update car"/>
</form>


<?php
    require 'footer.php';
?>