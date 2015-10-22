<?php
		session_start();

	//Connect to the DBMS
	$dbLocalhost = mysql_connect("localhost","root","usbw") or 
	die ("Can not connect: ".mysql_error());
	
	//Select the database
	mysql_select_db("indifood",$dbLocalhost) or 
	die ("Can not find database: ".mysql_error());

	//receive data from the HTML form
	$day=$_POST['day'];
	
	//save the data in SESSION array

	//insert order data
	$sql = "INSERT INTO `day` (`ID`,`date`,`morn`,`mornperson`,`evening`,`eveperson`) VALUES ('','$date','
	',0,0,0)";
	
	$currentRecord=mysql_query($sql,$dbLocalhost) or 
	die ("Cannot insert to database: ".mysql_error());
	
	$currentOrderID = mysql_insert_id($dbLocalhost);

	foreach ($day as $item)
	{
		$dish = $invTuna[$tunaID]['dish'];
		$price = $invTuna[$tunaID]['price'];
		$subTotal += $price;
		echo "$dish ($$price)<br />";
		
		//Insert lineitem
		$sql = "INSERT INTO `lineitem` (orderID,productID,quantity,price) VALUES ('$currentOrderID','$tunaID',1,'$price')";
	
		$currentRecord=mysql_query($sql,$dbLocalhost) or 
		die ("Cannot insert to database: ".mysql_error());
		
	}
	echo "</td></tr>";
	//Update order data
	$sql = "UPDATE `order` SET subtotal = '', tax = '$tax', subtotal='$subTotal', total= '$total' WHERE orderID = '$currentOrderID'";
	
	$currentRecord=mysql_query($sql,$dbLocalhost) or 
	die ("Cannot update the database: ".mysql_error());
		
?>

</table>
</form>
<?php
	//close connection to DBMS
	mysql_close($dbLocalhost);
	$_SESSION[]=array();
	session_destroy();
?>
</body></html>