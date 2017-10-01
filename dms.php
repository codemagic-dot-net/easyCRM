<?php

require('db_connect.php');
require('check_session.php');


$name = $_FILES['file']['name'];

$size = $_FILES['file']['size'];

$type = $_FILES['file']['type'];

$tmp_name = $_FILES['file']['tmp_name'];

$extension = substr($name, strpos($name, '.') + 1);

$max_size = 100000;

if(isset($name) && !empty($name)){

	if(($extension == "jpg" || $extension == "jpeg" || $extension == "pdf"|| $extension == "gif"|| $extension == "doc"|| $extension == "docx"|| $extension == "xlsx"|| $extension == "xls") 
	&& ($type == "image/jpeg" || $type == "application/pdf"  || $type == "application/msword" )
	&& $extension == $size<=$max_size){

		$location = "dms_uploads/";

		if(move_uploaded_file($tmp_name, $location.$name)){
			
			$customer_id = $_POST['customer_ID'];
			$contact_id= $_POST['contact_ID'];
			$keywords = $_POST['keywords'];
			
		$query = "INSERT INTO `customer_documents` (name, size, type, path, customer_id, contact_id, keywords) VALUES ('$name', '$size', '$type', '$location$name','$customer_id','$contact_id','$keywords')";
		$result = mysqli_query($connection, $query);
		$smsg = "Uploaded Successfully.";	}
		else{$fmsg = "Failed to Upload File";}
		
	}else{$fmsg = "File size should be 100 MegaBytes & Only JPEG, XLS, PDF, GIF, DOC Files";}

}else{

	$fmsg = "Please Select a File";

}





include ('html_head.php');  

include ('navigation.php');  



$sql = "SELECT * FROM customer_documents order by id desc limit 10";

$result = mysqli_query($connection, $sql);

 ?>
<div class="container">
	      <form class="form-signin" method="POST" enctype="multipart/form-data">

      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>

      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>      

        <h2 class="form-signin-heading">Upload File</h2>

	  <div class="form-group">

	    <label for="exampleInputFile">File input</label>

	    <input type="file" name="file" id="exampleInputFile">

	    <p class="help-block">Upload JPEG, XLS, PDF, GIF, DOC Files that are below 100 MegaBytes</p>

	  </div>

		Customer ID
	    <label for="inputCustomerID" class="sr-only">Customer ID</label>
        <input type="text" name="customer_ID" id="inputCustomerID" class="form-control" placeholder="Customer ID" required autofocus>
		Contact ID
		      <label for="inputContactID" class="sr-only">Contact ID</label>
        <input type="text" name="contact_ID" id="inputContactID" class="form-control" placeholder="Contact ID" required autofocus>
		Keywords
	       <label for="inputKeywords" class="sr-only">Keywords</label>
        <input type="text" name="keywords" id="inputKeywords" class="form-control" placeholder="Please seperate keywords with ; e.g. tree;apple;sun" required autofocus>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
      </form>

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

<?php while($r = mysqli_fetch_assoc($result)){ ?>

    <tr>

      <th scope="row"><?php echo $r['id']; ?></th>

      <td><?php echo SUBSTR($r['name'],0,10); ?></td>

      <td><?php echo $r['customer_id']; ?></td>

      <!--td><!--?php echo $r['contact_id']; ?></td-->

      <!--td><!--?php echo SUBSTR($r['keywords'],0,10); ?></td-->

      <!--td><!--?php echo $r['size']; ?></td-->

      <!-- td><!--?php echo $r['type']; ?></td-->

      <td><a href="<?php echo $r['path']; ?>">View</a></td>

      <td><a href="#" onclick='deleteItem(<?php echo $r['id']; ?>)'>Delete</a></td>

    </tr>

<?php } ?>

  </tbody>

</table>
</div>

</div>



<?php include('html_footer.php');  ?>
