<?php
	require 'database.php';

	if(isset($_REQUEST['login-submit'])) {
		$username = $_REQUEST['username'];
		$password = md5($_REQUEST['password']);
		$stmnt = $db->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
		$stmnt->execute([$username, $password]) or die("Couldn't connect !!");

		$result = $stmnt->fetch(PDO::FETCH_ASSOC);
		$user_id = $result['user_id'];
		if( $result ) {
			header("location: ../views/personal_content.php?id=$user_id");
		} else {
			header('location: ../../public/index.php?error');
		} 
	}
