<?php
require('db_connect.php');
require('check_session.php');

$username = $_SESSION['username'];
$user_message_welcome = "Welcome " . $username . ", nice to see you!"; 

    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
      
    }
    ?>
	
	
	
<html>
<?php include ('html_head.php');     ?>
<body>

<div class="container">
 
      <form class="form-signin" method="POST">
      
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading"> <?php echo $user_message_welcome;?></h2>
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
         <!--  <input type="checkbox" value="remember-me"> <p>Remember me</p> -->
            <input type="checkbox" value="has_accepted" name="accepted" id="inputEmail" class="form-control" placeholder="License Agreement" required> <p> Accept Terms & Conditions & License </p> 
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
</div>
<?php include('html_footer.php');  ?>