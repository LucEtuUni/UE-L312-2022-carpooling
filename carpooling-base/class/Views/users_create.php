<?php

    use App\Controllers\UsersController;
    use App\Services\CarsService;
    
    require 'header.php';
    
    $controller = new UsersController();
    echo $controller->createUser();
    
    $carsService = new CarsService();
    $cars = $carsService->getCars();
?>

<br/>
<p class="h1">Create user</p>
<br/>

<form method="post" action="users_create.php" name ="userCreateForm">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname">
    </div>
    
    <div class="form-group">
    	<label for="lastname">Lastname</label>
    	<input type="text" class="form-control" name="lastname" placeholder="Enter lastname">
    </div>
    
    <div class="form-group">
    	<label for="email">Email address</label>
    	<input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    
    <div class="form-group">
    	<label for="birthday">Birthday</label>
    	<input type="text" class="form-control" name="birthday" placeholder="Enter birthdate (format dd-mm-yyyy)">
    </div>
    
    <div class="form-group">
    	<label for="cars">Car(s) :</label>
    	<div class="form-check">
            <?php
                foreach ($cars as $car) {
                    $carName = $car->getBrand().' '.
                               $car->getModel().' | '.
                               $car->getColor().' | '.
                               $car->getNbrSlots().' seats | '.
                               $car->getMineral();
                    
                    echo '<input type="checkbox" class="form-check-input" name="cars[]" value="'.$car->getId().'">'.$carName.'</input><br/>';
                } 
            ?>
    	</div>
    </div>
    
    <input type="submit" class="btn btn-primary" value="Create user"/>
</form>

<?php
    require 'footer.php';
?>