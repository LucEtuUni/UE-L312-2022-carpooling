<?php
    use App\Controllers\UsersController;
    
    require 'header.php';
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    $controller = new UsersController();
    echo $controller->updateUser();
    ?>
<br/>
<p class="h1">Update user</p>
<br/>

<form method="post" action="users_update.php" name ="userUpdateForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter user ID" value="<?php echo $id; ?>">
    </div>
    
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
    
    <input type="submit" class="btn btn-primary" value="Update selected user"/>
</form>


<?php
    require 'footer.php';
?>