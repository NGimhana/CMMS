@extends('layout.layout')

@section('content')


<div id="app">
    {{-- Main Componet contains the sidebar and Navigation Bar --}}
    <main-component
            username={{ $data[
    'user']['username'] }}
    header = {{ $data['header'] }}
    subheader={{ $data['subheader'] }}
    notifications = "{{ json_encode($data['notifications']) }}"
    >
    </main-component>

    <div style="padding:20px;">


        {{--Add Job Component--}}
        <addjob-component user="{{$data['user']['userid']}}"></addjob-component>

        <br>

        <temp-component></temp-component>


    </div>


</div>

<script>


</script>


@endsection