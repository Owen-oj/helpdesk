@extends('layouts.app')
@section('title','Categories')
@section('content')
    <!--Name-->
    <div class="panel panel-default">
        <div class="panel-heading">Priority Form</div>
        <div class="panel-body">
            {!! Form::open(['route'=>'priorities.store','method'=>'post','class'=>'form-horizontal']) !!}
            @include('status._form',['text'=>'Add'])
            {!! Form::close() !!}
        </div>
    </div>


@endsection