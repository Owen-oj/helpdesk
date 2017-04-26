@extends('layouts.app')
@section('title','Categories')
@section('content')
    <!--Name-->
    <div class="panel panel-default">
        <div class="panel-heading">Category Form</div>
        <div class="panel-body">
            {!! Form::open(['route'=>'categories.store','method'=>'post','class'=>'form-horizontal']) !!}
                    @include('status._form',['text'=>'Add'])
            {!! Form::close() !!}
        </div>
    </div>

@endsection