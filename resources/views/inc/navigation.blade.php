<div class="ui inverted  menu">
    <div class="header item"><img src="\images\CMMS.png"></div>
    
    <div class="right menu">
            @if (Route::has('login'))                
                    @auth
                        <a class="ui item" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="ui item" href="{{ route('login') }}">Login</a>
                        <a class= "ui item" href="{{ route('register') }}">Register</a>
                    @endauth
                
            @endif
</div>