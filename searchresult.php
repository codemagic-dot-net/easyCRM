<?php

require('db_connect.php');
require('check_session.php');
include ('html_head.php');  
include ('navigation.php');  

if ($_SESSION['searchForTable']= "company"){
$table="customer_company";
$where=
"ID like %".$searchterm. 
"% || name   like %".$searchterm. 
"% || adr_street like %".$searchterm. 
"% || adr_postalcode like %".$searchterm. 
"% || adr_city like % ".$searchterm. 
"% || adr_email  like %".$searchterm. 
"% || adr_phone like %".$searchterm. 
"% || project like %".$searchterm. 
"% || billing_type like % ".$searchterm. 
"% || billing_info like %".$searchterm.";"

}
if ($_SESSION['searchForTable']= "time"){
$table="time";
where="id = ".$searchterm. " || name = ".$searchterm. " || adr_street= ".$searchterm. " || adr_postalcode= ".$searchterm. " || adr_city= ".$searchterm. " || adr_email= ".$searchterm. " || adr_phone= ".$searchterm. " || project= ".$searchterm. " || billing_type= ".$searchterm. " || billing_info;"}
if ($_SESSION['searchForTable']= "contact"){
$table="customer_contact";}
if ($_SESSION['searchForTable']= "contactnote"){
$table="customer_contactnote";}
if ($_SESSION['searchForTable']= "document"){
$table="customer_documents";}
 
$sql = "SELECT * FROM ". $table ." WHERE ".$where." order by id desc limit 50";
$result = mysqli_query($connection, $sql);

 ?>
<div class="container">
	  

      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>

      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>      

<!--Table -->
<div class="table-responsive"> 
<table class="table">
  <thead>
    <tr>
  <?php if ($_SESSION['searchForTable']= "company"){ ?>
      <th>ID</th>
  
<th>name</th>
<th>adr_street</th>
<th>adr_postalcode</th>
<th>adr_city</th>
<th>adr_email</th>
<th>adr_phone</th>
<th>project</th>
<th>billing_type</th>
<th>billing_info</th>
 
<?php } ?>


<?php if ($_SESSION['searchForTable']= "contact"){ ?>
      <th>ID</th>
      <th>Name</th>
      <th>Customer ID</th>
      <!--th>Contact ID</th-->
      <!--th>Keywords</th-->
      <!--th>Size</th-->
      <!--th>Type</th-->
      <th>View</th>
      <th>Delete</th>
<?php } ?>


    </tr>
  </thead>

  <tbody>

<?php 

while($r = mysqli_fetch_assoc($result)){ ?>

    <tr>

      <th scope="row"><?php echo $r['id']; ?></th>
<?php if ($_SESSION['searchForTable']= "company"){?>

      <td><?php echo SUBSTR($r['name'],0,10); ?></td>

      <td><?php echo $r['customer_id']; ?></td>

      <td><a href="<?php echo $r['path']; ?>">View</a></td>

      <td><a href="#" onclick='deleteItem(<?php echo $r['id']; ?>)'>Delete</a></td>

    </tr>
<?php } ?>
<?php if ($_SESSION['searchForTable']= "comp"){?>

      <td><?php echo SUBSTR($r['name'],0,10); ?></td>

      <td><?php echo $r['customer_id']; ?></td>

      <td><a href="<?php echo $r['path']; ?>">View</a></td>

      <td><a href="#" onclick='deleteItem(<?php echo $r['id']; ?>)'>Delete</a></td>

    </tr>
<?php } ?>
<?php if ($_SESSION['searchForTable']= "compggfrrny"){?>

      <td><?php echo SUBSTR($r['name'],0,10); ?></td>
      <td><?php echo $r['customer_id']; ?></td>
      <td><a href="<?php echo $r['path']; ?>">View</a></td>
      <td><a href="#" onclick='deleteItem(<?php echo $r['id']; ?>)'>Delete</a></td>

    </tr>
<?php } ?>
<?php } ?>

  </tbody>

</table>
</div>

</div>



<?php include('html_footer.php');  ?>
