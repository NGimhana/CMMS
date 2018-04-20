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
        <asset-component></asset-component>
    </div>


</div>

<script>


</script>


@endsection