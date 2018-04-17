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
                

        <!--Map Model to view the place of the Job-->
        <div id="map" class="ui fullscreen modal">
            <i class="close icon"></i>
            <div id="mapHeader" class="header"></div>
            <div class="content">
                <iframe id="mapFrame" width="100%" height="450" frameborder="0" style="border:0"
                        src=""></iframe>
            </div>

            <div class="actions">
                <div class="ui button">Cancel</div>
                <div class="ui button">OK</div>
            </div>
        </div>

        <div style="padding:20px;">

           {{--Add Job Component--}}
            <addjob-component user = "{{$data['user']['userid']}}"></addjob-component>
            
            <br>
           {{--  Adding allJob components into view  --}}
            <alljobs-component></alljobs-component>

           

        </div>
    </div>
    
    <script>
         

        //Map of the Selected Place of Job Task
        function createmap(jobId, jobPlace) {
            //Model Shows
            $('.fullscreen.modal').modal('show');
            document.getElementById('mapHeader').innerHTML = "Job Task : " + jobId;
            var source = "https://www.google.com/maps/embed/v1/search?q=" + jobPlace + "&key= AIzaSyB4VsPNtqpyTH4kowZeWFM5zONUkili1So";
            document.getElementById('mapFrame').setAttribute("src", source);
        }
    </script>


@endsection