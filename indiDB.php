<?php
    // Connect to the database management system
	$dbConnect = mysql_connect("us-cdbr-azure-west-c.cloudapp.net:3306","bd377ee286e9fc","4e7a8a97") or 
	die ("Can not connect: ".mysql_error());
	
	//Select the database
	mysql_select_db("indiApp",$dbConnect) or 
	die ("Can not find database: ".mysql_error());
	
	//Submit the query
	$dbRecords = mysql_query("SELECT * FROM humans", $dbConnect) or
	die ("Problem reading table: ".mysql_error());
	
	//Retrieve customer data from the query result and populate the array
	$human=array();
	
	while($record = mysql_fetch_row($dbRecords))
	{
		list($id, $name) = $record;
		$human[$id] = array('name'=>$name);
	}
	
	//Save the array in $_SESSION
	$_SESSION['human'] = $human;
	
	//Submit the query for product
	$dbRecords = mysql_query("SELECT * FROM day", $dbConnect) or
	die ("Problem reading table: ".mysql_error());	
	
	//Retrieve product data from the query result and populate the array
	$day=array();
	
	while($record = mysql_fetch_row($dbRecords))
	{
		list($dayid, $date, $morn, $morntime, $person1, $eve, $evetime, $person2) = $record;
		$day[$dayid] = array('date'=>$date,'morning'=>$morn,
					'morntime'=>$morntime,'mornperson'=>$person1,'evening'=>$eve,'evetime'=>$evetime,'eveperson'=>$person2);
	}

	//Save the array in $_SESSION
	$_SESSION['day'] = $day;
	
	//Disconnect the database management system
	mysql_close($dbConnect);

?> 