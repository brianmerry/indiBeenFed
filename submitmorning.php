<?php
include('include/overall/header.php');
include('core/database/connect.php');
	session_start();
	$dbRecords = mysql_query("SELECT * FROM humans", $dbLocalhost) or
	die ("Problem reading table: ".mysql_error());
	//Retrieve customer data from the query result and populate the array
	$query= mysql_query("SELECT * FROM `humans` WHERE `id` ='".$_SESSION['ID']."'")or die(mysql_error());
	$arr = mysql_fetch_array($query);
	$num = mysql_numrows($query); //this will count the rows (if exists) 
	
	$name=$arr['name'];
	
	date_default_timezone_set('America/Los_Angeles');
	$fed=$_POST['fed'];
	$_SESSION['fed']=$fed;
	$hours=date("g");
	$minutes=date("i");
	$time=date("g:i A");
	$_SESSION['time']=$time;
	$_SESSION['hours']=$hours;
	$_SESSION['minutes']=$minutes;
	if ($fed==1) {
		if (mysqli_query($connect, "DELETE FROM morning"))
			{
    			echo "Record deleted successfully";
			} else {
    			echo "Error deleting record: " . mysqli_error($conn);
			}
	mysql_query("INSERT INTO `morning` (`fed`,`time`,`feeder`) VALUES ('$fed','$time','$name')", $dbLocalhost) or
	die ("Problem reading table: ".mysql_error());
		$morning=array();
	header("Location:index.php");
	} else {
	header("Location:index.php");
	}
?>