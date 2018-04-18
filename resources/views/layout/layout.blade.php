<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Computerised Maintenance Management System</title>   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js'></script>



    <meta name="csrf-token" content = "{{ csrf_token() }}">
    <script>window.Laravel={ csrfToken: " {{ csrf_token() }} " }</script>
    <!--    <script>window.Laravel = {!! json_encode([ 'csrfToken'=>csrf_token() ]) !!}</script>-->

</head>
<body>

    @yield('content')      
    
     <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>