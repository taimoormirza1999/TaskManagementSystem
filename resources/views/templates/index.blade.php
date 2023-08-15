@extends('dashboard_applayout')

@section('additional_links')
    <!-- DataTables CSS -->
    {{--  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">  --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">  --}}
</head>
@endsection

@section('content')
<div class="card">
    <h5 class="card-header">Template List</h5>
<div class="card-body">
    <div class="table-responsive">
        <table class="table" id="template-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Due</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" defer></script>
<script>
    // Set the CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#template-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('templates.index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'description', name: 'description' },
                { data: 'due_date', name: 'due_date' },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary edit-button" data-bs-toggle="popover" title="Edit">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-brand delete-button" data-bs-toggle="popover" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ]
        });

        // Initialize popovers
        $('[data-bs-toggle="popover"]').popover({
            trigger: 'hover',
            placement: 'top',
            html: true,
            content: function () {
                return $(this).attr("title");
            }
        });
    });
</script>
@endsection
