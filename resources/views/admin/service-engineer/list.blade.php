@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Service Engineers</h2>
                    <a href="{{route('service-engineers.create')}}"><button type="button" class="mb-1 btn btn-pill btn-primary">Add</button></a>
                   
                </div>
                <div class="card-body">
                    <table class="table" id="serviceEng">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact No</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                      </table>
                      
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>

    <script type="text/javascript">
        $(function() {
            $('#serviceEng').DataTable({
                ajax: {
                    url: "{{ route('service-engineers.index') }}",
                   
                },
                paging: true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable:false,
                        orderable:false

                    },
                    {
                        data: 'image',
                        name: 'image',
                        searchable:false,
                        orderable:false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        searchable:true,
                        orderable:true
                    },
                    {
                        data: 'email',
                        name: 'email',
                        searchable:true,
                        orderable:true,
                    },
                    {
                        data: 'contact_no',
                        name: 'contact_no',
                        searchable:true,
                        orderable:true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable:true,
                        orderable:false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable:false
                    },
                ]

            });
            $("body").on('click', '.deleteUser', function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                // Get the CSRF token value from the meta tag in your HTML
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                Swal.fire({
                    html: 'You want to delete!',
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "delete",
                            url: '{{ url('admin/service-engineers') }}' + "/" + id,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
                            },
                            success: function(data) {
                                var dataTable = $('#serviceEng').DataTable();
                                dataTable.ajax.reload();

                            },
                            error: function(data) {
                                var dataTable = $('#serviceEng').DataTable();
                                dataTable.ajax.reload();

                            }
                        });
                        Swal.fire(
                            '',
                            'User Deleted Successfully.',
                            'success'
                        )
                    }
                });
            });

        });
    </script>
@endsection
