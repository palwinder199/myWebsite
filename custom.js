
//Registration form submit function
$(document).on('click', 'form#ttm-contactform #submitFormBtn', function (e) {    
    e.preventDefault();
	var dt = $("form#ttm-contactform").serialize();
	console.log(dt);
	/***/
	$.ajax({
		type:"POST",
		data:$("form#ttm-contactform").serialize(),
		dataType:"json",
        beforeSend: function() {
			$("#preloader").fadeIn(1000);$("#preloader #status").fadeIn(1000);                
			
			//Disable the register Button
			$("form#ttm-contactform #submitFormBtn").attr('disabled','disabled');
		},
        complete: function() 
		{
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000); 
			
			//Remove disabled
			$("form#ttm-contactform #submitFormBtn").removeAttr('disabled');
        },
		success:function(json)
		{
			//$("#preloader").css("display","none");
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
			//$("."+id).html(json)
            console.log(json);
            isVarRegisterUser = false;
			if (json['error'])
            {
				for (var i in json['error']['list'])
				{
					$("form#ttm-contactform #"+i+"-msg").html(json['error']['list'][i]);
					console.log("form#ttm-contactform #"+i+"-msg:"+json['error']['list'][i]);
				}

            }
            else if (json['success']['list'])
            {
				for (var i in json['success']['list'])
				{
					$("#"+i).html(json['success']['list'][i]);
					console.log("#"+i+": "+json['success']['list'][i]);
				}
				
            }
            else if (json['success'] == 200)
            {
                
                if (json['location'])
                {
                    location = json['location'];
                }
				
            }
		},
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
        }
	});
	/***/
});

/*****/
/**
 * This is for Registration/login/forgot password focus/focusout event
 */
$(document).ready(function () {  
    //When user clicks on register form focus event
    $('#ttm-contactform input').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
    });
    
    //For Select Case
    $('#ttm-contactform select').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    //For Select Case
    $('#ttm-contactform textarea').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    
    
}); 

//Quick contact form submit function
$(document).on('click', 'form#footer-quick-contact-form #quick-contact-form-submit', function (e) {    
     e.preventDefault();
	/***/
	$.ajax({
		type:"POST",
		data:$("form#footer-quick-contact-form").serialize(),
		dataType:"json",
        beforeSend: function() {
			$("#preloader").fadeIn(1000);$("#preloader #status").fadeIn(1000);                
			
			//Disable the register Button
			$("form#footer-quick-contact-form #quick-contact-form-submit").attr('disabled','disabled');
		},
        complete: function() 
		{
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000); 
			
			//Remove disabled
			$("form#footer-quick-contact-form #quick-contact-form-submit").removeAttr('disabled');
        },
		success:function(json)
		{
			//$("#preloader").css("display","none");
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
			//$("."+id).html(json)
            console.log(json);
            isVarRegisterUser = false;
			if (json['error'])
            {
				for (var i in json['error']['list'])
				{
					$("form#footer-quick-contact-form #"+i+"-msg").html(json['error']['list'][i]);
					console.log("form#footer-quick-contact-form #"+i+"-msg:"+json['error']['list'][i]);
				}

            }
            else if (json['success']['list'])
            {
				for (var i in json['success']['list'])
				{
					$("#"+i).html(json['success']['list'][i]);
					console.log("#"+i+": "+json['success']['list'][i]);
				}
				
            }
            else if (json['success'] == 200)
            {
                
                if (json['location'])
                {
                    location = json['location'];
                }
				
            }
		},
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
            isVarRegisterUser = false;
        }
	});
	/***/
});

/*****/
/**
 * This is for Registration/login/forgot password focus/focusout event
 */
$(document).ready(function () {  
    //When user clicks on register form focus event
    $('#footer-quick-contact-form input').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
    });
    
    //For Select Case
    $('#footer-quick-contact-form select').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    //For Select Case
    $('#footer-quick-contact-form textarea').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    
    
}); 

//contact form submit function
$(document).on('click', 'form#template-contactform #template-contactform-submit', function (e) {    
     e.preventDefault();
	/***/
	$.ajax({
		type:"POST",
		data:$("form#template-contactform").serialize(),
		dataType:"json",
        beforeSend: function() {
			$("#preloader").fadeIn(1000);$("#preloader #status").fadeIn(1000);                
			
			//Disable the register Button
			$("form#template-contactform #template-contactform-submit").attr('disabled','disabled');
		},
        complete: function() 
		{
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000); 
			
			//Remove disabled
			$("form#template-contactform #template-contactform-submit").removeAttr('disabled');
        },
		success:function(json)
		{
			//$("#preloader").css("display","none");
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
			//$("."+id).html(json)
            console.log(json);
            isVarRegisterUser = false;
			if (json['error'])
            {
				for (var i in json['error']['list'])
				{
					$("form#template-contactform #"+i+"-msg").html(json['error']['list'][i]);
					console.log("form#template-contactform #"+i+"-msg:"+json['error']['list'][i]);
				}

            }
            else if (json['success']['list'])
            {
				for (var i in json['success']['list'])
				{
					$("#"+i).html(json['success']['list'][i]);
					console.log("#"+i+": "+json['success']['list'][i]);
				}
				
            }
            else if (json['success'] == 200)
            {
                
                if (json['location'])
                {
                    location = json['location'];
                }
				
            }
		},
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
            isVarRegisterUser = false;
        }
	});
	/***/
});

/*****/
/**
 * This is for Registration/login/forgot password focus/focusout event
 */
$(document).ready(function () {  
    //When user clicks on register form focus event
    $('#template-contactform input').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
    });
    
    //For Select Case
    $('#template-contactform select').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    //For Select Case
    $('#template-contactform textarea').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    
    
}); 


//product form submit function
$(document).on('click', 'form#product-quote-form #product-quote-form-submit', function (e) {    
     e.preventDefault();
	/***/
	$.ajax({
		type:"POST",
		data:$("form#product-quote-form").serialize(),
		dataType:"json",
        beforeSend: function() {
			$("#preloader").fadeIn(1000);$("#preloader #status").fadeIn(1000);                
			
			//Disable the register Button
			$("form#product-quote-form #product-quote-form-submit").attr('disabled','disabled');
		},
        complete: function() 
		{
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000); 
			
			//Remove disabled
			$("form#product-quote-form #product-quote-form-submit").removeAttr('disabled');
        },
		success:function(json)
		{
			//$("#preloader").css("display","none");
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
			//$("."+id).html(json)
            console.log(json);
            isVarRegisterUser = false;
			if (json['error'])
            {
				for (var i in json['error']['list'])
				{
					$("form#product-quote-form #"+i+"-msg").html(json['error']['list'][i]);
					console.log("form#product-quote-form #"+i+"-msg:"+json['error']['list'][i]);
				}

            }
            else if (json['success']['list'])
            {
				for (var i in json['success']['list'])
				{
					$("#"+i).html(json['success']['list'][i]);
					console.log("#"+i+": "+json['success']['list'][i]);
				}
				
            }
            else if (json['success'] == 200)
            {
                
                if (json['location'])
                {
                    location = json['location'];
                }
				
            }
		},
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			$("#preloader").fadeOut(1000);$("#preloader #status").fadeOut(1000);
            isVarRegisterUser = false;
        }
	});
	/***/
});

/*****/
/**
 * product focus/focusout event
 */
$(document).ready(function () {  
    //When user clicks on register form focus event
    $('#product-quote-form input').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
    });
    
    //For Select Case
    $('#product-quote-form select').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    //For Select Case
    $('#product-quote-form textarea').focus(function () {
        var id = $(this).attr('id');
        $('#'+id+'-msg').html('');
        //$('#'+id).prop('selectedIndex',0);
    });
    
    
}); 