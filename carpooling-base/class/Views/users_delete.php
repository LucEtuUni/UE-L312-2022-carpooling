<?php
    use App\Controllers\UsersController;
    
    require 'header.php';
    
    
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else $id = "";
    
    
    $controller = new UsersController();
    echo $controller->deleteUser();
?>

<br/>
<p class="h1">Delete user</p>
<br/>

<form method="post" action="users_delete.php" name ="userDeleteForm">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="Enter user ID" value="<?php echo $id; ?>">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Delete selected user"/>
</form>

<?php
    require 'footer.php';
?>