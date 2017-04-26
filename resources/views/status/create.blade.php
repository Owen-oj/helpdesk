@extends('layouts.app')

@section('content')
    <!--Name-->
    <div class="panel panel-default">
        <div class="panel-heading">Status Form</div>
        <div class="panel-body">
            {!! Form::open(['route'=>'statuses.store','method'=>'post','class'=>'form-horizontal']) !!}
            @include('status._form',['text'=>'Add'])
            {!! Form::close() !!}
        </div>
    </div>


@endsection