@extends('dashboard')

@section('mainContent')


    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Create a Job</h3>
        </div>
        <div class="box-body">

            {!! Form::open(['action' => 'JobController@store', 'method' => 'POST' , 'class' => 'ui form']) !!}
            <div class="field">
                {{ Form::label('type', 'Type')}}
                {{ Form::select('type', ['E' => 'Electrical', 'P' => 'Plumbing'], 'E')}}
            </div>

            <div class=" two fields">
                <div class="field">
                    {{ Form::label('place', 'Place')}}
                    {{ Form::select('place', ['S' => 'Sumanadasa Building', 'G' => 'Goda Canteen'], 'S')}}
                </div>

                <div class="field">
                    {{ Form::label('sector', 'Sector')}}
                    {{ Form::select('sector', ['L1' => 'Level 1 Lab', 'L2' => 'Level 2 Lab'], 'L1')}}
                </div>
            </div>


            <div class="field">
                {{ Form::label('des', 'Description')}}
                {{ Form::textarea('des', '',['class'=>'form-control' , 'placeholder' => 'Describe more the Job ']) }}
            </div>

            <div class="field">
                {{ Form::label('priority', 'Priority')}}
                {{ Form::select('priority', ['Pre' => 'Schedule', 'Cor' => 'Immediate' , 'Predic'=>'Keep Eye'], 'Cor')}}
            </div>

            {{ Form::submit('Submit' , ['class'=>'ui button'])}}

            {!! Form::close() !!}

        </div>

    </div>



@endsection