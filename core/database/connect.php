<?php
$connect_error = "Sorry, We've experienced some technical difficulties.";
$dbLocalhost=mysql_connect('us-cdbr-azure-west-c.cloudapp.net:3306','bd377ee286e9fc','4e7a8a97');
mysql_select_db('indiApp') or die($connect_error);
$connect=mysqli_connect('us-cdbr-azure-west-c.cloudapp.net:3306','bd377ee286e9fc','4e7a8a97','indiApp');
?>