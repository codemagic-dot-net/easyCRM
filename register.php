<?php

$user_message_user_created = "User Created Successfully."; 
$user_message_user_creation_failed = "User Registration Failed"; 


require('db_connect.php');

    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$accepted = $_POST['accepted'];
		$active = 'password';
	
 
        $query = "INSERT INTO `users` (username, email, password, accepted, active) VALUES ('$username','$email','$password','$accepted','FALSE')";
        $result = mysqli_query($connection, $query);
        if($result){
            $smsg = $user_message_user_created;
        }else{
            $fmsg =$user_message_user_creation_failed ;
        }
    }

include ('html_head.php');     ?>

<div class="container">
 
      <form class="form-signin" method="POST">
      
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1"><3</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      
        <div class="checkbox">
           
          <label>
           <br><br>  
         <!--  <input type="checkbox" value="remember-me"> <p>Remember me</p> -->
            <input type="checkbox" value="has_accepted" name="accepted" id="inputEmail" class="form-control" placeholder="License Agreement" required> 
            <br><br>  Accept Terms & Conditions & License 
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
</div>
 
<?php include('html_footer.php');  ?>