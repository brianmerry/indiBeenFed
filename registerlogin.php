<?php
include 'include/head.php';
?>
	<form action="indifood.php" method="POST">
		<table>
			<tr>
				<td>
					Name: 
				</td>
				<td>
					<input type="text" name="name">
				</td>
			</tr>
			<tr>
				<td>
					Password: 
				</td>
				<td>
				<input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Log In">
				</td>
			</tr>
			<tr>
				<td>
					<a href="register.php">Sign Up?</a>
				</td>
			</tr>
		</table>
	</form>
<?php include 'include/footer.php' ; ?>