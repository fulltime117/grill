
<div class="banner-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>  היי,   {{ $user->firstname }} {{ $user->lastname }}  &nbsp;  ברוך שובך.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pro-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3 desktop-only"></div>
            <div class="col-lg-9">
                <ul class="client-header-nav">
                    {{-- <li class="client-nav-item {{ Request::is('client/*/home') ? 'active' : '' }}">
                        <a href="{{ route('client.home', $user) }}">Dashboard</a> 
                    </li> --}}
                    <li class="client-nav-item {{ Request::is('client/users/*/profile') ? 'active' : '' }} ">
                        <a href="{{ route('client.profile', $user) }}"> פרופיל </a> 
                    </li>
                    
                    <li class="client-nav-item {{ Request::is('client/*/courses') ? 'active' : '' }}">
                        <a href="{{ route('client.courses', $user) }}"> קורסים </a> 
                    </li>
                    
                    <li class="client-nav-item {{ Request::is('client/*/chat') ? 'active' : '' }}">
                        <a href="{{ route('client.chat', $user) }}"> תמיכה </a> 
                    </li>
                    
                    {{-- <li class="client-nav-item  {{ Request::is('client/*/contact') ? 'active' : '' }}">
                        <a href="{{ route('client.contact', $user) }}"> איש קשר </a> 
                    </li> --}}
                    
                    <li class="client-nav-item {{ Request::is('client/*/payment') ? 'active' : '' }}">
                        <a href="{{ route('client.payment', $user) }}"> פיננסי </a> 
                    </li>

                    <li class="client-nav-item {{ Request::is('client/*/diploma') ? 'active' : '' }}">
                        <a href="{{ route('client.diploma', $user) }}"> דיפלומה </a> 
                    </li>
                </ul>   
            </div>
        </div>        
    </div>
</div>