<?php
	require 'database.php';

	if(isset($_REQUEST['register-submit'])) {
		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$password = md5($_REQUEST['password']);

		$stmnt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?) ");
		$stmnt->execute([$username, $email, $password]) or die("Couldn't connect !!");
		header('location: ../../public/index.php');
	}