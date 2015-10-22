<?php include("include/overall/header.php");
include("core/init.php");
if (empty($_POST)===false) {
	$required_fields = array('name','email','phone','password','passwordconfirm');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields)===true) {
			$errors[] = "Fields marked with as asterisk (*) are required.";
			break;
		}
	}
	if (empty($errors)===true) {
		if (user_exists($_POST['name'])) {
			$errors[] = "Sorry, the name you are attempting to use is already taken.";
		}
	}
}
?>
<script type="text/javascript" src="/code_examples/passtest.js"></script>
<script>
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
    } else {
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
    }
}  
</script>
<center>
<br /><br /><br />
	<h2><b><u>Register</b></u></h2>
<?php

if(isset($_GET['success']) && empty($_GET['success'])) {
	echo "Thanks for registering!";
} else {
	
	if(empty($_POST)===false &&  empty($errors)===true) {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		
		$register_data = array(
		'name'=>$name,
		'email'=>$email,
		'phone'=>$phone,
		'password'=>$password);
		register_user($register_data);
		header("Location: register.php?success");
		exit();
	} else if (empty($errors)===false){
		echo "$errors";
	}
}
?>
	<form action="" method="POST">

		<ul id="login">
					<li>First Name*:<br />
					<input type="text" name="name"></li>
					<li>Email*: <br />
					<input type="text" name="email"></li>
					<li>Phone*: <br />
					<input type="text" name="phone"></li>
					<li>Password*: <br />
					<input type="password" id="pass1" name="password"</li>
					<li>Confirm Password*: <br />
					<input type="password" id ="pass2" onkeyup="checkPass(); return false;" name="passwordconfirm"><br/>
					<span id="confirmMessage"></span></li>
					
					<li><input type="submit" value="Sign Up"></li>
					<li><a href="index.php">Already A Member?</a></li>
				</ul>
	</center>
</form>
<?php include("include/overall/footer.php");?>