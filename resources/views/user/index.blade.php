@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row layout-top-spacing">
        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                            <h4>User List</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table id="tbl_user" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12  layout-spacing">
            <form action="{{ route('user_store') }}" method="POST">
                @csrf
                <div class="statbox widget box box-shadow">

                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                                <h4 id="lblform">Add New User</h4>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">
                        <input type="hidden" name="id_user" id="id_user" value="">

                        <div id="panelForm">

                            <div class="form-group mb-4">
                                <label><span class="require">*</span>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" autocomplete="off">
                            </div>

                            <div class="form-group mb-4">
                                <label><span class="require">*</span>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" autocomplete="off">
                            </div>

                            <div class="form-group mb-4">
                                <label><span class="require">*</span>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" autocomplete="off">
                                <p class="pNotif d-none showhide">Leave it blank if you don't want to change the password</p>
                            </div>

                            <input type="submit" class="btn btn-success mb-2 btnSubmit" value="Create User">
                            <a href="{{ route('user_index') }}" class="btn mb-2 cancelupdate d-none">Cancel Update</a>
                        </div>

                        <div class="col-md-12 text-center d-none" id="loadingPanel">
                            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/dt-global_style.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/components/custom-sweetalert.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/switches.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
@endpush

@push('page_js')
<script>
$(document).ready(function() {
    var table = $('#tbl_user').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('user_data'),
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<i class="fas fa-arrow-circle-left dtIconSize"></i>',
                "sNext": '<i class="fas fa-arrow-circle-right dtIconSize"></i>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            "sProcessing": '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>',
        },
        order: [
            [0, "desc"]
        ],
        columns: [
            {
                data: 'id',
                visible: false,
                searchable: false
            },
            {
                data: 'name',
            },
            {
                data: 'email',
            },
            {
                data: 'id',
                render: function(data, type, row) {
                    return '<div class="icon-container"><a href="'+route('user_detail', data)+'" data-id="'+data+'" class="confirm"><i class="fas fa-link"></i><span class="ml-5"></span><a href="'+route('user_delete', data)+'" data-id="'+data+'" class="delete"><i class="far fa-trash-alt"></i></a>';
                },
                searchable: false,
                sortable: false,
            }
        ]
    })

    $('#tbl_user tbody').on('click', '.delete', function(e) {
        e.preventDefault()
        var id = $(this).attr('data-id')

        $(".alert").remove()

        swal({
            title: 'Are you sure?',
            text: "Detele this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em',
        }).then(function(result) {
            if (result.value) {
                axios.delete(route('user_delete', id)).then(function(response) {
                    table.ajax.reload()
                    swal('Deleted!', response.data.output, 'success')
                })
                .catch(function(error) {
                    swal("Deletion failed! Maybe you miss something", error.response.data.output, "error")
                })
            }
        })
    })
})

$('#tbl_user tbody').on('click', '.confirm', function(e) {
    e.preventDefault()
    var id = $(this).attr('data-id')

    $(".alert").remove()

    $("#id_user").val(id)
    $("#loadingPanel").removeClass("d-none")
    $("#panelForm").addClass("d-none")
    $(".showhide").addClass("d-none")

    axios.get(route('user_detail', id)).then(function(response) {
        $("input[name='name']").val(response.data.output.name)
        $("input[name='email']").val(response.data.output.email)
        $("input[name='password']").val('')
        $("#loadingPanel").addClass("d-none")
        $("#panelForm").removeClass("d-none")
        $("#lblform").html("Edit "+response.data.output.name+" data")
        $(".showhide").removeClass("d-none")
        $(".btnSubmit").val("Update User")
        $(".cancelupdate").removeClass("d-none")
    })
    .catch(function(error) {
        $("#loadingPanel").addClass("d-none")
        $("#panelForm").removeClass("d-none")
        $(".showhide").removeClass("d-none")
        $(".cancelupdate").removeClass("d-none")
        swal("Error load user list! Please refresh the page and try again", error.response.data.output, "error")
        if (error.response) {
            console.log(error.response.data)
            console.log(error.response.status)
            console.log(error.response.headers)
        } else if (error.request) {
            console.log(error.request)
        } else {
            console.log('Error', error.message)
        }
    })
})
</script>
@endpush