@component('mail::message')
# Congratulations! You have got coupon code.

Hi, {{$user->firstname}}


    @foreach($course_ids as $course_id => $coupon_code)
    
        {{\App\Models\Course::find($course_id)->course_name}} - {{$coupon_code}}<br>

    @endforeach


Cheers,<br>
{{ 'Grillman Team' }}
@endcomponent
