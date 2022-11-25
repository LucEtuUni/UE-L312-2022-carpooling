<?php 
    require '../../vendor/autoload.php';
?>

<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="../../index.css"/>
		<link rel="preconnect" href="https://fonts.gstatic.com">
    	<link href="https://fonts.googleapis.com/css2?family=K2D&display=swap" rel="stylesheet">
	</head>
	
	<body>	
    	<header>
    		<nav class="navbar navbar-expand-lg navbar-light bg-light h3">
              <a class="navbar-brand" href="#">CRUD</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="../../index.php">Home<span class="sr-only">(current)</span></a>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Users
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="users_create.php">Create</a>
                      <a class="dropdown-item" href="users_read.php">Read</a>
                      <a class="dropdown-item" href="users_update.php">Update</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="users_delete.php">Delete</a>
                    </div>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cars
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="cars_create.php">Create</a>
                      <a class="dropdown-item" href="cars_read.php">Read</a>
                      <a class="dropdown-item" href="cars_update.php">Update</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="cars_delete.php">Delete</a>
                    </div>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Offers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="offers_create.php">Create</a>
                      <a class="dropdown-item" href="offers_read.php">Read</a>
                      <a class="dropdown-item" href="offers_update.php">Update</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="offers_delete.php">Delete</a>
                    </div>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Reservations
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="reservations_create.php">Create</a>
                      <a class="dropdown-item" href="reservations_read.php">Read</a>
                      <a class="dropdown-item" href="reservations_update.php">Update</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="reservations_delete.php">Delete</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
    		<h1>Welcome on Florian's and Luc's CRUD</h1>
    	</header>