/* global, $, alert, console */

$(function(){
	'use strict';
	var userError = true;
	var emailError= true;
	var msgError  = true
	
	function checkErrors(){
		
		if(userError == true || emailError == true || msgError == true){
			console.log('there is error here');
		}
		else{
			console.log('Form is valid');
		}
	}
	checkErrors()
	
	$('.username').blur(function(){
		
		
		if($(this).val().length < 4){
			
			$(this).css('border','1px solid #f00');
			$(this).parent().next().fadeIn(200);
			//$(this).parent().find('.custom-alert').fadeIn(200);
			$(this).parent().find('.astrex').fadeIn(100);
			userError = true
			
		} else{
			
			$(this).css('border','1px solid #080');
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).parent().find('.astrex').fadeOut(100);
			userError = false;
		}
		checkErrors();
		
		
	});
	
	$('.email').blur(function(){
		
		
		if($(this).val() === ''){
			
			$(this).css('border','1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn(200);
			$(this).parent().find('.astrex').fadeIn(100);
			emailError = true;
			
		} else{
			
			$(this).css('border','1px solid #080');
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).parent().find('.astrex').fadeOut(100);
			emailError = false;
		}
		checkErrors();
		
		
	});
	
	$('.msg').blur(function(){
		
		
		if($(this).val().length < 11){
			
			$(this).css('border','1px solid #f00');
			$(this).parent().find('.custom-alert').fadeIn(200);
			$(this).parent().find('.astrex').fadeIn(100);
			msgError = true;
			
		} else{
			
			$(this).css('border','1px solid #080');
			$(this).parent().find('.custom-alert').fadeOut(200);
			$(this).parent().find('.astrex').fadeOut(100);
			msgError = false;
		}
		checkErrors();
		
		
	});
	$('.contact-form').submit(function(e){
		if(userError == true || emailError == true || msgError == true){
		e.preventDefault();
			$('.username , .email, .msg').blur();
		}
		else{
			
		}
		
	})
});
  
  