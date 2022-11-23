<?php
    use App\Controllers\UsersController;
    
    require '../vendor/autoload.php';
    include 'header.php';
?>

<br/>
<p class="h1">View of "users" table</p>
<br/>

<table>
	<tr>
		<th>User ID</th>
    	<th>Firstname</th>
    	<th>Lastname</th>
    	<th>Email</th>
    	<th>Birthday</th>
    	<th>Cars</th>
	</tr>

    <?php
        $controller = new UsersController();
        echo $controller->getUsers();
    ?>
</table>

<?php include 'footer.php'; ?>