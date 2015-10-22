<?php 

include("include/overall/header.php");

include("core/init.php");

if (empty($_POST) === false) {
	$name=$_POST['name'];
	$password=$_POST['password'];
$errors= array();	
	if (empty($name)=== true || empty($password)=== true) {
		$errors[] = "You need to enter a name and password";
	} else if (user_exists($name)===false) {
		$errors[]="We can't find that name. Have you registered?";	
	} else if (user_active($name)===false) {
		$errors[] = "You haven't activated your account!";
	} else {
		$login = login($name, $password);
		if ($login===false) {
			$errors[]="That Name and Password combination is incorrect";
		}
		else {
			$_SESSION['ID'] = $login;
			$_SESSION['name'] = $name;
			setcookie('name',$name, time() + 604800);
			header('Location: index.php');
			exit();
		}
	}
	echo "<br/><br/><br/>";
	print_r($errors);
	echo "<br/><br/><a href='index.php'>Login</a>";
}


?>
<?php include("include/overall/footer.php");?>