let checkTimer;
let tokenTimer;

$('button[type="submit"]').click(function(e){
    e.preventDefault();
    
    if($('#selected-courses').val()) {
        
        $(this).attr('disabled', 'disabled');
        
        
        var datastring = $("#add-temp").serialize();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $('#add-temp').attr('action'),
            dataType: 'json',
            method: 'POST',
            data: datastring,
            success: function(data) {
                $('.form-control').removeClass('border-danger');
                $('.error-message').html('');
                
                
                $('#contract-url').val(data.contract_url);
                $('#send-sms').attr('data-token', data.token);
                $('input.form-control').attr('readonly','readonly');
                $('#contract-url').removeAttr('readonly');
                $('button[type="submit"]').attr('disabled', true);
                
                // send sms
                
            },
            error:function (data) {
                $('button[type="submit"]').attr('disabled', false);
                $('.form-control').removeClass('border-danger');
                $('.error-message').html('');
                if(data.status != 200) {
                    printErrorMsg(data.responseJSON.errors);
                }
            }
        })
    }else {
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'You didn\'t select a course',
            footer: 'Please select a course and try again.</a>',
            padding: '2em'
        });
    }
});


$(document).on('click', '#send-sms', function(){
    $(this).attr('disabled', 'disabled');
    const token = $(this).attr('data-token');
    const svgDom = $(this).find('svg');
    if(!token){
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Token does not exist',
            footer: 'Please generate token url first</a>',
            padding: '2em'
        });
        $(this).attr('disabled', false);
        return;
    } 
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: $(this).attr('data-url'),
        method: 'POST',
        dataType: 'json',
        data: { 
            contract_url: $('#contact-url').val(),
            token,
        },
        beforeSend: function(){
            svgDom.removeClass('d-none');
        },
        success: function(temp_id){
            svgDom.addClass('d-none');
            if( !isNaN(temp_id) ){
                $('.sms-success').removeClass('d-none');
                $('#send-sms').attr('disabled', 'disabled');
                check_sign(token);
                removeToken(temp_id);
            }else{
                $('.sms-fail').removeClass('d-none');
            }
        }
    });
    
});


$(document).on('click', '#save-user', function() {
    $(this).attr('disabled', 'disabled');
    const token = $('#send-sms').attr('data-token');
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: $(this).attr('data-url'),
        method: 'POST',
        dataType: 'json',
        data: { 
            token,
        },
        success: function(data){
            if(data=='1'){
                $('.save-user-check').removeClass('d-none');
                swal({
                    title: 'Success!',
                    text: "User was registered and send to him mail to access site successfully",
                    type: 'success',
                    padding: '2em'
                });
            }
        }
    });
});

$(document).on('click', '#email-register', function(e){
    e.preventDefault();
    const token = $('#send-sms').attr('data-token');
    const svgDom = $(this).find('svg');
    if(!token){
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Token does not exist',
            footer: 'Please generate token url first</a>',
            padding: '2em'
        });
        return;
    }
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: $(this).attr('href'),
        method: 'POST',
        dataType: 'json',
        data: {token},
        beforeSend: function(){
            svgDom.addClass('spin');
        },
        success: function(data){
            if(data == '1') {
                swal({
                    title: 'Success!',
                    text: "Mail was sent to client with info for access",
                    type: 'success',
                    padding: '2em'
                });
                
                svgDom.removeClass('spin');
            }
        }
    });
    
});


function check_sign(token){
    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: $('.sms-success').attr('data-url'),
        method: 'POST',
        dataType: 'json',
        data: {token},
        success: function(data){
            if(data != "0"){
                $('.infobox-3').removeClass('d-none');
                $('.sms-success').addClass('d-none');
                clearTimeout(checkTimer);
                clearTimeout(tokenTimer);
            }else{
                checkTimer = setTimeout(() => {
                    check_sign(token);
                }, 5000);
            }
        }
    
    })
}

function printErrorMsg (msg) {
    $.each( msg, function( key, value ) {
        console.log('key', key);
        $('#' + key).addClass('border-danger');
        $('#' + key).closest('div.form-group').find('div.error-message').html(value);
    });
}

function removeToken(temp_id) {
    if(isNaN(temp_id)) {
        return false;
    }
    tokenTimer = setTimeout(() => {
        
        swal({
            title: 'Auto remove token!',
            text: 'User hasn\'t signed yet for 15 minutes after send sms. System will remove token automatically after 8 seconds.',
            timer: 8*1000,
            padding: '2em',
            onOpen: function () {
              swal.showLoading()
            }
          }).then(function (result) {
              $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  url: $('#remove_token_url').attr('data-url'),
                  dataType: 'json',
                  method: 'POST',
                  data: {temp_id},
                  success: function(data) { // data=temp_id
                        
                      
                      if(data == '0') {
                          // user not buy course
                          
                          clearTimeout(tokenTimer);
                          clearTimeout(checkTimer);
                          
                          swal({
                            title: 'Removed Token!',
                            text: "Because user didn't sign to contract in 15 minutes, system removed his token!",
                            type: 'success',
                            padding: '2em'
                          })
                     }
                  }
              })
          })
        
    }, 15*15*1000);
}