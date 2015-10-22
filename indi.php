<?php
	date_default_timezone_set('America/Los_Angeles');
	session_start();
	include('indiDB.php');
	$day=$_SESSION['day'];
?>
<!DOCTYPE hmtl>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1/EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<!--
	file name: tunaCafe.php
-->

	<title>Indi's Food</title>
	<link href="tunaCafe.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>Welcome to Tuna Cafe</h3>
<form action="product.php" method="POST">
<table border="1">

			<input type="submit" value="Submit" name='submit'>
			</td>
		</tr>
</table>
</form>
</body></html>