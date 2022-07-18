<?php
session_start();
require 'dbh.inc.php';

$update = false;

$id = "";
$name = "";
$email = "";

if(isset($_POST['register'])){
	
$username = $_POST['username'];
$pwd = $_POST['password'];
$pwdrepeat = $_POST['passwordrepeat'];
$email = $_POST['email'];

if(empty($username) || empty($pwd)|| empty($pwdrepeat) || empty($email)){
	header("location: Registration.php?error=emptyfields&username=".$username."&email=".$email);
	exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
	header("location: Registration.php?error=invalidemailusername");
	exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	header("location: Registration.php?error=invalidemail&username=".$username);
	exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
	header("location: Registration.php?error=invalidusername&email=".$email);
	exit();
	}
else if ($pwd !== $pwdrepeat){
	header("location: Registration.php?error=passwordcheck&username=".$username."&email=".$email);
	exit();
	}
else {
	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: Registration.php?error=sqlerror");
	exit();
	}
	else{
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if ($resultCheck > 0){
			header("location: Registration.php?error=usernametaken");
			exit();
			}
		else{
			
			$sql = "INSERT INTO users (uidUsers, pwdUsers, emailUsers) VALUES (?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("location: Registration.php?error=sqlerror");
				exit();
				}
			else{
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $email);
				mysqli_stmt_execute($stmt);
				header("location: Registration.php?signup=success");
				exit();
				}
			}
			
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

if(isset($_POST['cancel'])){
	header("location: mainpage.php");
}

if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		
		$query = "DELETE FROM users WHERE idUsers = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
	
		$query2 = "DELETE FROM rating_info WHERE user_id = ?";
		$stmt2 = $conn->prepare($query2);
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
		
		header('location: admin_users.php');
		$_SESSION['response']="Successfully deleted";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		
		$query = "SELECT * FROM users WHERE idUsers = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$id = $row['idUsers'];
		$name = $row['uidUsers'];
		$email = $row['emailUsers'];
		
		$update = true;
	}
	if(isset($_POST['editUserButton'])){
		$id = $_POST['id'];
		$name = $_POST['admin_username'];
		$email = $_POST['admin_email'];
		
		$query = "UPDATE users SET uidUsers = ?, emailUsers = ? WHERE idUsers = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssi", $name, $email, $id);
		$stmt->execute();
		
		header('location: admin_users.php');
		$_SESSION['response']="User information edited Successfully";
		$_SESSION['res_type']="primary";
	}