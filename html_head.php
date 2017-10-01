<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	<link rel="stylesheet" href="styles.css" >

<?php
// Set HTML Title Attribute according to filename:
if(basename($_SERVER['SCRIPT_FILENAME']) == 'register.php') 	{ ?><title>Register</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'login.php') 		{ ?><title>Login</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'logout.php') 		{ ?><title>Logout</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'dashboard.php') 	{ ?><title>Dashboard</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'dms_view.php') 	{ ?><title>DMS - Viewer</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'dms_upload.php') 	{ ?><title>DMS - Upload</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'support.php') 		{ ?><title>Support - Contact</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'crm_customer.php') { ?><title>Customer</title><?php }
if(basename($_SERVER['SCRIPT_FILENAME']) == 'crm_contact.php') 	{ ?><title>Contactnote</title><?php }
?>

	
<!-- Bootstrap CDN from MAXCDN -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<link rel="stylesheet" href="styles.css" >
<!-- Latest compiled and minified JavaScript Placed in footer for faster loading-->
<!-- script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script -->
	
<?php 
//Set Page Specific Stuff

//dashboardspecific
if(basename($_SERVER['SCRIPT_FILENAME']) == 'dashboard.php') 	{ ?>
    <link href="dashboard.css" rel="stylesheet">
<?php } 

// This script is only used by dms_view.php -->
if(basename($_SERVER['SCRIPT_FILENAME']) == 'dms_view.php') 	{ ?>
<script>
function deleteItem(id) {
if (confirm("Are you sure?")) { window.location.href='dms_delete.php?id='+id;}
return false;}
</script>
<?php } 
//Script End
?>
</head>
<body>