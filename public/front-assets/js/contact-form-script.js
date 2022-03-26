(function($){"use strict";$("#contactForm").validator().on("submit",function(event){if(event.isDefaultPrevented()){formError();submitMSG(false,"Did you fill in the form properly?");}else{event.preventDefault();submitForm();}});

function submitForm(){
    var firstname=$("#firstname").val();
    var lastname=$("#lastname").val();
    var email=$("#email").val();
    var phone=$("#phone").val();
    var message=$("#message").val();
    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:$('#contactForm').attr('action'),
        method:"post",
        data:{
            firstname, lastname, email, phone, message
        },
        success:function(text){
            if(text=="success"){
                formSuccess();
            }else{
                formError();submitMSG(false,text);
            }
        }
    });


}
function formSuccess(){$("#contactForm")[0].reset();submitMSG(true,"Message Submitted!")}
function formError(){$("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){$(this).removeClass();});}
function submitMSG(valid,msg){if(valid){var msgClasses="h4 tada animated text-success";}else{var msgClasses="h4 text-danger";}
$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);}}(jQuery));