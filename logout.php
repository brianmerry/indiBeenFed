<?php
	session_start();
	session_destroy();
	setcookie('name',"",time()-604800);
	header("Location: index.php");
?>