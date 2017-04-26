
<div id="addComment" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Comment</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'POST','route'=>'comments.store']) !!}
                    <!--Textarea-->
                    <div class=form-group>
                        {!! Form::textarea('content',null, ['class' => 'form-control ','id'=>'summertext','placeholder'=>'Add Comment']) !!}
                        {!! Form::text('ticket_id',$ticket->id, ['hidden']) !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
</div>