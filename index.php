<?php
include("include/overall/header.php");
include("core/init.php");
echo "<br /><br/><br /><br />";
	$query= mysql_query("SELECT * FROM `morning` WHERE `fed` ='1'")or die(mysql_error());
	$arr = mysql_fetch_array($query);
	$num = mysql_numrows($query); //this will count the rows (if exists) 
	$fed=$arr['fed'];
	
if (!logged_in()) {
	include("loginform.php");
} else if ($fed==0){
	include("fed.php");
	echo "<a href='logout.php'><h2>Logout</h2></a>";
} else {
	include("fedmessage.php");
	echo "<a href='logout.php'><h2>Logout</h2></a>";
}
?>
<?php include("include/overall/footer.php");?>