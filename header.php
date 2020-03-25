<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Games Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <?php

          if(!isset($_SESSION['user'])){ 
            //don't display if logged in 
            echo '<a class="nav-link" href="index.php">Login(l)</a>'; 
          } 
          else {
            //don't display if logged out
            echo '<a class="nav-link" href="logout.php">Logout</a>'; 
          } 
          ?>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Display (d)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="insert.php">Insert (i)</a>
        </li>
        
      </ul>
    </div>
  </nav>