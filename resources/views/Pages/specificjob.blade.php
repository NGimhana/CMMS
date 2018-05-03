@extends('layout.layout')

@section('content')

<div id="app">
    <main-component
            userid="{{$data['user']['userid']}}"
            username={{ $data[
    'user']['username'] }}
    header = {{ $data['header'] }}
    subheader={{ $data['subheader'] }}
    notifications = "{{ json_encode($data['notifications']) }}"
    >
    </main-component>


    <p>{{$data['job']['priority']}}</p>

</div>

@endsection