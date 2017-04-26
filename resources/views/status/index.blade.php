@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Status
            <a class="btn btn-primary pull-right" href="{{route('statuses.create')}}">Create Status</a>
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
                @if($statuses->isEmpty())
                    <tr>
                        <td colspan="5"  align="center">There are no Statuses,<a href="{{route('statuses.create')}}">Add New</a></td>
                    </tr>
                @else
                    @foreach($statuses as $status)
                        <tr>
                            <td>
                                {{$status->name}}
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{route('statuses.edit',$status->id)}}">Edit</a>

                                <a class="btn btn-danger" href=""   onclick="event.preventDefault();
                                                     confirm('Are Your Sure:');
                                                     document.getElementById('{{$status->id}}').submit();">
                                    Delete
                                    {!! Form::open(['method'=>'delete','route'=>['statuses.destroy',$status->id],'id'=>$status->id,
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