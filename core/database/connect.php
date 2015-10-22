<?php
$connect_error = "Sorry, We've experienced some technical difficulties.";
$dbLocalhost=mysql_connect('localhost','root','usbw');
mysql_select_db('indifood') or die($connect_error);
$connect=mysqli_connect('localhost','root','usbw');
?>