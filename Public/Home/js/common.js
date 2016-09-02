// JavaScript Document

$('.nav_menu').find('dd:last').css({'border':'none'})


$('.menu').find('li').mouseover(

		function(){
			
			
			$('.menu').find('.nav_menu').hide();
			
			$(this).find('.nav_menu').show();}
			
);

$('.nav_menu').hover(


		function(){
			
			$(this).show();
			},
		function(){
			$(this).hide();
			}

)
