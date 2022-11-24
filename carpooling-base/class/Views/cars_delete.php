<?php
    use App\Controllers\CarsController;
    
    require 'header.php';
    
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    
    $controller = new CarsController();
    echo $controller->deleteCar();
?>

<br/>
<p class="h1">Delete a car</p>
<br/>

<form method="post" action="cars_delete.php" name ="carDeleteForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter car ID" value="<?php echo $id; ?>">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Delete selected car"/>
</form>

<?php
    require 'footer.php';
?>