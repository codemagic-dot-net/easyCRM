<?php

require('db_connect.php');
require('check_session.php');

//get userid from db
$sql = "SELECT id FROM users WHERE username = '" . $_SESSION['username'] ."'";
$result = mysqli_query($connection,$sql);

while($r = mysqli_fetch_assoc($result)){
$id_currentUser = $r['id'];


//get customer id from session or set to 1
if (!isset($_SESSION['id_customer'])){
 $_SESSION['id_customer'] = 1;
} 

//get customer data
$sql= "SELECT * FROM customer_company WHERE id = '" .  $_SESSION['id_customer'] ."' order by id desc limit 10";}
$result = mysqli_query($connection,$sql);
$r = mysqli_fetch_assoc($result);

include ('html_head.php');  
include ('navigation.php');   ?>


<div class="container">
	  
<ul class="list-inline"> 	 <li>C Nr</li> <li>  <h4><?php echo $r['id']; ?>  </h4>   </li> <li>Name</li>        <li>	  <h3><?php echo $r['name']; ?>  </h3> </li> </ul>

<ul class="list-inline"> 	 <li>Project</li> <li>  <h4><?php echo $r['project']; ?> </h4> </li> </ul>
 

<ul class="list-inline">  <li>Street</li> 	  <li> <h4><?php echo $r['adr_street'];  echo " ".$r['adr_street_nr']; ?>  </h4> </li> </ul>
<ul class="list-inline">  <li>Postcode</li> 	  <li> <h4><?php echo $r['adr_postalcode']; ?>  </h4> </li> <li>City</li> <li> <h4><?php echo $r['adr_city']; ?>  </h4> </li> </ul>
<ul class="list-inline">  <li>Country</li> <li> <h4><?php echo $r['adr_country']; ?>  </h4> </li> </ul>
<ul class="list-inline">  <li>Tel</li> <li> <h4><?php echo $r['adr_phone']; ?>  </h4> </li> </ul>
<ul class="list-inline">  <li>Email</li>	 <li>  <h4>  <a href="mailto:<?php echo $r['adr_email']; ?>"><?php echo $r['adr_email']; ?></a>  </h4> </li> 	 </ul>
<hr>
<?php
$sql = "SELECT * FROM customer_documents WHERE username = '" . $_SESSION['username'] ." order by id desc limit 10";

$resultsetDocs = mysqli_query($connection, $sql);

 ?>
<!--Table -->
<div class="table-responsive"> 
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Customer ID</th>
      <!--th>Contact ID</th-->
      <!--th>Keywords</th-->
      <!--th>Size</th-->
      <!--th>Type</th-->
      <th>View</th>
      <th>Delete</th>
    </tr>
  </thead>

  <tbody>

<?php while($resultDocs = mysqli_fetch_assoc($resultsetDocs)){ ?>

    <tr>

      <th scope="row"><?php echo $resultDocs['id']; ?></th>

      <td><?php echo SUBSTR($resultDocs['name'],0,10); ?></td>

      <td><?php echo $resultDocs['customer_id']; ?></td>

      <!--td><!--?php echo $r['contact_id']; ?></td-->

      <!--td><!--?php echo SUBSTR($r['keywords'],0,10); ?></td-->

      <!--td><!--?php echo $r['size']; ?></td-->

      <!-- td><!--?php echo $r['type']; ?></td-->

      <td><a href="<?php echo $resultDocs['path']; ?>">View</a></td>

      <td><a href="#" onclick='deleteItem(<?php echo $resultDocs['id']; ?>)'>Delete</a></td>

    </tr>

<?php } ?>

  </tbody>

</table>
</div>

<hr>
<ul class="list-inline">  <li>Main Contact</li>	 <li>  <h4><?php echo $r['id_first_contact_to_use']; ?> </h4> </li> 	 
<?php	
//get customer main contact
$sql= "SELECT * FROM customer_contactperson WHERE id = '" . $r['id_first_contact_to_use']  ."' order by id desc limit 10";
$result = mysqli_query($connection,$sql);
$result_mainc = mysqli_fetch_assoc($result); 
?>

  
 

  <li>Name</li>	 <li>  <h4><?php echo $result_mainc['name']; ?>    </h4> </li> 	 </ul>
<ul class="list-inline">  <li>Mail</li>	 <li> <h4> <a href="Maputo:<?php echo $result_mainc['adr_email']; ?>"><?php echo $result_mainc['adr_email']; ?></a></h4></li> 	 </ul>
<ul class="list-inline">  <li>Phone</li>	 <li>  <h4><?php echo $result_mainc['adr_phone']; ?>    </h4> </li> 	 </ul>
<ul class="list-inline">  <li>Comment</li>	 <li>  <h4><?php echo $result_mainc['contact_commentar']; ?> </h4> </li> 	 </ul>


	<!--Popup Window-->	  
	<dialog id="window">  
    <h3>Details</h3>  
    <p>
<ul class="list-inline">  <li>is contacted</li>	 <li>  <h4><?php  if($r['is_contacted']==1){echo "<span class=\"glyphicon glyphicon-remove\"></span>"; }else{echo "<span class=\"glyphicon glyphicon-ok\"></span>";} ?></h4> </li> 	 </ul>
<ul class="list-inline">  <li>send info letter</li>	 <li>  <h4><?php  if($r['accepts_spam']==1){echo "<span class=\"glyphicon glyphicon-remove\"></span>"; }else{echo "<span class=\"glyphicon glyphicon-ok\"></span>";}?> </h4> </li> 	 </ul>
<ul class="list-inline">  <li>is locked</li>	 <li>  <h4>  <?php 	  if ($r['is_locked']==1){  echo "<span class=\"glyphicon glyphicon-remove\"></span>"; }	  else {echo "<span class=\"glyphicon glyphicon-ok\"></span>";} ?> </h4> </li> 	 </ul>
<ul class="list-inline">  <li>Billing type</li>	 <li>  <h4><?php echo $r['billing_type']; ?> </h4> </li> 	 </ul>
<ul class="list-inline">  <li>Billing info</li>	 <li>  <h4>  <?php echo $r['billing_info']; ?>  </h4> </li> 	 </ul>
<ul class="list-inline">  <li><?php echo $r['comment']; ?>  </li> 	 </ul>
	
</p>  
    <button id="exit">Close</button>  
	</dialog>  
	<button id="show">Details</button> 
	<!--Popup Window-->	  
	 <script type="text/javascript">  
    var dialog = document.getElementById('window');  
    document.getElementById('show').onclick = function() {  dialog.show();   };  
    document.getElementById('exit').onclick = function() {  dialog.close();  };  
  </script>
</div>
 

<?php include('html_footer.php');  ?>