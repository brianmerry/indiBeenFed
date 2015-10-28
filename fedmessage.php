<?php
	$query= mysql_query("SELECT * FROM `morning` WHERE `fed` ='1'")or die(mysql_error());
	$arr = mysql_fetch_array($query);
	$num = mysql_numrows($query); //this will count the rows (if exists) 
	
	$name=$arr['feeder'];
	$time=$arr['time'];
	echo "<center><h1><u><b>$name fed Indi at $time.</b></u></h1></center>";
?>