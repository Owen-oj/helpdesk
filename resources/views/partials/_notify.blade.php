
@if(session('message'))
    <script>
        swal("Great", "{{session('message')}}", "success");
    </script>
@endif


@if(session('error'))
    <script>
        swal("Great", "{{session('error')}}", "error");
    </script>
@endif

<script>
    function confirmDelete(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById(id).submit()
                } else {
                    swal("Cancelled");
                }
            });
    }

    function confirmUpdate(id) {
        swal({
            title: "Are you sure?",
            text: "You are about changing the status!",
            icon: "warning",
            buttons: true,
            dangerMode: false,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById(id).submit()
                } else {
                    swal("Cancelled");
                }
            });
    }
</script>