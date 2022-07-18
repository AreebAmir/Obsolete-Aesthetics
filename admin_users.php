<?php
	require "admin_header.php";
	include "signup.inc.php";
?>

<html>
<head>
<meta charset="utf-8">
<title>Users</title>
	<script src="js/jquery-3.5.1.js"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h3 class="text-center text-dark mt-2">List of all Registered Users</h3>
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
			<h3 class="text-center text-info">Edit User Information</h3>
			<form action="signup.inc.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?= $id; ?>">
				<div class="form-group">
					<?php if($update == true){ ?>
					<input type="text" id="userName" name="admin_username" value="<?= $name; ?>" class="form-control" placeholder="Edit Username" required style="margin-left: 15px;">
					<?php } else{ ?>
					<input type="text" id="userName" name="admin_username" value="<?= $name; ?>" class="form-control" placeholder="Edit Username" required disabled style="margin-left: 15px;">
					<?php } ?>
				</div>
				<div class="form-group">
					<?php if($update == true){ ?>
					<input type="email" id="userEmail" name="admin_email" value="<?= $email; ?>" class="form-control" placeholder="Edit e-mail" required style="margin-left: 15px;">
					<?php } else{ ?>
					<input type="email" id="userEmail" name="admin_email" value="<?= $email; ?>" class="form-control" placeholder="Edit e-mail" required disabled style="margin-left: 15px;">
					<?php } ?>
				</div>
				<div class="form-group">
					<?php if($update == true){ ?>
					<input type="submit" name="editUserButton" class="btn btn-success btn-block" value="Edit user details" style="margin-left: 15px;">
					<?php } else{ ?>
					<input type="submit" name="temporary" class="btn btn-primary btn-block" value="Edit user details" style="margin-left: 15px;" disabled>
					<?php } ?>
				</div>
			</form>
		</div>
		<div class="col-md-8">
			<?php
				$query = "SELECT * FROM users";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
			?>
			<h3 class="text-center text-info">Records Present</h3>
			<table class="table table-hover" style="margin-left: 50px;">
  			  <thead>
  			    <tr>
  			      <th>ID</th>
  			      <th>Username</th>
  			      <th>Email</th>
				  <th>Action</th>
  			    </tr>
  			  </thead>
  			  <tbody>
				  <?php while($row = $result->fetch_assoc()){ ?>
  			    <tr>
  			      <td><?= $row['idUsers']; ?></td>
  			      <td><?= $row['uidUsers']; ?></td>
				  <td><?= $row['emailUsers']; ?></td>
				  <td>
				    <a href="admin_users.php?edit=<?= $row['idUsers']; ?>" class="badge badge-success p-2">Edit</a>
					<a href="signup.inc.php?delete=<?= $row['idUsers']; ?>" class="badge badge-danger p-2" onclick="return confirm('Are you sure you want to delete this music?')">Delete</a>
				</td>
  			    </tr>
				 <?php } ?> 
  			  </tbody>
  			</table>
		</div>
	</div>
</body>
</html>