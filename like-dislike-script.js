$(document).ready(function(){
	var action = "";
	$('.like-btn').on('click', function(){
		var music_id = $(this).attr('data-id');
		var clicked_btn = $(this);
		var clicked_btn2 = $('.dislike-btn');
		
		if(clicked_btn.hasClass('thumbs-up-inactive')){
			action = 'like';
		}
		else if (clicked_btn.hasClass('thumbs-up-active')){
			action = 'unlike';
		}
		
		$.ajax({
			url: 'mainpage.php',
			type: 'post',
			data: {
				'action': action,
				'music_id': music_id,
			},
			success: function(data){
				var res = JSON.parse(data);
				
				if(action == 'like'){
					clicked_btn.removeClass('thumbs-up-inactive');
					clicked_btn.addClass('thumbs-up-active');
				}
				else if(action == 'unlike'){
					clicked_btn.removeClass('thumbs-up-active');
					clicked_btn.addClass('thumbs-up-inactive');
				}
				
				clicked_btn.text(res.likes);
				clicked_btn2.text(res.dislikes);
				
				clicked_btn2.removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
			}
		})
		
	});
	
	$('.dislike-btn').on('click', function(){
		var music_id = $(this).attr('data-id');
		var clicked_btn = $(this);
		var clicked_btn2 = $('.like-btn');
		
		if(clicked_btn.hasClass('thumbs-down-inactive')){
			action = 'dislike';
		}
		else if (clicked_btn.hasClass('thumbs-down-active')){
			action = 'undislike';
		}
		
		$.ajax({
			url: 'mainpage.php',
			type: 'post',
			data: {
				'action': action,
				'music_id': music_id,
			},
			success: function(data){
				var res = JSON.parse(data);
				
				if(action == 'dislike'){
					clicked_btn.removeClass('thumbs-down-inactive');
					clicked_btn.addClass('thumbs-down-active');
				}
				else if(action == 'undislike'){
					clicked_btn.removeClass('thumbs-down-active');
					clicked_btn.addClass('thumbs-down-inactive');
				}
				
				clicked_btn.text(res.dislikes);
				clicked_btn2.text(res.likes);
				
				clicked_btn2.removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
			}
		})
		
	});
	$('.like-btn2').on('click', function(){
		var music_id = $(this).attr('data-id');
		var clicked_btn = $(this);
		var clicked_btn2 = $('.dislike-btn2');
		
		if(clicked_btn.hasClass('thumbs-up-inactive')){
			action = 'like';
		}
		else if (clicked_btn.hasClass('thumbs-up-active')){
			action = 'unlike';
		}
		
		$.ajax({
			url: 'mainpage.php',
			type: 'post',
			data: {
				'action': action,
				'music_id': music_id,
			},
			success: function(data){
				var res = JSON.parse(data);
				
				if(action == 'like'){
					clicked_btn.removeClass('thumbs-up-inactive');
					clicked_btn.addClass('thumbs-up-active');
				}
				else if(action == 'unlike'){
					clicked_btn.removeClass('thumbs-up-active');
					clicked_btn.addClass('thumbs-up-inactive');
				}
				
				clicked_btn.text(res.likes);
				clicked_btn2.text(res.dislikes);
				
				clicked_btn2.removeClass('thumbs-down-active').addClass('thumbs-down-inactive');
			}
		})
		
	});
	
	$('.dislike-btn2').on('click', function(){
		var music_id = $(this).attr('data-id');
		var clicked_btn = $(this);
		var clicked_btn2 = $('.like-btn2');
		
		if(clicked_btn.hasClass('thumbs-down-inactive')){
			action = 'dislike';
		}
		else if (clicked_btn.hasClass('thumbs-down-active')){
			action = 'undislike';
		}
		
		$.ajax({
			url: 'mainpage.php',
			type: 'post',
			data: {
				'action': action,
				'music_id': music_id,
			},
			success: function(data){
				var res = JSON.parse(data);
				
				if(action == 'dislike'){
					clicked_btn.removeClass('thumbs-down-inactive');
					clicked_btn.addClass('thumbs-down-active');
				}
				else if(action == 'undislike'){
					clicked_btn.removeClass('thumbs-down-active');
					clicked_btn.addClass('thumbs-down-inactive');
				}
				
				clicked_btn.text(res.dislikes);
				clicked_btn2.text(res.likes);
				
				clicked_btn2.removeClass('thumbs-up-active').addClass('thumbs-up-inactive');
			}
		})
		
	});
	
});