<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <title>Computerised Maintenance Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        $(window).on('scroll', function () {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
            }
            else {
                $('nav').removeClass('black')
            }
        })
    </script>

    <!--Semantic UI-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.js"></script>

    <style>
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            padding: 10px 100px;
            box-sizing: border-box;
            transition: .3s;
        }

        nav.black {
            background: rgba(0, 0, 0, 0.8);
            height: 75px;
            padding: 10px 100px;

        }

        nav.logo {
            padding: 22px 20px;
            height: 100px;
            float: left;
            font-size: 24px;
            transition: .3s;
        }

        nav.black .logo {
            color: #ffffff;
        }

        nav ul {
            list-style: none;
            float: right;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            list-style: none;
        }

        nav ul li a {
            line-height: 80px;
            color: #151515;
            padding: 12px 30px;
            text-decoration: none;
            text-transform: uppercase;
            transition: .3s;
        }

        nav.black ul li a {
            color: #ffffff;
        }

        nav ul li a:focus {
            outline: none;
        }

        nav ul li a.active {
            background: #E2472f;
            color: #ffffff;
            border-radius: 6px;
        }

        html, body {
            font-size: 16px;
            color: #666;
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            line-height: 1.8em;
            height: 100%;
            margin: 0;
        }

        .pimg1, .pimg2, .pimg3 {
            position: relative;
            opacity: 0.7;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            /*Fixed = parallax
                scroll=normal
            */
            background-attachment: fixed;
        }

        .pimg1 {
            background-image: url("/storage/cover_Images/arrangement-coffee-cup-407233.jpg");
            min-height: 100%;
        }

        .pimg2 {
            background-image: url("/storage/cover_Images/architecture-buildings-business-941053.jpg");
            min-height: 400px;
        }

        .pimg3 {
            background-image: url("/storage/cover_Images/architecture-buildings-business-941053.jpg ");
            min-height: 400px;
        }

        .section {
            text-align: center;
            padding: 50px 80px;
        }

        .section-light {
            background-color: #f4f4f4;
            color: #666666;
        }

        .section-dark {
            background-color: #282e34;
            color: #dddddd;
        }

        .ptext {
            position: absolute;
            top: 50%;
            width: 100%;
            text-align: center;
            color: #000000;
            font-size: 27px;
            letter-spacing: 8px;
            text-transform: uppercase;
        }

        .ptext .border {
            /*background-color: #111111;*/
            color: #ffffff;
            padding: 20px;
        }

        .full-height {
            height: 0px;
        }

        .flex-center {
            align-items: center;
            /*display: flex;*/
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;

        }


    </style>


</head>

<body>


<div class="pimg1">
    <div class="ptext">

        <nav>
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a class="ui yellow button" href="{{ url('/home') }}">Home</a>
                @else
                <a class="ui green button" href="{{ route('login') }}">Login</a>
                <a class="ui orange button" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif
        </nav>


        <span class="border">
             Computerised Maintenance Management System
        </span>

    </div>

</div>


<section class="section section-light">
    <h2>Section One</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto deserunt, dolorem ducimus esse et eum
        expedita fuga libero natus necessitatibus nobis officiis saepe sapiente suscipit veritatis voluptate. Dolorum,
        quaerat!</p>
</section>

<div class="pimg2">
    <div class="ptext">

        <nav>
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a class="ui yellow button" href="{{ url('/home') }}">Home</a>
                @else
                <a class="ui green button" href="{{ route('login') }}">Login</a>
                <a class="ui orange button" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif
        </nav>
                    <span class="border">
                        Image Two Text
                    </span>
    </div>
</div>

<section class="section section-light">
    <h2>Section Thtre</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto deserunt, dolorem ducimus esse et eum
        expedita fuga libero natus necessitatibus nobis officiis saepe sapiente suscipit veritatis voluptate. Dolorum,
        quaerat!</p>
</section>

<div class="pimg3">
    <div class="ptext">

        <nav>
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a class="ui yellow button" href="{{ url('/home') }}">Home</a>
                @else
                <a class="ui green button" href="{{ route('login') }}">Login</a>
                <a class="ui orange button" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif
        </nav>

                    <span class="border">
                        Image Three Text
                    </span>
    </div>
</div>

<section class="section section-dark">
    <h2>Section Two</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab architecto deserunt, dolorem ducimus esse et eum
        expedita fuga libero natus necessitatibus nobis officiis saepe sapiente suscipit veritatis voluptate. Dolorum,
        quaerat!</p>
</section>

</body>
</html>
