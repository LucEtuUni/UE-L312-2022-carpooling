<?php
    use App\Controllers\OfferController;
    use App\Services\CarsService;
    use App\Services\UsersService;
    
    require 'header.php';
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    $controller = new OfferController();
    echo $controller->updateOffer();
    ?>
<br/>
<p class="h1">Modifier une offre</p>
<br/>

<form method="post" action="offers_update.php" name ="offerUpdateForm">
    
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter offer ID" value="<?php echo $id; ?>">
    </div>

    <div class="form-group">
        <label for="idCar">Choose a car</label>
        <select name="idCar" class="form-control" name="idCar">
        	<option value="">--Please choose a car--</option>
        <?php 
        
            $carService = new CarsService();
            $cars = $carService->getCars();
            
            foreach($cars as $car) {
                $carString = 
                    $car->getBrand().' '.
                    $car->getModel().' | '.
                    $car->getColor().' | '.
                    $car->getNbrSlots().' seats | '.
                    $car->getMineral();
                
                    echo '<option value="'.$car->getId().'">'.$carString.'</option>';
            }
        
        ?>
        </select>
    </div>

    <div class="form-group">
        <label for="idPublisher">Choose a user</label>
        <select name="idPublisher" class="form-control" name="idPublisher">
        	<option value="">--Please choose a user--</option>
        <?php 
        
            $userService = new UsersService();
            $users = $userService->getUsers();
            
            foreach($users as $user) {
                $userString = 
                    $user->getFirstname().' '.
                    $user->getLastname();
                
                    echo '<option value="'.$user->getId().'">'.$userString.'</option>';
            }
        
        ?>
        </select>
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter a name">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" placeholder="Enter a price">
    </div>

    <div class="form-group">
        <label for="locationFrom">Departure location</label>
        <input type="text" class="form-control" name="locationFrom" placeholder="Enter a departure location">
    </div>

    <div class="form-group">
        <label for="locationTo">Arrival location</label>
        <input type="text" class="form-control" name="locationTo" placeholder="Enter a arrival location">
    </div>

    <div class="form-group">
        <label for="dateDepart">Departure date</label>
        <input type="date" class="form-control" name="dateDepart" placeholder="Enter a departure date">
    </div>

    <div class="form-group">
        <label for="dateArrival">Arrival date</label>
        <input type="date" class="form-control" name="dateArrival" placeholder="Enter a arrival date">
    </div>

	<div class="form-group">
    	<div class="form-check">
        	<input type="checkbox" class="form-check-input" name="isAvailable">Is available ?
    	</div>
    </div>

    <input type="submit" class="btn btn-primary" value="Update selected offer"/>
</form>


<?php
    require 'footer.php';
?>