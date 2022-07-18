<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>

<link rel = "icon" href="img/retro-sunset-png-1.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
	<div id="bg">
		<img src="music.gif"/>
	</div>
	<div class="window" style="height:100%;">
		<div id="mainMusicPlayer" style="height:100%; width: 500px; height:310px; top:-45px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Registration
		 	</div>
			<div style="clear:both"></div>
			<div class="col-4 col-s-4 col-m-4" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/register.png" style="float:left; width:75%;" alt="registry"/>
				</div>
			</div> 
			<?php
				if(!isset($_GET['signup'])){
				echo '<div class="col-8 col-s-8 col-m-8" style="float:left;">
				<form action="signup.inc.php" method="post">

				<div class="row" style="width:100%; padding-top:5px;">
					<b>User Information:</b>
				</div>
				<div class="row" style="width:100%; padding-top:10px; font-size: 16px;">
					Type your name, password and e-mail below.
				</div>
				<br>
				<div class="row"></div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:7px; float: left;">
						<label for="username">
							<u>U</u>sername:
						</label>
					</div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:7px; float: left;">
						<input id="username" name="username" type="text" style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #fff; border-bottom: 1px solid #fff;">
					</div>
					<div class="row"></div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:7px; float: left;">
						<label for="password">
							<u>P</u>assword:
						</label>
					</div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:7px; float: left;">
						<input name="password" type="password" style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #fff; border-bottom: 1px solid #fff;">
					</div>
					<div class="row"></div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:7px; float: left;">
						<label for="passwordrepeat">
							<u>P</u>assword Repeat:
						</label>
					</div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:12px; float: left;">
						<input name="passwordrepeat" type="password" style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #fff; border-bottom: 1px solid #fff;">
					</div>
					<div class="row"></div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:7px; float: left;">
						<label for="email">
							<u>E</u>mail:
						</label>
					</div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 16px; padding-top:6px; float: left;">
						<input name="email" type="text" style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #fff; border-bottom: 1px solid #fff;">
					</div>
				
				<div class="row"></div>
				<div style="padding-top:30px; padding-right:40px;">
				<div class="col-3 col-s-3 col-m-3" style="float:left;"><button name="register" type="submit" class="controls" style="width:80px;"><b>Register</b></button></div>
				<div class="col-3 col-s-3 col-m-3" style="float:right;"><a href="mainpage.php"><button name="cancel" class="controls" style="width:80px;">Cancel</button></a></div>
				</div>
				
				</form>
			    </div>';
				}
				else if(isset($_GET['signup'])){
					echo '<div class="col-8 col-s-8 col-m-8" style="float:left;">
				<div class="row" style="width:100%; padding-top:5px;">
					<b>Registration Complete</b>
				</div>
				<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
					Welcome to Obsolete Aesthetics.
				</div>
				<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
					Now you can like songs!
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div style="padding-top:30px; padding-right:40px;">
				<div class="col-3 col-s-3 col-m-3" style="float:right; padding-left: 20px;"><a href="mainpage.php"><button class="controls" style="width:80px; font-size: 12px;">Finish</button></a></div>
				</div>
			</div>';
				}
			?>
		</div>
</div>
	
	<?php
		if(isset($_GET['error'])){
			if($_GET['error'] == "emptyfields"){
				echo '<div id="main" style="height:100%; width: 300px; height:110px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Error
		 	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/msg_warning.png" style="float:left; width:100%; padding-left: 5px; padding-top: 5px;" alt="registry"/>
				</div>
			</div>
			    <div class="col-10 col-s-10 col-m-10" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						Fill in all the fields.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="Registration.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
			}
			else if($_GET['error'] == "invalidemailusername"){
				echo '<div id="main" style="height:100%; width: 300px; height:110px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Error
		 	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/msg_warning.png" style="float:left; width:100%; padding-left: 5px; padding-top: 5px;" alt="registry"/>
				</div>
			</div>
			    <div class="col-10 col-s-10 col-m-10" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						Invalid username and email.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="Registration.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
			}
			else if($_GET['error'] == "invalidemail"){
				echo '<div id="main" style="height:100%; width: 300px; height:110px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Error
		 	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/msg_warning.png" style="float:left; width:100%; padding-left: 5px; padding-top: 5px;" alt="registry"/>
				</div>
			</div>
			    <div class="col-10 col-s-10 col-m-10" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						Invalid email.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="Registration.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
			}
			else if($_GET['error'] == "invalidusername"){
				echo '<div id="main" style="height:100%; width: 300px; height:110px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Error
		 	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/msg_warning.png" style="float:left; width:100%; padding-left: 5px; padding-top: 5px;" alt="registry"/>
				</div>
			</div>
			    <div class="col-10 col-s-10 col-m-10" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						Invalid username.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="Registration.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
			}
			else if($_GET['error'] == "passwordcheck"){
				echo '<div id="main" style="height:100%; width: 300px; height:110px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Error
		 	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/msg_warning.png" style="float:left; width:100%; padding-left: 5px; padding-top: 5px;" alt="registry"/>
				</div>
			</div>
			    <div class="col-10 col-s-10 col-m-10" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						Passwords do not match. Try again.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="Registration.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
			}
			else if($_GET['error'] == "usernametaken"){
				echo '<div id="main" style="height:100%; width: 300px; height:110px;">
			<div class="header">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Error
		 	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="registry" style="float:left;">
					<img src="img/msg_warning.png" style="float:left; width:100%; padding-left: 5px; padding-top: 5px;" alt="registry"/>
				</div>
			</div>
			    <div class="col-10 col-s-10 col-m-10" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						Username already taken.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="Registration.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
			}
		}
	?>
	
	<div class="row"></div>
<div class="social-buttons" style="z-index:1;"><a href="https://www.apple.com/itunes/"><img src="img/AStore.png" style="height:56px; position:relative; bottom:3px;"></a><a href="https://store.google.com/us/?hl=en-US&regionRedirect=true"><img src="img/GPlay.png" style="height:64px;"></a></div>
	
</body>
</html>
