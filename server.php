<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "project");

//$query = "SELECT * FROM music LIMIT 0, 1";
//$result = mysqli_query($conn, $query);
//$music = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_SESSION['userId'])){
	$user_id = $_SESSION['userId'];


if(isset($_POST['action'])){
	$music_id = $_POST['music_id'];
	$action = $_POST['action'];
	
	switch ($action){
		case 'like':
			$sql = "INSERT INTO rating_info (music_id, user_id, rating_action) VALUES ($music_id, $user_id, '$action') ON DUPLICATE KEY UPDATE rating_action='like'";
		break;
			
		case 'dislike':
			$sql = "INSERT INTO rating_info (music_id, user_id, rating_action) VALUES ($music_id, $user_id, '$action') ON DUPLICATE KEY UPDATE rating_action='dislike'";
		break;
			
		case 'unlike':
			$sql = "DELETE FROM rating_info WHERE user_id = $user_id AND music_id = $music_id";
		break;
			
		case 'undislike':
			$sql = "DELETE FROM rating_info WHERE user_id = $user_id AND music_id = $music_id";
		break;
		default:
		break;
	}
	
	mysqli_query($conn, $sql);
	echo getRating($music_id);
	exit(0);
}
}

function getRating($id){
	global $conn;
	$rating = array();
	$likes_query = "SELECT COUNT(*) FROM rating_info WHERE music_id = $id AND rating_action = 'like'";
	$dislikes_query = "SELECT COUNT(*) FROM rating_info WHERE music_id = $id AND rating_action = 'dislike'";
	$likes_rs = mysqli_query($conn, $likes_query);
	$dislikes_rs = mysqli_query($conn, $dislikes_query);
	$likes = mysqli_fetch_array($likes_rs);
	$dislikes = mysqli_fetch_array($dislikes_rs);
	$rating = [
		'likes' => $likes[0],
		'dislikes' => $dislikes[0]
	];
	return json_encode($rating);
}

/*function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE music_id = $id AND rating_action='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE music_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

function userLiked($music_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND music_id=$music_id AND rating_action='like'";
	
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}	

function userDisliked($music_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND music_id=$music_id AND rating_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}*/
session_write_close();
?>