<table class="table table-striped table-hover" id="users-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Last Updated</th>
        <th>Agent</th>
        @role((['admin','agent']))
        <th>Priority</th>
        <th>Owner</th>
        <th>Category</th>
        @endrole
    </tr>
    </thead>
</table>

@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
            ajax: '{{  route('tickets.indextable',$completed) }}',
            processing: true,
            serverSide: true,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'subject', name: 'Subject' },
                { data: 'statuses.name', name: 'statuses.name' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'agents.name', name: 'agents.name' },
                @role((['admin','agent']))
                { data: 'priorities.name', name: 'priorities.name' },
                { data: 'owners.name', name: 'owners.name' },
                { data: 'categories.name', name: 'categories.name' },
                @endrole
            ]
        });
    });
</script>
@endpush