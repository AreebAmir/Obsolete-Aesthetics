<?php
	include "action.php";
	require "admin_header.php";
?>

<html>
<head>
<meta charset="utf-8">
<title>Music</title>
</head>

<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h3 class="text-center text-dark mt-2">List of all Music</h3>
				<hr>
				<?php if(isset($_SESSION['response'])){ ?>
				<div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<b><?= $_SESSION['response']; ?></b>
				</div>
				<?php } unset($_SESSION['response']); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3 class="text-center text-info">Add Music</h3>
			<form action="action.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $id; ?>">
				<div class="form-group">
					<input type="text" name="music_name" value="<?= $name; ?>" class="form-control" placeholder="Enter Music Name" required style="margin-left: 15px;">
				</div>
				<div class="form-group">
					<input type="text" name="artist" value="<?= $artist; ?>" class="form-control" placeholder="Enter Artist" required style="margin-left: 15px;">
				</div>
				<div class="form-group">
					<label style="margin-left: 15px;">Insert image file(jpg): </label>
					<input type="hidden" name="oldimage" value="<?= $photo; ?>">
					<input type="file" name="image" class="custom-file" style="margin-left: 15px;">
					<img src="<?= $photo; ?>" width="120" class="img-thumbnail">
				</div>
				<div class="form-group">
					<label style="margin-left: 15px;">Insert music file(mp3): </label>
					<input type="hidden" name="oldmusic" value="<?= $music; ?>">
					<input type="file" name="music" class="custom-file" style="margin-left: 15px;">
				</div>
				<div class="form-group">
					<?php if($update == true){ ?>
					<input type="submit" name="update" class="btn btn-success btn-block" value="Edit details" style="margin-left: 15px;">
					<?php } else{ ?>
					<input type="submit" name="add" class="btn btn-primary btn-block" value="Add Music" style="margin-left: 15px;">
					<?php } ?>
				</div>
			</form>
		</div>
		<div class="col-md-8">
			<?php
				$query = "SELECT * FROM music";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
			?>
			<h3 class="text-center text-info">Records Present</h3>
			<table class="table table-hover" style="margin-left: 50px;">
  			  <thead>
  			    <tr>
  			      <th>ID</th>
  			      <th>Image</th>
  			      <th>Name</th>
				  <th>Artist</th>
				  <th>Action</th>
  			    </tr>
  			  </thead>
  			  <tbody>
				  <?php while($row = $result->fetch_assoc()){ ?>
  			    <tr>
  			      <td><?= $row['mid']; ?></td>
  			      <td><img src="<?= $row['photo']; ?>" width="35"></td>
  			      <td><?= $row['music_name']; ?></td>
				  <td><?= $row['artist']; ?></td>
				  <td>
				    <a href="admin_music.php?edit=<?= $row['mid']; ?>" class="badge badge-success p-2">Edit</a>
					<a href="action.php?delete=<?= $row['mid']; ?>" class="badge badge-danger p-2" onclick="return confirm('Are you sure you want to delete this music?')">Delete</a>
				</td>
  			    </tr>
				 <?php } ?> 
  			  </tbody>
  			</table>
		</div>
	</div>
	<?php
		$fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if(strpos($fullURL, "error=invalidfiletype") == true){
			echo "<script type='text/jscript'>alert('Invalid file type! Upload a jpg image with an mp3 audio file.')</script>";
		}
	?>
</body>
</html>