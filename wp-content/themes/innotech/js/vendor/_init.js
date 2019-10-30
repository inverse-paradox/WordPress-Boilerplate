jQuery(document).ready(function($) {

	//--------------------
	//  NAV
	//--------------------

	/*
	var navbutton = $('.nav a.nav-button');

	navbutton.on("click", function(e){
		e.preventDefault();
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('.nav ul').removeClass('active');
		} else {
			$(this).addClass('active');
			$('.nav ul').addClass('active');
		}
	});
	*/


	//--------------------
	//  BANNER
	//--------------------

	/*

	$('.banner-slides').cycle({
		fx: 'scrollHorz',
		slides: '.banner-slide',
		timeout: 7000,
		prev: '.banner a.left',
		next: '.banner a.right',
		pager: '.banner-nav'
	});

	*/


	//--------------------
	//  WINDOW RESIZING
	//--------------------

	/*
	
  	$(window).on("resize",function(){
		resizeMe();
	});

	resizeMe();

	function resizeMe() {
		if($('.home-boxes').is('*')){
			if($('.home-box').css('margin-bottom')=='0px') {
				$('.home-box').equalHeights();
			} else {
				$('.home-box').css('min-height', '0');
			}
		}
	}*/


});