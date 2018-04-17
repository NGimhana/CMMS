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

    <div style="padding:20px;">

        <div class="ui grid">
            <div class="eight wide column">

                <div class="ui two doubling special cards">
                    <ongoingjobs-component></ongoingjobs-component>
                    <completedjobs-component></completedjobs-component>
                </div>

                <div class="ui two doubling special cards">
                    <incompletejobs-component></incompletejobs-component>
                    <recentjobs-component></recentjobs-component>
                </div>

            </div>

            <div class="eight wide column">


                <div class="ui one column grid">
                    <div class="column">
                        <div class="ui raised segment">
                            <a class="ui red ribbon label">Overview</a>
                            <span>Assets Maintained Mostly</span>
                            <p></p>
                            <assetcharts-component></assetcharts-component>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>




</div>
@endsection