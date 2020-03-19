<?php

  session_start();
  require('header.php');
  if(isset($_SESSION['user'])){
    require("connect.php");
    if(isset($_POST['submit'])){
      //strip variables out of POST form
      $username =$_POST['namebox'];
      $password =$_POST['passwordbox'];
      $email    =$_POST['emailbox'];
      $date     =$_POST['datebox'];
      $role     =$_POST['rolebox'];

      //Inserting form data into database
      $stmt=$conn->prepare("INSERT INTO users
                            (userid, username, password, email, dob, role)
                            VALUES
                            (NULL,:username,:password,:email,:dob,:role)");
      $stmt->bindParam(':username',$username);
      $stmt->bindParam(':password',$password); 
      $stmt->bindParam(':email',$email); 
      $stmt->bindParam(':dob',$date); 
      $stmt->bindParam(':role',$role); 
      $stmt->execute();

      //check is stmt has processed
      if($stmt){
        echo "<p>Statement Executed</p>";
      }
      else {
        echo "<p>Statement not worked</p>";
      }
    }
    
  ?>

    <form name="form1" action="" method="POST">
      <input type="text" name="namebox" placeholder="name..."  >
      <input type="password" name="passwordbox">
      <input type="email" name="emailbox" placeholder="email...">
      <input type="date"  name="datebox">
      <input type="text"  name="rolebox" placeholder="role">
      <input type="submit" name="submit"> 
    </form>
<?php
   }//end of session check
  else {
    require('nav.php');
    echo ('<p>Please login</p>');
  }
  require('footer.php');
?>      
     
        
        