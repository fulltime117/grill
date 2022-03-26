@component('mail::layout')
    
    @slot('header')
        @component('mail::header', ['url' => '/'])
        @endcomponent
    @endslot

    
    {{ $slot }}
    
    

    
    @slot('footer')
        @component('mail::footer')
        © {{ date('Y') }} Grillman Media Team. @lang('All rights reserved.')
        @endcomponent
    @endslot
    
@endcomponent