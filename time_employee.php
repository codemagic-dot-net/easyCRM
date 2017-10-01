<?php

require('db_connect.php');
require('check_session.php');

//get userid from db
$sql = "SELECT id FROM users WHERE username = '" . $_SESSION['username'] ."'";
$result = mysqli_query($connection,$sql);

//get task categories from db
$sql_getCategory = "SELECT * FROM task_categories;";
$result_category = mysqli_query($connection,$sql_getCategory );

//show only 10 results , show only results from logged in user
while($r = mysqli_fetch_assoc($result)){
$id_currentUser = $r['id'];
$sql = "SELECT *, TIMEDIFF(start_time, end_time) as time_total FROM employee_time WHERE id_employee = '" . $id_currentUser. "' order by id desc limit 10;" ;} 

$result = mysqli_query($connection,$sql);

//if form is submitted
if((isset($_POST['date']) && !empty($_POST['date']))
&& (isset($_POST['start_time']) && !empty($_POST['start_time']))
&& (isset($_POST['end_time']) && !empty($_POST['end_time']))
&& (isset($_POST['id_customer']) && !empty($_POST['id_customer']))
&& (isset($_POST['id_category']) && !empty($_POST['id_category']))
&& (isset($_POST['description']) && !empty($_POST['description']))){
	
$date= $_POST['date'];
$start_time= $_POST['start_time'];
$end_time= $_POST['end_time'];
$id_customer= $_POST['id_customer'];
$id_category= $_POST['id_category'];
$description= $_POST['description'];
	
$sql = "INSERT INTO `employee_time` (date, start_time, end_time, id_customer, id_category,description, id_employee) 
VALUES ('$date','$start_time','$end_time','$id_customer','$id_category','$description', '$id_currentUser')";
$result = mysqli_query($connection, $sql);

echo '<script>window.location.href = "dashboard.php";</script>';
die();
}

include ('html_head.php');  
  include ('navigation.php');   ?>


<div class="container">
<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>


<!--Form-->
       <form class="form-task" method="POST" >
        <h2 class="form-task-heading">Please enter your task</h2>

        <label for="inputDate" class="sr-only">Date</label>
        <input type="Date" name="date" id="inputDate" class="form-control" placeholder="Date" required>
		       
		<label for="inputStart" class="sr-only">Start</label>
        <input type="time" name="start_time" id="inputStart" class="form-control" placeholder="Start" required>
		        
		<label for="inputEnd" class="sr-only">End</label>
        <input type="time" name="end_time" id="inputEnd" class="form-control" placeholder="End" required>
		        
		<label for="inputCustomer" class="sr-only">Customer</label>
        <input type="name" name="id_customer" id="inputCustomer" class="form-control" placeholder="Customer" required>
		        
		<label for="inputCategory" class="sr-only">Category</label>		
		<select name="id_category"  id="inputCategory" class="form-control" placeholder="Category" required>
		<?php
		while($rc = mysqli_fetch_assoc($result_category)){
		echo "<option value=\"". $rc['id'] ."\">". $rc['name'] ."</option>";} ?>
		</select>
		
        <label for="inputDescription<" class="sr-only">Description</label>
      	<textarea name="description" class="form-control" id="inputDescription" rows="3"></textarea>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
      </form>
	  
	  	  
	  

	  


	  
	  
<!--Table -->
<div class="table-responsive">
<table class="table">

  <thead>

    <tr>

      <th>ID</th>

      <th>Date</th>

      <th>Begin</th>

      <th>End</th>

      <th>Customer</th>

      <th>Category</th>

      <th>Description</th>

      <th>Time total</th>

    </tr>

  </thead>

  <tbody>

<?php while($r = mysqli_fetch_assoc($result)){  $current_row_number++; ?>

    <tr>

      <th scope="row"><?php echo $r['id']; ?></th>

      <td><?php echo $r['date']; ?></td>

      <td><?php echo $r['start_time']; ?></td>

      <td><?php echo $r['end_time']; ?></td>

      <td><?php echo $r['id_customer']; ?></td>

      <td><?php echo $r['id_category']; ?></td>

      <td>
	<!--Popup Window-->	  
	<dialog id="window<?php echo $current_row_number; ?>">  
    <h3>Description</h3>  
    <p><?php echo $r['description']; ?></p>  
    <button id="exit<?php echo $current_row_number; ?>">Close</button>  
	</dialog>  
	<button id="show<?php echo $current_row_number; ?>">View</button> 
	<!--Popup Window-->	  
	 <script type="text/javascript">
		   
    var dialog<?php echo $current_row_number; ?> = document.getElementById('window<?php echo $current_row_number; ?>');  
    document.getElementById('show<?php echo $current_row_number; ?>').onclick = function() {  dialog<?php echo $current_row_number; ?>.show();   };  
    document.getElementById('exit<?php echo $current_row_number; ?>').onclick = function() {  dialog<?php echo $current_row_number; ?>.close();  };  
 
     </script>
	
	
	 </td>
	
      <td><?php echo $r['time_total'];  ?></td>

    </tr>

<?php } ?>

  </tbody>

</table>

    </div>   

</div>




<?php include('html_footer.php');  ?>

