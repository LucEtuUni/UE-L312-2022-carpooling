<?php
    use App\Controllers\ReservationController;
use App\Services\UsersService;
use App\Services\OffersService;
    
    require 'header.php';
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    $controller = new ReservationController();
    echo $controller->updateReservation();
    ?>
<br/>
<p class="h1">Update a reservation</p>
<br/>

<form method="post" action="reservations_update.php" name ="reservationUpdateForm">

    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter reservation ID" value="<?php echo $id; ?>">
    </div>
    
    <?php 
     $userService = new UsersService();
     $users = $userService->getUsers();
     
     $offerService = new OffersService();
     $offers = $offerService->getOffers();
 ?>

    <div class="form-group">
        <label for="idOffer">Choose an offer</label>
        <select name="idOffer" class="form-control" name="idOffer">
        	<option value="">--Please choose an offer--</option>
        <?php 
            foreach($offers as $offer) {
                $offerString = $offer->getLocationFrom().' to '.
                                $offer->getLocationTo().' by ';
                
                    foreach($users as $user) {
                        if($user->getId() == $offer->getIdPublisher()) 
                            $offerString .= $user->getFirstname().' '.
                                            $user->getLastname();
                    }
                
                    echo '<option value="'.$offer->getId().'">'.$offerString.'</option>';
            }
        
        ?>
        </select>
    </div>

    <div class="form-group">
        <label for="idBuyer">Choose a user</label>
        <select name="idBuyer" class="form-control" name="idBuyer">
        	<option value="">--Please choose a buyer--</option>
        <?php 
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
    	<div class="form-check">
        	<input type="checkbox" class="form-check-input" name="isPaid">Is paid ?
    	</div>
    </div>

    <input type="submit" class="btn btn-primary" value="Update selected reservation"/>
</form>


<?php
    require 'footer.php';
?>