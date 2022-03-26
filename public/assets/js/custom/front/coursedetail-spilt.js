let course_price = $('#course_price').text();
let course_length = $('#course_price').attr('data-course_length');

let selectedLessons  = []; 
let amountToPay_1 = null; // means for spilt payment
let amountToPay_2 = null; // means amount for applied coupon code correctly

$(".btn-link").click(function(event){
    var switch_name = event.target.getAttribute('data-toggle');
    if(switch_name == "split"){
        console.log("split");
        $("#spilt-course-info").slideToggle(); 
        $("#cupon-info").slideUp();
    }else{
        $("#cupon-info").slideToggle();
        $("#spilt-course-info").slideUp(); 
    }
});



// =========split calculator============




$('.selectLessons').click(function() {
    $this = $(this);
    selectedLessons = [];
    const selectedLessonNum =$this.attr('data-lesson_number');

    // ux
    if($this.is(':checked')){
        $('.selectLessons').each(function() {
            if($(this).attr('data-lesson_number') < selectedLessonNum){
                console.log($(this).attr('data-lesson_number'));
                $(this).prop('checked', 'checked');
            }
        })
    }else {
        $('.selectLessons').each(function() {
            if($(this).attr('data-lesson_number') > selectedLessonNum){
                $(this).attr('checked', false);
            }else{
                $(this).attr('checked', true);
            }
        });
    }
    
    // calculate
    $('.selectLessons').each(function() {
        if($(this).is(':checked')){
            selectedLessons.push($(this).attr('data-lesson_number'));
        }
    });        
    
    if(selectedLessons.length > 0) {
    
        $('#fromLesson').text(selectedLessons[0]);
        $('#toLesson').text(selectedLessons[selectedLessons.length - 1]);
        amountToPay_1 = ((+course_price)*selectedLessons.length/(+course_length)).toFixed(2);
        $('#amountToPay_1').text(amountToPay_1);
    } else {
        $('#fromLesson').text(0);
        $('#toLesson').text(0);
        amountToPay_1 = 0;
        $('#amountToPay_1').text(amountToPay_1);
    }
});



// $('#openRegisterModal').click(function(){
    
//     if(selectedLessons.length < 1) {
//         swal(" Something went wrong ", " Please choose at leat one more lessons ", "error");
//         return false;
//     }
    
//     $('#payment-split-modal').removeClass('show');
//     $('#payment-split-modal').css('display', 'none');
//     $('.modal-backdrop').remove();
    
//     amountToPay_2 = null;
// });



  
$('#check_coupon').click(function() {

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: $(this).attr('data-url'),
        method: 'POST',
        data: { coupon_code: $('#coupon_code').val()},
        success: function(data){
            console.log(data['status']);
            if(data['status'] == 'invalid') {
                alert('You coupon code was Invalid. ');
                amountToPay_2 = course_price;
                $('#coupon_code').val('');
                return false;    
            }
            
            if(data['status'] == 'expired') {
                alert('You coupon code was Expired. ');
                amountToPay_2 = course_price;
                $('#coupon_code').val('');
                return false;    
            }
            
            if(data['status'] == 'used') {
                alert('You coupon code was already used. ');
                amountToPay_2 = course_price;
                $('#coupon_code').val('');
                return false;    
            }
            
            if(data['status'] == 'valid'){
                
                $('#coupon_table').removeClass('d-none');
                
                const discount = data['discount'];
                $('#discount').html(` (${discount}%) `);
                
                const discounted = ((+course_price)*(+discount)/100).toFixed(2);
                $('#discounted').html(`₪${discounted}`);
                
                amountToPay_2 = ((+course_price) - discounted).toFixed(2);
                $('#amountToPay_2').html(`₪${amountToPay_2}`)
            
            }
        },
    })
})