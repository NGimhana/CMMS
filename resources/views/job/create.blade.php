@extends('dashboard')


@section('mainContent')


    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Create a Job</h3>
        </div>
        <div class="box-body">

            @include('inc.messages')

            {!! Form::open(['action' => 'JobController@store', 'method' => 'POST' , 'class' => 'ui form']) !!}
            <div class="field">
                {{ Form::label('type', 'Type')}}
                {{ Form::select('type', ['E' => 'Electrical', 'P' => 'Plumbing'], 'E')}}
            </div>

            <div class=" two fields">
                <div class="field">
                    {{ Form::label('place', 'Place')}}
                    {{ Form::select('place', app(App\Http\Controllers\BuildingController::class)->getAllBuildings(), null,
                    ['name'=>'building' , 'id'=>'building'])}}

                </div>

                <div class="field">
                    {{ Form::label('sector', 'Sector')}}
                    {{ Form::select('sector',  app(App\Http\Controllers\BuildingController::class)->getSectorsByDepartment(1) ,null)}}
                </div>
            </div>


            <div class="field">
                {{ Form::label('des', 'Description')}}
                {{ Form::textarea('des', '',['class'=>'form-control' , 'placeholder' => 'Describe more the Job ']) }}
            </div>

            <div class="field">
                {{ Form::label('priority', 'Priority')}}
                {{ Form::select('priority', ['Schedule' => 'Schedule', 'Immediate' => 'Immediate' , 'Keep Eye'=>'Keep Eye'], 'Immediate')}}
            </div>

            {{ Form::submit('Submit' , ['class'=>'ui button'])}}

            {!! Form::close() !!}


            <form id="">


            </form>


        </div>

    </div>

    <script>
        $('#building').on('change', function (e) {
            console.log(e);
            var sector_id = e.target.value;

            //ajax
            $.get
        });


    </script>


@endsection