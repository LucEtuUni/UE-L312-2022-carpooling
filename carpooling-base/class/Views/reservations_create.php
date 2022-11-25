<?php
    use App\Controllers\ReservationController;
    use App\Services\UsersService;
    use App\Services\OffersService;
    
    require 'header.php';
    
    $controller = new ReservationController();
    echo $controller->createReservation();
?>

<br/>
<p class="h1">Create a reservation</p>
<br/>

<form method="post" action="reservations_create.php" name ="reservationCreateForm">

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

    <input type="submit" class="btn btn-primary" value="Create a reservation"/>
</form>

<?php
    require 'footer.php';
?>