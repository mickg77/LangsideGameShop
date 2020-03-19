<?php
session_start();
$password=password_hash('123', PASSWORD_DEFAULT);
echo $password;

if(password_verify('password',$password)){
  echo '<p>verified</p>';
}

else {
  echo '<p>not verified</p>';
}

  
?>