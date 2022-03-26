$(document).ready(function(){
        
    $('#openRegisterModal').click(function() {
        $('#registerModal .form-control').removeClass('border-danger');
        // $('#registerModal .form-control').val('');
        $('#registerModal .error-message').html('');
        $('.sms-container').addClass('d-none');
    });
    
    
    
    $('.register-btn').click(function(e){
        
        e.preventDefault();
        let datastring = $("#add-temp").serialize();
        if(amountToPay_1){
            datastring += `&amountToPay_1=${amountToPay_1}&selectedLessons=${JSON.stringify(selectedLessons)}`;
        }
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $('#add-temp').attr('action'),
            dataType: 'json',
            method: 'POST',
            data: datastring,
            success: function(data) {
                if(isNaN(data)) {
                    swal(" מספר טלפון שגוי ", " הזן מספר טלפון נכון ", "error");
                    return false;
                }
                $('.form-control').removeClass('border-danger');
                $('.error-message').html('');
                
                $('.sms-container').removeClass('d-none');
                $('#temp_id').val(data);
                
                // remove token after 15minutes
                removeToken(data); // temp_id;
                
                swal(" עוד קצת והקורס אצלך","לסיום בדוק את ההודעה שנשלחה למס' הטלפון שנרשמת איתו", "success");
                
            },
            error:function (data) {
                $('.form-control').removeClass('border-danger');
                $('.error-message').html('');
                if(data.status != 200) {
                    printErrorMsg(data.responseJSON.errors);
                }
            }
        })
    
    });
    
    
    $('#resend_sms').click(function(e) {
        e.preventDefault();
        $(this).attr('disabled', 'disabled');
        setTimeout(() => {
            $(this).attr('disabled', false);
        }, 5000);
        let temp_id = $('#temp_id').val();
        // temp_id = 6;
        if(!temp_id) {
            alert('something went wrong, please corect answer');
            return false;
        }
        $.ajax({
            
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $('#resend_sms_form').attr('action'),
            dataType: 'json',
            method: 'POST',
            data: {temp_id},
            success: function(data) { // data=temp_id
                if(isNaN(data)){ 
                    // response is "wrong text"
                    $('#resend_sms').attr('disabled','disabled');
                    swal(" Something went wrong ", " Please try again ", "error");
                    // window.location.reload();
                    return false;
                }else {
                    clearTimeout(tokenTimer);
                    removeToken(data);
                    swal(" תבדוק את הטלפון שלך ", " גדול! לסיום תהליך זה, לחץ על url ששלחנו אליך באמצעות SMS. ", "success");
                }
            }
        });         
    });
    
    
    $('.storeUser2').click(function(e) {
        e.preventDefault();
        $this = $(this);
        let datastring = '';
        if($this.attr('data-type')==='spilt'){
            datastring += `amountToPay_1=${amountToPay_1}&selectedLessons=${JSON.stringify(selectedLessons)}`;
        }
        if($this.attr('data-type')==='coupon_code'){
            datastring += `coupon_code=${$('#coupon_code').val()}&amountToPay_2=${amountToPay_2}`;
        }
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $this.attr('data-url'),
            dataType: 'json',
            data: datastring,
            method: 'post',
            success: function(data) { // data=temp_id
                if(data == 'wrong phone number') {
                    swal(" מספר טלפון שגוי ", " הזן מספר טלפון נכון ", "error");
                    return false;
                }
                                   
                // remove token after 15minutes
                clearTimeout(tokenTimer);
                removeToken(data); // temp_id;
                
                // success send sms
                swal(" תבדוק את הטלפון שלך ", " גדול! לסיום תהליך זה, לחץ על url ששלחנו אליך באמצעות SMS. ", "success");
            }
        });   
    });
    
    
});

function printErrorMsg (msg) {
    $.each( msg, function( key, value ) {
        console.log('key', key);
        $('#' + key).addClass('border-danger');
        $('#' + key).closest('div.form-group').find('div.error-message').html(value);
    });
}

function removeToken(temp_id) {

    tokenTimer = setTimeout(() => {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $('#remove_token').val(),
            dataType: 'json',
            method: 'POST',
            data: {temp_id},
            success: function(data) { // data=temp_id
            
                clearTimeout(tokenTimer);
                if(data == '0') {
                    // user not buy course
                    swal(" זמן ה- SMS פג ",  "Please retry again", "error")
                        .then(function() {
                            location.reload();
                        });
                    console.log('removed token because user didn\'t buy course in 15 min' );
                }else{
                    // user already 
                    console.log('user already buy course');
                }
            }
        })
        
    }, 15*60*1000);
}
