@extends('layout.layout')

@section('content')


    <div id="app">
        {{--  Main Componet contains the sidebar and Navigation Bar  --}}
        <main-component
                username={{ $data[
        'user']['username'] }}
        header = {{ $data['header'] }}
        subheader={{ $data['subheader'] }}
        notifications = "{{ json_encode($data['notifications']) }}"
        >
        </main-component>
                

        <div style="padding:20px;">
            {{--Adding Calendar Component--}}
            <calendar-component></calendar-component>        
        </div>
    </div>
    
    <script>
  

        //Full Calendar
        // $(document).ready(function() {
        //
        //     $('#calendar').fullCalendar({
        //     events: [
        //       {
        //         title  : 'event1',
        //         start  : '2018-03-17'
        //       },
        //       {
        //         title  : 'event2',
        //         start  : '2018-03-17',
        //         end    : '2018-03-20'
        //       },
        //       {
        //         title  : 'event3',
        //         start  : '2010-01-09T12:30:00',
        //         allDay : false // will make the time show
        //       }
        //     ]
        //   });
        // });

        

    </script>


@endsection