/*global , alert, console*/
$(function() {
    'use strict';

    var userError = true; // form error status
    var emailError = true;
    var msgError = true;

    $('.username').blur(function() {
        if($(this).val().length <4) { // errros
            
            $(this).css('border', '1px solid #f00').parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
            
            userError = true;
        }else { // no errors
            
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
           
            userError = false;
        }
    });

    $('.email').blur(function() {
        if($(this).val() === '') {
            $(this)
            $(this).css('border', '1px solid #f00').parent().find('.custom-alert').fadeIn(200).end().find('.asterisx').fadeIn(100);
            
            emailError = true;
        }else {
           
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
           
            emailError = false;
        }
    });

    $('.message').blur(function() {
        if($(this).val().length < 11) {
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            msgError = true;
        }else {
            
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(200).end().find('.asterisx').fadeOut(100);
            
            msgError = false;
        }
        
    });
    // submit form validation
    $('.contact-form').submit(function(e) {
        if(userError === true || emailError === true || msgError === true ) {
            e.prevenDefault();
            $('.username, .email, .message').blur();
        }
       

    });
});