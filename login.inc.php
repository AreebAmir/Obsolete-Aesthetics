<?php

require 'dbh.inc.php';

if(isset($_POST['login'])){
	
	
	$uid = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	
	if(empty($uid) || empty($password)){
		header("location: login.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE uidUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: login.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $uid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if($pwdCheck == false){
					header("location: login.php?error=wrongpwd");
					exit();
				}
				else if($pwdCheck == true){
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];
					
					header("location: mainpage.php?login=success");
					exit();
				}
				else{
					header("location: login.php?error=wrongpwd");
					exit();
				}
			}
			else{
				header("location: login.php?error=nouser");
				exit();
			}
		}
	}
}
else{
	header("location: mainpage.php");
	exit();
}