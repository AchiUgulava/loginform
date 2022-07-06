$(document).ready(function(){
    //bind enter key to click button
    $(document).keypress(function(e){
    	if (e.which == 13){
    		 if($('#signupform').is(":visible")){
        		$("#signupbutton").click();
        	}
    	}
    });
 
    $('#signup').click(function(){
        $('#signupform').slideDown();
        $('#myalert').slideUp();
        $('#signform')[0].reset();
    });
 
    $(document).on('click', '#signupbutton', function(){
        if($('#sfirstname').val()!='' && $('#slastname').val()!='' && $('#semail').val()!=''){
            $('#signtext').text('Signing up...');
            $('#myalert').slideUp();
            var signform = $('#signform').serialize();
            $.ajax({
                method: 'POST',
                url: 'actions.php',
                data: signform,
                success:function(data){
                    setTimeout(function(){
                    $('#myalert').slideDown();
                    $('#alerttext').html(data);
                    $('#signtext').text('Sign up');
                    $('#signform')[0].reset();
                    }, 2000);
                } 
            });
        }
        else{
            $('#alerttext').html('<span class="fail">Please input all fields to Sign Up</span>');
        }
    });
});