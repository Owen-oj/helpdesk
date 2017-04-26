@extends('layouts.app')
@section('title','Categories')
@section('content')
    <!--Name-->
    <div class="panel panel-default">
        <div class="panel-heading">Category Form</div>
        <div class="panel-body">
            {!! Form::model($category,
                    ['method' => 'put',
                     'route'  => ['categories.update',$category->id],
                     'class'=>'form-horizontal'
                ])!!}
            @include('status._form',['text'=>'Update'])
            {!! Form::close() !!}
        </div>
    </div>


@endsection