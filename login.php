<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel = "icon" href="img/retro-sunset-png-1.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
	<div id="bg">
		<img src="welcome.gif"/>
	</div>
	<div class="window" style="height:100%;">
		<div id="mainMusicPlayer">
			<div class="header noselect">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Login
		  	</div>
			<div style="clear:both"></div>
			<div class="col-2 col-s-2 col-m-2" style="float:left;">
				<div class="key" style="float:left;">
					<img src="img/key.png" style="float:left; width:80%;" alt="key"/>
				</div>
			</div>
			<div class="col-7 col-s-7 col-m-7" style="float:left;">
				<div class="row" style="font-size: 12px; padding-top:5px; width:400px;">Type a username and password to log in!</div>
				<br>
				<form action="login.inc.php" method="post">
				<div class="row"></div>
					<div class="col-2 col-s-2 col-m-8" style="font-size: 12px; padding-top:7px; float: left;">
						<label for="username">
							<u>U</u>sername:
						</label>
					</div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 12px; padding-top:5px; float: left;">
						<input name="loginusername" id="username" type="text" style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #fff; border-bottom: 1px solid #fff; margin-left:50px;">
					</div>
				<div class="row"></div>
					<div class="col-2 col-s-2 col-m-8" style="font-size: 12px; padding-top:7px; float: left;">
						<label for="password">
							<u>P</u>assword:
						</label>
					</div>
					<div class="col-4 col-s-4 col-m-4" style="font-size: 12px; padding-top:5px; float: left;">
						<input name="loginpassword" id="password" type="password" style="border-top: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #fff; border-bottom: 1px solid #fff; margin-left:50px;">
					</div>
				
			</div>
			<div class="col-2 col-s-2 hidemob" style="float:right; padding-left:10px;">
				<div style="padding:5px; padding-left:10px;"><button name="login" type="submit" class="controls"><b>Login</b></button></div>
				</form>
				<div style="padding:5px; padding-left:10px;"><a href="Registration.php"><button class="controls">Register</button></a></div>
				<div style="padding:5px; padding-left:10px;"><a href="mainpage.php"><button class="controls">Cancel</button></a></div>
			</div>
		
			<div class="row col-m-12 hidetab hidedesktop" style="float:left; padding:5px;">
				<div style="padding:5px; col-m-12"><button name="login" class="controls"><b>Login</b></button></div>
				<div style="padding:5px; col-m-12"><a href="Registration.php"><button class="controls">Register</button></a></div>
				<div style="padding:5px; col-m-12"><a href="mainpage.php"><button class="controls">Cancel</button></a></div>
			</div>
			
		</div>
	</div>
	
	<?php
		if(isset($_GET['error'])){
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
						Incorrect username or password.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><a href="login.php"><button class="controls" style="width:80px; margin-left: 150%;">Okay</button></a></div>
		</div>';
		}
	?>
	
	<div class="row"></div>
<div class="social-buttons" style="z-index:1;"><a href="https://www.apple.com/itunes/"><img src="img/AStore.png" style="height:56px; position:relative; bottom:3px;"></a><a href="https://store.google.com/us/?hl=en-US&regionRedirect=true"><img src="img/GPlay.png" style="height:64px;"></a></div>
</body>
</html>
