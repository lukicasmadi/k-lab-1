@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="page-header mb-25">
        <div class="page-title">
            <h3>
            <svg style="margin-top:-5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20">
  <path id="Union_2" data-name="Union 2" d="M-2852-2201a2,2,0,0,1-2-2v-16a2,2,0,0,1,2-2h7a.118.118,0,0,1,.032.006.131.131,0,0,0,.03.006,1.043,1.043,0,0,1,.259.051l.028.009a.492.492,0,0,1,.066.028.993.993,0,0,1,.293.2l6,6a.98.98,0,0,1,.2.293.639.639,0,0,1,.025.068l.009.026a1,1,0,0,1,.049.258.144.144,0,0,0,.007.027.139.139,0,0,1,0,.028v11a2,2,0,0,1-2,2Zm0-2h12v-10h-5a1,1,0,0,1-1-1v-5h-6Zm8-12h2.586l-2.586-2.586Zm-5.333,10v-2h6.667v2Zm0-4v-2h6.667v2Z" transform="translate(2854 2221)" fill="#00adef"/>
</svg>
            <span>laporan rekap harian</span>
            </h3>
        </div>                    
        <div class="toggle-switch">
            <label class="switch s-icons s-outline  s-outline-secondary">
                <input type="checkbox" checked="" class="theme-shifter" id="changeTheme">
                <span class="slider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="83" height="19.762" viewBox="0 0 83 19.762" class="feather feather-sun">
                    <g id="Group_3821" data-name="Group 3821" transform="translate(-1550 -140)">
                        <text id="gelap" transform="translate(1580 155)" fill="#fff" font-size="16" font-family="Bahnschrift" letter-spacing="0.05em"><tspan x="0" y="0">GELAP</tspan></text>
                        <path id="moon" d="M18.248,17,18,17A11,11,0,0,1,7,6q0-.124,0-.248A8,8,0,1,0,18.248,17Zm1.218-2.116A9.071,9.071,0,0,1,18,15,9,9,0,0,1,9.822,2.238a10,10,0,1,0,11.94,11.94A8.932,8.932,0,0,1,19.466,14.881Z" transform="translate(1548 137.762)" fill="#fff" fill-rule="evenodd"/>
                    </g>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="94" height="20" viewBox="0 0 94 20" class="feather feather-moon">
                    <g id="Group_3823" data-name="Group 3823" transform="translate(-1670 -140)">
                        <text id="terang" transform="translate(1700 155)" fill="#fff" font-size="16" font-family="Bahnschrift" letter-spacing="0.05em"><tspan x="0" y="0">TERANG</tspan></text>
                        <path id="sun" d="M13,22H11V19h2Zm5.364-2.222-2.121-2.121,1.414-1.414,2.122,2.122-1.413,1.413Zm-12.728,0L4.219,18.364l2.12-2.122,1.415,1.414-2.12,2.121ZM12,17.007A5.007,5.007,0,1,1,17.007,12,5.007,5.007,0,0,1,12,17.007Zm0-8.014A3.007,3.007,0,1,0,15.007,12,3.007,3.007,0,0,0,12,8.993ZM22,13H19V11h3ZM5,13H2V11H5ZM17.654,7.758,16.241,6.343l2.121-2.122,1.415,1.415L17.655,7.757Zm-11.313,0L4.221,5.637,5.636,4.223l2.12,2.122L6.342,7.757ZM13,5H11V2h2Z" transform="translate(1668.002 138)" fill="#fff"/>
                    </g>
                    </svg>
                </span>
            </label>
        </div>
    </div>
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content">
                <div class="col-md-12 text-left mb-3">
                    <div class="text-left">
                        <div class="row">
                            <a id="btn-add-notes" class="btn add-operasi" href="javascript:void(0);"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/>
</svg>
 Tambah Laporan
                            </a>
                            <a class="btn del-laporan" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18.001" height="18.001" viewBox="0 0 18.001 18.001">
  <path id="Union_24" data-name="Union 24" d="M-2992-9019a2,2,0,0,1-2-2v-14a2,2,0,0,1,2-2h14a2,2,0,0,1,2,2v14a2,2,0,0,1-2,2Zm0-2h14v-14h-14Zm7-5.586-2.831,2.828-1.415-1.415,2.83-2.828-2.828-2.829,1.413-1.415,2.828,2.828,2.83-2.828,1.415,1.415-2.831,2.829,2.831,2.83-1.415,1.413Z" transform="translate(2994.001 9037.001)" fill="#fff"/>
</svg>
 Hapus Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tbl_operation" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Operasi</th>
                                <th>Operasi</th>
                                <th>Deskripsi</th>
                                <th>TGL Mulai</th>
                                <th>Durasi</th>
                                <th>Lihat</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="notesMailModal" tabindex="-1" role="dialog" aria-labelledby="notesMailModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                            <span class="colorblue">TAMBAH LAPORAN</span>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="row imgpopup">
                                <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                            </div>             
                            </div>             
                                <form action="javascript:void(0);" id="notesMailModalTitle">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <label class="text-popup">nama laporan</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Pilih nama laporan yang Anda butuhkan</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="text-popup">deskripsi laporan</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Tulislah deskripsi laporan yang akan Anda buat</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="text-popup">pilih polda</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Semua Polda</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="text-popup">Data Yang Ditampilkan</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Semua Data</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="text-popup">tahun</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Pilih Tahun</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="text-popup">nama operasi</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Pilih operasi yang akan Anda laksanakan</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                        <div class="col-md-12">
                                        <label class="text-popup">Hari Operasi</label>
                                        <select class="form-control height-form">
                                            <option selected="selected">-   Semua Hari</option>
                                            <option>white</option>
                                            <option>purple</option>
                                        </select>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn-n-add" class="btn">SIMPAN</button>
                    </div>
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
<script src="{{ secure_asset('template/assets/js/apps/notes.js') }}"></script>
@endpush

@push('page_js')
<script>
    
    $(document).ready(function () {
        var table = $('#tbl_operation').DataTable({
            processing: true,
            serverSide: true,
            columnDefs: [
                {
                    className: "tengah", "targets": [6]
                }
            ],
            ajax: route('operation_plan_data'),
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<i class="fas fa-chevron-left dtIconSize"></i>',
                    "sNext": '<i class="fas fa-chevron-right dtIconSize"></i>'
                },
                "sInfo": "Menampilkan _PAGE_ hingga 12 dari _PAGES_ baris",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> <img src="{{ secure_asset("/img/cloud_down.png") }}">',
                "sSearchPlaceholder": "CARI DATA...",
                "sLengthMenu": " _MENU_ Baris per halaman",
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
                    data: 'operation_type',
                    render: function(data, type, row) {
                        return ifEmptyData(data);
                    },
                },
                {
                    data: 'desc',
                    render: function(data, type, row) {
                        return ifEmptyData(data);
                    },
                    sortable: false
                },
                {
                    data: 'start_date',
                },
                {
                    data: 'end_date',
                },
                {
                    data: 'attachement',
                    render: function(data, type, row) {
                        return operationDownload(data);
                    },
                    sortable: false,
                    searchable: false,
                },
                {
                    data: 'uuid',
                    render: function(data, type, row) {
                        return `
                        <div class="icon-container">
                            <a href="`+route('rencana_operasi_edit', data)+`"><i class="far fa-edit"></i></a> <a href="`+route('rencana_operasi_destroy', data)+`" class="delete" data-id="`+data+`"><i class="far fa-trash-alt"></i><span class="icon-name"></span></a>
                        </div>
                        `;
                    },
                    searchable: false,
                    sortable: false,
                }
            ]
        })

        $('#tbl_operation tbody').on('click', '.delete', function(e) {
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
                    axios.delete(route('rencana_operasi_destroy', id)).then(function(response) {
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