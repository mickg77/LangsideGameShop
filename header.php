<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style type="text/css">
    body {
      background-color: #ff0000;
    }
  
  </style>
</head>
<body>
<?php  

  if(!isset($_SESSION['user'])){
    //don't display if logged in
    echo '<a href="index.php">Login | </a>';
  }
  else {
    //don't display if logged out
    echo '<a href="logout.php">Logout | </a>';  
  }
  ?>
  
<a href="insert.php">Insert | </a>
<a href="display.php">Display </a>
