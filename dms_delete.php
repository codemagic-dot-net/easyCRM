<?php

ob_start();

require('db_connect.php');
require('check_session.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

	$selsql = "SELECT path FROM `customer_documents` WHERE id=" . $_GET['id'];

	$result = mysqli_query($connection, $selsql);

	$r = mysqli_fetch_assoc($result);

	if(unlink($r['path'])){

		$delsql="DELETE FROM `customer_documents` WHERE id=" . $_GET['id'];

		if(mysqli_query($connection, $delsql)){

			header("Location: dms_view.php");

		}

	}

}else{	header("Location: dms_view.php");}

