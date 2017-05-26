
<div id="addSolution" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Solution</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['method'=>'POST','route'=>['ticket.solution',$ticket->id]]) !!}
            <!--Textarea-->
                <div class=form-group>
                    {!! Form::textarea('solution',null, ['class' => 'form-control ','id'=>'summer-solution','placeholder'=>'Add Solution']) !!}
                    {!! Form::text('ticket_id',$ticket->id, ['hidden']) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Mark as Complete</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
</div>