@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Tickets
                <a href="{{route('tickets.create')}}" class="btn btn-primary pull-right"> Create Ticket</a>
            </h2>
        </div>
        <div class="panel-body">
            @include('tickets.partials.datatable',['completed'=>$completed])
        </div>
    </div>

@stop
