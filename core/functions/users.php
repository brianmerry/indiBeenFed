<?php
	function user_exists($name) {
		$name = sanitize($name);
		$query = mysql_query("SELECT COUNT('ID') FROM `humans` WHERE `name` = '$name'");
		return (mysql_result($query, 0)==1) ? true : false;
	}
	
	function user_active($name) {
		$name = sanitize($name);
		$query = mysql_query("SELECT COUNT('ID') FROM `humans` WHERE `name` = '$name' AND `active` =1");
		return (mysql_result($query, 0)==1) ? true : false;
	}
	function user_id_from_username($name) {
		$name = sanitize($name);
		$getUserId=mysql_query("SELECT `ID` FROM `humans` WHERE `name` = '$name'");
		return mysql_result($getUserId, 0, 'ID');
	}
	function login($name, $password) {
		$user_id = user_id_from_username($name);
		$name = sanitize($name);
		$password = md5($password);
		$query=mysql_query("SELECT COUNT(`ID`) FROM `humans` WHERE `name` = '$name' AND `password` = '$password'");
		return (mysql_result($query, 0) == 1) ? $user_id : false;
	}
	function logged_in() {
			
		if(isset($_SESSION['ID'])) {
			return true;
		} else {
			return false;
		}
		
	}
	function register_user($register_data) {
		array_walk($register_data, 'array_sanitize');
		$register_data['password'] = md5($register_data['password']);
		
		$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
		$data = '\'' . implode('\', \'', $register_data) . '\'';
		echo $fields;
		echo $data;
		mysql_query("INSERT INTO `humans` ($fields) VALUES ($data)");
		
	}
	function array_sanitize(&$item) {
		$item = mysql_real_escape_string($item);
		
	}
?>