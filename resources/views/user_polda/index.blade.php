@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    @if ($errors->any())
        <div class="alert alert-danger custom mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-6 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table id="tbl_user_polda" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Polda</th>
                                <th>Jurisdiction</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12  layout-spacing roleData">
            <form action="{{ route('polda_access_store') }}" method="POST">
                @csrf
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Assign User To <span id="polda_name"></span></h4>
                            </div>
                        </div>
                    </div>

                    <div class="widget-content widget-content-area">

                        <input type="hidden" name="polda_id" id="polda_id" value="">

                        <div id="userList">
                            <div class="col-xl-12 mx-auto">
                                <blockquote class="blockquote">
                                    <p class="d-inline">Use the arrows to open data in the right pane</p>
                                    <small>Administrator</small>
                                </blockquote>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success mb-2 d-none btnSubmit" value="Submit">

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
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/font-icons/fontawesome/css/regular.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/switches.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function() {
    var table = $('#tbl_user_polda').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('uhp_data'),
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
        columns: [{
                data: 'id',
                visible: false,
                searchable: false
            },
            {
                data: 'name',
            },
            {
                data: 'jurisdiction',
            },
            {
                data: 'id',
                render: function(data, type, row) {
                    return '<div class="icon-container"><a class="confirm" data-id="'+data+'" href="' + route('check_user_polda', data) + '"><i class="far fa-arrow-alt-circle-right"></i>';
                },
                searchable: false,
                sortable: false
            }
        ]
    })


    $('#tbl_user_polda tbody').on('click', '.confirm', function(e) {
        e.preventDefault()

        $("#polda_name").empty().html("<mark>"+table.row($(this).parents('tr') ).data().name+"</mark>")
        var id = $(this).attr('data-id')
        $("#polda_id").val(id)

        $("#userList").empty()
        $("div.alert").hide()
        $("#userList, .btnSubmit").addClass("d-none")

        $("#loadingPanel").removeClass("d-none")

        axios.get(route('check_user_polda', id)).then(function(response) {
            var output = response.data.users

            $.each(output, function(key, value) {

                if(value.checked == "yes") {
                    var html = `
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <div class="n-chk align-self-end">
                                    <label class="new-control new-radio radio-info" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                    <input type="radio" class="new-control-input" id="`+value.id+`" name="user_assign" value="`+value.id+`" checked>
                                    <span class="new-control-indicator"></span>
                                </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="`+value.name+`" aria-label="radio" value="`+value.name+`" readonly>
                    </div>
                    `;
                } else {
                    var html = `
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <div class="n-chk align-self-end">
                                    <label class="new-control new-radio radio-info" style="height: 21px; margin-bottom: 0; margin-right: 0">
                                    <input type="radio" class="new-control-input" id="`+value.id+`" name="user_assign" value="`+value.id+`">
                                    <span class="new-control-indicator"></span>
                                </label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="`+value.name+`" aria-label="radio" value="`+value.name+`" readonly>
                    </div>
                    `;
                }

                $("#userList").append(html);

                // $("input#"+value.id).prop("checked", true)
            });

            $("#userList, .btnSubmit").removeClass("d-none");
            $("#loadingPanel").addClass("d-none");

        })
        .catch(function(error) {
            $("#loadingPanel").addClass("d-none")
            swal("Error load user roles! Please refresh the page and try again", error.response.data.output, "error")
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
})
</script>
@endpush