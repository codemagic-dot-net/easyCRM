<?php
require('check_session.php'); 
include ('html_head.php');    
require('db_connect.php');

$username = $_SESSION['username'];
$user_message_welcome = "Welcome " . $username . ", nice to see you!";  
//get contacts for logged in user
$sql= "SELECT * FROM customer_contactnote order by id desc limit 10";

$result = mysqli_query($connection,$sql);

include ('navigation.php'); ?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"> <?php echo $user_message_welcome ?> </h1>       
</div>

    <div class="container-fluid">
    
<h2 class="sub-header">latest contacts </h2>    
    
      <div class="row">
        

<div class="table-responsive"> <table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Customer</th>
      <!--th>Contact person</th-->
      <!--th>Employee</th-->
      <!--th>Category</th-->
      <!--th>Keywords</th-->
      <th>View</th>
    </tr>
  </thead>
  <tbody><?php while($r = mysqli_fetch_assoc($result)){  $current_row_number++; ?>
    <tr>
      <td><?php echo $r['id']; ?></td>
 <!--td><!--?php echo $r['id_customer']; ?></td-->
      <td><?php echo $r['id_contactperson']; 

$sql= "SELECT * FROM customer_contactperson WHERE id = '" .$r['id_customer'] ."' order by id desc limit 10";
$resultCp = mysqli_query($connection,$sql);
$resultContactpers = mysqli_fetch_assoc($resultCp);

$sql= "SELECT * FROM customer_company WHERE id = '" .$r['id_contactperson'] ."' order by id desc limit 10";
$resultsetCompany = mysqli_query($connection,$sql);
$resultCompany= mysqli_fetch_assoc($resultsetCompany);

echo " ".$resultContactpers['name']; 
echo " ".$resultCompany['name']; 
?></td>
 <!--td><!--?php echo $r['id_employee']; ?></td-->
 <!--td><!--?php echo $r['id_category']; ?></td-->
 <!--td><!--?php echo SUBSTR($r['keywords'],1,10); ?></td-->
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
  </tr><?php } ?>
  </tbody>
</table> 
 </div>
      </div>
  </div>
  </div>
<?php include('html_footer.php');  ?>