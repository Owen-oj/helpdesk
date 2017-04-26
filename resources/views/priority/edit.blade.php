@extends('layouts.app')
@section('title','Categories')
@section('content')
    <!--Name-->
    <div class="panel panel-default">
        <div class="panel-heading">Priority Form</div>
        <div class="panel-body">
            {!! Form::model($priority,
                    ['method' => 'put',
                     'route'  => ['priorities.update',$priority->id],
                     'class'=>'form-horizontal'
                ])!!}
            @include('status._form',['text'=>'Update'])
            {!! Form::close() !!}
        </div>
    </div>


@endsection