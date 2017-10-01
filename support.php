<?php
require('db_connect.php');
require('check_session.php');
if((isset($_POST['name']) && !empty($_POST['name']))
&& (isset($_POST['email']) && !empty($_POST['email']))
&& (isset($_POST['subject']) && !empty($_POST['subject']))){
//if((isset($_POST['name']) && (!empty($_POST['name']))) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['subject']) && !empty($_POST['subject']))){
//	print_r($_POST);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$to = "info@codemagic.net";
	$headers = "From : " . $email;
	
	if( mail($to, $subject, $message, $headers)){
		echo "E-Mail Sent successfully, we will get back to you soon.";
		
		$query = "INSERT INTO `support` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
		$result = mysqli_query($connection, $query);
	}
}
 
include ('html_head.php'); 
include ('navigation.php'); ?>
 
<div class="container">
      <form class="form-contact" method="POST">
        <h2 class="form-contact-heading">Contact Us</h2>
        <label for="inputName" class="sr-only">Name</label>
        	<input type="name" name="name" id="inputName" class="form-control" placeholder="Your Name" required>
        <label for="inputEmail" class="sr-only">E-Mail</label>
        	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="name@email.com" required>
        <label for="inputSubject" class="sr-only">Subject</label>
        	<input type="name" name="subject" id="inputSubject" class="form-control" placeholder="Your Subject Line" required>
        <label for="inputMessage" class="sr-only">Message</label>
    		<textarea name="message" class="form-control" id="inputMessage" rows="3"></textarea>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
      </form>
</div>

<?php include('html_footer.php');  ?>