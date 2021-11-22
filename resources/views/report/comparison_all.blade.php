@extends('layouts.template_admin')
@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>LAPORAN OPERASI PERPOLDA</span>
    </h3>
</div>
@endpush
@section('content')
<div class="layout-px-spacing">
    @if ($errors->any())
        <div class="alert alert-danger custom">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row layout-top-spacing">

        <div class="col-lg-12 col-12">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-content">

                    <form action="{{ route('report_all_polda_detail_process') }}" id="comparison_form" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-popup">Pilih Operasi</label>
                                <select class="form-control form-custom height-form" name="operation_id" id="operation_id">
                                    <option value=""> - Pilih Nama Operasi</option>
                                    @foreach($rencanaOperasi as $key => $val)
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="text-popup">Pilih Tahun Pembanding 1</label>
                                <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control form-custom height-form">
                                    @foreach($prevYear as $py){
                                        <option value="{{ $py }}">{{ $py }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="text-popup">Pilih Tahun Pembanding 2</label>
                                <select id="tahun_pembanding_kedua" name="tahun_pembanding_kedua" class="form-control form-custom height-form">
                                    @foreach($currentYear as $cy){
                                        <option value="{{ $cy }}">{{ $cy }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 pembanding d-none">
                                <label class="text-popup">Pilih Range Hari Awal</label>
                                <input id="tanggal_pembanding_pertama" name="tanggal_pembanding_pertama" class="form-control popoups inp-icon active form-control-lg" type="text" placeholder="- Pilih Tanggal -" autocomplete="off">
                            </div>

                            <div class="col-md-6 pembanding d-none">
                                <label class="text-popup">Pilih Range Hari Akhir</label>
                                <input id="tanggal_pembanding_kedua" name="tanggal_pembanding_kedua" class="form-control popoups inp-icon active form-control-lg" type="text" placeholder="- Pilih Tanggal -" autocomplete="off">
                            </div>

                            <div class="col-md-12">
                                <input type="submit" name="btnUnduhData" id="btnUnduhData" class="mt-4 mb-4 btn btn-primary" value="Unduh Laporan Perpolda" disabled>
                                &nbsp;&nbsp;&nbsp;
                                <a href="" class="mt-4 mb-4 btn btn-primary disabled" id="btnUnduhLaporanPerpoldaPerhari">Unduh Laporan Perpolda Perhari</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-12 col-12 d-none" id="panelLoading">
            <div class="row">
                <div class="centerContent">
                    <img src="{{ asset('template/assets/img/loader.gif') }}" alt="" srcset="">
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-12">
            <div class="row">
                <div class="widget-content widget-content-area" id="panelDatax"></div>
            </div>
        </div>
    </div>
    <input type="hidden" name="stdate" id="stdate" value="">
    <input type="hidden" name="endate" id="endate" value="">
    <input type="hidden" name="uuid" id="uuid" value="">
</div>

@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
<link href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/custom.css') }}" rel="stylesheet" type="text/css">
<style>
#sheet0 {
    width: 100%;
}
.spaceButton {
    margin-left: 10px;
}
</style>
@endpush

@push('library_js')
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/popup.js') }}"></script>
@endpush

@push('page_js')
<script>

    $(document).on('change', '#tahun_pembanding_pertama, #tahun_pembanding_kedua', function() {
        $("#panelData").empty().addClass("d-none")
    })

    $(document).on('change', '#tanggal_pembanding_pertama', function() {
        $("#stdate").val(this.value)
    })

    $(document).on('change', '#tanggal_pembanding_kedua', function() {
        $("#endate").val(this.value)
        $("#btnUnduhData").prop('disabled', false)
        $("#panelData").empty().addClass("d-none")

        $("a#btnUnduhLaporanPerpoldaPerhari").prop("href", route('report_polda_perday', [
            $('#uuid').val(),
            $('#stdate').val(),
            $('#endate').val()
        ]))

        $("a#btnUnduhLaporanPerpoldaPerhari").removeClass('disabled')

        var locs = [
            route('report_polda_perday_html', {
                uuid: $("#uuid").val(),
                tglStart: $("#stdate").val(),
                tglEnd: $("#endate").val(),
            }),
            route('show_operation_perpolda', {
                operation_id: $("#operation_id").val(),
                tahun_pembanding_pertama: $("#tahun_pembanding_pertama").val(),
                tahun_pembanding_kedua: $("#tahun_pembanding_kedua").val(),
                tanggal_pembanding_pertama: $("#tanggal_pembanding_pertama").val(),
                tanggal_pembanding_kedua: $("#tanggal_pembanding_kedua").val(),
            })
        ];

        for (let i = 0; i < locs.length; i++) {
            window.open(locs[i])
        }

        // popupCenter({
        //     url: route('show_operation_perpolda', {
        //         operation_id: $("#operation_id").val(),
        //         tahun_pembanding_pertama: $("#tahun_pembanding_pertama").val(),
        //         tahun_pembanding_kedua: $("#tahun_pembanding_kedua").val(),
        //         tanggal_pembanding_pertama: $("#tanggal_pembanding_pertama").val(),
        //         tanggal_pembanding_kedua: $("#tanggal_pembanding_kedua").val(),
        //     }),
        //     title: 'Detail',
        //     w: 1000, h: 600
        // })
    })

    $(document).on('change', '#operation_id', function(e) {
        e.preventDefault()

        $(".pembanding").addClass("d-none")
        $('#tanggal_pembanding_pertama').val('')
        $('#tanggal_pembanding_kedua').val('')
        $("#btnUnduhData").prop('disabled', true)

        $("a#btnUnduhLaporanPerpoldaPerhari").prop("href", "")
        $("a#btnUnduhLaporanPerpoldaPerhari").addClass('disabled')

        $('#uuid').val(''),
        $('#stdate').val(''),
        $('#endate').val('')

        if($(this).val()) {
            axios.get(route('operation_plan_show', $(this).val()))
            .then(function (response) {

                var startDate = response.data.start_date
                var endDate = response.data.end_date
                var uuid = response.data.uuid

                $(".pembanding").removeClass("d-none")

                $('#uuid').val(uuid)

                var minDate = new Date(startDate)
                var maxDate = new Date(endDate)

                $('#tanggal_pembanding_pertama').datepicker('setStartDate', minDate)
                $('#tanggal_pembanding_pertama').datepicker('setEndDate', maxDate)

                $('#tanggal_pembanding_kedua').datepicker('setStartDate', minDate)
                $('#tanggal_pembanding_kedua').datepicker('setEndDate', maxDate)
            })
            .catch(function (error) {
                $(".pembanding").addClass("d-none")
                $("a#btnUnduhLaporanPerpoldaPerhari").prop("href", "")
                swal("Data tidak ditemukan. Silakan periksa data yang akan diproses", null, "error")
            })
        }
    })

    $(document).ready(function () {

        $("#tanggal_pembanding_pertama").datepicker({
            todayBtn:  1,
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
        })

        $("#tanggal_pembanding_kedua").datepicker({
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function (selected) {
            if($("#tahun_pembanding_pertama").val() != "") {
                $("#btnUnduhData").prop('disabled', false)
            }
        })
    })
</script>
@endpush