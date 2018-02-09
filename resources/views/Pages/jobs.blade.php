@extends('dashboard')

@section('mainContent')

    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Create a Job</h3>
        </div>
        <div class="box-body">

            {!! Form::open(['url' => 'foo/bar', 'method' => 'POST']) !!}

            {!! Form::close() !!}

        </div>

    </div>



@endsection