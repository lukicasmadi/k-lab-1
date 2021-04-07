@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>MASTER POLDA</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                <div class="col-md-12 text-left mb-3">
                    <div class="text-left">
                        <div class="row">
                            <a id="btnShowModal" class="btn add-operasi" href="{{ route('polda_create') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/></svg>
                            TAMBAH POLDA
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table id="tbl_polda" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Short Name</th>
                                <th>Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/components/custom-sweetalert.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')
<script>
    $(document).ready(function() {
    var table = $('#tbl_polda').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('polda_data'),
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<i class="fas fa-chevron-left dtIconSize"></i>',
                "sNext": '<i class="fas fa-chevron-right dtIconSize"></i>'
            },
            "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> <img src="{{ secure_asset("/img/cloud_down.png") }}">',
            "sSearchPlaceholder": "CARI DATA...",
            "sLengthMenu": " _MENU_ ",
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
                data: 'short_name',
            },
            {
                data: 'logo',
                render: function(data, type, row) {
                    if (_.isEmpty(data)) {
                        return '<td class="text-center"><span><img src="' + route('index') + '/template/assets/img/90x90.jpg" class="profile-img" width="40" height="40"></span></td>'
                    } else {
                        return '<td class="text-center"><span><img src="' + route('index') + '/img/polda/'+data+'" class="profile-img" width="40" height="50"></span></td>'
                    }
                },
                searchable: false,
                sortable: false
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return '<div class="ubah-change"><a href="' + route('polda_edit', data) + '">Ubah</a> <span>|</span> <a href="" uuid="' + data + '" class="confirm">Hapus</a></div>';
                },
                searchable: false,
                sortable: false
            }
        ]
    })

    $('#tbl_polda tbody').on('click', '.confirm', function(e) {
        // var data = table.row(this).data();
        e.preventDefault()
        var uuid = $(this).attr('uuid')

        swal({
            title: 'Are you sure?',
            text: "Detele this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em',
        }).then(function(result) {
            swal.showLoading()
            if (result.value) {
                axios.delete(route('polda_destroy', uuid))
                    .then(function(response) {
                        table.ajax.reload()
                        swal('Deleted!', response.data.output, 'success')
                    })
                    .catch(function(error) {
                        swal("Error deleting!", error.response.data.output, "error")
                        if (error.response) {
                            // Request made and server responded
                            console.log(error.response.data)
                            console.log(error.response.status)
                            console.log(error.response.headers)
                        } else if (error.request) {
                            // The request was made but no response was received
                            console.log(error.request)
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log('Error', error.message)
                        }
                    })
            }
        })
    })
})
</script>
@endpush