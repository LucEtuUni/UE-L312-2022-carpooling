<?php
    use App\Controllers\OfferController;
    use App\Services\CarsService;
    use App\Services\UsersService;
    
    require 'header.php';
    
    $controller = new OfferController();
    echo $controller->createOffer();
?>

<br/>
<p class="h1">Create an offer</p>
<br/>

<form method="post" action="offers_create.php" name ="offerCreateForm">
   
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
        <input type="datetime-local" class="form-control" name="dateDepart" placeholder="Enter a departure date">
    </div>

    <div class="form-group">
        <label for="dateArrival">Arrival date</label>
        <input type="datetime-local" class="form-control" name="dateArrival" placeholder="Enter a arrival date">
    </div>

    <input type="submit" class="btn btn-primary" value="Create an offer"/>
</form>

<?php
    require 'footer.php';
?>