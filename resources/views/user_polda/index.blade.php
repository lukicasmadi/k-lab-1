@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>POLDA LIST</span>
    </h3>
</div>
@endpush

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

    <div class="row layout-top-spacing" id="cancel-row" style="margin-top: 40px">
        <div class="col-xl-6 col-lg-6 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
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

        <div class="col-lg-6 col-12 roleData">
            <form action="{{ route('polda_access_store') }}" method="POST">
                @csrf
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <input type="hidden" name="polda_id" id="polda_id" value="">

                        <blockquote class="blockquote">
                            <p class="d-inline">Pilih polda untuk memberikan akses ke user</p>
                            <small>Administrator</small>
                        </blockquote>

                        <div class="alert alert-primary d-none" role="alert">
                            Anda akan memberikan akses polda <span id="polda_name"></span> dengan user dibawah. <br>Pilih salah satu kemudian submit pada tombol dibawah list
                        </div>

                        <div id="userList"></div>

                        <input type="submit" class="btn btn-success mb-2 d-none btnSubmit" value="Submit">

                        <br><br>

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
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function() {
    var table = $('#tbl_user_polda').DataTable({
        processing: true,
        serverSide: true,
        pageLength : 34,
        ajax: route('uhp_data'),
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<i class="fas fa-chevron-left dtIconSize"></i>',
                "sNext": '<i class="fas fa-chevron-right dtIconSize"></i>'
            },
            "sInfo": "",
            "sInfoFiltered": "",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> <img src="{{ asset("/img/cloud_down.png") }}">',
            "sSearchPlaceholder": "CARI DATA...",
            "sLengthMenu": "",
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
        $("div.alert").removeClass("d-none")
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