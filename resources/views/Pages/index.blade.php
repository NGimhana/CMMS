@extends('layout.layout')

@section('content')


    <div id="app">       
        <main-component username="{{ $data['user']['username'] }}" header={{ $data['header'] }} subheader={{ $data['subheader']}}></main-component>
        <div style="padding:20px;">
            <div class="ui four doubling special cards">
                <ongoingjobs-component></ongoingjobs-component>
                <completedjobs-component></completedjobs-component>
                <incompletejobs-component></incompletejobs-component>
                <recentjobs-component></recentjobs-component>
            </div>
            <assetcharts-component></assetcharts-component>
        </div>
    </div>  


@endsection