<?php

require('db_connect.php');
require('check_session.php');

//get customer id from session and
// display only customer notes
if (isset($_SESSION['id_customer'])){
$sql = "SELECT * FROM customer_contactnote WHERE id_customer = '" . $_SESSION['id_customer'] ."' limit 10;";
} else{

//get userid from db
$sql = "SELECT id FROM users WHERE username = '" . $_SESSION['username'] ."'";
$result = mysqli_query($connection,$sql);

while($r = mysqli_fetch_assoc($result)){
$id_currentUser = $r['id'];

//get contacts for logged in user
$sql= "SELECT * FROM customer_contactnote WHERE id_employee = '" . $id_currentUser."' limit 10;";}

$result = mysqli_query($connection,$sql);

}

//get task categories from db
$sql_getCategory = "SELECT * FROM task_categories;";
$result_category = mysqli_query($connection,$sql_getCategory );




//if form is submitted
if((isset($_POST['id_customer']) && !empty($_POST['id_customer']))
&& (isset($_POST['id_contactperson']) && !empty($_POST['id_contactperson']))
&& (isset($_POST['id_employee']) && !empty($_POST['id_employee']))
&& (isset($_POST['id_category']) && !empty($_POST['id_category']))
&& (isset($_POST['keywords']) && !empty($_POST['keywords']))
&& (isset($_POST['content']) && !empty($_POST['content']))){
	
$id_customer= $_POST['id_customer'];
$id_contactperson= $_POST['id_contactperson'];
$id_employee= $_POST['id_employee'];
$id_category= $_POST['id_category'];
$keywords= $_POST['keywords'];
$content= $_POST['content'];
	
$sql = "INSERT INTO `customer_contactnote` (id_customer, id_contactperson, id_employee, id_category, keywords,content) 
VALUES ('$id_customer','$id_contactperson','$id_employee','$id_category','$keywords', '$content')";
$result = mysqli_query($connection, $sql);

echo '<script>window.location.href = "dashboard.php";</script>';
die();
}

include ('html_head.php');  

 include ('navigation.php');   ?>


<div class="container">
<!--Form-->
       <form class="form-task" method="POST" >
      

        <label for="input_id_customer" class="sr-only">ID Customer</label>
        <input type="number" name="id_customer" id="inputId_customer" class="form-control" placeholder="ID Customer" required>
		       
		<label for="input_id_contactperson" class="sr-only">ID Contactperson</label>
        <input type="number" name="id_contactperson" id="inputId_contactperson" class="form-control" placeholder="ID Contactperson" required>
		        
		<label for="input_id_employee" class="sr-only">ID Employee</label>
        <input type="number" name="id_employee" id="inputId_employee" class="form-control" placeholder="ID Employee" required>
		        
				        
		<label for="inputCategory" class="sr-only">Category</label>		
		<select name="id_category"  id="inputCategory" class="form-control" placeholder="Category" required>
		<?php
		while($rc = mysqli_fetch_assoc($result_category)){
		echo "<option value=\"". $rc['id'] ."\">". $rc['name'] ."</option>";} ?>
		</select>
		
		
			        
		<label for="inputKeywords" class="sr-only">Keywords</label>		
		<input type="name" name="keywords"  id="inputCategory" class="form-control" placeholder="Keywords" required>
		
        <label for="inputContent" class="sr-only">Content</label>
      	<textarea name="content" class="form-control" id="inputContent" rows="3"></textarea>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
      </form>
	  



	  
	  
<!--Table -->
<div class="table-responsive"> 
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Customer</th>
      <th>Contact person</th>
      <th>Employee</th>
      <th>Category</th>
      <th>Keywords</th>
      <th>View</th>
    </tr>
  </thead>

  <tbody>

<?php while($r = mysqli_fetch_assoc($result)){  $current_row_number++; ?>

    <tr>

      <th scope="row"><?php echo $r['id']; ?></th>

      <td><?php echo $r['id_customer']; ?></td>

      <td><?php echo $r['id_contactperson']; ?></td>

      <td><?php echo $r['id_employee']; ?></td>

      <td><?php echo $r['id_category']; ?></td>

      <td><?php echo $r['keywords']; ?></td>

      <td>
	<!--Popup Window-->	  
	<dialog id="window<?php echo $current_row_number; ?>">  
    <h3>View</h3>  
    <p><?php echo $r['content']; ?></p>  
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
	


    </tr>

<?php } ?>

  </tbody>

</table>

  </div>    

</div>




<?php include('html_footer.php');  ?>

