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
  <div class="card" id="login">
    <div class="card-header">
      Game Shop Login
    </div>
    <div class="card-body">
      <h5 class="card-title">Log in</h5>

      <form name="form1" action="" method="POST">
        <div class="form-group">
          <label for="namebox">Name</label>
          <input type="text" name="namebox" placeholder="name" required >
        
        </div>
        <div class="form-group">
          <label for="passwordbox">Password</label>
          <input type="password" name="passwordbox" placeholder="password" id="passwordbox" required>
            <p id="pwdfeedback">
            
          </p>
        </div>

        <button type="submit" name="login" class="btn btn-primary">Log In</button>

      </form>
    </div>
  </div>
  <!--end of login card -->


  <!--start of slideshow-->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/dog.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/car_dog.jpg" class="d-block w-100" alt="...">
      </div>

      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
    <?php require('footer.php')?>