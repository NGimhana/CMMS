@extends('layout.layout')

@section('content')


    <div id="app">
        {{--  Main Componet contains the sidebar and Navigation Bar  --}}
        <main-component header={{$data['header']}} subheader={{$data['subheader']}}></main-component>
                

        <div style="padding:20px;">
            {{--Adding Calendar Component--}}
            <calendar-component></calendar-component>        
        </div>
    </div>
    
    <script>
  

        //Full Calendar
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                defaultDate: '2014-09-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
            });
        });

    </script>


@endsection