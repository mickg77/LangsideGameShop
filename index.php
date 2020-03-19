<?php
//THIS IS DEAD IMPORTANT
  session_start();
  require('connect.php');
  require('header.php');
 
  
  
  if(isset($_POST['login'])){
    //login button has been clicked
    $username = $_POST['namebox'];
    $password = $_POST['passwordbox'];
    
    $stmt=$conn->prepare("SELECT * FROM users 
                          WHERE username=:username
                          AND
                          password=:password");
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    
    if($stmt->rowCount()>0){
      $_SESSION['user']=true;
      echo "Login successful";
    }
    else {
      echo "Login fail";
    }
    
  }
  

?>

  <form name="form1" action="" method="POST">
    <input type="text" name="namebox" placeholder="name" required>
    <input type="text" name="passwordbox" placeholder="password" required>
    <input type="submit" name="login">
    
  </form>
<?php require('footer.php')?>
