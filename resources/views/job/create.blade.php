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
                    {{ Form::select('place', ['Sumandasa Building' => 'Sumanadasa Building', 'GodaCanteen' => 'Goda Canteen'], 'Sumandasa Building')}}
                </div>

                <div class="field">
                    {{ Form::label('sector', 'Sector')}}
                    {{ Form::select('sector', ['Level 1 Lab' => 'Level 1 Lab', 'Level 2 Lab' => 'Level 2 Lab'], 'Level 1 Lab')}}
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

        </div>

    </div>



@endsection