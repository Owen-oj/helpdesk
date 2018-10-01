@extends('layouts._setup')
@section('title','Priorities')
@section('page-content')
    <div class="panel panel-default">
        <div class="panel-heading">Priorities
            <a class="btn btn-primary pull-right" href="{{route('priorities.create')}}">Create Priority</a>
            <div class="clearfix"></div>
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
                @if($priorities->isEmpty())
                    <tr>
                        <td colspan="5"  align="center">There are no Priorities,<a href="{{route('priorities.create')}}">Add New</a></td>
                    </tr>
                @else
                    @foreach($priorities as $priority)
                        <tr>
                            <td>
                                {{$priority->name}}
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('priorities.edit',$priority->id)}}">Edit</a>

                              {{--  <a class="btn btn-danger" href=""   onclick="event.preventDefault();
                                                     confirm('Are Your Sure:');
                                                     document.getElementById('{{$priority->id}}').submit();">
                                    Delete
                                    {!! Form::open(['method'=>'delete','route'=>['priorities.destroy',$priority->id],'id'=>$priority->id,
                                   'style'=>'display: none;'
                                   ]) !!}

                                    {!! Form::close() !!}
                                </a>--}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection