@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">Create New Ticket</div>
            <div class="panel-body">
            {!! Form::open(['method'=>'POST','route'=>'tickets.store','class'=>'form-horizontal']) !!}

                    <div class="form-group">
                    <label for="name" class="col-md-2 control-label">Subject</label>
                    <div class="col-md-10">
                        {!! Form::text('subject',null, ['class' => 'form-control ','placeholder'=>'Subject']) !!}
                    </div>
                </div>

                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            {!! Form::textarea('content',null, ['class' => 'form-control ','id'=>'summertext','placeholder'=>'Description']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category" class="col-md-2 control-label">Category</label>
                        <div class="col-md-10">
                            {!! Form::select('category_id', $select['category'], null, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="priority_id" class="col-md-2 control-label">Priority</label>
                        <div class="col-md-10">
                            {!! Form::select('priority_id',$select['priority'], null, ['class' => 'form-control'])!!}
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary pull-right">Create</button>

            {!! Form::close() !!}
        </div>
        </div>
    </div>


@endsection

@section('js')
        <script>
        $(document).ready(function() {
            $('#summertext').summernote();
        });
    </script>
@endsection