<?php
  require('header.php');
 
  session_start();
  session_destroy();
  echo('<p>You have logged out</p>');
  require('footer.php');
?>