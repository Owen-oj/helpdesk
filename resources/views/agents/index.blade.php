@extends('layouts.app')
@section('title','Agents')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Agent
                <a class="btn btn-primary pull-right" href="{{route('agents.users')}}">Create Agent</a>
            </h2>

        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover"  id="indexTables">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @if($agents->isEmpty())
                    <tr>
                        <td colspan="5"  align="center">There are no Agents,<a href="{{route('agents.users')}}">Add New</a></td>
                    </tr>
                @else
                    @foreach($agents as $agent)
                        <tr>
                            <td>
                                {{$agent->name}}
                            </td>
                            <td>

                                <a class="btn btn-info" href=""   onclick="event.preventDefault();
                                                     confirm('Are Your Sure:');
                                                     document.getElementById('{{$agent->id}}').submit();">
                                    remove
                                    {!! Form::open(['method'=>'post','route'=>['agents.delete',$agent->id],'id'=>$agent->id,
                                   'style'=>'display: none;'
                                   ]) !!}

                                    {!! Form::close() !!}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection