@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>LAPORAN OPERASI</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                @role('access_daerah')
                    <div class="col-md-12 text-left mb-3">
                        <div class="text-left">
                            <div class="row">
                                <a id="btnShowModal" class="btn add-operasi" href="{{ route('phro_create') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/></svg>
                                TAMBAH LAPORAN
                                </a>
                            </div>
                        </div>
                    </div>
                @endrole
                <div class="table-responsive mb-5">
                    <table id="tbl_phro" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="30%">Nama Kesatuan</th>
                                <th width="30%">Status Laporan</th>
                                <th width="20%">Tanggal</th>
                                <th width="6%">Preview</th>
                                <th width="14%">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"><span id="status"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                </div>
                <div id="dataPreview"></div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/animate/animate.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/components/custom-modal.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}"/>
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function () {
    var table = $('#tbl_phro').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('phro_data'),
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<i class="fas fa-chevron-left dtIconSize"></i>',
                "sNext": '<i class="fas fa-chevron-right dtIconSize"></i>'
            },
            "sInfo": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "CARI DATA...",
            "sLengthMenu": " _MENU_ ",
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
                data: 'polda_name',
                name: 'polda.name'
            },
            {
                data: 'status',
            },
            {
                data: 'submited_date',
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="`+route('previewPhro', data)+`" class="previewPhro" data-id="`+data+`">
                            <img src="{{ secure_asset('/img/search.png') }}" width="30%">
                        </a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    if(row['editable'] == true) {
                        return `
                        <div class="ubah-change">
                            <a href="`+route('phro_edit', data)+`">Ubah</a>
                        </div>
                        `;
                    } else {
                        return "";
                    }
                },
                searchable: false,
                sortable: false,
            }
        ]
    })

    $('#tbl_phro tbody').on('click', '.previewPhro', function(e) {
        e.preventDefault()
        var uuid = $(this).attr('data-id')
        $("#dataPreview").hide()
        $(".lds-ring").show()
        $("#status").html("Memuat Data...")
        $('.bd-example-modal-lg').modal('show')

        axios.get(route('previewPhro', uuid)).then(function(response) {
            $('#dataPreview').html(response.data)
            $('#dataPreview').show()
            $("input").attr('type', 'text').attr("readonly", "readonly");
            $(".lds-ring").hide()
            $("#status").html("Preview")
        })
    })

    $('#tbl_phro tbody').on('click', '.delete', function(e) {
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
                axios.delete(route('phro_destroy', id)).then(function(response) {
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
</script>
@endpush