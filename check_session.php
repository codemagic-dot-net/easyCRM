<?php
session_start();
if (isset($_SESSION['username'])){
//usersession is OK, everything is fine, continue

}
//if no user session redirect to login.php
else {      
  include ('html_head.php'); ?>
 <body> 
<div class="container">
<form class="form-signin" method="POST">
     <h2 class="form-signin-heading">For registered users only</h2>
     <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
  </form>
</div>
<?php include('html_footer.php');  exit();  } ?>