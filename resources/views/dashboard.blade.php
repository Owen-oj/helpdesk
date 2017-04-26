@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-4 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3" style="font-size: 5em;">
                            <i class="fa fa-navicon"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h1>{{$allTickets}}</h1>
                            <div>Total Tickets</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3" style="font-size: 5em;">
                            <i class="fa fa-warning"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h1>{{$openTickets}}</h1>
                            <div>Open Tickets</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3" style="font-size: 5em;">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h1>{{$closedTickets}}</h1>
                            <span>Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
