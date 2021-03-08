@extends('layouts.template_admin')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing blendingimg">
                        @if (poldaAlreadyInputToday())
                            <div class="grid-polda line glowblue" style="display: block; margin: 0 auto;">Sudah Mengirimkan</div>
                        @else
                            <div class="grid-polda line glowred" style="display: block; margin: 0 auto;">Belum Mengirimkan</div>
                        @endif
                        <img src="{{ secure_asset('/img/polda/'.poldaImage()->polda->logo) }}" width="100%" style="display: block; margin: 0 auto;">
                    </div>
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="widget-heading">
                                    <h5 class="mar20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                    </svg>
                                    <span>TOTAL LAPORAN</span>
                                    </h5>
                                    <p>DATA LAPORAN MINGGUAN</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="widget-heading">
                                    <h5 class="mar20">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path id="pie_chart_outline" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM11,4.062A8,8,0,1,0,16.419,18.67l-.1.071.094-.065.059-.041.064-.045.016-.011.009-.007-5.128-5.13A1.51,1.51,0,0,1,11,12.379ZM13.829,13l4.227,4.227.007-.008.005-.006-.01.011A7.944,7.944,0,0,0,19.938,13ZM13,4.062V11h6.938A8,8,0,0,0,13,4.062Z" transform="translate(-2 -2)" fill="#00adef"/>
                                    </svg>
                                    <span>TOTAL LAPORAN</span>
                                    </h5>
                                    <p>DATA LAPORAN KESELURUHAN</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <img src="{{ secure_asset('/img/line-polda.png') }}" width="100%">
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tbl_polda_submited" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA LAPORAN</th>
                                <th>TANGGAL</th>
                                <th>JAM</th>
                                <th>PREVIEW</th>
                                <th>PILIHAN</th>
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
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
@endpush

@push('page_js')
<script>
$(document).ready(function () {
    var table = $('#tbl_polda_submited').DataTable({
        processing: true,
        serverSide: true,
        ajax: route('phro_polda_data'),
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
                data: 'operation_name',
                name: 'rencanaOperasi.name'
            },
            {
                data: 'submited_date',
                name: 'created_at'
            },
            {
                data: 'time_created',
                name: 'created_at'
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="`+route('previewPhro', data)+`" class="previewPhro" data-id="`+data+`"><i class="far fa-file-search"></i></a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="`+route('report_daily_by_id', data)+`">Unduh</a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            },
        ]
    })
})

$('#tbl_polda_submited tbody').on('click', '.previewPhro', function(e) {
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
</script>
@endpush