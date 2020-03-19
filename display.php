<?php

  require('connect.php');
  require('header.php');
  
  session_start();  

  if(isset($_SESSION['user'])){
    if(isset($_GET['delete'])){
      $userid=$_GET['delete'];
      $stmt=$conn->prepare("DELETE FROM users WHERE userid=:userid");
      $stmt->bindParam(":userid",$userid);
      $stmt->execute();

      if($stmt){
        echo "<p>Record Deleted</p>";
      }
      else {
        echo "<p>Delete failed</p>";
      }
    }//end of delete code
    else if(isset($_GET['amend'])){
      $userid=$_GET['amend'];
      $stmt=$conn->prepare("SELECT * FROM users WHERE userid=:userid");
      $stmt->bindParam(":userid",$userid);

      $stmt->execute();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "
          <form name='form1' action='' method='POST'>
          <input type='hidden' name='userid' value='".$row['userid']."'>
          <input type='text' name='namebox' value='".$row['username']."'>
          <input type='submit' name='update'>";
      }
    }//end of amend form creation
   if(isset($_POST['update'])){


      $name=$_POST['namebox'];
      $userid=$_POST['userid'];
      $stmt=$conn->prepare("UPDATE users SET username=:username WHERE userid=:userid ");
      $stmt->bindParam(':username',$name);
      $stmt->bindParam(':userid',$userid);

      $stmt->execute();

    }


    $stmt=$conn->prepare("SELECT * FROM users");
    $stmt->execute();

    if($stmt->rowCount()>0){
      //echo "We have found something!!!";
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<p>".$row['userid']." ".$row['username']." ".$row['role']."
              <a href='display.php?delete=".$row['userid']."'>Delete</a>
              <a href='display.php?amend=".$row['userid']."'>Update</a>
              </p>";
      }
    }

    else {
      echo "There are no records to display!";
    }
  }//end of protected code
  require('footer.php');
?>
