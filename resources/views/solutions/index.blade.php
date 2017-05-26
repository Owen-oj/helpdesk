@extends('layouts.app')

@section('content')

<div class="col-lg-12">
    <h2 class="title">Knowledge Base</h2>
    <div class="row">
        @foreach($solutions as $solution)
            <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">{{$solution->ticket->subject}}</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">{!! $solution->solution !!}</div>
                            <div class="panel-footer">Solved By {{$solution->agent->name}}</div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

@endsection