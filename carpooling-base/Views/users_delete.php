<?php
    use App\Controllers\UsersController;
    
    require '../vendor/autoload.php';
    include 'header.php';
    
    $controller = new UsersController();
    echo $controller->deleteUser();
?>

<br/>
<p class="h1">Delete user</p>
<br/>

<form method="post" action="users_delete.php" name ="userDeleteForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter user ID">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Delete selected user"/>
</form>

<?php include 'footer.php'; ?>