<?php
include "server.php";

$count = $_POST['count'];

$connect = mysqli_connect("localhost", "root", "", "project");

$query = "SELECT * FROM music LIMIT $count, 1";
$result = mysqli_query($connect, $query);

if(isset($_SESSION['userId'])){

$query5 = "SELECT * FROM music LIMIT $count, 1";
$result5 = mysqli_query($connect, $query5);

$MID = 0;	

while($row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC)){
$MID = $row5['mid'];
}

  $sql1 = "SELECT COUNT(*) FROM rating_info WHERE music_id = $MID AND rating_action='like'";
  $rs1 = mysqli_query($connect, $sql1);
  $result1 = mysqli_fetch_array($rs1);
  $getLikes = $result1[0];

  $sql2 = "SELECT COUNT(*) FROM rating_info WHERE music_id = $MID AND rating_action='dislike'";
  $rs2 = mysqli_query($connect, $sql2);
  $result2 = mysqli_fetch_array($rs2);
  $getDislikes = $result2[0];

  $logged_in_user = 0;
  $userLiked = false;
  $userDisliked = false;
  $logged_in_user = $_SESSION['userId'];

  $sql3 = "SELECT * FROM rating_info WHERE user_id=$logged_in_user AND music_id=$MID AND rating_action='like'";	
  $result3 = mysqli_query($connect, $sql3);
  if (mysqli_num_rows($result3) > 0) {
  	$userLiked = true;
  }else{
  	$userLiked = false;
  }

  $sql4 = "SELECT * FROM rating_info WHERE user_id=$logged_in_user AND music_id=$MID AND rating_action='dislike'";
  $result4 = mysqli_query($connect, $sql4);
  if (mysqli_num_rows($result4) > 0) {
  	$userDisliked = true;
  }else{
  	$userDisliked = false;
  }

while($row = mysqli_fetch_array($result)){
	$data["mid"] = $row["mid"];
	$data["music_name"] = $row["music_name"];
	$data["artist"] = $row["artist"];
	$data["photo"] = $row["photo"];
	$data["music"] = $row["music"];
	}
	
	$data["userLiked"] = $userLiked;
	$data["userDisliked"] = $userDisliked;
	$data["getLikes"] = $getLikes;
	$data["getDislikes"] = $getDislikes;

}
else{
	while($row = mysqli_fetch_array($result)){
	
	$data["mid"] = $row["mid"];
	$data["music_name"] = $row["music_name"];
	$data["artist"] = $row["artist"];
	$data["photo"] = $row["photo"];
	$data["music"] = $row["music"];
	
	}
}

echo json_encode($data);
?>