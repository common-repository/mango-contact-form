(function( $ ) {
	'use strict';
	
$(document).ready(function(){

	$(".mango-contact-form form .submit").removeAttr('disabled');	
	$(".mango-contact-form form").validate(
		{
  			rules: {
    			contact_name: "required",
    			contact_email: {
      							required: true,
      							email: true,
    			},
					contact_phone:"number",
    			contact_message: {
      							required: true,
										minlength: 5,
      							maxlength: 512
    		  }
  			},
			  messages: {
					contact_name: "Name field is required.",
    			contact_email:{ 
      							required:"Email field is required.",
      							email: "Please enter a valid email address.",
    			},
					contact_phone:"Please enter a valid number.",
    			contact_message: {
      							required: "Message field is required.",
										minlength: "Please enter at least 5 characters.",
      							maxlength: "Please enter no more than 512 characters."
    		  }
				},
  			submitHandler: function(form) {
					   $(form).find(".submit").attr('disabled','disabled');	
					   $(form).find(".loader").css('display','inline');
					   var data = {
									'action': 'mango_contact_form_action',
							    'mango_contact_nonce_field': $(form).find('input[name="mango_contact_nonce_field"]').val(),
							    'contact_name':$(form).find('input[name="contact_name"]').val(),
							    'contact_email':$(form).find('input[name="contact_email"]').val(),
							    'contact_phone':$(form).find('input[name="contact_phone"]').val(),
							    'contact_message':$(form).find('textarea[name="contact_message"]').val()
							};
							
							$.post(mango_ajax_object.ajax_url,data,function(response,status){
								 $(form).find(".submit").removeAttr('disabled');	
								 $(form).find(".loader").hide();
								  var result= response.result;
								  var $message=null;
									if(result.status=="1" && status=="success"){
										$message=$(form).parent(".mango-contact-form").find(".mango-form-result.success");
										$('html, body').animate({
        								scrollTop:$message.offset().top-200
    								}, 500, function(){  $message.css("visibility","visible");
																			   $message.css("height","auto");
																			}.bind($message)); 
									}else{
										$message=$(form).parent(".mango-contact-form").find(".mango-form-result.error");
										$('html, body').animate({
        								scrollTop:$message.offset().top-200
    								}, 500, function(){  
											 									$message.css("visibility","visible");
																			   $message.css("height","auto"); 
																			}.bind($message)); 
									}
								  $(form).hide();
							}.bind(form));
    				 return false;
  			}
		}
	);

});

})( jQuery );
