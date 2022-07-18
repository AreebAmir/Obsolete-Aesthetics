<?php
	include 'server.php';
?>

<?php
require "dbh.inc.php";
	$query = "SELECT * FROM music LIMIT 0, 1";
	$result = mysqli_query($conn, $query);

	$query2 = "SELECT * FROM music LIMIT 0, 1";
	$result2 = mysqli_query($conn, $query2);

	$query3 = "SELECT * FROM music LIMIT 0, 1";
	$result3 = mysqli_query($conn, $query3);

	$query4 = "SELECT * FROM music LIMIT 0, 1";
	$result4 = mysqli_query($conn, $query4);

	$query5 = "SELECT * FROM music";
    $result5 = mysqli_query($conn, $query5);

	$query6 = "SELECT * FROM music LIMIT 0, 1";
	$result6 = mysqli_query($conn, $query6);

	$query7 = "SELECT * FROM music LIMIT 0, 1";
	$result7 = mysqli_query($conn, $query7);

	$query8 = "SELECT * FROM music LIMIT 0, 1";
	$result8 = mysqli_query($conn, $query8);

	$query9 = "SELECT * FROM music LIMIT 0, 1";
	$result9 = mysqli_query($conn, $query9);

	$query10 = "SELECT * FROM music LIMIT 0, 1";
	$result10 = mysqli_query($conn, $query10);

	$query11 = "SELECT * FROM music LIMIT 0, 1";
	$result11 = mysqli_query($conn, $query11);

	$query12 = "SELECT * FROM music LIMIT 0, 1";
	$result12 = mysqli_query($conn, $query12);

	$query13 = "SELECT * FROM music LIMIT 0, 1";
	$result13 = mysqli_query($conn, $query13);
	
	$first_mid = 0;
	
	while($row13 = mysqli_fetch_array($result13, MYSQLI_ASSOC)){
	$first_mid = $row13['mid'];
	}
	
	$sql01 = "SELECT COUNT(*) FROM rating_info WHERE music_id = $first_mid AND rating_action='like'";
  	$rs01 = mysqli_query($conn, $sql01);
  	$result01 = mysqli_fetch_array($rs01);

	$sql02 = "SELECT COUNT(*) FROM rating_info WHERE music_id = $first_mid AND rating_action='dislike'";
  	$rs02 = mysqli_query($conn, $sql02);
  	$result02 = mysqli_fetch_array($rs02);
	
	$logged_in_user = 0;
	if(isset($_SESSION['userId'])){
	$logged_in_user = $_SESSION['userId'];}
	
	$like = false;
	$sql03 = "SELECT * FROM rating_info WHERE user_id=$logged_in_user AND music_id=$first_mid AND rating_action='like'";
  	$result03 = mysqli_query($conn, $sql03);

	if (mysqli_num_rows($result03) > 0) {
  		$like = true;
  	}
	else{
  		$like = false;
  	}

	$dislike = false;
	$sql04 = "SELECT * FROM rating_info WHERE user_id=$logged_in_user AND music_id=$first_mid AND rating_action='dislike'";
  	$result04 = mysqli_query($conn, $sql04);

	if (mysqli_num_rows($result04) > 0) {
  		$dislike = true;
  	}
	else{
  		$dislike = false;
  	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Obsolete Aesthetics</title>
<script src="js/jquery-3.5.1.js"></script>
	<script src="js/jquery-ui.js"></script>
<link rel = "icon" href="img/retro-sunset-png-1.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="stylesheet.css?<?php echo time(); ?>">
</head>

<body>
	<audio id='player' autoplay preload="metadata">
		<?php
		if(mysqli_num_rows($result3) > 0){
		  while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
			echo "<source id='audioSource' src='";
			echo $row['music'];
			echo "' type='audio/mpeg'>";
		  }
		  }
		  else{
			  echo "Error";
		  }
		echo "<iframe src='";
		echo $row['music'];
		echo "' allow='autoplay' style='display:none' id='iframeAudio'></iframe>";
		?>
	</audio>
<div id="bg"> <img id="projectBG" src="new-retro_city.gif"/> </div>
<div class="window">
  <div id="mainMusicPlayer" style="height:100%; z-index:2; align-self: center">
    <div class="header">
      <div class="icon"> <img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/> </div>
      Obsolete Aesthetics
      <div style="float:right;">
        <button class="minimize"><b>_</b></button>
      </div>
    </div>
    <div style="clear:both"></div>
    <div class="menubar" style="border-bottom:1px solid #797979;">
      <div class="action"> <a role="button" href="About.php"> <u>A</u>bout </a> </div>
		
		<?php
      if(isset($_SESSION['userId'])){
		  $USERNAME = $_SESSION['userUid'];
		  echo '<div style="display:inline-block; font-size:11px; margin-left: 150px;"> <a role="button"> <u>W</u>elcome: '.$USERNAME.' </a> </div>';
		  echo '<form id="logoutForm" action="logout.inc.php" method="post" class="action" style="float: right;"><div><a id="logout" role="button"><u>L</u>ogout</a></div></form>';
	  }
	  else{
		  echo '<div class="action" style="float: right;"><a href="login.php" role="button"> <u>L</u>ogin</a></div>';
	  }
	?>
    </div>
    <div class="col-3 col-s-12 col-m-12" style="float:left;">
      <div class="cover" style="float:left;">  
		 <?php 	
		  if(mysqli_num_rows($result4) > 0){
		  while($row = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
			echo "<img id='cover' src='";
			echo $row['photo'];
			echo "' style='border-right: 1px solid #fff; border-bottom: 1px solid #fff; border-top: 1px solid #797979; border-left: 1px solid #797979; float:left;' alt='artwork'/>";
		  }
		  }
		  else{
			  echo "Error";
		  }
			?> 
	</div>
      <div class="col-s-9 col-m-9 hidedesktop" style="margin-top:-10px; padding-left:150px;">
		  <?php
		  	
		  if(mysqli_num_rows($result) > 0){
		  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "<i><b><p id='artist_name'>";
			echo $row['artist'];
			echo "</p></b></i>";
        	echo "<p id='song_name'>";
			echo $row['music_name'];
			echo "</p>";
		  }
		  }
		  else{
			  echo "Error";
		  }
			?>
      </div>
      <div>
        <div class="col-s-8 col-m-8 hidedesktop" style="float:left; border-top: 1px solid #797979; border-left: 1px solid #797979; border-bottom: 1px solid #fff; border-right: 1px solid #fff; padding-top:5px;">
          <center id="currentTime">
            00:00 / 00:00
          </center>
        </div>
        <div class="hidedesktop" style="float:left; padding-left: 100px; padding-top:4px;">
          <input type="range" id="volumeSlider" value="100"/>
        </div>
        <div class="hidedesktop" style="float:left; padding-top:10px; padding-left:25px;"> <img src="img/volume.png"/> </div>
      </div>
      <div class="hidedesktop" style="clear:left; padding-left:140px;">
        <div class="col-2 col-s-2 col-m-2" style="float:left">
          <button id="previous" name="previous" class="controls"><img src="img/Pre.png"/></button>
        </div>
        <div class="col-2 col-s-2 col-m-2" style="float: left;">
          <button id="pause-btn" name="play" class="controls"><img src="img/Pause.png"/></button>
		  <button id="play-btn" name="play" class="controls" style="display: none"><img src="img/Play.png"/></button>
        </div>
        <div class="col-2 col-s-2 col-m-2" style="float: left;">
          <button id="next" name="next" class="controls"><img src="img/Next.png"/></button>
        </div>
        <div class="col-2 col-s-2 col-m-2" style="float: left;">
          <button id="settings" name="settings" class="controls">Settings</button>
        </div>
        
		  <?php
		  
		  if(isset($_SESSION['userId'])){
			if(mysqli_num_rows($result9) > 0){
		    while($row = mysqli_fetch_array($result9, MYSQLI_ASSOC)){
        		echo "<div class='col-2 col-s-2 col-m-2' style='float: left;'>";
				if($like == true){
					echo "<button class='controls thumbs-up-active like-btn' data-id='";
				}
				else if($like == false){
					echo "<button class='controls thumbs-up-inactive like-btn' data-id='";
				}
				echo $row['mid'];
				echo "'>";
				echo $result01[0];
				echo"</button>";
				echo "</div>";
				}
			}
        	if(mysqli_num_rows($result10) > 0){
		    while($row = mysqli_fetch_array($result10, MYSQLI_ASSOC)){
        		echo "<div class='col-2 col-s-2 col-m-2' style='float: left;'>";
				if($dislike == true){
					echo "<button class='controls thumbs-down-active dislike-btn' data-id='";
				}
				else if($dislike == false){
					echo "<button class='controls thumbs-down-inactive dislike-btn' data-id='";
				}
				echo $row['mid'];
				echo "'>";
				echo $result02[0];
				echo"</button>";
				echo "</div>";
				}
			}
		  }
			else{
				echo "<div class='col-2 col-s-2 col-m-2' style='float: left;'>";
				echo "<button class='controls thumbs-up-inactive2'></button>";
        		echo "</div>";
        		echo "<div class='col-2 col-s-2 col-m-2' style='float: left;'>";
				echo "<button class='controls thumbs-down-inactive2'></button>";
				echo "</div>";
			}
			  
		  ?>

      </div>
    </div>
    <div  style="float:left; padding-left: 20px; margin-top: 0px">
      <div class="row col-m-6 hidemob hidetab" style="margin-top: -10px ;"> 
		<?php
		  	
		  if(mysqli_num_rows($result2) > 0){
		  while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
			echo "<i><b><p id='artist_name2'>";
			echo $row['artist'];
			echo "</p></b></i>";
        	echo "<p id='song_name2'>";
			echo $row['music_name'];
			echo "</p>";
		  }
		  }
		  else{
			  echo "Error";
		  }
			?>
      </div>
      <div class="row hidetab hidemob">
        <div style="float:left; border-top: 1px solid #797979; border-left: 1px solid #797979; border-bottom: 1px solid #fff; border-right: 1px solid #fff; width:150px; padding-top:5px;">
          <center id="currentTime2">
            00:00 / 00:00
          </center>
        </div>
        <div class="hidetab hidemob" style="float:left; padding-left: 15px; padding-top:0px;">
          <input type="range" id="volumeSlider2" value="100"/>
        </div>
        <div class="hidetab hidemob" style="float:left; padding-top:5px; padding-left:25px;"> <img src="img/volume.png"/> </div>
      </div>
      <div class="row hidetab hidemob" style="padding-top:10px;">
        <div class="col-2 col-s-3 col-m-3" style="float: left;">
          <button id="previous2" name="previous" class="controls"><img src="img/Pre.png"/></button>
        </div>
        <div class="col-2 col-s-3 col-m-3" style="float: left;">
          <button id="pause-btn2" name="play" class="controls"><img src="img/Pause.png"/></button>
		  <button id="play-btn2" name="play" class="controls" style="display: none"><img src="img/Play.png"/></button>
        </div>
        <div class="col-2 col-s-3 col-m-3" style="float: left;">
          <button id="next2" name="next" class="controls"><img src="img/Next.png"/></button>
        </div>
        <div class="col-2 col-s-3 col-m-3 hidetab hidemob" style="float: left;">
          <button id="settings2" name="settings" class="controls">Settings</button>
        </div>
		  
		  <?php
		  
		  if(isset($_SESSION['userId'])){
			if(mysqli_num_rows($result11) > 0){
		    while($row = mysqli_fetch_array($result11, MYSQLI_ASSOC)){
        		echo "<div class='col-2 hidetab hidemob' style='float: left;'>";
				if($like == true){
					echo "<button class='controls thumbs-up-active like-btn2' data-id='";
				}
				else if($like == false){
					echo "<button class='controls thumbs-up-inactive like-btn2' data-id='";
				}
				echo $row['mid'];
				echo "'>";
				echo $result01[0];
				echo"</button>";
				echo "</div>";
				}
			}
        	if(mysqli_num_rows($result12) > 0){
		    while($row = mysqli_fetch_array($result12, MYSQLI_ASSOC)){
        		echo "<div class='col-2 hidetab hidemob' style='float: left;'>";
				if($dislike == true){
					echo "<button class='controls thumbs-down-active dislike-btn2' style='' data-id='";
				}
				else if($dislike == false){
					echo "<button class='controls thumbs-down-inactive dislike-btn2' data-id='";
				}
				echo $row['mid'];
				echo "'>";
				echo $result02[0];
				echo"</button>";
				echo "</div>";
				}
			}
		  }
			else{
				echo "<div class='col-2 hidetab hidemob' style='float: left;'>";
				echo "<button class='controls thumbs-up-inactive2'></button>";
        		echo "</div>";
        		echo "<div class='col-2 hidetab hidemob' style='float: left;'>";
				echo "<button class='controls thumbs-down-inactive2'></button>";
				echo "</div>";
			}
			  
		  ?>
			
        </div>
      </div>
    </div>
</div>
	
	<div id="main" class="errormsg" style="height:100%; width: 300px; height:110px; z-index: 3; display: none; top: 150px; left: 0px;">
			<div class="header" style="z-index: 2;">
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
						You must be logged in to like/dislike.
					</div>
				</div>
				<br>
				<div class="row"></div>
				<div class="col-3 col-s-3 col-m-3"><button id="errorokay" class="controls" style="width:80px; margin-left: 150%;">Okay</button></div>
		</div>
	
	<div id="main" class="bggifs" style="height:100%; width: 200px; height:130px; z-index: 3; top: 150px; left: 0px; display: none;">
			<div class="header" style="z-index: 2;">
				<div class="icon">
				<img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/>
				</div>
				Settings
		 	</div>
			<div style="clear:both"></div>
			    <div class="col-12 col-s-12 col-m-12" style="float:left;">
					<div class="row" style="width:100%; padding-top:10px; font-size: 12px;">
						<center>Change Background:</center>
					</div>
				</div>
				<br>
				<br>
				<div class="row"></div>
				<div class="col-2 col-s-2 col-m-2" style="float:left; margin-left:65px;">
          <button id="previousBG" class="controls">&#60;</button>
        </div>
        <div class="col-2 col-s-2 col-m-2" style="float: left; margin-left:10px;">
          <button id="nextBG" class="controls">&#62;</button>
        </div>
		<br>
		<br>
		<div class="col-2 col-s-2 col-m-2" style="width:80px; float: left; margin-left: 63px">
          <button id="closeSettings" class="controls">Close</button>
        </div>
		</div>
	
	<div id="wrap">
	<div id="main" class="minimizedPlayer" style="z-index:2; position:fixed; width: 270px; bottom: 0px; display:none;">
    <div class="header">
      <div class="icon"> <img src="img/retro-sunset-png-1.png" width="23px" height="23px;"/> </div>
      Obsolete Aesthetics
      <div style="float:right;">
        <button class="maximize" style=" width: 20px; height: 20px; padding-right:20px; margin-right: 2px; position: relative; top:1px;"><img src="img/maximize.png" style="width: 25px; height: 15px; padding-right: 10px;"/></button>
      </div>
    </div>
	</div>
	</div>
	<div class="row"></div>
	
<div class="social-buttons" style="z-index:1;"><a href="https://store.google.com/us/?hl=en-US&regionRedirect=true"><img src="img/GPlay.png" style="height:64px;"></a></div>
	
	<script>
	$(document).ready(function(){
		
		var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
  		if (!isChrome){
      		$('#iframeAudio').remove()
			}
		
		$('#logout').on('click', function(e) {
    	e.preventDefault();
    	$('#logoutForm').submit();
		});
		
		$('.minimize').on('click', function() {
			$('#mainMusicPlayer').toggle();
			$('.minimizedPlayer').toggle();
		});
		
		$('.maximize').on('click', function() {
			$('#mainMusicPlayer').toggle();
			$('.minimizedPlayer').toggle();
		});
		
		$('#settings, #settings2').on('click', function() {
			$('.bggifs').toggle();
		});
		
		$('#closeSettings').on('click', function() {
			$('.bggifs').toggle();
		});
		
		var BG = ['bg_gifs/1.gif', 'bg_gifs/2.gif', 'bg_gifs/3.gif', 'bg_gifs/4.gif', 'bg_gifs/5.gif'];
		var c = BG.length;
		var i = -1;
		
		$('#nextBG').on('click', function() {
			i++;
			if(i > c-1){
				i = 0;
			}
			$('#projectBG').attr('src', BG[i]);
		});
		
		$('#previousBG').on('click', function() {
			i--;
			if(i < 0){
				i = c-1;
			}
			$('#projectBG').attr('src', BG[i]);
		});
		
		var audioElement = document.getElementById("player");
	
		$('#pause-btn, #pause-btn2').on('click', function(){
		audioElement.pause();
		$('#pause-btn, #pause-btn2').toggle();
		$('#play-btn, #play-btn2').toggle();
		});
		$('#play-btn, #play-btn2').on('click', function(){
		audioElement.play();
		$('#play-btn, #play-btn2').toggle();
		$('#pause-btn, #pause-btn2').toggle();
		});
		$('.thumbs-up-inactive2, .thumbs-down-inactive2').on('click', function(){
			$('.errormsg').toggle();
			$('.thumbs-up-inactive2, .thumbs-down-inactive2').prop('disabled', true);
		});
		$('#errorokay').on('click', function(){
			$('.errormsg').toggle();
			$('.thumbs-up-inactive2, .thumbs-down-inactive2').prop('disabled', false);
		});
		$('#mainMusicPlayer').draggable({
			containment: '#bg',
			scroll: false
		});
		
		var volumeSlider = document.getElementById("volumeSlider");
		var volumeSlider2 = document.getElementById("volumeSlider2");
		
		volumeSlider.addEventListener("mousemove", setVolume1);
		volumeSlider2.addEventListener("mousemove", setVolume2);
		
		function setVolume1(){
			volumeSlider2.value = volumeSlider.value;
			audioElement.volume = volumeSlider.value/100;
		}
		
		function setVolume2(){
			volumeSlider.value = volumeSlider2.value;
			audioElement.volume = volumeSlider2.value/100;
		}
		
		var currentTime = document.getElementById("currentTime");
		var currentTime2 = document.getElementById("currentTime2");
		
		audioElement.addEventListener("timeupdate", function(){
			convertTime(Math.round(audioElement.currentTime));
			
			if(audioElement.ended){
				next();
			}
		})
		
		function convertTime(seconds){
			var min = Math.floor(seconds / 60);
			var sec = seconds % 60;
			
			min = (min < 10) ? "0" + min : min;
			sec = (sec < 10) ? "0" + sec : sec;
			currentTime.textContent = min + ":" + sec;
			currentTime2.textContent = min + ":" + sec;
			
			totalTime(Math.round(audioElement.duration));
		}
		
		function totalTime(seconds){
			var min = Math.floor(seconds / 60);
			var sec = seconds % 60;
			
			min = (min < 10) ? "0" + min : min;
			sec = (sec < 10) ? "0" + sec : sec;
			currentTime.textContent += " / " + min + ":" + sec;
			currentTime2.textContent += " / " + min + ":" + sec;
		}
				
		var count = 0;
		var userLiked = false;
		var userDisliked = false;
		var getLikes = 0;
		var getDislikes = 0;
		
		function next(){
			++count;
			if(count > <?php echo (mysqli_num_rows($result5)) - 1; ?>){
			   count = 0;
			   }
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: {count:count},
				dataType: "JSON",
				success: function(data){
					$('#artist_name, #artist_name2').text(data.artist);
					$('#song_name, #song_name2').text(data.music_name);
					$('#player source').attr('src', data.music);
					$('#cover').attr('src', data.photo);
					$('.like-btn, .like-btn2, .dislike-btn, .dislike-btn2').attr('data-id', data.mid);
					$('.like-btn, .like-btn2').text(data.getLikes);
					$('.dislike-btn, .dislike-btn2').text(data.getDislikes);
					
					if(data.userLiked == true){
						if($('.like-btn').hasClass('thumbs-up-inactive')){
						$('.like-btn').removeClass('thumbs-up-inactive').addClass('thumbs-up-active');
						$('.dislike-btn').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
						}
						if($('.like-btn2').hasClass('thumbs-up-inactive')){
						$('.like-btn2').removeClass('thumbs-up-inactive').addClass('thumbs-up-active');
						$('.dislike-btn2').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
						}
						}
					else if(data.userLiked == false){
						if($('.like-btn').hasClass('thumbs-up-active')){
						$('.like-btn').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
						}
						if($('.like-btn2').hasClass('thumbs-up-active')){
						$('.like-btn2').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
						}
						}
					if(data.userDisliked == true){
						if($('.dislike-btn').hasClass('thumbs-down-inactive')){
						$('.dislike-btn').removeClass('thumbs-down-inactive').addClass('thumbs-down-active');
						$('.like-btn').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
						}
						if($('.dislike-btn2').hasClass('thumbs-down-inactive')){
						$('.dislike-btn2').removeClass('thumbs-down-inactive').addClass('thumbs-down-active');
						$('.like-btn2').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
						}
						}
					else if(data.userDisliked == false){
						if($('.dislike-btn').hasClass('thumbs-down-active')){
						$('.dislike-btn').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
						}
						if($('.dislike-btn2').hasClass('thumbs-down-active')){
						$('.dislike-btn2').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
						}
						}
					
					if ($("#pause-btn").is(":hidden")) {
						$('#play-btn, #play-btn2').toggle();
						$('#pause-btn, #pause-btn2').toggle();
					}
				
					if ($("#pause-btn2").is(":hidden")) {
						$('#play-btn, #play-btn2').toggle();
						$('#pause-btn, #pause-btn2').toggle();
					}
				
					audioElement.load();
					audioElement.play();
				}
			});
			$('#player').on('load touchstart', function(){
				$(this).play();
			});
	}	
		
		$('#next, #next2').on('click', function(){
			next();
		});
		
		function previous(){
			--count;
			if(count < 0){
			   count = <?php echo (mysqli_num_rows($result5)) - 1; ?>;
			   }
			$.ajax({
				url: "fetch.php",
				method: "POST",
				data: {count:count},
				dataType: "JSON",
				success: function(data){
					$('#artist_name, #artist_name2').text(data.artist);
					$('#song_name, #song_name2').text(data.music_name);
					$('#player source').attr('src', data.music);
					$('#cover').attr('src', data.photo);
					$('.like-btn, .like-btn2, .dislike-btn, .dislike-btn2').attr('data-id', data.mid);
					$('.like-btn, .like-btn2').text(data.getLikes);
					$('.dislike-btn, .dislike-btn2').text(data.getDislikes);
					
				if(data.userLiked == true){
					if($('.like-btn').hasClass('thumbs-up-inactive')){
					$('.like-btn').removeClass('thumbs-up-inactive').addClass('thumbs-up-active');
					$('.dislike-btn').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
					}
					if($('.like-btn2').hasClass('thumbs-up-inactive')){
					$('.like-btn2').removeClass('thumbs-up-inactive').addClass('thumbs-up-active');
					$('.dislike-btn2').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
					}
					}
				else if(data.userLiked == false){
					if($('.like-btn').hasClass('thumbs-up-active')){
					$('.like-btn').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
					}
					if($('.like-btn2').hasClass('thumbs-up-active')){
					$('.like-btn2').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
					}
					}
				if(data.userDisliked == true){
					if($('.dislike-btn').hasClass('thumbs-down-inactive')){
					$('.dislike-btn').removeClass('thumbs-down-inactive').addClass('thumbs-down-active');
					$('.like-btn').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
					}
					if($('.dislike-btn2').hasClass('thumbs-down-inactive')){
					$('.dislike-btn2').removeClass('thumbs-down-inactive').addClass('thumbs-down-active');
					$('.like-btn2').removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
					}
					}
				else if(data.userDisliked == false){
					if($('.dislike-btn').hasClass('thumbs-down-active')){
					$('.dislike-btn').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
					}
					if($('.dislike-btn2').hasClass('thumbs-down-active')){
					$('.dislike-btn2').removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
					}
					}
					
					if ($("#pause-btn").is(":hidden")) {
						$('#play-btn, #play-btn2').toggle();
						$('#pause-btn, #pause-btn2').toggle();
					}
				
					if ($("#pause-btn2").is(":hidden")) {
						$('#play-btn, #play-btn2').toggle();
						$('#pause-btn, #pause-btn2').toggle();
					}
					
					audioElement.load();
					audioElement.play();
				}
			});
			
			$('#player').on('load touchstart', function(){
				$(this).play();
			});
	}
		
		$('#previous, #previous2').on('click', function(){
			previous();
		});
		
	});
		
	</script>
	
	<script src="like-dislike-script.js"></script>
	
</body>
</html>
