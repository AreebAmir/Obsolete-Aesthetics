<?php
	session_start();
	include 'config.php';

	$update = false;

	$id = "";
	$name = "";
	$artist = "";
	$photo = "";
	$music = "";

	if(isset($_POST['add'])){
		
		$name = $_POST['music_name'];
		$artist = $_POST['artist'];
		
		$image = $_FILES['image']['name'];
		$music = $_FILES['music']['name'];
		
		$imageExt = explode('.', $image);
		$imageActualExt = strtolower(end($imageExt));
		
		$musicExt = explode('.', $music);
		$musicActualExt = strtolower(end($musicExt));
		
		if($imageActualExt == "jpg" || $musicActualExt == "mp3"){
		
		$uploadImage="../Online Music Player/uploads/images/".$image;
		$uploadMusic="../Online Music Player/uploads/music/".$music;
		
		$query = "INSERT INTO music(music_name, artist, photo, music)VALUES(?, ?, ?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssss", $name, $artist, $uploadImage, $uploadMusic);
		$stmt->execute();
		
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadImage);
		move_uploaded_file($_FILES['music']['tmp_name'], $uploadMusic);
		
		header('location: admin_music.php');
		$_SESSION['response']="Successfully added music to the database.";
		$_SESSION['res_type']="success";
		}
		else{
				header('location: admin_music.php?error=invalidfiletype');
			}
	}
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		
		$sql = "SELECT photo, music FROM music WHERE mid = ?";
		$stmt2 = $conn->prepare($sql);
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		$row = $result2->fetch_assoc();
		
		$imagePath = $row['photo'];
		unlink($imagePath);
		$musicPath = $row['music'];
		unlink($musicPath);
		
		$query = "DELETE FROM music WHERE mid = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		
		header('location: admin_music.php');
		$_SESSION['response']="Successfully deleted";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		
		$query = "SELECT * FROM music WHERE mid = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$id = $row['mid'];
		$name = $row['music_name'];
		$artist = $row['artist'];
		$photo = $row['photo'];
		$music = $row['music'];
		
		$update = true;
	}
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$name = $_POST['music_name'];
		$artist = $_POST['artist'];
		
		$oldimage = $_POST['oldimage'];
		$oldmusic = $_POST['oldmusic'];
		
		if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
			$newImage = $_FILES['image']['name'];
			unlink($oldimage);
			$uploadImage="../Online Music Player/uploads/images/".$newImage;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadImage);
		}
		else{
			$image = $oldimage;
		}
		
		if(isset($_FILES['music']['name']) && $_FILES['music']['name'] != ""){
			$newMusic = $_FILES['music']['name'];
			unlink($oldmusic);
			$uploadMusic="../Online Music Player/uploads/music/".$newMusic;
			move_uploaded_file($_FILES['music']['tmp_name'], $uploadMusic);
		}
		else{
			$music = $oldmusic;
		}
		
		$imageExt = explode('.', $uploadImage);
		$imageActualExt = strtolower(end($imageExt));
		
		$musicExt = explode('.', $uploadMusic);
		$musicActualExt = strtolower(end($musicExt));
		
		if($imageActualExt == "jpg" || $musicActualExt == "mp3"){
		
		$query = "UPDATE music SET music_name = ?, artist = ?, photo = ?, music = ? WHERE mid = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ssssi", $name, $artist, $uploadImage, $uploadMusic, $id);
		$stmt->execute();
		
		header('location: admin_music.php');
		$_SESSION['response']="Edited Successfully";
		$_SESSION['res_type']="primary";
		}
		else{
				header('location: admin_music.php?error=invalidfiletype');
			}
	}
?>