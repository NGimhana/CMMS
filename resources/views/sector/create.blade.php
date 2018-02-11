@extends('dashboard')

@section('mainContent')


    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Create a Sector</h3>
        </div>
        <div class="box-body">

            @include('inc.messages')

            {!! Form::open(['action' => 'SectorController@store', 'method' => 'POST' , 'class' => 'ui form']) !!}
            <div class="field">
                {{ Form::label('building', 'Building')}}
                {{ Form::select('building', ['E' => 'Electrical', 'P' => 'Plumbing'], 'E')}}
            </div>


            <div class="field">
                {{ Form::label('name', 'Sector Name')}}
                {{ Form::text('name', '',['class'=>'form-control' , 'placeholder' => 'Sector Name']) }}
            </div>


            {{ Form::submit('Submit' , ['class'=>'ui button'])}}

            {!! Form::close() !!}

        </div>

    </div>



@endsection
