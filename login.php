<?php  ;
session_start();
require('db_connect.php');

//check if the form is submitted or not
if (isset($_POST['username']) and isset($_POST['password'])){

$username = $_POST['username'];
$password = $_POST['password'];

//check if user exists in db
$query = "SELECT * FROM `users` WHERE username='$username' and password='$password' and active='TRUE'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user otherwise an error message will be shown
if ($count == 1){ $_SESSION['username'] = $username;}
else{$fmsg = "Invalid Login Credentials.";}

}

//if the user is logged in
if (isset($_SESSION['username'])){ 
$username = $_SESSION['username'];?>
<script>
window.location.href='dashboard.php';
</script><?php
}else{

//When the user visits the page first time, a simple login form will be displayed
include ('html_head.php');     ?>
<div class="container">
<form class="form-signin" method="POST">
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<h2 class="form-signin-heading">Please Login</h2>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1"><3</span>
		<input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
     </form>
</div>
<?php include('html_footer.php'); } ?>

