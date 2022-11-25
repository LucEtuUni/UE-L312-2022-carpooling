<?php
    use App\Controllers\OfferController;
    
    require 'header.php';
    
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    
    $controller = new OfferController();
    echo $controller->deleteOffer();
?>

<br/>
<p class="h1">Supprimer une Offre</p>
<br/>

<form method="post" action="offer_delete.php" name ="offerDeleteForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter Offer ID" value="<?php echo $id; ?>">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Supprimer l'Offre"/>
</form>

<?php
    require 'footer.php';
?>