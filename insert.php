<?php

  session_start();
  require('header.php');
  if(isset($_SESSION['user'])){
    require("connect.php");
    if(isset($_POST['submit'])){
      //strip variables out of POST form
      $username =$_POST['namebox'];
      
      /*query the database at this point and check that the
      user doesn't already exist ie check that the new query
      doesn't return any rows*/
      
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
  <div class="card" id="signup">
    <div class="card-header">
      Game Shop Sign Up
    </div>
    <div class="card-body">
      <h5 class="card-title">Sign Up</h5>
      <form name="form1" action="" method="POST">
    <div class="form-group">
      <label for="namebox">Name</label>
      <input type="text" name="namebox" placeholder="name...">
      
    </div>
    <div class="form-group">
      <label for="passwordbox">Password</label>
      <input type="password" name="passwordbox">
    </div>
    <div class="form-group">
      <label for="emailbox">Email</label>
      <input type="email" name="emailbox" placeholder="email...">
    </div>
    <div class="form-group">
      <label for="datebox">Date Of Birth</label>
      <input type="date" name="datebox">
    </div>
    <div class="form-group">
      <label for="rolebox">Role</label>
      <input type="text" name="rolebox" placeholder="role">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">
        Submit
      </button>
  </form>
    </div>
  </div>
  
  <?php
   }//end of session check
  else {
 
    echo ('<p>Please login</p>');
  }
  require('footer.php');
?>