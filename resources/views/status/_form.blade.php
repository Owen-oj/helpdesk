
<div class="form-group row">
    {!! Form::label('name', 'Name',['class'=>'col-lg-2 control-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('name',null, ['class' => 'form-control col-lg-6','placeholder'=>'Name']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('color', 'Color',['class'=>'col-lg-2 control-label']) !!}
    <div class="col-lg-6">
        {!! Form::text('color',null, ['class' => 'form-control','placeholder'=>'Color']) !!}

    </div>
</div>

<!--submit button-->
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! Form::button('Back',['class'=>'btn btn-primary' ])!!}
        {!! Form::submit($text,['class'=>'btn btn-primary' ])!!}
    </div>

</div>
