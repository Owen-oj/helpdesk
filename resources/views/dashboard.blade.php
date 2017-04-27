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


<div class="col-md-8 ">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Agent Ticket Share</div>
            <div class="panel-body">
                <canvas id="agents"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Categories</div>
            <div class="panel-body">
                <canvas id="categories"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Ticket</div>
        <div class="panel-body">
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Categories</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Agents</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Users</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">...</div>
                    <div role="tabpanel" class="tab-pane" id="profile">...</div>
                    <div role="tabpanel" class="tab-pane" id="messages">...</div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>

    let data = {
        labels: '{{$agentNames}}',
        datasets:[
            {data:['{{$agentTicketCount}}'],

            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],

            }
        ]
    };
    let context = document.querySelector('#agents').getContext('2d');
    var myLineChart = new Chart(context, {
        type: 'pie',
        data: data,
    });
</script>

<script>
    let cat = {
        labels: ['category1','category2','category3'],
        datasets:[
            {data:[30,70,40],

                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],

            }
        ]
    };
    let catec = document.querySelector('#categories').getContext('2d');
    var myLineChart = new Chart(catec, {
        type: 'pie',
        data: cat,
    });
</script>
@endpush