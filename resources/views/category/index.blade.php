@extends('layouts.app')
@section('title','Categories')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Category
            <a class="btn btn-primary pull-right" href="{{route('categories.create')}}">Create Category</a>
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
                @if($categories->isEmpty())
                    <tr>
                        <td colspan="5"  align="center">There are no Categories,<a href="{{route('categories.create')}}">Add New</a></td>
                    </tr>
                @else
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{route('categories.edit',$category->id)}}">Edit</a>

                                <a class="btn btn-danger" href=""   onclick="event.preventDefault();
                                                     confirm('Are Your Sure:');
                                                     document.getElementById('{{$category->id}}').submit();">
                                    Delete
                                    {!! Form::open(['method'=>'delete','route'=>['categories.destroy',$category->id],'id'=>$category->id,
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