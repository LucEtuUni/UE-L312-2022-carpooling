

<?php

use App\Services\DataBaseService;

require __DIR__ . '/vendor/autoload.php';

$table = $_GET['table'];
$controller = null;
$data = [];

switch($table) {
    case "users":
        $controller = new DataBaseService();
        $data = $controller->getUsers();
        break;
        
    case "cars":
        $controller = new DataBaseService();
        $data = $controller->getCars();
        break;


    default:
        echo "Mauvaise table renseignée.";
        exit();
        break;
}

?>

<html>

	<head>
		<meta charset='UTF-8'/>
		<link rel="stylesheet" href="css/index.css"/>
		<link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=K2D&display=swap" rel="stylesheet">
	</head>
	<table>
    	<?php
    	
    	    echo '<h1>Vue de la table: '.$table.'</h1>';
        	echo '<tr>';
        	
        	//Setting up table headers
        	foreach($data[0] as $key => $value){
        	    echo '<th>'.$key.'</th>';
        	}
        	
        	echo '</tr>';
        	
        	//Adding returned values by SQL in the table
        	foreach($data as $row) {
        	    echo '<tr>';
        	    foreach($row as $key => $value){
        	        echo '<td>'.$value.'</td>';
        	    }
        	    echo '</tr>';
        	}
        	
    	?>

    </table>

</html>
