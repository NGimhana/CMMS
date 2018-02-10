@extends('dashboard')

@section('mainContent')

    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">My Job History</h3>
        </div>
        <div class="box-body">

            @include('inc.messages')

            @if(count($data['jobs'])>0)
                <table class="ui padded table">
                    <thead>
                    <tr>
                        <th>Job Id</th>
                        <th>Type</th>
                        <th>Place</th>
                        <th>Sector</th>
                        <th>Description</th>
                        <th>Priority</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($data['jobs'] as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->type}}</td>
                            <td>{{$job->place}}</td>
                            <td>{{$job->sector}}</td>
                            <td>{{$job->description}}</td>
                            <td>{{$job->priority}}</td>
                        </tr>
                    @endforeach
                    @else
                        <div>No Data Found</div>
                    @endif

                    </tbody>
                </table>

        </div>

    </div>


@endsection