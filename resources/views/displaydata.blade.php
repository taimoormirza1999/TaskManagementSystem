@extends('dashboard_applayout')

@section('additional_links')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
    <style>
        .btn-group,
        .btn-group-vertical {
            display: flex !important;
        }

        .btn-secondary {
            margin: 0.5%;
            color: #fff;
            background-color: #5969ff;
            border-color: #5969ff;
        }

        .btn-secondary:hover {
            color: #2e2f39;
            background-color: #efb63e;
            border-color: #efb63e;
        }


        .paginate_button {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            line-height: 1.5;
            font-size: 14px;
            padding: 9px 16px;
            border-radius: 2px;


        transition: color .15s ease-in-out,
        background-color .15s ease-in-out,
        border-color .15s ease-in-out,
        box-shadow .15s ease-in-out;
        }



        @media (max-width: 600px) {

            .btn-group,
            .btn-group-vertical {
                align-items: center;
                justify-content: center;
            }

            .btn-secondary {
                margin: 2%;
            }
        }
    </style>
    <div class="card">
        <h5 class="card-header">
            @if (request()->is('templates*'))
            Templates List
            @elseif (request()->is('user/task-board*'))
                Task Board List
            @elseif (request()->is('users*'))
                Users List
            @elseif (request()->is('projects*'))
                Project List
            @endif
        </h5>
        <div class="card-body">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            @if (request()->is('templates*'))
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Due Date</th>
                            @elseif (request()->is('users*'))
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            @elseif (request()->is('projects*'))
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Template Title</th>
                                <th scope="col">Assigned User</th>
                            @elseif (request()->is('user/task-board*'))
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Project Template Title</th>
                            <th scope="col">Number of Task Notes</th>
                            <th scope="col">Status</th>
                            @endif
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer>
    </script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js" defer></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js" defer></script>
    <script>
        $(document).ready(function() {
            // Set the CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ request()->fullUrl() }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    @if (request()->is('templates*'))
                        {
                            data: 'title',
                            name: 'title'
                        }, {
                            data: 'description',
                            name: 'description'
                        }, {
                            data: 'due_date',
                            name: 'due_date'
                        },{
                            data: null,
                            render: function(data, type, row) {

                                return `
                                <div class="btn-group" role="group">
                                    <a href="templates/${row.id}">
                                        <button type="button" class="btn btn-primary edit-button" data-bs-toggle="popover" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    <form action="templates/${row.id}" method="POST">
                                         @csrf
        @method('DELETE')
                                    <button type="submit" class="btn btn-brand delete-button" data-bs-toggle="popover" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                </div>
                            `;}
                        }
                    ],
                    @elseif (request()->is('users*')) {
                            data: 'name',
                            name: 'name'
                        }, {
                            data: 'email',
                            name: 'email'
                        },{
                            data: null,
                            render: function(data, type, row) {

                                return `
                                <div class="btn-group" role="group">
                                    <a href="users/${row.id}">
                                        <button type="button" class="btn btn-primary edit-button" data-bs-toggle="popover" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    <form action="users/${row.id}" method="POST">
                                         @csrf
        @method('DELETE')
                                    <button type="submit" class="btn btn-brand delete-button" data-bs-toggle="popover" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                </div>
                            `;}
                        }
                    ],
                    @elseif (request()->is('user/task-board*'))
                    {
                        data: 'title',
                        name: 'title'
                    }, {
                        data: 'description',
                        name: 'description'
                    }, {
                        data: 'due_date',
                        name: 'due_date'
                    }, {
                        data: 'template_title',
                        name: 'template.title'
                    },
                    {
                        data: 'note_count',
                        name: 'note_count'
                    },
                    {
                        data: 'project_status',
                        name: 'project_status'
                    },{
                            data: null,
                            render: function(data, type, row) {

                                return `
                                <div class="btn-group" role="group">
                                    <a href="/user/projects/${row.id}/create-note">
                                        <button type="button" class="btn btn-primary edit-button" data-bs-toggle="popover" title="Add your note" >
                                            <i class="fas fa-comment-dots"></i>
                                        </button>
                                    </a>
                                        <form action="/user/projects/${row.id}/markcomplete" method="POST">
                                        @csrf
                                  <button type="submit"  class="btn btn-success delete-button" data-bs-toggle="popover" title="Mark as Complete"t>
                                            {{--  <i class="fas fa-comment-dots"></i>  --}}
                                            <i class="fas fa-check-circle text-light  "></i>
                                        </button>
                                    </form>

                                </div>
                            `;}
                        }
                    ],
                    @elseif (request()->is('projects*')) {
                            data: 'title',
                            name: 'title'
                        }, {
                            data: 'description',
                            name: 'description'
                        }, {
                            data: 'due_date',
                            name: 'due_date'
                        }, {
                            data: 'template_title',
                            name: 'template.title'
                        }, {
                            data: 'user_name',
                            name: 'user_name'
                        },{
                            data: null,
                            render: function(data, type, row) {

                                return `
                                <div class="btn-group" role="group">
                                    <a href="projects/${row.id}">
                                        <button type="button" class="btn btn-primary edit-button" data-bs-toggle="popover" title="Edit">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    <form action="projects/${row.id}" method="POST">
                                         @csrf
        @method('DELETE')
                                    <button type="submit" class="btn btn-brand delete-button" data-bs-toggle="popover" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                </div>
                            `;}
                        }
                    ],
                    @endif

                dom: 'Bfrtip', // Add the Buttons extension
                buttons: [
                    'copy', // Optional: Include other buttons as needed
                    'excel',
                    'pdf',
                    {
                        extend: 'csvHtml5', // Download as CSV
                        text: 'Download CSV', // Button text
                        className: 'btn btn-brand', // Button class
                    },
                    'print'
                ],
            });

            // Initialize popovers
            $('[data-bs-toggle="popover"]').popover({
                trigger: 'hover',
                placement: 'top',
                html: true,
                content: function() {
                    return $(this).attr("title");
                }
            });
        });
    </script>
@endsection
