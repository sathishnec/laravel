jQuery(document).ready(function($){
 
    $('#holadminaddtype').on('submit', function(){ 
                 
       // ajax post method to pass form data to the 
        $.post(
            $(this).prop('action'),        {
                //"_token": $( this ).find( 'input[name=_token]' ).val(),
                "leaveType": $( '#leaveType' ).val()
            },
            function(data){
                //response after the process. 
            },
            'json'
        ); 
       
        return false;
    }); 
});