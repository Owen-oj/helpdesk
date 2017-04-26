@extends('layouts.app')

@section('content')
    <!--Name-->
    <div class="panel panel-default">
        <div class="panel-heading">Status Form</div>
        <div class="panel-body">
            {!! Form::model($status,
                    ['method' => 'put',
                     'route'  => ['statuses.update',$status->id],
                     'class'=>'form-horizontal'
                ])!!}
            @include('status._form',['text'=>'Update'])
            {!! Form::close() !!}
        </div>
    </div>


@endsection