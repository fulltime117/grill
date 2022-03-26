<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
</head>
<body class="bg-secondary">
    <nav class="p-6 bg-white d-flex justify-content-between mb-5">
        <ul class="d-flex list-inline align-items-center">
            <li>
                <a class="p-3" href="{{ route('front') }}">Home</a>
            </li>
            <li>
                <a class="p-3" href="{{ route('admin') }}">User's dashboard</a>
            </li>
            <li>
                <a class="p-3" href="{{ route('posts') }}">Post</a>
            </li>
        </ul>
        
        <ul class="d-flex list-inline align-items-center">
            @auth
                <li>
                    <a class="p-3" href="">{{ auth()->user()->firstname }} </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="p-3" >Logout</button>
                    </form>
                </li>
            @endauth
            
            @guest
                <li>
                    <a class="p-3" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="p-3" href="{{ route('register') }}">Register</a>
                </li>
            @endguest
            
            
        </ul>
    </nav>
    
    <div id="app" >
        @yield('content')
    </div>
</body>
</html>