$('.login_btn').on('click', function(){
	$('body').animate({opacity: 0.0}, '500', function() {
		$('body').css({'background-image': '../Image/blood-spatter-wall.jpg'}).animate({opacity:1.0}, '500');
	})
})