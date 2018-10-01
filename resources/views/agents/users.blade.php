@extends('layouts._setup')
@section('title','Users')
@section('page-content')
    <div class="panel panel-default">
        <div class="panel-heading">Users
            <a class="btn btn-primary pull-right" href="#">Create User</a>
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
                @if($users->isEmpty())
                    <tr>
                        <td colspan="5"  align="center">There are no User,<a href="#">Add New</a></td>
                    </tr>
                @else
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                <a class="btn btn-info" href=""   onclick="event.preventDefault();
                                        confirm('Are Your Sure:');
                                        document.getElementById('{{$user->id}}').submit();">
                                    make agent
                                    {!! Form::open(['method'=>'post','route'=>['agents.create',$user->id],'id'=>$user->id,
                                   'style'=>'display: none;'
                                   ]) !!}

                                    {!! Form::close() !!}
                                </a>
                                 <a class="btn btn-info" href=""   onclick="event.preventDefault();
                                        confirm('Are Your Sure:');
                                        document.getElementById('manager-{{$user->id}}').submit();">
                                    make manager
                                    {!! Form::open(['method'=>'post','route'=>['manager.create',$user->id],'id'=>'manager-'.$user->id,
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