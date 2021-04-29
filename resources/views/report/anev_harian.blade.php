@extends('layouts.template_admin')
@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>LAPORAN ANALISA & EVALUASI</span>
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
        <div class="col-lg-12 col-12 mb-25 layout-spacing">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-content mt-3 widget-content-area">

                    <form action="{{ route('report_anev_daily_process') }}" id="form_anev_harian" method="POST">
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

                            <div class="col-md-6 pembanding d-none">
                                <label class="text-popup">Pilih Hari Pembanding 1</label>
                                <input id="tanggal_pembanding_1" name="tanggal_pembanding_1" class="form-control popoups inp-icon active form-control-lg" type="text" placeholder="- Pilih Tanggal -">
                            </div>

                            <div class="col-md-6 pembanding d-none">
                                <label class="text-popup">Pilih Hari Pembanding 2</label>
                                <input id="tanggal_pembanding_2" name="tanggal_pembanding_2" class="form-control popoups inp-icon active form-control-lg" type="text" placeholder="- Pilih Tanggal -">
                            </div>

                            <div class="col-md-6">
                                <input type="submit" name="btnUnduhData" id="btnUnduhData" class="mt-4 mb-4 btn btn-primary" value="Unduh Data">
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-12 col-12 d-none" id="panelLoading">
            <div class="centerContent">
                <img src="{{ asset('template/assets/img/loader.gif') }}" alt="" srcset="">
            </div>
        </div>

        <div class="col-lg-12 col-12">
            <div class="widget-content widget-content-area" id="panelData"></div>
        </div>

    </div>
</div>

@endsection

@push('library_css')
<link href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
<link href="{{ asset('template/custom.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('page_js')
<script>
    function percentageValue(tahunKedua, tahunPertama) {
        var output1 = parseInt(tahunKedua) - parseInt(tahunPertama)
        var output2 = parseInt(output1) / parseInt(tahunPertama)
        var output3 = parseInt(output2) * 100
        var output4 = Math.round(parseInt(output3), 2)

        if(!output4) {
            return "-"
        } else {
            return output4+"%";
        }
    }

    function percentageStatus(tahunKedua, tahunPertama) {
        if(!tahunKedua || !tahunPertama) {
            return "-"
        } else {
            return parseInt(tahunKedua) - parseInt(tahunPertama);
        }
    }

    $("#operation_id").on("change", function (e) {
        e.preventDefault()

        $(".pembanding").addClass("d-none")
        $('#tanggal_pembanding_1').val('')
        $('#tanggal_pembanding_2').val('')

        if($(this).val()) {
            axios.get(route('operation_plan_show', $(this).val()))
            .then(function (response) {
                var startDate = response.data.start_date
                var endDate = response.data.end_date

                $(".pembanding").removeClass("d-none")

                $('#tanggal_pembanding_1').datepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
                    startDate: startDate,
                    endDate: endDate,
                })

                $('#tanggal_pembanding_2').datepicker({
                    format: 'yyyy-mm-dd',
                    todayHighlight: true,
                    autoclose: true,
                    startDate: startDate,
                    endDate: endDate,
                })
            })
            .catch(function (error) {
                swal("Data tidak ditemukan. Silakan periksa data yang akan diproses", null, "error")
            })
            $("#btnUnduhData").prop('disabled', false)
        } else {
            $("#btnUnduhData").prop('disabled', true)
        }
    })

    $("#tanggal_pembanding_2").on("change", function (e) {
        e.preventDefault()

        if($(this).val()) {
            var operation_id = $('#operation_id').val()
            var startDate = $('#tanggal_pembanding_1').val()
            var endDate = $(this).val()

            if(operation_id != "" && startDate != "") {
                axios.post(route('comparison_get_data_date_range'), {
                    operation_id: operation_id,
                    start_date: startDate,
                    end_date: endDate,
                })
                .then(function(response) {
                    var dataPrev = response.data.prev
                    var dataCurrent = response.data.current

                    $("#panelLoading").addClass("d-none")
                    $("#panelData").removeClass("d-none")

                    $("#lbl_tahun_prev").html("Tahun "+$("#tahun_pembanding_pertama").val())
                    $("#lbl_tahun_current").html("Tahun "+$("#tahun_pembanding_kedua").val())

                    $("#pelanggaran_lalu_lintas_tilang_p").html(dataPrev.pelanggaran_lalu_lintas_tilang)
                    $("#pelanggaran_lalu_lintas_tilang").html(dataCurrent.pelanggaran_lalu_lintas_tilang)
                    $("#status_pelanggaran_lalin_tilang").html(percentageStatus(dataCurrent.pelanggaran_lalu_lintas_tilang, dataPrev.pelanggaran_lalu_lintas_tilang))
                    $("#persentase_pelanggaran_lalin_tilang").html(percentageValue(dataCurrent.pelanggaran_lalu_lintas_tilang, dataPrev.pelanggaran_lalu_lintas_tilang))

                    $("#pelanggaran_lalu_lintas_teguran_p").html(dataPrev.pelanggaran_lalu_lintas_teguran)
                    $("#pelanggaran_lalu_lintas_teguran").html(dataCurrent.pelanggaran_lalu_lintas_teguran)
                    $("#status_pelanggaran_lalin_teguran").html(percentageStatus(dataCurrent.pelanggaran_lalu_lintas_teguran, dataPrev.pelanggaran_lalu_lintas_teguran))
                    $("#persentase_pelanggaran_lalin_teguran").html(percentageValue(dataCurrent.pelanggaran_lalu_lintas_teguran, dataPrev.pelanggaran_lalu_lintas_teguran))

                    $("#pelanggaran_sepeda_motor_kecepatan_p").html(dataPrev.pelanggaran_sepeda_motor_kecepatan)
                    $("#pelanggaran_sepeda_motor_kecepatan").html(dataCurrent.pelanggaran_sepeda_motor_kecepatan)
                    $("#status_pelanggaran_sepeda_motor_kecepatan").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_kecepatan, dataPrev.pelanggaran_sepeda_motor_kecepatan))
                    $("#persentase_pelanggaran_sepeda_motor_kecepatan").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_kecepatan, dataPrev.pelanggaran_sepeda_motor_kecepatan))

                    $("#pelanggaran_sepeda_motor_helm_p").html(dataPrev.pelanggaran_sepeda_motor_helm)
                    $("#pelanggaran_sepeda_motor_helm").html(dataCurrent.pelanggaran_sepeda_motor_helm)
                    $("#status_pelanggaran_sepeda_motor_helm").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_helm, dataPrev.pelanggaran_sepeda_motor_helm))
                    $("#persentase_pelanggaran_sepeda_motor_helm").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_helm, dataPrev.pelanggaran_sepeda_motor_helm))

                    $("#pelanggaran_sepeda_motor_melawan_arus_p").html(dataPrev.pelanggaran_sepeda_motor_melawan_arus)
                    $("#pelanggaran_sepeda_motor_melawan_arus").html(dataCurrent.pelanggaran_sepeda_motor_melawan_arus)
                    $("#status_pelanggaran_sepeda_motor_melawan_arus").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_melawan_arus, dataPrev.pelanggaran_sepeda_motor_melawan_arus))
                    $("#persentase_pelanggaran_sepeda_motor_melawan_arus").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_melawan_arus, dataPrev.pelanggaran_sepeda_motor_melawan_arus))

                    $("#pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p").html(dataPrev.pelanggaran_sepeda_motor_bonceng_lebih_dari_satu)
                    $("#pelanggaran_sepeda_motor_bonceng_lebih_dari_satu").html(dataCurrent.pelanggaran_sepeda_motor_bonceng_lebih_dari_satu)
                    $("#status_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_bonceng_lebih_dari_satu, dataPrev.pelanggaran_sepeda_motor_bonceng_lebih_dari_satu))
                    $("#persentase_pelanggaran_sepeda_motor_bonceng_lebih_dari_satu").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_bonceng_lebih_dari_satu, dataPrev.pelanggaran_sepeda_motor_bonceng_lebih_dari_satu))

                    $("#pelanggaran_sepeda_motor_marka_menerus_menyalip_p").html(dataPrev.pelanggaran_sepeda_motor_marka_menerus_menyalip)
                    $("#pelanggaran_sepeda_motor_marka_menerus_menyalip").html(dataCurrent.pelanggaran_sepeda_motor_marka_menerus_menyalip)
                    $("#status_pelanggaran_sepeda_motor_marka_menerus_menyalip").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_marka_menerus_menyalip, dataPrev.pelanggaran_sepeda_motor_marka_menerus_menyalip))
                    $("#persentase_pelanggaran_sepeda_motor_marka_menerus_menyalip").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_marka_menerus_menyalip, dataPrev.pelanggaran_sepeda_motor_marka_menerus_menyalip))

                    $("#pelanggaran_sepeda_motor_melanggar_lampu_lalin_p").html(dataPrev.pelanggaran_sepeda_motor_melanggar_lampu_lalin)
                    $("#pelanggaran_sepeda_motor_melanggar_lampu_lalin").html(dataCurrent.pelanggaran_sepeda_motor_melanggar_lampu_lalin)
                    $("#status_pelanggaran_sepeda_motor_melanggar_lampu_lalin").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_melanggar_lampu_lalin, dataPrev.pelanggaran_sepeda_motor_melanggar_lampu_lalin))
                    $("#persentase_pelanggaran_sepeda_motor_melanggar_lampu_lalin").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_melanggar_lampu_lalin, dataPrev.pelanggaran_sepeda_motor_melanggar_lampu_lalin))

                    $("#pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p").html(dataPrev.pelanggaran_sepeda_motor_mengemudikan_tidak_wajar)
                    $("#pelanggaran_sepeda_motor_mengemudikan_tidak_wajar").html(dataCurrent.pelanggaran_sepeda_motor_mengemudikan_tidak_wajar)
                    $("#status_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_mengemudikan_tidak_wajar, dataPrev.pelanggaran_sepeda_motor_mengemudikan_tidak_wajar))
                    $("#persentase_pelanggaran_sepeda_motor_mengemudikan_tidak_wajar").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_mengemudikan_tidak_wajar, dataPrev.pelanggaran_sepeda_motor_mengemudikan_tidak_wajar))

                    $("#pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p").html(dataPrev.pelanggaran_sepeda_motor_syarat_teknis_layak_jalan)
                    $("#pelanggaran_sepeda_motor_syarat_teknis_layak_jalan").html(dataCurrent.pelanggaran_sepeda_motor_syarat_teknis_layak_jalan)
                    $("#status_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_syarat_teknis_layak_jalan, dataPrev.pelanggaran_sepeda_motor_syarat_teknis_layak_jalan))
                    $("#persentase_pelanggaran_sepeda_motor_syarat_teknis_layak_jalan").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_syarat_teknis_layak_jalan, dataPrev.pelanggaran_sepeda_motor_syarat_teknis_layak_jalan))

                    $("#pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p").html(dataPrev.pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam)
                    $("#pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam").html(dataCurrent.pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam)
                    $("#status_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam, dataPrev.pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam))
                    $("#persentase_pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam, dataPrev.pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam))

                    $("#pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p").html(dataPrev.pelanggaran_sepeda_motor_berbelok_tanpa_isyarat)
                    $("#pelanggaran_sepeda_motor_berbelok_tanpa_isyarat").html(dataCurrent.pelanggaran_sepeda_motor_berbelok_tanpa_isyarat)
                    $("#status_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_berbelok_tanpa_isyarat, dataPrev.pelanggaran_sepeda_motor_berbelok_tanpa_isyarat))
                    $("#persentase_pelanggaran_sepeda_motor_berbelok_tanpa_isyarat").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_berbelok_tanpa_isyarat, dataPrev.pelanggaran_sepeda_motor_berbelok_tanpa_isyarat))

                    $("#pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p").html(dataPrev.pelanggaran_sepeda_motor_berbalapan_di_jalan_raya)
                    $("#pelanggaran_sepeda_motor_berbalapan_di_jalan_raya").html(dataCurrent.pelanggaran_sepeda_motor_berbalapan_di_jalan_raya)
                    $("#status_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_berbalapan_di_jalan_raya, dataPrev.pelanggaran_sepeda_motor_berbalapan_di_jalan_raya))
                    $("#persentase_pelanggaran_sepeda_motor_berbalapan_di_jalan_raya").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_berbalapan_di_jalan_raya, dataPrev.pelanggaran_sepeda_motor_berbalapan_di_jalan_raya))

                    $("#pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p").html(dataPrev.pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir)
                    $("#pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir").html(dataCurrent.pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir)
                    $("#status_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir, dataPrev.pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir))
                    $("#persentase_pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir, dataPrev.pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir))

                    $("#pelanggaran_sepeda_motor_melanggar_marka_berhenti_p").html(dataPrev.pelanggaran_sepeda_motor_melanggar_marka_berhenti)
                    $("#pelanggaran_sepeda_motor_melanggar_marka_berhenti").html(dataCurrent.pelanggaran_sepeda_motor_melanggar_marka_berhenti)
                    $("#status_pelanggaran_sepeda_motor_melanggar_marka_berhenti").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_melanggar_marka_berhenti, dataPrev.pelanggaran_sepeda_motor_melanggar_marka_berhenti))
                    $("#persentase_pelanggaran_sepeda_motor_melanggar_marka_berhenti").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_melanggar_marka_berhenti, dataPrev.pelanggaran_sepeda_motor_melanggar_marka_berhenti))

                    $("#pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p").html(dataPrev.pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas)
                    $("#pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas").html(dataCurrent.pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas)
                    $("#status_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas, dataPrev.pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas))
                    $("#persentase_pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas, dataPrev.pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas))

                    $("#pelanggaran_sepeda_motor_surat_surat_p").html(dataPrev.pelanggaran_sepeda_motor_surat_surat)
                    $("#pelanggaran_sepeda_motor_surat_surat").html(dataCurrent.pelanggaran_sepeda_motor_surat_surat)
                    $("#status_pelanggaran_sepeda_motor_surat_surat").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_surat_surat, dataPrev.pelanggaran_sepeda_motor_surat_surat))
                    $("#persentase_pelanggaran_sepeda_motor_surat_surat").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_surat_surat, dataPrev.pelanggaran_sepeda_motor_surat_surat))

                    $("#pelanggaran_sepeda_motor_kelengkapan_kendaraan_p").html(dataPrev.pelanggaran_sepeda_motor_kelengkapan_kendaraan)
                    $("#pelanggaran_sepeda_motor_kelengkapan_kendaraan").html(dataCurrent.pelanggaran_sepeda_motor_kelengkapan_kendaraan)
                    $("#status_pelanggaran_sepeda_motor_kelengkapan_kendaraan").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_kelengkapan_kendaraan, dataPrev.pelanggaran_sepeda_motor_kelengkapan_kendaraan))
                    $("#persentase_pelanggaran_sepeda_motor_kelengkapan_kendaraan").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_kelengkapan_kendaraan, dataPrev.pelanggaran_sepeda_motor_kelengkapan_kendaraan))

                    $("#pelanggaran_sepeda_motor_lain_lain_p").html(dataPrev.pelanggaran_sepeda_motor_lain_lain)
                    $("#pelanggaran_sepeda_motor_lain_lain").html(dataCurrent.pelanggaran_sepeda_motor_lain_lain)
                    $("#status_pelanggaran_sepeda_motor_lain_lain").html(percentageStatus(dataCurrent.pelanggaran_sepeda_motor_lain_lain, dataPrev.pelanggaran_sepeda_motor_lain_lain))
                    $("#persentase_pelanggaran_sepeda_motor_lain_lain").html(percentageValue(dataCurrent.pelanggaran_sepeda_motor_lain_lain, dataPrev.pelanggaran_sepeda_motor_lain_lain))

                    $("#pelanggaran_mobil_kecepatan_p").html(dataPrev.pelanggaran_mobil_kecepatan)
                    $("#pelanggaran_mobil_kecepatan").html(dataCurrent.pelanggaran_mobil_kecepatan)
                    $("#status_pelanggaran_mobil_kecepatan").html(percentageStatus(dataCurrent.pelanggaran_mobil_kecepatan, dataPrev.pelanggaran_mobil_kecepatan))
                    $("#persentase_pelanggaran_mobil_kecepatan").html(percentageValue(dataCurrent.pelanggaran_mobil_kecepatan, dataPrev.pelanggaran_mobil_kecepatan))

                    $("#pelanggaran_mobil_safety_belt_p").html(dataPrev.pelanggaran_mobil_safety_belt)
                    $("#pelanggaran_mobil_safety_belt").html(dataCurrent.pelanggaran_mobil_safety_belt)
                    $("#status_pelanggaran_mobil_safety_belt").html(percentageStatus(dataCurrent.pelanggaran_mobil_safety_belt, dataPrev.pelanggaran_mobil_safety_belt))
                    $("#persentase_pelanggaran_mobil_safety_belt").html(percentageValue(dataCurrent.pelanggaran_mobil_safety_belt, dataPrev.pelanggaran_mobil_safety_belt))

                    $("#pelanggaran_mobil_muatan_overload_p").html(dataPrev.pelanggaran_mobil_muatan_overload)
                    $("#pelanggaran_mobil_muatan_overload").html(dataCurrent.pelanggaran_mobil_muatan_overload)
                    $("#status_pelanggaran_mobil_muatan_overload").html(percentageStatus(dataCurrent.pelanggaran_mobil_muatan_overload, dataPrev.pelanggaran_mobil_muatan_overload))
                    $("#persentase_pelanggaran_mobil_muatan_overload").html(percentageValue(dataCurrent.pelanggaran_mobil_muatan_overload, dataPrev.pelanggaran_mobil_muatan_overload))

                    $("#pelanggaran_mobil_marka_menerus_menyalip_p").html(dataPrev.pelanggaran_mobil_marka_menerus_menyalip)
                    $("#pelanggaran_mobil_marka_menerus_menyalip").html(dataCurrent.pelanggaran_mobil_marka_menerus_menyalip)
                    $("#status_pelanggaran_mobil_marka_menerus_menyalip").html(percentageStatus(dataCurrent.pelanggaran_mobil_marka_menerus_menyalip, dataPrev.pelanggaran_mobil_marka_menerus_menyalip))
                    $("#persentase_pelanggaran_mobil_marka_menerus_menyalip").html(percentageValue(dataCurrent.pelanggaran_mobil_marka_menerus_menyalip, dataPrev.pelanggaran_mobil_marka_menerus_menyalip))

                    $("#pelanggaran_mobil_melawan_arus_p").html(dataPrev.pelanggaran_mobil_melawan_arus)
                    $("#pelanggaran_mobil_melawan_arus").html(dataCurrent.pelanggaran_mobil_melawan_arus)
                    $("#status_pelanggaran_mobil_melawan_arus").html(percentageStatus(dataCurrent.pelanggaran_mobil_melawan_arus, dataPrev.pelanggaran_mobil_melawan_arus))
                    $("#persentase_pelanggaran_mobil_melawan_arus").html(percentageValue(dataCurrent.pelanggaran_mobil_melawan_arus, dataPrev.pelanggaran_mobil_melawan_arus))

                    $("#pelanggaran_mobil_melanggar_lampu_lalin_p").html(dataPrev.pelanggaran_mobil_melanggar_lampu_lalin)
                    $("#pelanggaran_mobil_melanggar_lampu_lalin").html(dataCurrent.pelanggaran_mobil_melanggar_lampu_lalin)
                    $("#status_pelanggaran_mobil_melanggar_lampu_lalin").html(percentageStatus(dataCurrent.pelanggaran_mobil_melanggar_lampu_lalin, dataPrev.pelanggaran_mobil_melanggar_lampu_lalin))
                    $("#persentase_pelanggaran_mobil_melanggar_lampu_lalin").html(percentageValue(dataCurrent.pelanggaran_mobil_melanggar_lampu_lalin, dataPrev.pelanggaran_mobil_melanggar_lampu_lalin))

                    $("#pelanggaran_mobil_mengemudi_tidak_wajar_p").html(dataPrev.pelanggaran_mobil_mengemudi_tidak_wajar)
                    $("#pelanggaran_mobil_mengemudi_tidak_wajar").html(dataCurrent.pelanggaran_mobil_mengemudi_tidak_wajar)
                    $("#status_pelanggaran_mobil_mengemudi_tidak_wajar").html(percentageStatus(dataCurrent.pelanggaran_mobil_mengemudi_tidak_wajar, dataPrev.pelanggaran_mobil_mengemudi_tidak_wajar))
                    $("#persentase_pelanggaran_mobil_mengemudi_tidak_wajar").html(percentageValue(dataCurrent.pelanggaran_mobil_mengemudi_tidak_wajar, dataPrev.pelanggaran_mobil_mengemudi_tidak_wajar))

                    $("#pelanggaran_mobil_syarat_teknis_layak_jalan_p").html(dataPrev.pelanggaran_mobil_syarat_teknis_layak_jalan)
                    $("#pelanggaran_mobil_syarat_teknis_layak_jalan").html(dataCurrent.pelanggaran_mobil_syarat_teknis_layak_jalan)
                    $("#status_pelanggaran_mobil_syarat_teknis_layak_jalan").html(percentageStatus(dataCurrent.pelanggaran_mobil_syarat_teknis_layak_jalan, dataPrev.pelanggaran_mobil_syarat_teknis_layak_jalan))
                    $("#persentase_pelanggaran_mobil_syarat_teknis_layak_jalan").html(percentageValue(dataCurrent.pelanggaran_mobil_syarat_teknis_layak_jalan, dataPrev.pelanggaran_mobil_syarat_teknis_layak_jalan))

                    $("#pelanggaran_mobil_tidak_nyala_lampu_malam_p").html(dataPrev.pelanggaran_mobil_tidak_nyala_lampu_malam)
                    $("#pelanggaran_mobil_tidak_nyala_lampu_malam").html(dataCurrent.pelanggaran_mobil_tidak_nyala_lampu_malam)
                    $("#status_pelanggaran_mobil_tidak_nyala_lampu_malam").html(percentageStatus(dataCurrent.pelanggaran_mobil_tidak_nyala_lampu_malam, dataPrev.pelanggaran_mobil_tidak_nyala_lampu_malam))
                    $("#persentase_pelanggaran_mobil_tidak_nyala_lampu_malam").html(percentageValue(dataCurrent.pelanggaran_mobil_tidak_nyala_lampu_malam, dataPrev.pelanggaran_mobil_tidak_nyala_lampu_malam))

                    $("#pelanggaran_mobil_berbelok_tanpa_isyarat_p").html(dataPrev.pelanggaran_mobil_berbelok_tanpa_isyarat)
                    $("#pelanggaran_mobil_berbelok_tanpa_isyarat").html(dataCurrent.pelanggaran_mobil_berbelok_tanpa_isyarat)
                    $("#status_pelanggaran_mobil_berbelok_tanpa_isyarat").html(percentageStatus(dataCurrent.pelanggaran_mobil_berbelok_tanpa_isyarat, dataPrev.pelanggaran_mobil_berbelok_tanpa_isyarat))
                    $("#persentase_pelanggaran_mobil_berbelok_tanpa_isyarat").html(percentageValue(dataCurrent.pelanggaran_mobil_berbelok_tanpa_isyarat, dataPrev.pelanggaran_mobil_berbelok_tanpa_isyarat))

                    $("#pelanggaran_mobil_berbalapan_di_jalan_raya_p").html(dataPrev.pelanggaran_mobil_berbalapan_di_jalan_raya)
                    $("#pelanggaran_mobil_berbalapan_di_jalan_raya").html(dataCurrent.pelanggaran_mobil_berbalapan_di_jalan_raya)
                    $("#status_pelanggaran_mobil_berbalapan_di_jalan_raya").html(percentageStatus(dataCurrent.pelanggaran_mobil_berbalapan_di_jalan_raya, dataPrev.pelanggaran_mobil_berbalapan_di_jalan_raya))
                    $("#persentase_pelanggaran_mobil_berbalapan_di_jalan_raya").html(percentageValue(dataCurrent.pelanggaran_mobil_berbalapan_di_jalan_raya, dataPrev.pelanggaran_mobil_berbalapan_di_jalan_raya))

                    $("#pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p").html(dataPrev.pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir)
                    $("#pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir").html(dataCurrent.pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir)
                    $("#status_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir").html(percentageStatus(dataCurrent.pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir, dataPrev.pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir))
                    $("#persentase_pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir").html(percentageValue(dataCurrent.pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir, dataPrev.pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir))

                    $("#pelanggaran_mobil_melanggar_marka_berhenti_p").html(dataPrev.pelanggaran_mobil_melanggar_marka_berhenti)
                    $("#pelanggaran_mobil_melanggar_marka_berhenti").html(dataCurrent.pelanggaran_mobil_melanggar_marka_berhenti)
                    $("#status_pelanggaran_mobil_melanggar_marka_berhenti").html(percentageStatus(dataCurrent.pelanggaran_mobil_melanggar_marka_berhenti, dataPrev.pelanggaran_mobil_melanggar_marka_berhenti))
                    $("#persentase_pelanggaran_mobil_melanggar_marka_berhenti").html(percentageValue(dataCurrent.pelanggaran_mobil_melanggar_marka_berhenti, dataPrev.pelanggaran_mobil_melanggar_marka_berhenti))

                    $("#pelanggaran_mobil_tidak_patuh_perintah_petugas_p").html(dataPrev.pelanggaran_mobil_tidak_patuh_perintah_petugas)
                    $("#pelanggaran_mobil_tidak_patuh_perintah_petugas").html(dataCurrent.pelanggaran_mobil_tidak_patuh_perintah_petugas)
                    $("#status_pelanggaran_mobil_tidak_patuh_perintah_petugas").html(percentageStatus(dataCurrent.pelanggaran_mobil_tidak_patuh_perintah_petugas, dataPrev.pelanggaran_mobil_tidak_patuh_perintah_petugas))
                    $("#persentase_pelanggaran_mobil_tidak_patuh_perintah_petugas").html(percentageValue(dataCurrent.pelanggaran_mobil_tidak_patuh_perintah_petugas, dataPrev.pelanggaran_mobil_tidak_patuh_perintah_petugas))

                    $("#pelanggaran_mobil_surat_surat_p").html(dataPrev.pelanggaran_mobil_surat_surat)
                    $("#pelanggaran_mobil_surat_surat").html(dataCurrent.pelanggaran_mobil_surat_surat)
                    $("#status_pelanggaran_mobil_surat_surat").html(percentageStatus(dataCurrent.pelanggaran_mobil_surat_surat, dataPrev.pelanggaran_mobil_surat_surat))
                    $("#persentase_pelanggaran_mobil_surat_surat").html(percentageValue(dataCurrent.pelanggaran_mobil_surat_surat, dataPrev.pelanggaran_mobil_surat_surat))

                    $("#pelanggaran_mobil_kelengkapan_kendaraan_p").html(dataPrev.pelanggaran_mobil_kelengkapan_kendaraan)
                    $("#pelanggaran_mobil_kelengkapan_kendaraan").html(dataCurrent.pelanggaran_mobil_kelengkapan_kendaraan)
                    $("#status_pelanggaran_mobil_kelengkapan_kendaraan").html(percentageStatus(dataCurrent.pelanggaran_mobil_kelengkapan_kendaraan, dataPrev.pelanggaran_mobil_kelengkapan_kendaraan))
                    $("#persentase_pelanggaran_mobil_kelengkapan_kendaraan").html(percentageValue(dataCurrent.pelanggaran_mobil_kelengkapan_kendaraan, dataPrev.pelanggaran_mobil_kelengkapan_kendaraan))

                    $("#pelanggaran_mobil_lain_lain_p").html(dataPrev.pelanggaran_mobil_lain_lain)
                    $("#pelanggaran_mobil_lain_lain").html(dataCurrent.pelanggaran_mobil_lain_lain)
                    $("#status_pelanggaran_mobil_lain_lain").html(percentageStatus(dataCurrent.pelanggaran_mobil_lain_lain, dataPrev.pelanggaran_mobil_lain_lain))
                    $("#persentase_pelanggaran_mobil_lain_lain").html(percentageValue(dataCurrent.pelanggaran_mobil_lain_lain, dataPrev.pelanggaran_mobil_lain_lain))

                    $("#pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p").html(dataPrev.pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat)
                    $("#pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat").html(dataCurrent.pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat)
                    $("#status_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat").html(percentageStatus(dataCurrent.pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat, dataPrev.pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat))
                    $("#persentase_pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat").html(percentageValue(dataCurrent.pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat, dataPrev.pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat))

                    $("#barang_bukti_yg_disita_sim_p").html(dataPrev.barang_bukti_yg_disita_sim)
                    $("#barang_bukti_yg_disita_sim").html(dataCurrent.barang_bukti_yg_disita_sim)
                    $("#status_barang_bukti_yg_disita_sim").html(percentageStatus(dataCurrent.barang_bukti_yg_disita_sim, dataPrev.barang_bukti_yg_disita_sim))
                    $("#persentase_barang_bukti_yg_disita_sim").html(percentageValue(dataCurrent.barang_bukti_yg_disita_sim, dataPrev.barang_bukti_yg_disita_sim))

                    $("#barang_bukti_yg_disita_stnk_p").html(dataPrev.barang_bukti_yg_disita_stnk)
                    $("#barang_bukti_yg_disita_stnk").html(dataCurrent.barang_bukti_yg_disita_stnk)
                    $("#status_barang_bukti_yg_disita_stnk").html(percentageStatus(dataCurrent.barang_bukti_yg_disita_stnk, dataPrev.barang_bukti_yg_disita_stnk))
                    $("#persentase_barang_bukti_yg_disita_stnk").html(percentageValue(dataCurrent.barang_bukti_yg_disita_stnk, dataPrev.barang_bukti_yg_disita_stnk))

                    $("#barang_bukti_yg_disita_kendaraan_p").html(dataPrev.barang_bukti_yg_disita_kendaraan)
                    $("#barang_bukti_yg_disita_kendaraan").html(dataCurrent.barang_bukti_yg_disita_kendaraan)
                    $("#status_barang_bukti_yg_disita_kendaraan").html(percentageStatus(dataCurrent.barang_bukti_yg_disita_kendaraan, dataPrev.barang_bukti_yg_disita_kendaraan))
                    $("#persentase_barang_bukti_yg_disita_kendaraan").html(percentageValue(dataCurrent.barang_bukti_yg_disita_kendaraan, dataPrev.barang_bukti_yg_disita_kendaraan))

                    $("#kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor)
                    $("#kendaraan_yang_terlibat_pelanggaran_sepeda_motor").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor)
                    $("#status_kendaraan_yang_terlibat_pelanggaran_sepeda_motor").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor, dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor))
                    $("#persentase_kendaraan_yang_terlibat_pelanggaran_sepeda_motor").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor, dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor))

                    $("#kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang)
                    $("#kendaraan_yang_terlibat_pelanggaran_mobil_penumpang").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang)
                    $("#status_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang))
                    $("#persentase_kendaraan_yang_terlibat_pelanggaran_mobil_penumpang").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang))

                    $("#kendaraan_yang_terlibat_pelanggaran_mobil_bus_p").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus)
                    $("#kendaraan_yang_terlibat_pelanggaran_mobil_bus").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus)
                    $("#status_kendaraan_yang_terlibat_pelanggaran_mobil_bus").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus))
                    $("#persentase_kendaraan_yang_terlibat_pelanggaran_mobil_bus").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus))

                    $("#kendaraan_yang_terlibat_pelanggaran_mobil_barang_p").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang)
                    $("#kendaraan_yang_terlibat_pelanggaran_mobil_barang").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang)
                    $("#status_kendaraan_yang_terlibat_pelanggaran_mobil_barang").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang))
                    $("#persentase_kendaraan_yang_terlibat_pelanggaran_mobil_barang").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang, dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang))

                    $("#kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus)
                    $("#kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus)
                    $("#status_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus").html(percentageStatus(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus, dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus))
                    $("#persentase_kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus").html(percentageValue(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus, dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus))

                    $("#profesi_pelaku_pelanggaran_pns_p").html(dataPrev.profesi_pelaku_pelanggaran_pns)
                    $("#profesi_pelaku_pelanggaran_pns").html(dataCurrent.profesi_pelaku_pelanggaran_pns)
                    $("#status_profesi_pelaku_pelanggaran_pns").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_pns, dataPrev.profesi_pelaku_pelanggaran_pns))
                    $("#persentase_profesi_pelaku_pelanggaran_pns").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_pns, dataPrev.profesi_pelaku_pelanggaran_pns))

                    $("#profesi_pelaku_pelanggaran_karyawan_swasta_p").html(dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta)
                    $("#profesi_pelaku_pelanggaran_karyawan_swasta").html(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta)
                    $("#status_profesi_pelaku_pelanggaran_karyawan_swasta").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta, dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta))
                    $("#persentase_profesi_pelaku_pelanggaran_karyawan_swasta").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta, dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta))

                    $("#profesi_pelaku_pelanggaran_pelajar_mahasiswa_p").html(dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa)
                    $("#profesi_pelaku_pelanggaran_pelajar_mahasiswa").html(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa)
                    $("#status_profesi_pelaku_pelanggaran_pelajar_mahasiswa").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa, dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa))
                    $("#persentase_profesi_pelaku_pelanggaran_pelajar_mahasiswa").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa, dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa))

                    $("#profesi_pelaku_pelanggaran_pengemudi_supir_p").html(dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir)
                    $("#profesi_pelaku_pelanggaran_pengemudi_supir").html(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir)
                    $("#status_profesi_pelaku_pelanggaran_pengemudi_supir").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir, dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir))
                    $("#persentase_profesi_pelaku_pelanggaran_pengemudi_supir").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir, dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir))

                    $("#profesi_pelaku_pelanggaran_tni_p").html(dataPrev.profesi_pelaku_pelanggaran_tni)
                    $("#profesi_pelaku_pelanggaran_tni").html(dataCurrent.profesi_pelaku_pelanggaran_tni)
                    $("#status_profesi_pelaku_pelanggaran_tni").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_tni, dataPrev.profesi_pelaku_pelanggaran_tni))
                    $("#persentase_profesi_pelaku_pelanggaran_tni").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_tni, dataPrev.profesi_pelaku_pelanggaran_tni))

                    $("#profesi_pelaku_pelanggaran_polri_p").html(dataPrev.profesi_pelaku_pelanggaran_polri)
                    $("#profesi_pelaku_pelanggaran_polri").html(dataCurrent.profesi_pelaku_pelanggaran_polri)
                    $("#status_profesi_pelaku_pelanggaran_polri").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_polri, dataPrev.profesi_pelaku_pelanggaran_polri))
                    $("#persentase_profesi_pelaku_pelanggaran_polri").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_polri, dataPrev.profesi_pelaku_pelanggaran_polri))

                    $("#profesi_pelaku_pelanggaran_lain_lain_p").html(dataPrev.profesi_pelaku_pelanggaran_lain_lain)
                    $("#profesi_pelaku_pelanggaran_lain_lain").html(dataCurrent.profesi_pelaku_pelanggaran_lain_lain)
                    $("#status_profesi_pelaku_pelanggaran_lain_lain").html(percentageStatus(dataCurrent.profesi_pelaku_pelanggaran_lain_lain, dataPrev.profesi_pelaku_pelanggaran_lain_lain))
                    $("#persentase_profesi_pelaku_pelanggaran_lain_lain").html(percentageValue(dataCurrent.profesi_pelaku_pelanggaran_lain_lain, dataPrev.profesi_pelaku_pelanggaran_lain_lain))

                    $("#usia_pelaku_pelanggaran_kurang_dari_15_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun)
                    $("#usia_pelaku_pelanggaran_kurang_dari_15_tahun").html(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun)
                    $("#status_usia_pelaku_pelanggaran_kurang_dari_15_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun, dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_kurang_dari_15_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun, dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun))

                    $("#usia_pelaku_pelanggaran_16_20_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_16_20_tahun)
                    $("#usia_pelaku_pelanggaran_16_20_tahun").html(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun)
                    $("#status_usia_pelaku_pelanggaran_16_20_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun, dataPrev.usia_pelaku_pelanggaran_16_20_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_16_20_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun, dataPrev.usia_pelaku_pelanggaran_16_20_tahun))

                    $("#usia_pelaku_pelanggaran_21_25_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_21_25_tahun)
                    $("#usia_pelaku_pelanggaran_21_25_tahun").html(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun)
                    $("#status_usia_pelaku_pelanggaran_21_25_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun, dataPrev.usia_pelaku_pelanggaran_21_25_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_21_25_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun, dataPrev.usia_pelaku_pelanggaran_21_25_tahun))

                    $("#usia_pelaku_pelanggaran_26_30_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_26_30_tahun)
                    $("#usia_pelaku_pelanggaran_26_30_tahun").html(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun)
                    $("#status_usia_pelaku_pelanggaran_26_30_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun, dataPrev.usia_pelaku_pelanggaran_26_30_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_26_30_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun, dataPrev.usia_pelaku_pelanggaran_26_30_tahun))

                    $("#usia_pelaku_pelanggaran_31_35_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_31_35_tahun)
                    $("#usia_pelaku_pelanggaran_31_35_tahun").html(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun)
                    $("#status_usia_pelaku_pelanggaran_31_35_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun, dataPrev.usia_pelaku_pelanggaran_31_35_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_31_35_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun, dataPrev.usia_pelaku_pelanggaran_31_35_tahun))

                    $("#usia_pelaku_pelanggaran_36_40_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_36_40_tahun)
                    $("#usia_pelaku_pelanggaran_36_40_tahun").html(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun)
                    $("#status_usia_pelaku_pelanggaran_36_40_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun, dataPrev.usia_pelaku_pelanggaran_36_40_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_36_40_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun, dataPrev.usia_pelaku_pelanggaran_36_40_tahun))

                    $("#usia_pelaku_pelanggaran_41_45_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_41_45_tahun)
                    $("#usia_pelaku_pelanggaran_41_45_tahun").html(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun)
                    $("#status_usia_pelaku_pelanggaran_41_45_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun, dataPrev.usia_pelaku_pelanggaran_41_45_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_41_45_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun, dataPrev.usia_pelaku_pelanggaran_41_45_tahun))

                    $("#usia_pelaku_pelanggaran_46_50_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_46_50_tahun)
                    $("#usia_pelaku_pelanggaran_46_50_tahun").html(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun)
                    $("#status_usia_pelaku_pelanggaran_46_50_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun, dataPrev.usia_pelaku_pelanggaran_46_50_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_46_50_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun, dataPrev.usia_pelaku_pelanggaran_46_50_tahun))

                    $("#usia_pelaku_pelanggaran_51_55_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_51_55_tahun)
                    $("#usia_pelaku_pelanggaran_51_55_tahun").html(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun)
                    $("#status_usia_pelaku_pelanggaran_51_55_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun, dataPrev.usia_pelaku_pelanggaran_51_55_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_51_55_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun, dataPrev.usia_pelaku_pelanggaran_51_55_tahun))

                    $("#usia_pelaku_pelanggaran_56_60_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_56_60_tahun)
                    $("#usia_pelaku_pelanggaran_56_60_tahun").html(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun)
                    $("#status_usia_pelaku_pelanggaran_56_60_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun, dataPrev.usia_pelaku_pelanggaran_56_60_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_56_60_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun, dataPrev.usia_pelaku_pelanggaran_56_60_tahun))

                    $("#usia_pelaku_pelanggaran_diatas_60_tahun_p").html(dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun)
                    $("#usia_pelaku_pelanggaran_diatas_60_tahun").html(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun)
                    $("#status_usia_pelaku_pelanggaran_diatas_60_tahun").html(percentageStatus(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun, dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun))
                    $("#persentase_usia_pelaku_pelanggaran_diatas_60_tahun").html(percentageValue(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun, dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun))

                    $("#sim_pelaku_pelanggaran_sim_a_p").html(dataPrev.sim_pelaku_pelanggaran_sim_a)
                    $("#sim_pelaku_pelanggaran_sim_a").html(dataCurrent.sim_pelaku_pelanggaran_sim_a)
                    $("#status_sim_pelaku_pelanggaran_sim_a").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_a, dataPrev.sim_pelaku_pelanggaran_sim_a))
                    $("#persentase_sim_pelaku_pelanggaran_sim_a").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_a, dataPrev.sim_pelaku_pelanggaran_sim_a))

                    $("#sim_pelaku_pelanggaran_sim_a_umum_p").html(dataPrev.sim_pelaku_pelanggaran_sim_a_umum)
                    $("#sim_pelaku_pelanggaran_sim_a_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum)
                    $("#status_sim_pelaku_pelanggaran_sim_a_umum").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum, dataPrev.sim_pelaku_pelanggaran_sim_a_umum))
                    $("#persentase_sim_pelaku_pelanggaran_sim_a_umum").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum, dataPrev.sim_pelaku_pelanggaran_sim_a_umum))

                    $("#sim_pelaku_pelanggaran_sim_b1_p").html(dataPrev.sim_pelaku_pelanggaran_sim_b1)
                    $("#sim_pelaku_pelanggaran_sim_b1").html(dataCurrent.sim_pelaku_pelanggaran_sim_b1)
                    $("#status_sim_pelaku_pelanggaran_sim_b1").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b1, dataPrev.sim_pelaku_pelanggaran_sim_b1))
                    $("#persentase_sim_pelaku_pelanggaran_sim_b1").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b1, dataPrev.sim_pelaku_pelanggaran_sim_b1))

                    $("#sim_pelaku_pelanggaran_sim_b1_umum_p").html(dataPrev.sim_pelaku_pelanggaran_sim_b1_umum)
                    $("#sim_pelaku_pelanggaran_sim_b1_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum)
                    $("#status_sim_pelaku_pelanggaran_sim_b1_umum").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum, dataPrev.sim_pelaku_pelanggaran_sim_b1_umum))
                    $("#persentase_sim_pelaku_pelanggaran_sim_b1_umum").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum, dataPrev.sim_pelaku_pelanggaran_sim_b1_umum))

                    $("#sim_pelaku_pelanggaran_sim_b2_p").html(dataPrev.sim_pelaku_pelanggaran_sim_b2)
                    $("#sim_pelaku_pelanggaran_sim_b2").html(dataCurrent.sim_pelaku_pelanggaran_sim_b2)
                    $("#status_sim_pelaku_pelanggaran_sim_b2").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b2, dataPrev.sim_pelaku_pelanggaran_sim_b2))
                    $("#persentase_sim_pelaku_pelanggaran_sim_b2").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b2, dataPrev.sim_pelaku_pelanggaran_sim_b2))

                    $("#sim_pelaku_pelanggaran_sim_b2_umum_p").html(dataPrev.sim_pelaku_pelanggaran_sim_b2_umum)
                    $("#sim_pelaku_pelanggaran_sim_b2_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum)
                    $("#status_sim_pelaku_pelanggaran_sim_b2_umum").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum, dataPrev.sim_pelaku_pelanggaran_sim_b2_umum))
                    $("#persentase_sim_pelaku_pelanggaran_sim_b2_umum").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum, dataPrev.sim_pelaku_pelanggaran_sim_b2_umum))

                    $("#sim_pelaku_pelanggaran_sim_c_p").html(dataPrev.sim_pelaku_pelanggaran_sim_c)
                    $("#sim_pelaku_pelanggaran_sim_c").html(dataCurrent.sim_pelaku_pelanggaran_sim_c)
                    $("#status_sim_pelaku_pelanggaran_sim_c").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_c, dataPrev.sim_pelaku_pelanggaran_sim_c))
                    $("#persentase_sim_pelaku_pelanggaran_sim_c").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_c, dataPrev.sim_pelaku_pelanggaran_sim_c))

                    $("#sim_pelaku_pelanggaran_sim_d_p").html(dataPrev.sim_pelaku_pelanggaran_sim_d)
                    $("#sim_pelaku_pelanggaran_sim_d").html(dataCurrent.sim_pelaku_pelanggaran_sim_d)
                    $("#status_sim_pelaku_pelanggaran_sim_d").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_d, dataPrev.sim_pelaku_pelanggaran_sim_d))
                    $("#persentase_sim_pelaku_pelanggaran_sim_d").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_d, dataPrev.sim_pelaku_pelanggaran_sim_d))

                    $("#sim_pelaku_pelanggaran_sim_internasional_p").html(dataPrev.sim_pelaku_pelanggaran_sim_internasional)
                    $("#sim_pelaku_pelanggaran_sim_internasional").html(dataCurrent.sim_pelaku_pelanggaran_sim_internasional)
                    $("#status_sim_pelaku_pelanggaran_sim_internasional").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_sim_internasional, dataPrev.sim_pelaku_pelanggaran_sim_internasional))
                    $("#persentase_sim_pelaku_pelanggaran_sim_internasional").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_sim_internasional, dataPrev.sim_pelaku_pelanggaran_sim_internasional))

                    $("#sim_pelaku_pelanggaran_tanpa_sim_p").html(dataPrev.sim_pelaku_pelanggaran_tanpa_sim)
                    $("#sim_pelaku_pelanggaran_tanpa_sim").html(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim)
                    $("#status_sim_pelaku_pelanggaran_tanpa_sim").html(percentageStatus(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim, dataPrev.sim_pelaku_pelanggaran_tanpa_sim))
                    $("#persentase_sim_pelaku_pelanggaran_tanpa_sim").html(percentageValue(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim, dataPrev.sim_pelaku_pelanggaran_tanpa_sim))

                    $("#lokasi_pelanggaran_pemukiman_p").html(dataPrev.lokasi_pelanggaran_pemukiman)
                    $("#lokasi_pelanggaran_pemukiman").html(dataCurrent.lokasi_pelanggaran_pemukiman)
                    $("#status_lokasi_pelanggaran_pemukiman").html(percentageStatus(dataCurrent.lokasi_pelanggaran_pemukiman, dataPrev.lokasi_pelanggaran_pemukiman))
                    $("#persentase_lokasi_pelanggaran_pemukiman").html(percentageValue(dataCurrent.lokasi_pelanggaran_pemukiman, dataPrev.lokasi_pelanggaran_pemukiman))

                    $("#lokasi_pelanggaran_perbelanjaan_p").html(dataPrev.lokasi_pelanggaran_perbelanjaan)
                    $("#lokasi_pelanggaran_perbelanjaan").html(dataCurrent.lokasi_pelanggaran_perbelanjaan)
                    $("#status_lokasi_pelanggaran_perbelanjaan").html(percentageStatus(dataCurrent.lokasi_pelanggaran_perbelanjaan, dataPrev.lokasi_pelanggaran_perbelanjaan))
                    $("#persentase_lokasi_pelanggaran_perbelanjaan").html(percentageValue(dataCurrent.lokasi_pelanggaran_perbelanjaan, dataPrev.lokasi_pelanggaran_perbelanjaan))

                    $("#lokasi_pelanggaran_perkantoran_p").html(dataPrev.lokasi_pelanggaran_perkantoran)
                    $("#lokasi_pelanggaran_perkantoran").html(dataCurrent.lokasi_pelanggaran_perkantoran)
                    $("#status_lokasi_pelanggaran_perkantoran").html(percentageStatus(dataCurrent.lokasi_pelanggaran_perkantoran, dataPrev.lokasi_pelanggaran_perkantoran))
                    $("#persentase_lokasi_pelanggaran_perkantoran").html(percentageValue(dataCurrent.lokasi_pelanggaran_perkantoran, dataPrev.lokasi_pelanggaran_perkantoran))

                    $("#lokasi_pelanggaran_wisata_p").html(dataPrev.lokasi_pelanggaran_wisata)
                    $("#lokasi_pelanggaran_wisata").html(dataCurrent.lokasi_pelanggaran_wisata)
                    $("#status_lokasi_pelanggaran_wisata").html(percentageStatus(dataCurrent.lokasi_pelanggaran_wisata, dataPrev.lokasi_pelanggaran_wisata))
                    $("#persentase_lokasi_pelanggaran_wisata").html(percentageValue(dataCurrent.lokasi_pelanggaran_wisata, dataPrev.lokasi_pelanggaran_wisata))

                    $("#lokasi_pelanggaran_industri_p").html(dataPrev.lokasi_pelanggaran_industri)
                    $("#lokasi_pelanggaran_industri").html(dataCurrent.lokasi_pelanggaran_industri)
                    $("#status_lokasi_pelanggaran_industri").html(percentageStatus(dataCurrent.lokasi_pelanggaran_industri, dataPrev.lokasi_pelanggaran_industri))
                    $("#persentase_lokasi_pelanggaran_industri").html(percentageValue(dataCurrent.lokasi_pelanggaran_industri, dataPrev.lokasi_pelanggaran_industri))

                    $("#lokasi_pelanggaran_status_jalan_nasional_p").html(dataPrev.lokasi_pelanggaran_status_jalan_nasional)
                    $("#lokasi_pelanggaran_status_jalan_nasional").html(dataCurrent.lokasi_pelanggaran_status_jalan_nasional)
                    $("#status_lokasi_pelanggaran_status_jalan_nasional").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_nasional, dataPrev.lokasi_pelanggaran_status_jalan_nasional))
                    $("#persentase_lokasi_pelanggaran_status_jalan_nasional").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_nasional, dataPrev.lokasi_pelanggaran_status_jalan_nasional))

                    $("#lokasi_pelanggaran_status_jalan_propinsi_p").html(dataPrev.lokasi_pelanggaran_status_jalan_propinsi)
                    $("#lokasi_pelanggaran_status_jalan_propinsi").html(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi)
                    $("#status_lokasi_pelanggaran_status_jalan_propinsi").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi, dataPrev.lokasi_pelanggaran_status_jalan_propinsi))
                    $("#persentase_lokasi_pelanggaran_status_jalan_propinsi").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi, dataPrev.lokasi_pelanggaran_status_jalan_propinsi))

                    $("#lokasi_pelanggaran_status_jalan_kab_kota_p").html(dataPrev.lokasi_pelanggaran_status_jalan_kab_kota)
                    $("#lokasi_pelanggaran_status_jalan_kab_kota").html(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota)
                    $("#status_lokasi_pelanggaran_status_jalan_kab_kota").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota, dataPrev.lokasi_pelanggaran_status_jalan_kab_kota))
                    $("#persentase_lokasi_pelanggaran_status_jalan_kab_kota").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota, dataPrev.lokasi_pelanggaran_status_jalan_kab_kota))

                    $("#lokasi_pelanggaran_status_jalan_desa_lingkungan_p").html(dataPrev.lokasi_pelanggaran_status_jalan_desa_lingkungan)
                    $("#lokasi_pelanggaran_status_jalan_desa_lingkungan").html(dataCurrent.lokasi_pelanggaran_status_jalan_desa_lingkungan)
                    $("#status_lokasi_pelanggaran_status_jalan_desa_lingkungan").html(percentageStatus(dataCurrent.lokasi_pelanggaran_status_jalan_desa_lingkungan, dataPrev.lokasi_pelanggaran_status_jalan_desa_lingkungan))
                    $("#persentase_lokasi_pelanggaran_status_jalan_desa_lingkungan").html(percentageValue(dataCurrent.lokasi_pelanggaran_status_jalan_desa_lingkungan, dataPrev.lokasi_pelanggaran_status_jalan_desa_lingkungan))

                    $("#lokasi_pelanggaran_fungsi_jalan_arteri_p").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_arteri)
                    $("#lokasi_pelanggaran_fungsi_jalan_arteri").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_arteri)
                    $("#status_lokasi_pelanggaran_fungsi_jalan_arteri").html(percentageStatus(dataCurrent.lokasi_pelanggaran_fungsi_jalan_arteri, dataPrev.lokasi_pelanggaran_fungsi_jalan_arteri))
                    $("#persentase_lokasi_pelanggaran_fungsi_jalan_arteri").html(percentageValue(dataCurrent.lokasi_pelanggaran_fungsi_jalan_arteri, dataPrev.lokasi_pelanggaran_fungsi_jalan_arteri))

                    $("#lokasi_pelanggaran_fungsi_jalan_kolektor_p").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_kolektor)
                    $("#lokasi_pelanggaran_fungsi_jalan_kolektor").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_kolektor)
                    $("#status_lokasi_pelanggaran_fungsi_jalan_kolektor").html(percentageStatus(dataCurrent.lokasi_pelanggaran_fungsi_jalan_kolektor, dataPrev.lokasi_pelanggaran_fungsi_jalan_kolektor))
                    $("#persentase_lokasi_pelanggaran_fungsi_jalan_kolektor").html(percentageValue(dataCurrent.lokasi_pelanggaran_fungsi_jalan_kolektor, dataPrev.lokasi_pelanggaran_fungsi_jalan_kolektor))

                    $("#lokasi_pelanggaran_fungsi_jalan_lokal_p").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_lokal)
                    $("#lokasi_pelanggaran_fungsi_jalan_lokal").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lokal)
                    $("#status_lokasi_pelanggaran_fungsi_jalan_lokal").html(percentageStatus(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lokal, dataPrev.lokasi_pelanggaran_fungsi_jalan_lokal))
                    $("#persentase_lokasi_pelanggaran_fungsi_jalan_lokal").html(percentageValue(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lokal, dataPrev.lokasi_pelanggaran_fungsi_jalan_lokal))

                    $("#lokasi_pelanggaran_fungsi_jalan_lingkungan_p").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_lingkungan)
                    $("#lokasi_pelanggaran_fungsi_jalan_lingkungan").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lingkungan)
                    $("#status_lokasi_pelanggaran_fungsi_jalan_lingkungan").html(percentageStatus(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lingkungan, dataPrev.lokasi_pelanggaran_fungsi_jalan_lingkungan))
                    $("#persentase_lokasi_pelanggaran_fungsi_jalan_lingkungan").html(percentageValue(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lingkungan, dataPrev.lokasi_pelanggaran_fungsi_jalan_lingkungan))

                    $("#kecelakaan_lalin_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_jumlah_kejadian)
                    $("#kecelakaan_lalin_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_jumlah_kejadian, dataPrev.kecelakaan_lalin_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_jumlah_kejadian, dataPrev.kecelakaan_lalin_jumlah_kejadian))

                    $("#kecelakaan_lalin_jumlah_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_jumlah_korban_meninggal)
                    $("#kecelakaan_lalin_jumlah_korban_meninggal").html(dataCurrent.kecelakaan_lalin_jumlah_korban_meninggal)
                    $("#status_kecelakaan_lalin_jumlah_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_jumlah_korban_meninggal, dataPrev.kecelakaan_lalin_jumlah_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_jumlah_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_jumlah_korban_meninggal, dataPrev.kecelakaan_lalin_jumlah_korban_meninggal))

                    $("#kecelakaan_lalin_jumlah_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_jumlah_korban_luka_berat)
                    $("#kecelakaan_lalin_jumlah_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_berat)
                    $("#status_kecelakaan_lalin_jumlah_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_berat, dataPrev.kecelakaan_lalin_jumlah_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_jumlah_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_berat, dataPrev.kecelakaan_lalin_jumlah_korban_luka_berat))

                    $("#kecelakaan_lalin_jumlah_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_jumlah_korban_luka_ringan)
                    $("#kecelakaan_lalin_jumlah_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_jumlah_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_ringan, dataPrev.kecelakaan_lalin_jumlah_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_jumlah_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_ringan, dataPrev.kecelakaan_lalin_jumlah_korban_luka_ringan))

                    $("#kecelakaan_lalin_jumlah_kerugian_materiil_p").html(dataPrev.kecelakaan_lalin_jumlah_kerugian_materiil)
                    $("#kecelakaan_lalin_jumlah_kerugian_materiil").html(dataCurrent.kecelakaan_lalin_jumlah_kerugian_materiil)
                    $("#status_kecelakaan_lalin_jumlah_kerugian_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_jumlah_kerugian_materiil, dataPrev.kecelakaan_lalin_jumlah_kerugian_materiil))
                    $("#persentase_kecelakaan_lalin_jumlah_kerugian_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_jumlah_kerugian_materiil, dataPrev.kecelakaan_lalin_jumlah_kerugian_materiil))

                    $("#kecelakaan_barang_bukti_yg_disita_sim_p").html(dataPrev.kecelakaan_barang_bukti_yg_disita_sim)
                    $("#kecelakaan_barang_bukti_yg_disita_sim").html(dataCurrent.kecelakaan_barang_bukti_yg_disita_sim)
                    $("#status_kecelakaan_barang_bukti_yg_disita_sim").html(percentageStatus(dataCurrent.kecelakaan_barang_bukti_yg_disita_sim, dataPrev.kecelakaan_barang_bukti_yg_disita_sim))
                    $("#persentase_kecelakaan_barang_bukti_yg_disita_sim").html(percentageValue(dataCurrent.kecelakaan_barang_bukti_yg_disita_sim, dataPrev.kecelakaan_barang_bukti_yg_disita_sim))

                    $("#kecelakaan_barang_bukti_yg_disita_stnk_p").html(dataPrev.kecelakaan_barang_bukti_yg_disita_stnk)
                    $("#kecelakaan_barang_bukti_yg_disita_stnk").html(dataCurrent.kecelakaan_barang_bukti_yg_disita_stnk)
                    $("#status_kecelakaan_barang_bukti_yg_disita_stnk").html(percentageStatus(dataCurrent.kecelakaan_barang_bukti_yg_disita_stnk, dataPrev.kecelakaan_barang_bukti_yg_disita_stnk))
                    $("#persentase_kecelakaan_barang_bukti_yg_disita_stnk").html(percentageValue(dataCurrent.kecelakaan_barang_bukti_yg_disita_stnk, dataPrev.kecelakaan_barang_bukti_yg_disita_stnk))

                    $("#kecelakaan_barang_bukti_yg_disita_kendaraan_p").html(dataPrev.kecelakaan_barang_bukti_yg_disita_kendaraan)
                    $("#kecelakaan_barang_bukti_yg_disita_kendaraan").html(dataCurrent.kecelakaan_barang_bukti_yg_disita_kendaraan)
                    $("#status_kecelakaan_barang_bukti_yg_disita_kendaraan").html(percentageStatus(dataCurrent.kecelakaan_barang_bukti_yg_disita_kendaraan, dataPrev.kecelakaan_barang_bukti_yg_disita_kendaraan))
                    $("#persentase_kecelakaan_barang_bukti_yg_disita_kendaraan").html(percentageValue(dataCurrent.kecelakaan_barang_bukti_yg_disita_kendaraan, dataPrev.kecelakaan_barang_bukti_yg_disita_kendaraan))

                    $("#profesi_korban_kecelakaan_lalin_pns_p").html(dataPrev.profesi_korban_kecelakaan_lalin_pns)
                    $("#profesi_korban_kecelakaan_lalin_pns").html(dataCurrent.profesi_korban_kecelakaan_lalin_pns)
                    $("#status_profesi_korban_kecelakaan_lalin_pns").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_pns, dataPrev.profesi_korban_kecelakaan_lalin_pns))
                    $("#persentase_profesi_korban_kecelakaan_lalin_pns").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_pns, dataPrev.profesi_korban_kecelakaan_lalin_pns))

                    $("#profesi_korban_kecelakaan_lalin_karwayan_swasta_p").html(dataPrev.profesi_korban_kecelakaan_lalin_karwayan_swasta)
                    $("#profesi_korban_kecelakaan_lalin_karwayan_swasta").html(dataCurrent.profesi_korban_kecelakaan_lalin_karwayan_swasta)
                    $("#status_profesi_korban_kecelakaan_lalin_karwayan_swasta").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_karwayan_swasta, dataPrev.profesi_korban_kecelakaan_lalin_karwayan_swasta))
                    $("#persentase_profesi_korban_kecelakaan_lalin_karwayan_swasta").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_karwayan_swasta, dataPrev.profesi_korban_kecelakaan_lalin_karwayan_swasta))

                    $("#profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p").html(dataPrev.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa)
                    $("#profesi_korban_kecelakaan_lalin_pelajar_mahasiswa").html(dataCurrent.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa)
                    $("#status_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa, dataPrev.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa))
                    $("#persentase_profesi_korban_kecelakaan_lalin_pelajar_mahasiswa").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa, dataPrev.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa))

                    $("#profesi_korban_kecelakaan_lalin_pengemudi_p").html(dataPrev.profesi_korban_kecelakaan_lalin_pengemudi)
                    $("#profesi_korban_kecelakaan_lalin_pengemudi").html(dataCurrent.profesi_korban_kecelakaan_lalin_pengemudi)
                    $("#status_profesi_korban_kecelakaan_lalin_pengemudi").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_pengemudi, dataPrev.profesi_korban_kecelakaan_lalin_pengemudi))
                    $("#persentase_profesi_korban_kecelakaan_lalin_pengemudi").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_pengemudi, dataPrev.profesi_korban_kecelakaan_lalin_pengemudi))

                    $("#profesi_korban_kecelakaan_lalin_tni_p").html(dataPrev.profesi_korban_kecelakaan_lalin_tni)
                    $("#profesi_korban_kecelakaan_lalin_tni").html(dataCurrent.profesi_korban_kecelakaan_lalin_tni)
                    $("#status_profesi_korban_kecelakaan_lalin_tni").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_tni, dataPrev.profesi_korban_kecelakaan_lalin_tni))
                    $("#persentase_profesi_korban_kecelakaan_lalin_tni").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_tni, dataPrev.profesi_korban_kecelakaan_lalin_tni))

                    $("#profesi_korban_kecelakaan_lalin_polri_p").html(dataPrev.profesi_korban_kecelakaan_lalin_polri)
                    $("#profesi_korban_kecelakaan_lalin_polri").html(dataCurrent.profesi_korban_kecelakaan_lalin_polri)
                    $("#status_profesi_korban_kecelakaan_lalin_polri").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_polri, dataPrev.profesi_korban_kecelakaan_lalin_polri))
                    $("#persentase_profesi_korban_kecelakaan_lalin_polri").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_polri, dataPrev.profesi_korban_kecelakaan_lalin_polri))

                    $("#profesi_korban_kecelakaan_lalin_lain_lain_p").html(dataPrev.profesi_korban_kecelakaan_lalin_lain_lain)
                    $("#profesi_korban_kecelakaan_lalin_lain_lain").html(dataCurrent.profesi_korban_kecelakaan_lalin_lain_lain)
                    $("#status_profesi_korban_kecelakaan_lalin_lain_lain").html(percentageStatus(dataCurrent.profesi_korban_kecelakaan_lalin_lain_lain, dataPrev.profesi_korban_kecelakaan_lalin_lain_lain))
                    $("#persentase_profesi_korban_kecelakaan_lalin_lain_lain").html(percentageValue(dataCurrent.profesi_korban_kecelakaan_lalin_lain_lain, dataPrev.profesi_korban_kecelakaan_lalin_lain_lain))

                    $("#usia_korban_kecelakaan_kurang_15_p").html(dataPrev.usia_korban_kecelakaan_kurang_15)
                    $("#usia_korban_kecelakaan_kurang_15").html(dataCurrent.usia_korban_kecelakaan_kurang_15)
                    $("#status_usia_korban_kecelakaan_kurang_15").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_kurang_15, dataPrev.usia_korban_kecelakaan_kurang_15))
                    $("#persentase_usia_korban_kecelakaan_kurang_15").html(percentageValue(dataCurrent.usia_korban_kecelakaan_kurang_15, dataPrev.usia_korban_kecelakaan_kurang_15))

                    $("#usia_korban_kecelakaan_16_20_p").html(dataPrev.usia_korban_kecelakaan_16_20)
                    $("#usia_korban_kecelakaan_16_20").html(dataCurrent.usia_korban_kecelakaan_16_20)
                    $("#status_usia_korban_kecelakaan_16_20").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_16_20, dataPrev.usia_korban_kecelakaan_16_20))
                    $("#persentase_usia_korban_kecelakaan_16_20").html(percentageValue(dataCurrent.usia_korban_kecelakaan_16_20, dataPrev.usia_korban_kecelakaan_16_20))

                    $("#usia_korban_kecelakaan_21_25_p").html(dataPrev.usia_korban_kecelakaan_21_25)
                    $("#usia_korban_kecelakaan_21_25").html(dataCurrent.usia_korban_kecelakaan_21_25)
                    $("#status_usia_korban_kecelakaan_21_25").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_21_25, dataPrev.usia_korban_kecelakaan_21_25))
                    $("#persentase_usia_korban_kecelakaan_21_25").html(percentageValue(dataCurrent.usia_korban_kecelakaan_21_25, dataPrev.usia_korban_kecelakaan_21_25))

                    $("#usia_korban_kecelakaan_26_30_p").html(dataPrev.usia_korban_kecelakaan_26_30)
                    $("#usia_korban_kecelakaan_26_30").html(dataCurrent.usia_korban_kecelakaan_26_30)
                    $("#status_usia_korban_kecelakaan_26_30").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_26_30, dataPrev.usia_korban_kecelakaan_26_30))
                    $("#persentase_usia_korban_kecelakaan_26_30").html(percentageValue(dataCurrent.usia_korban_kecelakaan_26_30, dataPrev.usia_korban_kecelakaan_26_30))

                    $("#usia_korban_kecelakaan_31_35_p").html(dataPrev.usia_korban_kecelakaan_31_35)
                    $("#usia_korban_kecelakaan_31_35").html(dataCurrent.usia_korban_kecelakaan_31_35)
                    $("#status_usia_korban_kecelakaan_31_35").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_31_35, dataPrev.usia_korban_kecelakaan_31_35))
                    $("#persentase_usia_korban_kecelakaan_31_35").html(percentageValue(dataCurrent.usia_korban_kecelakaan_31_35, dataPrev.usia_korban_kecelakaan_31_35))

                    $("#usia_korban_kecelakaan_36_40_p").html(dataPrev.usia_korban_kecelakaan_36_40)
                    $("#usia_korban_kecelakaan_36_40").html(dataCurrent.usia_korban_kecelakaan_36_40)
                    $("#status_usia_korban_kecelakaan_36_40").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_36_40, dataPrev.usia_korban_kecelakaan_36_40))
                    $("#persentase_usia_korban_kecelakaan_36_40").html(percentageValue(dataCurrent.usia_korban_kecelakaan_36_40, dataPrev.usia_korban_kecelakaan_36_40))

                    $("#usia_korban_kecelakaan_41_45_p").html(dataPrev.usia_korban_kecelakaan_41_45)
                    $("#usia_korban_kecelakaan_41_45").html(dataCurrent.usia_korban_kecelakaan_41_45)
                    $("#status_usia_korban_kecelakaan_41_45").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_41_45, dataPrev.usia_korban_kecelakaan_41_45))
                    $("#persentase_usia_korban_kecelakaan_41_45").html(percentageValue(dataCurrent.usia_korban_kecelakaan_41_45, dataPrev.usia_korban_kecelakaan_41_45))

                    $("#usia_korban_kecelakaan_45_50_p").html(dataPrev.usia_korban_kecelakaan_45_50)
                    $("#usia_korban_kecelakaan_45_50").html(dataCurrent.usia_korban_kecelakaan_45_50)
                    $("#status_usia_korban_kecelakaan_45_50").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_45_50, dataPrev.usia_korban_kecelakaan_45_50))
                    $("#persentase_usia_korban_kecelakaan_45_50").html(percentageValue(dataCurrent.usia_korban_kecelakaan_45_50, dataPrev.usia_korban_kecelakaan_45_50))

                    $("#usia_korban_kecelakaan_51_55_p").html(dataPrev.usia_korban_kecelakaan_51_55)
                    $("#usia_korban_kecelakaan_51_55").html(dataCurrent.usia_korban_kecelakaan_51_55)
                    $("#status_usia_korban_kecelakaan_51_55").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_51_55, dataPrev.usia_korban_kecelakaan_51_55))
                    $("#persentase_usia_korban_kecelakaan_51_55").html(percentageValue(dataCurrent.usia_korban_kecelakaan_51_55, dataPrev.usia_korban_kecelakaan_51_55))

                    $("#usia_korban_kecelakaan_56_60_p").html(dataPrev.usia_korban_kecelakaan_56_60)
                    $("#usia_korban_kecelakaan_56_60").html(dataCurrent.usia_korban_kecelakaan_56_60)
                    $("#status_usia_korban_kecelakaan_56_60").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_56_60, dataPrev.usia_korban_kecelakaan_56_60))
                    $("#persentase_usia_korban_kecelakaan_56_60").html(percentageValue(dataCurrent.usia_korban_kecelakaan_56_60, dataPrev.usia_korban_kecelakaan_56_60))

                    $("#usia_korban_kecelakaan_diatas_60_p").html(dataPrev.usia_korban_kecelakaan_diatas_60)
                    $("#usia_korban_kecelakaan_diatas_60").html(dataCurrent.usia_korban_kecelakaan_diatas_60)
                    $("#status_usia_korban_kecelakaan_diatas_60").html(percentageStatus(dataCurrent.usia_korban_kecelakaan_diatas_60, dataPrev.usia_korban_kecelakaan_diatas_60))
                    $("#persentase_usia_korban_kecelakaan_diatas_60").html(percentageValue(dataCurrent.usia_korban_kecelakaan_diatas_60, dataPrev.usia_korban_kecelakaan_diatas_60))

                    $("#sim_korban_kecelakaan_sim_a_p").html(dataPrev.sim_korban_kecelakaan_sim_a)
                    $("#sim_korban_kecelakaan_sim_a").html(dataCurrent.sim_korban_kecelakaan_sim_a)
                    $("#status_sim_korban_kecelakaan_sim_a").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_a, dataPrev.sim_korban_kecelakaan_sim_a))
                    $("#persentase_sim_korban_kecelakaan_sim_a").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_a, dataPrev.sim_korban_kecelakaan_sim_a))

                    $("#sim_korban_kecelakaan_sim_a_umum_p").html(dataPrev.sim_korban_kecelakaan_sim_a_umum)
                    $("#sim_korban_kecelakaan_sim_a_umum").html(dataCurrent.sim_korban_kecelakaan_sim_a_umum)
                    $("#status_sim_korban_kecelakaan_sim_a_umum").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_a_umum, dataPrev.sim_korban_kecelakaan_sim_a_umum))
                    $("#persentase_sim_korban_kecelakaan_sim_a_umum").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_a_umum, dataPrev.sim_korban_kecelakaan_sim_a_umum))

                    $("#sim_korban_kecelakaan_sim_b1_p").html(dataPrev.sim_korban_kecelakaan_sim_b1)
                    $("#sim_korban_kecelakaan_sim_b1").html(dataCurrent.sim_korban_kecelakaan_sim_b1)
                    $("#status_sim_korban_kecelakaan_sim_b1").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_b1, dataPrev.sim_korban_kecelakaan_sim_b1))
                    $("#persentase_sim_korban_kecelakaan_sim_b1").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_b1, dataPrev.sim_korban_kecelakaan_sim_b1))

                    $("#sim_korban_kecelakaan_sim_b1_umum_p").html(dataPrev.sim_korban_kecelakaan_sim_b1_umum)
                    $("#sim_korban_kecelakaan_sim_b1_umum").html(dataCurrent.sim_korban_kecelakaan_sim_b1_umum)
                    $("#status_sim_korban_kecelakaan_sim_b1_umum").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_b1_umum, dataPrev.sim_korban_kecelakaan_sim_b1_umum))
                    $("#persentase_sim_korban_kecelakaan_sim_b1_umum").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_b1_umum, dataPrev.sim_korban_kecelakaan_sim_b1_umum))

                    $("#sim_korban_kecelakaan_sim_b2_p").html(dataPrev.sim_korban_kecelakaan_sim_b2)
                    $("#sim_korban_kecelakaan_sim_b2").html(dataCurrent.sim_korban_kecelakaan_sim_b2)
                    $("#status_sim_korban_kecelakaan_sim_b2").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_b2, dataPrev.sim_korban_kecelakaan_sim_b2))
                    $("#persentase_sim_korban_kecelakaan_sim_b2").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_b2, dataPrev.sim_korban_kecelakaan_sim_b2))

                    $("#sim_korban_kecelakaan_sim_b2_umum_p").html(dataPrev.sim_korban_kecelakaan_sim_b2_umum)
                    $("#sim_korban_kecelakaan_sim_b2_umum").html(dataCurrent.sim_korban_kecelakaan_sim_b2_umum)
                    $("#status_sim_korban_kecelakaan_sim_b2_umum").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_b2_umum, dataPrev.sim_korban_kecelakaan_sim_b2_umum))
                    $("#persentase_sim_korban_kecelakaan_sim_b2_umum").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_b2_umum, dataPrev.sim_korban_kecelakaan_sim_b2_umum))

                    $("#sim_korban_kecelakaan_sim_c_p").html(dataPrev.sim_korban_kecelakaan_sim_c)
                    $("#sim_korban_kecelakaan_sim_c").html(dataCurrent.sim_korban_kecelakaan_sim_c)
                    $("#status_sim_korban_kecelakaan_sim_c").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_c, dataPrev.sim_korban_kecelakaan_sim_c))
                    $("#persentase_sim_korban_kecelakaan_sim_c").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_c, dataPrev.sim_korban_kecelakaan_sim_c))

                    $("#sim_korban_kecelakaan_sim_d_p").html(dataPrev.sim_korban_kecelakaan_sim_d)
                    $("#sim_korban_kecelakaan_sim_d").html(dataCurrent.sim_korban_kecelakaan_sim_d)
                    $("#status_sim_korban_kecelakaan_sim_d").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_d, dataPrev.sim_korban_kecelakaan_sim_d))
                    $("#persentase_sim_korban_kecelakaan_sim_d").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_d, dataPrev.sim_korban_kecelakaan_sim_d))

                    $("#sim_korban_kecelakaan_sim_internasional_p").html(dataPrev.sim_korban_kecelakaan_sim_internasional)
                    $("#sim_korban_kecelakaan_sim_internasional").html(dataCurrent.sim_korban_kecelakaan_sim_internasional)
                    $("#status_sim_korban_kecelakaan_sim_internasional").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_sim_internasional, dataPrev.sim_korban_kecelakaan_sim_internasional))
                    $("#persentase_sim_korban_kecelakaan_sim_internasional").html(percentageValue(dataCurrent.sim_korban_kecelakaan_sim_internasional, dataPrev.sim_korban_kecelakaan_sim_internasional))

                    $("#sim_korban_kecelakaan_tanpa_sim_p").html(dataPrev.sim_korban_kecelakaan_tanpa_sim)
                    $("#sim_korban_kecelakaan_tanpa_sim").html(dataCurrent.sim_korban_kecelakaan_tanpa_sim)
                    $("#status_sim_korban_kecelakaan_tanpa_sim").html(percentageStatus(dataCurrent.sim_korban_kecelakaan_tanpa_sim, dataPrev.sim_korban_kecelakaan_tanpa_sim))
                    $("#persentase_sim_korban_kecelakaan_tanpa_sim").html(percentageValue(dataCurrent.sim_korban_kecelakaan_tanpa_sim, dataPrev.sim_korban_kecelakaan_tanpa_sim))

                    $("#kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_sepeda_motor)
                    $("#kendaraan_yg_terlibat_kecelakaan_sepeda_motor").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_sepeda_motor)
                    $("#status_kendaraan_yg_terlibat_kecelakaan_sepeda_motor").html(percentageStatus(dataCurrent.kendaraan_yg_terlibat_kecelakaan_sepeda_motor, dataPrev.kendaraan_yg_terlibat_kecelakaan_sepeda_motor))
                    $("#persentase_kendaraan_yg_terlibat_kecelakaan_sepeda_motor").html(percentageValue(dataCurrent.kendaraan_yg_terlibat_kecelakaan_sepeda_motor, dataPrev.kendaraan_yg_terlibat_kecelakaan_sepeda_motor))

                    $("#kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang)
                    $("#kendaraan_yg_terlibat_kecelakaan_mobil_penumpang").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang)
                    $("#status_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang").html(percentageStatus(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang, dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang))
                    $("#persentase_kendaraan_yg_terlibat_kecelakaan_mobil_penumpang").html(percentageValue(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang, dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang))

                    $("#kendaraan_yg_terlibat_kecelakaan_mobil_bus_p").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_bus)
                    $("#kendaraan_yg_terlibat_kecelakaan_mobil_bus").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_bus)
                    $("#status_kendaraan_yg_terlibat_kecelakaan_mobil_bus").html(percentageStatus(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_bus, dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_bus))
                    $("#persentase_kendaraan_yg_terlibat_kecelakaan_mobil_bus").html(percentageValue(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_bus, dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_bus))

                    $("#kendaraan_yg_terlibat_kecelakaan_mobil_barang_p").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_barang)
                    $("#kendaraan_yg_terlibat_kecelakaan_mobil_barang").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_barang)
                    $("#status_kendaraan_yg_terlibat_kecelakaan_mobil_barang").html(percentageStatus(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_barang, dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_barang))
                    $("#persentase_kendaraan_yg_terlibat_kecelakaan_mobil_barang").html(percentageValue(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_barang, dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_barang))

                    $("#kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus)
                    $("#kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus)
                    $("#status_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus").html(percentageStatus(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus, dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus))
                    $("#persentase_kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus").html(percentageValue(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus, dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus))

                    $("#kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor)
                    $("#kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor)
                    $("#status_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor").html(percentageStatus(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor, dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor))
                    $("#persentase_kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor").html(percentageValue(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor, dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor))

                    $("#jenis_kecelakaan_tunggal_ooc_p").html(dataPrev.jenis_kecelakaan_tunggal_ooc)
                    $("#jenis_kecelakaan_tunggal_ooc").html(dataCurrent.jenis_kecelakaan_tunggal_ooc)
                    $("#status_jenis_kecelakaan_tunggal_ooc").html(percentageStatus(dataCurrent.jenis_kecelakaan_tunggal_ooc, dataPrev.jenis_kecelakaan_tunggal_ooc))
                    $("#persentase_jenis_kecelakaan_tunggal_ooc").html(percentageValue(dataCurrent.jenis_kecelakaan_tunggal_ooc, dataPrev.jenis_kecelakaan_tunggal_ooc))

                    $("#jenis_kecelakaan_depan_depan_p").html(dataPrev.jenis_kecelakaan_depan_depan)
                    $("#jenis_kecelakaan_depan_depan").html(dataCurrent.jenis_kecelakaan_depan_depan)
                    $("#status_jenis_kecelakaan_depan_depan").html(percentageStatus(dataCurrent.jenis_kecelakaan_depan_depan, dataPrev.jenis_kecelakaan_depan_depan))
                    $("#persentase_jenis_kecelakaan_depan_depan").html(percentageValue(dataCurrent.jenis_kecelakaan_depan_depan, dataPrev.jenis_kecelakaan_depan_depan))

                    $("#jenis_kecelakaan_depan_belakang_p").html(dataPrev.jenis_kecelakaan_depan_belakang)
                    $("#jenis_kecelakaan_depan_belakang").html(dataCurrent.jenis_kecelakaan_depan_belakang)
                    $("#status_jenis_kecelakaan_depan_belakang").html(percentageStatus(dataCurrent.jenis_kecelakaan_depan_belakang, dataPrev.jenis_kecelakaan_depan_belakang))
                    $("#persentase_jenis_kecelakaan_depan_belakang").html(percentageValue(dataCurrent.jenis_kecelakaan_depan_belakang, dataPrev.jenis_kecelakaan_depan_belakang))

                    $("#jenis_kecelakaan_depan_samping_p").html(dataPrev.jenis_kecelakaan_depan_samping)
                    $("#jenis_kecelakaan_depan_samping").html(dataCurrent.jenis_kecelakaan_depan_samping)
                    $("#status_jenis_kecelakaan_depan_samping").html(percentageStatus(dataCurrent.jenis_kecelakaan_depan_samping, dataPrev.jenis_kecelakaan_depan_samping))
                    $("#persentase_jenis_kecelakaan_depan_samping").html(percentageValue(dataCurrent.jenis_kecelakaan_depan_samping, dataPrev.jenis_kecelakaan_depan_samping))

                    $("#jenis_kecelakaan_beruntun_p").html(dataPrev.jenis_kecelakaan_beruntun)
                    $("#jenis_kecelakaan_beruntun").html(dataCurrent.jenis_kecelakaan_beruntun)
                    $("#status_jenis_kecelakaan_beruntun").html(percentageStatus(dataCurrent.jenis_kecelakaan_beruntun, dataPrev.jenis_kecelakaan_beruntun))
                    $("#persentase_jenis_kecelakaan_beruntun").html(percentageValue(dataCurrent.jenis_kecelakaan_beruntun, dataPrev.jenis_kecelakaan_beruntun))

                    $("#jenis_kecelakaan_pejalan_kaki_p").html(dataPrev.jenis_kecelakaan_pejalan_kaki)
                    $("#jenis_kecelakaan_pejalan_kaki").html(dataCurrent.jenis_kecelakaan_pejalan_kaki)
                    $("#status_jenis_kecelakaan_pejalan_kaki").html(percentageStatus(dataCurrent.jenis_kecelakaan_pejalan_kaki, dataPrev.jenis_kecelakaan_pejalan_kaki))
                    $("#persentase_jenis_kecelakaan_pejalan_kaki").html(percentageValue(dataCurrent.jenis_kecelakaan_pejalan_kaki, dataPrev.jenis_kecelakaan_pejalan_kaki))

                    $("#jenis_kecelakaan_tabrak_lari_p").html(dataPrev.jenis_kecelakaan_tabrak_lari)
                    $("#jenis_kecelakaan_tabrak_lari").html(dataCurrent.jenis_kecelakaan_tabrak_lari)
                    $("#status_jenis_kecelakaan_tabrak_lari").html(percentageStatus(dataCurrent.jenis_kecelakaan_tabrak_lari, dataPrev.jenis_kecelakaan_tabrak_lari))
                    $("#persentase_jenis_kecelakaan_tabrak_lari").html(percentageValue(dataCurrent.jenis_kecelakaan_tabrak_lari, dataPrev.jenis_kecelakaan_tabrak_lari))

                    $("#jenis_kecelakaan_tabrak_hewan_p").html(dataPrev.jenis_kecelakaan_tabrak_hewan)
                    $("#jenis_kecelakaan_tabrak_hewan").html(dataCurrent.jenis_kecelakaan_tabrak_hewan)
                    $("#status_jenis_kecelakaan_tabrak_hewan").html(percentageStatus(dataCurrent.jenis_kecelakaan_tabrak_hewan, dataPrev.jenis_kecelakaan_tabrak_hewan))
                    $("#persentase_jenis_kecelakaan_tabrak_hewan").html(percentageValue(dataCurrent.jenis_kecelakaan_tabrak_hewan, dataPrev.jenis_kecelakaan_tabrak_hewan))

                    $("#jenis_kecelakaan_samping_samping_p").html(dataPrev.jenis_kecelakaan_samping_samping)
                    $("#jenis_kecelakaan_samping_samping").html(dataCurrent.jenis_kecelakaan_samping_samping)
                    $("#status_jenis_kecelakaan_samping_samping").html(percentageStatus(dataCurrent.jenis_kecelakaan_samping_samping, dataPrev.jenis_kecelakaan_samping_samping))
                    $("#persentase_jenis_kecelakaan_samping_samping").html(percentageValue(dataCurrent.jenis_kecelakaan_samping_samping, dataPrev.jenis_kecelakaan_samping_samping))

                    $("#jenis_kecelakaan_lainnya_p").html(dataPrev.jenis_kecelakaan_lainnya)
                    $("#jenis_kecelakaan_lainnya").html(dataCurrent.jenis_kecelakaan_lainnya)
                    $("#status_jenis_kecelakaan_lainnya").html(percentageStatus(dataCurrent.jenis_kecelakaan_lainnya, dataPrev.jenis_kecelakaan_lainnya))
                    $("#persentase_jenis_kecelakaan_lainnya").html(percentageValue(dataCurrent.jenis_kecelakaan_lainnya, dataPrev.jenis_kecelakaan_lainnya))

                    $("#profesi_pelaku_kecelakaan_lalin_pns_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_pns)
                    $("#profesi_pelaku_kecelakaan_lalin_pns").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_pns)
                    $("#status_profesi_pelaku_kecelakaan_lalin_pns").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_pns, dataPrev.profesi_pelaku_kecelakaan_lalin_pns))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_pns").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_pns, dataPrev.profesi_pelaku_kecelakaan_lalin_pns))

                    $("#profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_karyawan_swasta)
                    $("#profesi_pelaku_kecelakaan_lalin_karyawan_swasta").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_karyawan_swasta)
                    $("#status_profesi_pelaku_kecelakaan_lalin_karyawan_swasta").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_karyawan_swasta, dataPrev.profesi_pelaku_kecelakaan_lalin_karyawan_swasta))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_karyawan_swasta").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_karyawan_swasta, dataPrev.profesi_pelaku_kecelakaan_lalin_karyawan_swasta))

                    $("#profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar)
                    $("#profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar)
                    $("#status_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar, dataPrev.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar, dataPrev.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar))

                    $("#profesi_pelaku_kecelakaan_lalin_pengemudi_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_pengemudi)
                    $("#profesi_pelaku_kecelakaan_lalin_pengemudi").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_pengemudi)
                    $("#status_profesi_pelaku_kecelakaan_lalin_pengemudi").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_pengemudi, dataPrev.profesi_pelaku_kecelakaan_lalin_pengemudi))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_pengemudi").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_pengemudi, dataPrev.profesi_pelaku_kecelakaan_lalin_pengemudi))

                    $("#profesi_pelaku_kecelakaan_lalin_tni_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_tni)
                    $("#profesi_pelaku_kecelakaan_lalin_tni").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_tni)
                    $("#status_profesi_pelaku_kecelakaan_lalin_tni").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_tni, dataPrev.profesi_pelaku_kecelakaan_lalin_tni))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_tni").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_tni, dataPrev.profesi_pelaku_kecelakaan_lalin_tni))

                    $("#profesi_pelaku_kecelakaan_lalin_polri_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_polri)
                    $("#profesi_pelaku_kecelakaan_lalin_polri").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_polri)
                    $("#status_profesi_pelaku_kecelakaan_lalin_polri").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_polri, dataPrev.profesi_pelaku_kecelakaan_lalin_polri))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_polri").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_polri, dataPrev.profesi_pelaku_kecelakaan_lalin_polri))

                    $("#profesi_pelaku_kecelakaan_lalin_lain_lain_p").html(dataPrev.profesi_pelaku_kecelakaan_lalin_lain_lain)
                    $("#profesi_pelaku_kecelakaan_lalin_lain_lain").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_lain_lain)
                    $("#status_profesi_pelaku_kecelakaan_lalin_lain_lain").html(percentageStatus(dataCurrent.profesi_pelaku_kecelakaan_lalin_lain_lain, dataPrev.profesi_pelaku_kecelakaan_lalin_lain_lain))
                    $("#persentase_profesi_pelaku_kecelakaan_lalin_lain_lain").html(percentageValue(dataCurrent.profesi_pelaku_kecelakaan_lalin_lain_lain, dataPrev.profesi_pelaku_kecelakaan_lalin_lain_lain))

                    $("#usia_pelaku_kecelakaan_kurang_dari_15_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_kurang_dari_15_tahun)
                    $("#usia_pelaku_kecelakaan_kurang_dari_15_tahun").html(dataCurrent.usia_pelaku_kecelakaan_kurang_dari_15_tahun)
                    $("#status_usia_pelaku_kecelakaan_kurang_dari_15_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_kurang_dari_15_tahun, dataPrev.usia_pelaku_kecelakaan_kurang_dari_15_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_kurang_dari_15_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_kurang_dari_15_tahun, dataPrev.usia_pelaku_kecelakaan_kurang_dari_15_tahun))

                    $("#usia_pelaku_kecelakaan_16_20_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_16_20_tahun)
                    $("#usia_pelaku_kecelakaan_16_20_tahun").html(dataCurrent.usia_pelaku_kecelakaan_16_20_tahun)
                    $("#status_usia_pelaku_kecelakaan_16_20_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_16_20_tahun, dataPrev.usia_pelaku_kecelakaan_16_20_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_16_20_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_16_20_tahun, dataPrev.usia_pelaku_kecelakaan_16_20_tahun))

                    $("#usia_pelaku_kecelakaan_21_25_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_21_25_tahun)
                    $("#usia_pelaku_kecelakaan_21_25_tahun").html(dataCurrent.usia_pelaku_kecelakaan_21_25_tahun)
                    $("#status_usia_pelaku_kecelakaan_21_25_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_21_25_tahun, dataPrev.usia_pelaku_kecelakaan_21_25_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_21_25_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_21_25_tahun, dataPrev.usia_pelaku_kecelakaan_21_25_tahun))

                    $("#usia_pelaku_kecelakaan_26_30_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_26_30_tahun)
                    $("#usia_pelaku_kecelakaan_26_30_tahun").html(dataCurrent.usia_pelaku_kecelakaan_26_30_tahun)
                    $("#status_usia_pelaku_kecelakaan_26_30_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_26_30_tahun, dataPrev.usia_pelaku_kecelakaan_26_30_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_26_30_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_26_30_tahun, dataPrev.usia_pelaku_kecelakaan_26_30_tahun))

                    $("#usia_pelaku_kecelakaan_31_35_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_31_35_tahun)
                    $("#usia_pelaku_kecelakaan_31_35_tahun").html(dataCurrent.usia_pelaku_kecelakaan_31_35_tahun)
                    $("#status_usia_pelaku_kecelakaan_31_35_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_31_35_tahun, dataPrev.usia_pelaku_kecelakaan_31_35_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_31_35_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_31_35_tahun, dataPrev.usia_pelaku_kecelakaan_31_35_tahun))

                    $("#usia_pelaku_kecelakaan_36_40_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_36_40_tahun)
                    $("#usia_pelaku_kecelakaan_36_40_tahun").html(dataCurrent.usia_pelaku_kecelakaan_36_40_tahun)
                    $("#status_usia_pelaku_kecelakaan_36_40_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_36_40_tahun, dataPrev.usia_pelaku_kecelakaan_36_40_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_36_40_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_36_40_tahun, dataPrev.usia_pelaku_kecelakaan_36_40_tahun))

                    $("#usia_pelaku_kecelakaan_41_45_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_41_45_tahun)
                    $("#usia_pelaku_kecelakaan_41_45_tahun").html(dataCurrent.usia_pelaku_kecelakaan_41_45_tahun)
                    $("#status_usia_pelaku_kecelakaan_41_45_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_41_45_tahun, dataPrev.usia_pelaku_kecelakaan_41_45_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_41_45_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_41_45_tahun, dataPrev.usia_pelaku_kecelakaan_41_45_tahun))

                    $("#usia_pelaku_kecelakaan_46_50_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_46_50_tahun)
                    $("#usia_pelaku_kecelakaan_46_50_tahun").html(dataCurrent.usia_pelaku_kecelakaan_46_50_tahun)
                    $("#status_usia_pelaku_kecelakaan_46_50_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_46_50_tahun, dataPrev.usia_pelaku_kecelakaan_46_50_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_46_50_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_46_50_tahun, dataPrev.usia_pelaku_kecelakaan_46_50_tahun))

                    $("#usia_pelaku_kecelakaan_51_55_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_51_55_tahun)
                    $("#usia_pelaku_kecelakaan_51_55_tahun").html(dataCurrent.usia_pelaku_kecelakaan_51_55_tahun)
                    $("#status_usia_pelaku_kecelakaan_51_55_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_51_55_tahun, dataPrev.usia_pelaku_kecelakaan_51_55_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_51_55_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_51_55_tahun, dataPrev.usia_pelaku_kecelakaan_51_55_tahun))

                    $("#usia_pelaku_kecelakaan_56_60_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_56_60_tahun)
                    $("#usia_pelaku_kecelakaan_56_60_tahun").html(dataCurrent.usia_pelaku_kecelakaan_56_60_tahun)
                    $("#status_usia_pelaku_kecelakaan_56_60_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_56_60_tahun, dataPrev.usia_pelaku_kecelakaan_56_60_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_56_60_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_56_60_tahun, dataPrev.usia_pelaku_kecelakaan_56_60_tahun))

                    $("#usia_pelaku_kecelakaan_diatas_60_tahun_p").html(dataPrev.usia_pelaku_kecelakaan_diatas_60_tahun)
                    $("#usia_pelaku_kecelakaan_diatas_60_tahun").html(dataCurrent.usia_pelaku_kecelakaan_diatas_60_tahun)
                    $("#status_usia_pelaku_kecelakaan_diatas_60_tahun").html(percentageStatus(dataCurrent.usia_pelaku_kecelakaan_diatas_60_tahun, dataPrev.usia_pelaku_kecelakaan_diatas_60_tahun))
                    $("#persentase_usia_pelaku_kecelakaan_diatas_60_tahun").html(percentageValue(dataCurrent.usia_pelaku_kecelakaan_diatas_60_tahun, dataPrev.usia_pelaku_kecelakaan_diatas_60_tahun))

                    $("#sim_pelaku_kecelakaan_sim_a_p").html(dataPrev.sim_pelaku_kecelakaan_sim_a)
                    $("#sim_pelaku_kecelakaan_sim_a").html(dataCurrent.sim_pelaku_kecelakaan_sim_a)
                    $("#status_sim_pelaku_kecelakaan_sim_a").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_a, dataPrev.sim_pelaku_kecelakaan_sim_a))
                    $("#persentase_sim_pelaku_kecelakaan_sim_a").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_a, dataPrev.sim_pelaku_kecelakaan_sim_a))

                    $("#sim_pelaku_kecelakaan_sim_a_umum_p").html(dataPrev.sim_pelaku_kecelakaan_sim_a_umum)
                    $("#sim_pelaku_kecelakaan_sim_a_umum").html(dataCurrent.sim_pelaku_kecelakaan_sim_a_umum)
                    $("#status_sim_pelaku_kecelakaan_sim_a_umum").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_a_umum, dataPrev.sim_pelaku_kecelakaan_sim_a_umum))
                    $("#persentase_sim_pelaku_kecelakaan_sim_a_umum").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_a_umum, dataPrev.sim_pelaku_kecelakaan_sim_a_umum))

                    $("#sim_pelaku_kecelakaan_sim_b1_p").html(dataPrev.sim_pelaku_kecelakaan_sim_b1)
                    $("#sim_pelaku_kecelakaan_sim_b1").html(dataCurrent.sim_pelaku_kecelakaan_sim_b1)
                    $("#status_sim_pelaku_kecelakaan_sim_b1").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_b1, dataPrev.sim_pelaku_kecelakaan_sim_b1))
                    $("#persentase_sim_pelaku_kecelakaan_sim_b1").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_b1, dataPrev.sim_pelaku_kecelakaan_sim_b1))

                    $("#sim_pelaku_kecelakaan_sim_b1_umum_p").html(dataPrev.sim_pelaku_kecelakaan_sim_b1_umum)
                    $("#sim_pelaku_kecelakaan_sim_b1_umum").html(dataCurrent.sim_pelaku_kecelakaan_sim_b1_umum)
                    $("#status_sim_pelaku_kecelakaan_sim_b1_umum").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_b1_umum, dataPrev.sim_pelaku_kecelakaan_sim_b1_umum))
                    $("#persentase_sim_pelaku_kecelakaan_sim_b1_umum").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_b1_umum, dataPrev.sim_pelaku_kecelakaan_sim_b1_umum))

                    $("#sim_pelaku_kecelakaan_sim_b2_p").html(dataPrev.sim_pelaku_kecelakaan_sim_b2)
                    $("#sim_pelaku_kecelakaan_sim_b2").html(dataCurrent.sim_pelaku_kecelakaan_sim_b2)
                    $("#status_sim_pelaku_kecelakaan_sim_b2").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_b2, dataPrev.sim_pelaku_kecelakaan_sim_b2))
                    $("#persentase_sim_pelaku_kecelakaan_sim_b2").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_b2, dataPrev.sim_pelaku_kecelakaan_sim_b2))

                    $("#sim_pelaku_kecelakaan_sim_b2_umum_p").html(dataPrev.sim_pelaku_kecelakaan_sim_b2_umum)
                    $("#sim_pelaku_kecelakaan_sim_b2_umum").html(dataCurrent.sim_pelaku_kecelakaan_sim_b2_umum)
                    $("#status_sim_pelaku_kecelakaan_sim_b2_umum").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_b2_umum, dataPrev.sim_pelaku_kecelakaan_sim_b2_umum))
                    $("#persentase_sim_pelaku_kecelakaan_sim_b2_umum").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_b2_umum, dataPrev.sim_pelaku_kecelakaan_sim_b2_umum))

                    $("#sim_pelaku_kecelakaan_sim_c_p").html(dataPrev.sim_pelaku_kecelakaan_sim_c)
                    $("#sim_pelaku_kecelakaan_sim_c").html(dataCurrent.sim_pelaku_kecelakaan_sim_c)
                    $("#status_sim_pelaku_kecelakaan_sim_c").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_c, dataPrev.sim_pelaku_kecelakaan_sim_c))
                    $("#persentase_sim_pelaku_kecelakaan_sim_c").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_c, dataPrev.sim_pelaku_kecelakaan_sim_c))

                    $("#sim_pelaku_kecelakaan_sim_d_p").html(dataPrev.sim_pelaku_kecelakaan_sim_d)
                    $("#sim_pelaku_kecelakaan_sim_d").html(dataCurrent.sim_pelaku_kecelakaan_sim_d)
                    $("#status_sim_pelaku_kecelakaan_sim_d").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_d, dataPrev.sim_pelaku_kecelakaan_sim_d))
                    $("#persentase_sim_pelaku_kecelakaan_sim_d").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_d, dataPrev.sim_pelaku_kecelakaan_sim_d))

                    $("#sim_pelaku_kecelakaan_sim_internasional_p").html(dataPrev.sim_pelaku_kecelakaan_sim_internasional)
                    $("#sim_pelaku_kecelakaan_sim_internasional").html(dataCurrent.sim_pelaku_kecelakaan_sim_internasional)
                    $("#status_sim_pelaku_kecelakaan_sim_internasional").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_sim_internasional, dataPrev.sim_pelaku_kecelakaan_sim_internasional))
                    $("#persentase_sim_pelaku_kecelakaan_sim_internasional").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_sim_internasional, dataPrev.sim_pelaku_kecelakaan_sim_internasional))

                    $("#sim_pelaku_kecelakaan_tanpa_sim_p").html(dataPrev.sim_pelaku_kecelakaan_tanpa_sim)
                    $("#sim_pelaku_kecelakaan_tanpa_sim").html(dataCurrent.sim_pelaku_kecelakaan_tanpa_sim)
                    $("#status_sim_pelaku_kecelakaan_tanpa_sim").html(percentageStatus(dataCurrent.sim_pelaku_kecelakaan_tanpa_sim, dataPrev.sim_pelaku_kecelakaan_tanpa_sim))
                    $("#persentase_sim_pelaku_kecelakaan_tanpa_sim").html(percentageValue(dataCurrent.sim_pelaku_kecelakaan_tanpa_sim, dataPrev.sim_pelaku_kecelakaan_tanpa_sim))

                    $("#lokasi_kecelakaan_lalin_pemukiman_p").html(dataPrev.lokasi_kecelakaan_lalin_pemukiman)
                    $("#lokasi_kecelakaan_lalin_pemukiman").html(dataCurrent.lokasi_kecelakaan_lalin_pemukiman)
                    $("#status_lokasi_kecelakaan_lalin_pemukiman").html(percentageStatus(dataCurrent.lokasi_kecelakaan_lalin_pemukiman, dataPrev.lokasi_kecelakaan_lalin_pemukiman))
                    $("#persentase_lokasi_kecelakaan_lalin_pemukiman").html(percentageValue(dataCurrent.lokasi_kecelakaan_lalin_pemukiman, dataPrev.lokasi_kecelakaan_lalin_pemukiman))

                    $("#lokasi_kecelakaan_lalin_perbelanjaan_p").html(dataPrev.lokasi_kecelakaan_lalin_perbelanjaan)
                    $("#lokasi_kecelakaan_lalin_perbelanjaan").html(dataCurrent.lokasi_kecelakaan_lalin_perbelanjaan)
                    $("#status_lokasi_kecelakaan_lalin_perbelanjaan").html(percentageStatus(dataCurrent.lokasi_kecelakaan_lalin_perbelanjaan, dataPrev.lokasi_kecelakaan_lalin_perbelanjaan))
                    $("#persentase_lokasi_kecelakaan_lalin_perbelanjaan").html(percentageValue(dataCurrent.lokasi_kecelakaan_lalin_perbelanjaan, dataPrev.lokasi_kecelakaan_lalin_perbelanjaan))

                    $("#lokasi_kecelakaan_lalin_perkantoran_p").html(dataPrev.lokasi_kecelakaan_lalin_perkantoran)
                    $("#lokasi_kecelakaan_lalin_perkantoran").html(dataCurrent.lokasi_kecelakaan_lalin_perkantoran)
                    $("#status_lokasi_kecelakaan_lalin_perkantoran").html(percentageStatus(dataCurrent.lokasi_kecelakaan_lalin_perkantoran, dataPrev.lokasi_kecelakaan_lalin_perkantoran))
                    $("#persentase_lokasi_kecelakaan_lalin_perkantoran").html(percentageValue(dataCurrent.lokasi_kecelakaan_lalin_perkantoran, dataPrev.lokasi_kecelakaan_lalin_perkantoran))

                    $("#lokasi_kecelakaan_lalin_wisata_p").html(dataPrev.lokasi_kecelakaan_lalin_wisata)
                    $("#lokasi_kecelakaan_lalin_wisata").html(dataCurrent.lokasi_kecelakaan_lalin_wisata)
                    $("#status_lokasi_kecelakaan_lalin_wisata").html(percentageStatus(dataCurrent.lokasi_kecelakaan_lalin_wisata, dataPrev.lokasi_kecelakaan_lalin_wisata))
                    $("#persentase_lokasi_kecelakaan_lalin_wisata").html(percentageValue(dataCurrent.lokasi_kecelakaan_lalin_wisata, dataPrev.lokasi_kecelakaan_lalin_wisata))

                    $("#lokasi_kecelakaan_lalin_industri_p").html(dataPrev.lokasi_kecelakaan_lalin_industri)
                    $("#lokasi_kecelakaan_lalin_industri").html(dataCurrent.lokasi_kecelakaan_lalin_industri)
                    $("#status_lokasi_kecelakaan_lalin_industri").html(percentageStatus(dataCurrent.lokasi_kecelakaan_lalin_industri, dataPrev.lokasi_kecelakaan_lalin_industri))
                    $("#persentase_lokasi_kecelakaan_lalin_industri").html(percentageValue(dataCurrent.lokasi_kecelakaan_lalin_industri, dataPrev.lokasi_kecelakaan_lalin_industri))

                    $("#lokasi_kecelakaan_lalin_lain_lain_p").html(dataPrev.lokasi_kecelakaan_lalin_lain_lain)
                    $("#lokasi_kecelakaan_lalin_lain_lain").html(dataCurrent.lokasi_kecelakaan_lalin_lain_lain)
                    $("#status_lokasi_kecelakaan_lalin_lain_lain").html(percentageStatus(dataCurrent.lokasi_kecelakaan_lalin_lain_lain, dataPrev.lokasi_kecelakaan_lalin_lain_lain))
                    $("#persentase_lokasi_kecelakaan_lalin_lain_lain").html(percentageValue(dataCurrent.lokasi_kecelakaan_lalin_lain_lain, dataPrev.lokasi_kecelakaan_lalin_lain_lain))

                    $("#lokasi_kecelakaan_status_jalan_nasional_p").html(dataPrev.lokasi_kecelakaan_status_jalan_nasional)
                    $("#lokasi_kecelakaan_status_jalan_nasional").html(dataCurrent.lokasi_kecelakaan_status_jalan_nasional)
                    $("#status_lokasi_kecelakaan_status_jalan_nasional").html(percentageStatus(dataCurrent.lokasi_kecelakaan_status_jalan_nasional, dataPrev.lokasi_kecelakaan_status_jalan_nasional))
                    $("#persentase_lokasi_kecelakaan_status_jalan_nasional").html(percentageValue(dataCurrent.lokasi_kecelakaan_status_jalan_nasional, dataPrev.lokasi_kecelakaan_status_jalan_nasional))

                    $("#lokasi_kecelakaan_status_jalan_propinsi_p").html(dataPrev.lokasi_kecelakaan_status_jalan_propinsi)
                    $("#lokasi_kecelakaan_status_jalan_propinsi").html(dataCurrent.lokasi_kecelakaan_status_jalan_propinsi)
                    $("#status_lokasi_kecelakaan_status_jalan_propinsi").html(percentageStatus(dataCurrent.lokasi_kecelakaan_status_jalan_propinsi, dataPrev.lokasi_kecelakaan_status_jalan_propinsi))
                    $("#persentase_lokasi_kecelakaan_status_jalan_propinsi").html(percentageValue(dataCurrent.lokasi_kecelakaan_status_jalan_propinsi, dataPrev.lokasi_kecelakaan_status_jalan_propinsi))

                    $("#lokasi_kecelakaan_status_jalan_kab_kota_p").html(dataPrev.lokasi_kecelakaan_status_jalan_kab_kota)
                    $("#lokasi_kecelakaan_status_jalan_kab_kota").html(dataCurrent.lokasi_kecelakaan_status_jalan_kab_kota)
                    $("#status_lokasi_kecelakaan_status_jalan_kab_kota").html(percentageStatus(dataCurrent.lokasi_kecelakaan_status_jalan_kab_kota, dataPrev.lokasi_kecelakaan_status_jalan_kab_kota))
                    $("#persentase_lokasi_kecelakaan_status_jalan_kab_kota").html(percentageValue(dataCurrent.lokasi_kecelakaan_status_jalan_kab_kota, dataPrev.lokasi_kecelakaan_status_jalan_kab_kota))

                    $("#lokasi_kecelakaan_status_jalan_desa_lingkungan_p").html(dataPrev.lokasi_kecelakaan_status_jalan_desa_lingkungan)
                    $("#lokasi_kecelakaan_status_jalan_desa_lingkungan").html(dataCurrent.lokasi_kecelakaan_status_jalan_desa_lingkungan)
                    $("#status_lokasi_kecelakaan_status_jalan_desa_lingkungan").html(percentageStatus(dataCurrent.lokasi_kecelakaan_status_jalan_desa_lingkungan, dataPrev.lokasi_kecelakaan_status_jalan_desa_lingkungan))
                    $("#persentase_lokasi_kecelakaan_status_jalan_desa_lingkungan").html(percentageValue(dataCurrent.lokasi_kecelakaan_status_jalan_desa_lingkungan, dataPrev.lokasi_kecelakaan_status_jalan_desa_lingkungan))

                    $("#lokasi_kecelakaan_fungsi_jalan_arteri_p").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_arteri)
                    $("#lokasi_kecelakaan_fungsi_jalan_arteri").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_arteri)
                    $("#status_lokasi_kecelakaan_fungsi_jalan_arteri").html(percentageStatus(dataCurrent.lokasi_kecelakaan_fungsi_jalan_arteri, dataPrev.lokasi_kecelakaan_fungsi_jalan_arteri))
                    $("#persentase_lokasi_kecelakaan_fungsi_jalan_arteri").html(percentageValue(dataCurrent.lokasi_kecelakaan_fungsi_jalan_arteri, dataPrev.lokasi_kecelakaan_fungsi_jalan_arteri))

                    $("#lokasi_kecelakaan_fungsi_jalan_kolektor_p").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_kolektor)
                    $("#lokasi_kecelakaan_fungsi_jalan_kolektor").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_kolektor)
                    $("#status_lokasi_kecelakaan_fungsi_jalan_kolektor").html(percentageStatus(dataCurrent.lokasi_kecelakaan_fungsi_jalan_kolektor, dataPrev.lokasi_kecelakaan_fungsi_jalan_kolektor))
                    $("#persentase_lokasi_kecelakaan_fungsi_jalan_kolektor").html(percentageValue(dataCurrent.lokasi_kecelakaan_fungsi_jalan_kolektor, dataPrev.lokasi_kecelakaan_fungsi_jalan_kolektor))

                    $("#lokasi_kecelakaan_fungsi_jalan_lokal_p").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_lokal)
                    $("#lokasi_kecelakaan_fungsi_jalan_lokal").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lokal)
                    $("#status_lokasi_kecelakaan_fungsi_jalan_lokal").html(percentageStatus(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lokal, dataPrev.lokasi_kecelakaan_fungsi_jalan_lokal))
                    $("#persentase_lokasi_kecelakaan_fungsi_jalan_lokal").html(percentageValue(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lokal, dataPrev.lokasi_kecelakaan_fungsi_jalan_lokal))

                    $("#lokasi_kecelakaan_fungsi_jalan_lingkungan_p").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_lingkungan)
                    $("#lokasi_kecelakaan_fungsi_jalan_lingkungan").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lingkungan)
                    $("#status_lokasi_kecelakaan_fungsi_jalan_lingkungan").html(percentageStatus(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lingkungan, dataPrev.lokasi_kecelakaan_fungsi_jalan_lingkungan))
                    $("#persentase_lokasi_kecelakaan_fungsi_jalan_lingkungan").html(percentageValue(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lingkungan, dataPrev.lokasi_kecelakaan_fungsi_jalan_lingkungan))

                    $("#faktor_penyebab_kecelakaan_manusia_p").html(dataPrev.faktor_penyebab_kecelakaan_manusia)
                    $("#faktor_penyebab_kecelakaan_manusia").html(dataCurrent.faktor_penyebab_kecelakaan_manusia)
                    $("#status_faktor_penyebab_kecelakaan_manusia").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_manusia, dataPrev.faktor_penyebab_kecelakaan_manusia))
                    $("#persentase_faktor_penyebab_kecelakaan_manusia").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_manusia, dataPrev.faktor_penyebab_kecelakaan_manusia))

                    $("#faktor_penyebab_kecelakaan_ngantuk_lelah_p").html(dataPrev.faktor_penyebab_kecelakaan_ngantuk_lelah)
                    $("#faktor_penyebab_kecelakaan_ngantuk_lelah").html(dataCurrent.faktor_penyebab_kecelakaan_ngantuk_lelah)
                    $("#status_faktor_penyebab_kecelakaan_ngantuk_lelah").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_ngantuk_lelah, dataPrev.faktor_penyebab_kecelakaan_ngantuk_lelah))
                    $("#persentase_faktor_penyebab_kecelakaan_ngantuk_lelah").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_ngantuk_lelah, dataPrev.faktor_penyebab_kecelakaan_ngantuk_lelah))

                    $("#faktor_penyebab_kecelakaan_mabuk_obat_p").html(dataPrev.faktor_penyebab_kecelakaan_mabuk_obat)
                    $("#faktor_penyebab_kecelakaan_mabuk_obat").html(dataCurrent.faktor_penyebab_kecelakaan_mabuk_obat)
                    $("#status_faktor_penyebab_kecelakaan_mabuk_obat").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_mabuk_obat, dataPrev.faktor_penyebab_kecelakaan_mabuk_obat))
                    $("#persentase_faktor_penyebab_kecelakaan_mabuk_obat").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_mabuk_obat, dataPrev.faktor_penyebab_kecelakaan_mabuk_obat))

                    $("#faktor_penyebab_kecelakaan_sakit_p").html(dataPrev.faktor_penyebab_kecelakaan_sakit)
                    $("#faktor_penyebab_kecelakaan_sakit").html(dataCurrent.faktor_penyebab_kecelakaan_sakit)
                    $("#status_faktor_penyebab_kecelakaan_sakit").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_sakit, dataPrev.faktor_penyebab_kecelakaan_sakit))
                    $("#persentase_faktor_penyebab_kecelakaan_sakit").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_sakit, dataPrev.faktor_penyebab_kecelakaan_sakit))

                    $("#faktor_penyebab_kecelakaan_handphone_elektronik_p").html(dataPrev.faktor_penyebab_kecelakaan_handphone_elektronik)
                    $("#faktor_penyebab_kecelakaan_handphone_elektronik").html(dataCurrent.faktor_penyebab_kecelakaan_handphone_elektronik)
                    $("#status_faktor_penyebab_kecelakaan_handphone_elektronik").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_handphone_elektronik, dataPrev.faktor_penyebab_kecelakaan_handphone_elektronik))
                    $("#persentase_faktor_penyebab_kecelakaan_handphone_elektronik").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_handphone_elektronik, dataPrev.faktor_penyebab_kecelakaan_handphone_elektronik))

                    $("#faktor_penyebab_kecelakaan_menerobos_lampu_merah_p").html(dataPrev.faktor_penyebab_kecelakaan_menerobos_lampu_merah)
                    $("#faktor_penyebab_kecelakaan_menerobos_lampu_merah").html(dataCurrent.faktor_penyebab_kecelakaan_menerobos_lampu_merah)
                    $("#status_faktor_penyebab_kecelakaan_menerobos_lampu_merah").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_menerobos_lampu_merah, dataPrev.faktor_penyebab_kecelakaan_menerobos_lampu_merah))
                    $("#persentase_faktor_penyebab_kecelakaan_menerobos_lampu_merah").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_menerobos_lampu_merah, dataPrev.faktor_penyebab_kecelakaan_menerobos_lampu_merah))

                    $("#faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p").html(dataPrev.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan)
                    $("#faktor_penyebab_kecelakaan_melanggar_batas_kecepatan").html(dataCurrent.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan)
                    $("#status_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan, dataPrev.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan))
                    $("#persentase_faktor_penyebab_kecelakaan_melanggar_batas_kecepatan").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan, dataPrev.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan))

                    $("#faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p").html(dataPrev.faktor_penyebab_kecelakaan_tidak_menjaga_jarak)
                    $("#faktor_penyebab_kecelakaan_tidak_menjaga_jarak").html(dataCurrent.faktor_penyebab_kecelakaan_tidak_menjaga_jarak)
                    $("#status_faktor_penyebab_kecelakaan_tidak_menjaga_jarak").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_tidak_menjaga_jarak, dataPrev.faktor_penyebab_kecelakaan_tidak_menjaga_jarak))
                    $("#persentase_faktor_penyebab_kecelakaan_tidak_menjaga_jarak").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_tidak_menjaga_jarak, dataPrev.faktor_penyebab_kecelakaan_tidak_menjaga_jarak))

                    $("#faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p").html(dataPrev.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur)
                    $("#faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur").html(dataCurrent.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur)
                    $("#status_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur, dataPrev.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur))
                    $("#persentase_faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur, dataPrev.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur))

                    $("#faktor_penyebab_kecelakaan_berpindah_jalur_p").html(dataPrev.faktor_penyebab_kecelakaan_berpindah_jalur)
                    $("#faktor_penyebab_kecelakaan_berpindah_jalur").html(dataCurrent.faktor_penyebab_kecelakaan_berpindah_jalur)
                    $("#status_faktor_penyebab_kecelakaan_berpindah_jalur").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_berpindah_jalur, dataPrev.faktor_penyebab_kecelakaan_berpindah_jalur))
                    $("#persentase_faktor_penyebab_kecelakaan_berpindah_jalur").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_berpindah_jalur, dataPrev.faktor_penyebab_kecelakaan_berpindah_jalur))

                    $("#faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p").html(dataPrev.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat)
                    $("#faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat").html(dataCurrent.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat)
                    $("#status_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat, dataPrev.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat))
                    $("#persentase_faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat, dataPrev.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat))

                    $("#faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p").html(dataPrev.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki)
                    $("#faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki").html(dataCurrent.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki)
                    $("#status_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki, dataPrev.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki))
                    $("#persentase_faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki, dataPrev.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki))

                    $("#faktor_penyebab_kecelakaan_lainnya_p").html(dataPrev.faktor_penyebab_kecelakaan_lainnya)
                    $("#faktor_penyebab_kecelakaan_lainnya").html(dataCurrent.faktor_penyebab_kecelakaan_lainnya)
                    $("#status_faktor_penyebab_kecelakaan_lainnya").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_lainnya, dataPrev.faktor_penyebab_kecelakaan_lainnya))
                    $("#persentase_faktor_penyebab_kecelakaan_lainnya").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_lainnya, dataPrev.faktor_penyebab_kecelakaan_lainnya))

                    $("#faktor_penyebab_kecelakaan_alam_p").html(dataPrev.faktor_penyebab_kecelakaan_alam)
                    $("#faktor_penyebab_kecelakaan_alam").html(dataCurrent.faktor_penyebab_kecelakaan_alam)
                    $("#status_faktor_penyebab_kecelakaan_alam").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_alam, dataPrev.faktor_penyebab_kecelakaan_alam))
                    $("#persentase_faktor_penyebab_kecelakaan_alam").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_alam, dataPrev.faktor_penyebab_kecelakaan_alam))

                    $("#faktor_penyebab_kecelakaan_kelaikan_kendaraan_p").html(dataPrev.faktor_penyebab_kecelakaan_kelaikan_kendaraan)
                    $("#faktor_penyebab_kecelakaan_kelaikan_kendaraan").html(dataCurrent.faktor_penyebab_kecelakaan_kelaikan_kendaraan)
                    $("#status_faktor_penyebab_kecelakaan_kelaikan_kendaraan").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_kelaikan_kendaraan, dataPrev.faktor_penyebab_kecelakaan_kelaikan_kendaraan))
                    $("#persentase_faktor_penyebab_kecelakaan_kelaikan_kendaraan").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_kelaikan_kendaraan, dataPrev.faktor_penyebab_kecelakaan_kelaikan_kendaraan))

                    $("#faktor_penyebab_kecelakaan_kondisi_jalan_p").html(dataPrev.faktor_penyebab_kecelakaan_kondisi_jalan)
                    $("#faktor_penyebab_kecelakaan_kondisi_jalan").html(dataCurrent.faktor_penyebab_kecelakaan_kondisi_jalan)
                    $("#status_faktor_penyebab_kecelakaan_kondisi_jalan").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_kondisi_jalan, dataPrev.faktor_penyebab_kecelakaan_kondisi_jalan))
                    $("#persentase_faktor_penyebab_kecelakaan_kondisi_jalan").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_kondisi_jalan, dataPrev.faktor_penyebab_kecelakaan_kondisi_jalan))

                    $("#faktor_penyebab_kecelakaan_prasarana_jalan_p").html(dataPrev.faktor_penyebab_kecelakaan_prasarana_jalan)
                    $("#faktor_penyebab_kecelakaan_prasarana_jalan").html(dataCurrent.faktor_penyebab_kecelakaan_prasarana_jalan)
                    $("#status_faktor_penyebab_kecelakaan_prasarana_jalan").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_prasarana_jalan, dataPrev.faktor_penyebab_kecelakaan_prasarana_jalan))
                    $("#persentase_faktor_penyebab_kecelakaan_prasarana_jalan").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_prasarana_jalan, dataPrev.faktor_penyebab_kecelakaan_prasarana_jalan))

                    $("#faktor_penyebab_kecelakaan_rambu_p").html(dataPrev.faktor_penyebab_kecelakaan_rambu)
                    $("#faktor_penyebab_kecelakaan_rambu").html(dataCurrent.faktor_penyebab_kecelakaan_rambu)
                    $("#status_faktor_penyebab_kecelakaan_rambu").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_rambu, dataPrev.faktor_penyebab_kecelakaan_rambu))
                    $("#persentase_faktor_penyebab_kecelakaan_rambu").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_rambu, dataPrev.faktor_penyebab_kecelakaan_rambu))

                    $("#faktor_penyebab_kecelakaan_marka_p").html(dataPrev.faktor_penyebab_kecelakaan_marka)
                    $("#faktor_penyebab_kecelakaan_marka").html(dataCurrent.faktor_penyebab_kecelakaan_marka)
                    $("#status_faktor_penyebab_kecelakaan_marka").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_marka, dataPrev.faktor_penyebab_kecelakaan_marka))
                    $("#persentase_faktor_penyebab_kecelakaan_marka").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_marka, dataPrev.faktor_penyebab_kecelakaan_marka))

                    $("#faktor_penyebab_kecelakaan_apil_p").html(dataPrev.faktor_penyebab_kecelakaan_apil)
                    $("#faktor_penyebab_kecelakaan_apil").html(dataCurrent.faktor_penyebab_kecelakaan_apil)
                    $("#status_faktor_penyebab_kecelakaan_apil").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_apil, dataPrev.faktor_penyebab_kecelakaan_apil))
                    $("#persentase_faktor_penyebab_kecelakaan_apil").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_apil, dataPrev.faktor_penyebab_kecelakaan_apil))

                    $("#faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p").html(dataPrev.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu)
                    $("#faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu").html(dataCurrent.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu)
                    $("#status_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu").html(percentageStatus(dataCurrent.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu, dataPrev.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu))
                    $("#persentase_faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu").html(percentageValue(dataCurrent.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu, dataPrev.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu))

                    $("#waktu_kejadian_kecelakaan_00_03_p").html(dataPrev.waktu_kejadian_kecelakaan_00_03)
                    $("#waktu_kejadian_kecelakaan_00_03").html(dataCurrent.waktu_kejadian_kecelakaan_00_03)
                    $("#status_waktu_kejadian_kecelakaan_00_03").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_00_03, dataPrev.waktu_kejadian_kecelakaan_00_03))
                    $("#persentase_waktu_kejadian_kecelakaan_00_03").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_00_03, dataPrev.waktu_kejadian_kecelakaan_00_03))

                    $("#waktu_kejadian_kecelakaan_03_06_p").html(dataPrev.waktu_kejadian_kecelakaan_03_06)
                    $("#waktu_kejadian_kecelakaan_03_06").html(dataCurrent.waktu_kejadian_kecelakaan_03_06)
                    $("#status_waktu_kejadian_kecelakaan_03_06").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_03_06, dataPrev.waktu_kejadian_kecelakaan_03_06))
                    $("#persentase_waktu_kejadian_kecelakaan_03_06").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_03_06, dataPrev.waktu_kejadian_kecelakaan_03_06))

                    $("#waktu_kejadian_kecelakaan_06_09_p").html(dataPrev.waktu_kejadian_kecelakaan_06_09)
                    $("#waktu_kejadian_kecelakaan_06_09").html(dataCurrent.waktu_kejadian_kecelakaan_06_09)
                    $("#status_waktu_kejadian_kecelakaan_06_09").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_06_09, dataPrev.waktu_kejadian_kecelakaan_06_09))
                    $("#persentase_waktu_kejadian_kecelakaan_06_09").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_06_09, dataPrev.waktu_kejadian_kecelakaan_06_09))

                    $("#waktu_kejadian_kecelakaan_09_12_p").html(dataPrev.waktu_kejadian_kecelakaan_09_12)
                    $("#waktu_kejadian_kecelakaan_09_12").html(dataCurrent.waktu_kejadian_kecelakaan_09_12)
                    $("#status_waktu_kejadian_kecelakaan_09_12").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_09_12, dataPrev.waktu_kejadian_kecelakaan_09_12))
                    $("#persentase_waktu_kejadian_kecelakaan_09_12").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_09_12, dataPrev.waktu_kejadian_kecelakaan_09_12))

                    $("#waktu_kejadian_kecelakaan_12_15_p").html(dataPrev.waktu_kejadian_kecelakaan_12_15)
                    $("#waktu_kejadian_kecelakaan_12_15").html(dataCurrent.waktu_kejadian_kecelakaan_12_15)
                    $("#status_waktu_kejadian_kecelakaan_12_15").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_12_15, dataPrev.waktu_kejadian_kecelakaan_12_15))
                    $("#persentase_waktu_kejadian_kecelakaan_12_15").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_12_15, dataPrev.waktu_kejadian_kecelakaan_12_15))

                    $("#waktu_kejadian_kecelakaan_15_18_p").html(dataPrev.waktu_kejadian_kecelakaan_15_18)
                    $("#waktu_kejadian_kecelakaan_15_18").html(dataCurrent.waktu_kejadian_kecelakaan_15_18)
                    $("#status_waktu_kejadian_kecelakaan_15_18").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_15_18, dataPrev.waktu_kejadian_kecelakaan_15_18))
                    $("#persentase_waktu_kejadian_kecelakaan_15_18").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_15_18, dataPrev.waktu_kejadian_kecelakaan_15_18))

                    $("#waktu_kejadian_kecelakaan_18_21_p").html(dataPrev.waktu_kejadian_kecelakaan_18_21)
                    $("#waktu_kejadian_kecelakaan_18_21").html(dataCurrent.waktu_kejadian_kecelakaan_18_21)
                    $("#status_waktu_kejadian_kecelakaan_18_21").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_18_21, dataPrev.waktu_kejadian_kecelakaan_18_21))
                    $("#persentase_waktu_kejadian_kecelakaan_18_21").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_18_21, dataPrev.waktu_kejadian_kecelakaan_18_21))

                    $("#waktu_kejadian_kecelakaan_21_24_p").html(dataPrev.waktu_kejadian_kecelakaan_21_24)
                    $("#waktu_kejadian_kecelakaan_21_24").html(dataCurrent.waktu_kejadian_kecelakaan_21_24)
                    $("#status_waktu_kejadian_kecelakaan_21_24").html(percentageStatus(dataCurrent.waktu_kejadian_kecelakaan_21_24, dataPrev.waktu_kejadian_kecelakaan_21_24))
                    $("#persentase_waktu_kejadian_kecelakaan_21_24").html(percentageValue(dataCurrent.waktu_kejadian_kecelakaan_21_24, dataPrev.waktu_kejadian_kecelakaan_21_24))

                    $("#kecelakaan_lalin_menonjol_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_menonjol_jumlah_kejadian)
                    $("#kecelakaan_lalin_menonjol_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_menonjol_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_menonjol_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_menonjol_jumlah_kejadian, dataPrev.kecelakaan_lalin_menonjol_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_menonjol_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_menonjol_jumlah_kejadian, dataPrev.kecelakaan_lalin_menonjol_jumlah_kejadian))

                    $("#kecelakaan_lalin_menonjol_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_menonjol_korban_meninggal)
                    $("#kecelakaan_lalin_menonjol_korban_meninggal").html(dataCurrent.kecelakaan_lalin_menonjol_korban_meninggal)
                    $("#status_kecelakaan_lalin_menonjol_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_menonjol_korban_meninggal, dataPrev.kecelakaan_lalin_menonjol_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_menonjol_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_menonjol_korban_meninggal, dataPrev.kecelakaan_lalin_menonjol_korban_meninggal))

                    $("#kecelakaan_lalin_menonjol_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_menonjol_korban_luka_berat)
                    $("#kecelakaan_lalin_menonjol_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_berat)
                    $("#status_kecelakaan_lalin_menonjol_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_berat, dataPrev.kecelakaan_lalin_menonjol_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_menonjol_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_berat, dataPrev.kecelakaan_lalin_menonjol_korban_luka_berat))

                    $("#kecelakaan_lalin_menonjol_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_menonjol_korban_luka_ringan)
                    $("#kecelakaan_lalin_menonjol_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_menonjol_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_ringan, dataPrev.kecelakaan_lalin_menonjol_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_menonjol_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_ringan, dataPrev.kecelakaan_lalin_menonjol_korban_luka_ringan))

                    $("#kecelakaan_lalin_menonjol_materiil_p").html(dataPrev.kecelakaan_lalin_menonjol_materiil)
                    $("#kecelakaan_lalin_menonjol_materiil").html(dataCurrent.kecelakaan_lalin_menonjol_materiil)
                    $("#status_kecelakaan_lalin_menonjol_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_menonjol_materiil, dataPrev.kecelakaan_lalin_menonjol_materiil))
                    $("#persentase_kecelakaan_lalin_menonjol_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_menonjol_materiil, dataPrev.kecelakaan_lalin_menonjol_materiil))

                    $("#kecelakaan_lalin_tunggal_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_tunggal_jumlah_kejadian)
                    $("#kecelakaan_lalin_tunggal_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_tunggal_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_tunggal_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_tunggal_jumlah_kejadian, dataPrev.kecelakaan_lalin_tunggal_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_tunggal_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_tunggal_jumlah_kejadian, dataPrev.kecelakaan_lalin_tunggal_jumlah_kejadian))

                    $("#kecelakaan_lalin_tunggal_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_tunggal_korban_meninggal)
                    $("#kecelakaan_lalin_tunggal_korban_meninggal").html(dataCurrent.kecelakaan_lalin_tunggal_korban_meninggal)
                    $("#status_kecelakaan_lalin_tunggal_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_tunggal_korban_meninggal, dataPrev.kecelakaan_lalin_tunggal_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_tunggal_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_tunggal_korban_meninggal, dataPrev.kecelakaan_lalin_tunggal_korban_meninggal))

                    $("#kecelakaan_lalin_tunggal_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_tunggal_korban_luka_berat)
                    $("#kecelakaan_lalin_tunggal_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_berat)
                    $("#status_kecelakaan_lalin_tunggal_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_berat, dataPrev.kecelakaan_lalin_tunggal_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_tunggal_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_berat, dataPrev.kecelakaan_lalin_tunggal_korban_luka_berat))

                    $("#kecelakaan_lalin_tunggal_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_tunggal_korban_luka_ringan)
                    $("#kecelakaan_lalin_tunggal_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_tunggal_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_ringan, dataPrev.kecelakaan_lalin_tunggal_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_tunggal_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_ringan, dataPrev.kecelakaan_lalin_tunggal_korban_luka_ringan))

                    $("#kecelakaan_lalin_tunggal_materiil_p").html(dataPrev.kecelakaan_lalin_tunggal_materiil)
                    $("#kecelakaan_lalin_tunggal_materiil").html(dataCurrent.kecelakaan_lalin_tunggal_materiil)
                    $("#status_kecelakaan_lalin_tunggal_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_tunggal_materiil, dataPrev.kecelakaan_lalin_tunggal_materiil))
                    $("#persentase_kecelakaan_lalin_tunggal_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_tunggal_materiil, dataPrev.kecelakaan_lalin_tunggal_materiil))

                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian)
                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian))

                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal)
                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal)
                    $("#status_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal))

                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat)
                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat)
                    $("#status_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat))

                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan)
                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan))

                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_materiil)
                    $("#kecelakaan_lalin_tabrak_pejalan_kaki_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_materiil)
                    $("#status_kecelakaan_lalin_tabrak_pejalan_kaki_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_materiil, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_materiil))
                    $("#persentase_kecelakaan_lalin_tabrak_pejalan_kaki_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_materiil, dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_materiil))

                    $("#kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_tabrak_lari_jumlah_kejadian)
                    $("#kecelakaan_lalin_tabrak_lari_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_lari_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_tabrak_lari_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_lari_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_lari_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_tabrak_lari_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_lari_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_lari_jumlah_kejadian))

                    $("#kecelakaan_lalin_tabrak_lari_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_tabrak_lari_korban_meninggal)
                    $("#kecelakaan_lalin_tabrak_lari_korban_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_meninggal)
                    $("#status_kecelakaan_lalin_tabrak_lari_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_lari_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_tabrak_lari_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_lari_korban_meninggal))

                    $("#kecelakaan_lalin_tabrak_lari_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_berat)
                    $("#kecelakaan_lalin_tabrak_lari_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_berat)
                    $("#status_kecelakaan_lalin_tabrak_lari_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_tabrak_lari_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_berat))

                    $("#kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_ringan)
                    $("#kecelakaan_lalin_tabrak_lari_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_tabrak_lari_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_tabrak_lari_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_ringan))

                    $("#kecelakaan_lalin_tabrak_lari_materiil_p").html(dataPrev.kecelakaan_lalin_tabrak_lari_materiil)
                    $("#kecelakaan_lalin_tabrak_lari_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_lari_materiil)
                    $("#status_kecelakaan_lalin_tabrak_lari_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_lari_materiil, dataPrev.kecelakaan_lalin_tabrak_lari_materiil))
                    $("#persentase_kecelakaan_lalin_tabrak_lari_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_lari_materiil, dataPrev.kecelakaan_lalin_tabrak_lari_materiil))

                    $("#kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian)
                    $("#kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian))

                    $("#kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal)
                    $("#kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal)
                    $("#status_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal))

                    $("#kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat)
                    $("#kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat)
                    $("#status_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat))

                    $("#kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan)
                    $("#kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan))

                    $("#kecelakaan_lalin_tabrak_sepeda_motor_materiil_p").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_materiil)
                    $("#kecelakaan_lalin_tabrak_sepeda_motor_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_materiil)
                    $("#status_kecelakaan_lalin_tabrak_sepeda_motor_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_materiil, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_materiil))
                    $("#persentase_kecelakaan_lalin_tabrak_sepeda_motor_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_materiil, dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_materiil))

                    $("#kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian)
                    $("#kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian))

                    $("#kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal)
                    $("#kecelakaan_lalin_tabrak_roda_empat_korban_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal)
                    $("#status_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_tabrak_roda_empat_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal))

                    $("#kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat)
                    $("#kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat)
                    $("#status_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat))

                    $("#kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan)
                    $("#kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan))

                    $("#kecelakaan_lalin_tabrak_roda_empat_materiil_p").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_materiil)
                    $("#kecelakaan_lalin_tabrak_roda_empat_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_materiil)
                    $("#status_kecelakaan_lalin_tabrak_roda_empat_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_materiil, dataPrev.kecelakaan_lalin_tabrak_roda_empat_materiil))
                    $("#persentase_kecelakaan_lalin_tabrak_roda_empat_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_materiil, dataPrev.kecelakaan_lalin_tabrak_roda_empat_materiil))

                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian)
                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian))

                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal)
                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal)
                    $("#status_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal))

                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat)
                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat)
                    $("#status_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat))

                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan)
                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan))

                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_materiil)
                    $("#kecelakaan_lalin_tabrak_tidak_bermotor_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_materiil)
                    $("#status_kecelakaan_lalin_tabrak_tidak_bermotor_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_materiil, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_materiil))
                    $("#persentase_kecelakaan_lalin_tabrak_tidak_bermotor_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_materiil, dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_materiil))

                    $("#kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian)
                    $("#kecelakaan_lalin_perlintasan_ka_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian)
                    $("#status_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian, dataPrev.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_jumlah_kejadian").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian, dataPrev.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian))

                    $("#kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_berpalang_pintu)
                    $("#kecelakaan_lalin_perlintasan_ka_berpalang_pintu").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_berpalang_pintu)
                    $("#status_kecelakaan_lalin_perlintasan_ka_berpalang_pintu").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_berpalang_pintu, dataPrev.kecelakaan_lalin_perlintasan_ka_berpalang_pintu))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_berpalang_pintu").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_berpalang_pintu, dataPrev.kecelakaan_lalin_perlintasan_ka_berpalang_pintu))

                    $("#kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu)
                    $("#kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu)
                    $("#status_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu, dataPrev.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu, dataPrev.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu))

                    $("#kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan)
                    $("#kecelakaan_lalin_perlintasan_ka_korban_luka_ringan").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan)
                    $("#status_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan, dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_korban_luka_ringan").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan, dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan))

                    $("#kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_berat)
                    $("#kecelakaan_lalin_perlintasan_ka_korban_luka_berat").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_berat)
                    $("#status_kecelakaan_lalin_perlintasan_ka_korban_luka_berat").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_berat, dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_berat))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_korban_luka_berat").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_berat, dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_berat))

                    $("#kecelakaan_lalin_perlintasan_ka_korban_meninggal_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_korban_meninggal)
                    $("#kecelakaan_lalin_perlintasan_ka_korban_meninggal").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_meninggal)
                    $("#status_kecelakaan_lalin_perlintasan_ka_korban_meninggal").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_meninggal, dataPrev.kecelakaan_lalin_perlintasan_ka_korban_meninggal))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_korban_meninggal").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_meninggal, dataPrev.kecelakaan_lalin_perlintasan_ka_korban_meninggal))

                    $("#kecelakaan_lalin_perlintasan_ka_materiil_p").html(dataPrev.kecelakaan_lalin_perlintasan_ka_materiil)
                    $("#kecelakaan_lalin_perlintasan_ka_materiil").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_materiil)
                    $("#status_kecelakaan_lalin_perlintasan_ka_materiil").html(percentageStatus(dataCurrent.kecelakaan_lalin_perlintasan_ka_materiil, dataPrev.kecelakaan_lalin_perlintasan_ka_materiil))
                    $("#persentase_kecelakaan_lalin_perlintasan_ka_materiil").html(percentageValue(dataCurrent.kecelakaan_lalin_perlintasan_ka_materiil, dataPrev.kecelakaan_lalin_perlintasan_ka_materiil))

                    $("#kecelakaan_transportasi_kereta_api_p").html(dataPrev.kecelakaan_transportasi_kereta_api)
                    $("#kecelakaan_transportasi_kereta_api").html(dataCurrent.kecelakaan_transportasi_kereta_api)
                    $("#status_kecelakaan_transportasi_kereta_api").html(percentageStatus(dataCurrent.kecelakaan_transportasi_kereta_api, dataPrev.kecelakaan_transportasi_kereta_api))
                    $("#persentase_kecelakaan_transportasi_kereta_api").html(percentageValue(dataCurrent.kecelakaan_transportasi_kereta_api, dataPrev.kecelakaan_transportasi_kereta_api))

                    $("#kecelakaan_transportasi_laut_perairan_p").html(dataPrev.kecelakaan_transportasi_laut_perairan)
                    $("#kecelakaan_transportasi_laut_perairan").html(dataCurrent.kecelakaan_transportasi_laut_perairan)
                    $("#status_kecelakaan_transportasi_laut_perairan").html(percentageStatus(dataCurrent.kecelakaan_transportasi_laut_perairan, dataPrev.kecelakaan_transportasi_laut_perairan))
                    $("#persentase_kecelakaan_transportasi_laut_perairan").html(percentageValue(dataCurrent.kecelakaan_transportasi_laut_perairan, dataPrev.kecelakaan_transportasi_laut_perairan))

                    $("#kecelakaan_transportasi_udara_p").html(dataPrev.kecelakaan_transportasi_udara)
                    $("#kecelakaan_transportasi_udara").html(dataCurrent.kecelakaan_transportasi_udara)
                    $("#status_kecelakaan_transportasi_udara").html(percentageStatus(dataCurrent.kecelakaan_transportasi_udara, dataPrev.kecelakaan_transportasi_udara))
                    $("#persentase_kecelakaan_transportasi_udara").html(percentageValue(dataCurrent.kecelakaan_transportasi_udara, dataPrev.kecelakaan_transportasi_udara))

                    $("#penlu_melalui_media_cetak_p").html(dataPrev.penlu_melalui_media_cetak)
                    $("#penlu_melalui_media_cetak").html(dataCurrent.penlu_melalui_media_cetak)
                    $("#status_penlu_melalui_media_cetak").html(percentageStatus(dataCurrent.penlu_melalui_media_cetak, dataPrev.penlu_melalui_media_cetak))
                    $("#persentase_penlu_melalui_media_cetak").html(percentageValue(dataCurrent.penlu_melalui_media_cetak, dataPrev.penlu_melalui_media_cetak))

                    $("#penlu_melalui_media_elektronik_p").html(dataPrev.penlu_melalui_media_elektronik)
                    $("#penlu_melalui_media_elektronik").html(dataCurrent.penlu_melalui_media_elektronik)
                    $("#status_penlu_melalui_media_elektronik").html(percentageStatus(dataCurrent.penlu_melalui_media_elektronik, dataPrev.penlu_melalui_media_elektronik))
                    $("#persentase_penlu_melalui_media_elektronik").html(percentageValue(dataCurrent.penlu_melalui_media_elektronik, dataPrev.penlu_melalui_media_elektronik))

                    $("#penlu_melalui_media_sosial_p").html(dataPrev.penlu_melalui_media_sosial)
                    $("#penlu_melalui_media_sosial").html(dataCurrent.penlu_melalui_media_sosial)
                    $("#status_penlu_melalui_media_sosial").html(percentageStatus(dataCurrent.penlu_melalui_media_sosial, dataPrev.penlu_melalui_media_sosial))
                    $("#persentase_penlu_melalui_media_sosial").html(percentageValue(dataCurrent.penlu_melalui_media_sosial, dataPrev.penlu_melalui_media_sosial))

                    $("#penlu_melalui_tempat_keramaian_p").html(dataPrev.penlu_melalui_tempat_keramaian)
                    $("#penlu_melalui_tempat_keramaian").html(dataCurrent.penlu_melalui_tempat_keramaian)
                    $("#status_penlu_melalui_tempat_keramaian").html(percentageStatus(dataCurrent.penlu_melalui_tempat_keramaian, dataPrev.penlu_melalui_tempat_keramaian))
                    $("#persentase_penlu_melalui_tempat_keramaian").html(percentageValue(dataCurrent.penlu_melalui_tempat_keramaian, dataPrev.penlu_melalui_tempat_keramaian))

                    $("#penlu_melalui_tempat_istirahat_p").html(dataPrev.penlu_melalui_tempat_istirahat)
                    $("#penlu_melalui_tempat_istirahat").html(dataCurrent.penlu_melalui_tempat_istirahat)
                    $("#status_penlu_melalui_tempat_istirahat").html(percentageStatus(dataCurrent.penlu_melalui_tempat_istirahat, dataPrev.penlu_melalui_tempat_istirahat))
                    $("#persentase_penlu_melalui_tempat_istirahat").html(percentageValue(dataCurrent.penlu_melalui_tempat_istirahat, dataPrev.penlu_melalui_tempat_istirahat))

                    $("#penlu_melalui_daerah_rawan_laka_dan_langgar_p").html(dataPrev.penlu_melalui_daerah_rawan_laka_dan_langgar)
                    $("#penlu_melalui_daerah_rawan_laka_dan_langgar").html(dataCurrent.penlu_melalui_daerah_rawan_laka_dan_langgar)
                    $("#status_penlu_melalui_daerah_rawan_laka_dan_langgar").html(percentageStatus(dataCurrent.penlu_melalui_daerah_rawan_laka_dan_langgar, dataPrev.penlu_melalui_daerah_rawan_laka_dan_langgar))
                    $("#persentase_penlu_melalui_daerah_rawan_laka_dan_langgar").html(percentageValue(dataCurrent.penlu_melalui_daerah_rawan_laka_dan_langgar, dataPrev.penlu_melalui_daerah_rawan_laka_dan_langgar))

                    $("#penyebaran_pemasangan_spanduk_p").html(dataPrev.penyebaran_pemasangan_spanduk)
                    $("#penyebaran_pemasangan_spanduk").html(dataCurrent.penyebaran_pemasangan_spanduk)
                    $("#status_penyebaran_pemasangan_spanduk").html(percentageStatus(dataCurrent.penyebaran_pemasangan_spanduk, dataPrev.penyebaran_pemasangan_spanduk))
                    $("#persentase_penyebaran_pemasangan_spanduk").html(percentageValue(dataCurrent.penyebaran_pemasangan_spanduk, dataPrev.penyebaran_pemasangan_spanduk))

                    $("#penyebaran_pemasangan_leaflet_p").html(dataPrev.penyebaran_pemasangan_leaflet)
                    $("#penyebaran_pemasangan_leaflet").html(dataCurrent.penyebaran_pemasangan_leaflet)
                    $("#status_penyebaran_pemasangan_leaflet").html(percentageStatus(dataCurrent.penyebaran_pemasangan_leaflet, dataPrev.penyebaran_pemasangan_leaflet))
                    $("#persentase_penyebaran_pemasangan_leaflet").html(percentageValue(dataCurrent.penyebaran_pemasangan_leaflet, dataPrev.penyebaran_pemasangan_leaflet))

                    $("#penyebaran_pemasangan_sticker_p").html(dataPrev.penyebaran_pemasangan_sticker)
                    $("#penyebaran_pemasangan_sticker").html(dataCurrent.penyebaran_pemasangan_sticker)
                    $("#status_penyebaran_pemasangan_sticker").html(percentageStatus(dataCurrent.penyebaran_pemasangan_sticker, dataPrev.penyebaran_pemasangan_sticker))
                    $("#persentase_penyebaran_pemasangan_sticker").html(percentageValue(dataCurrent.penyebaran_pemasangan_sticker, dataPrev.penyebaran_pemasangan_sticker))

                    $("#penyebaran_pemasangan_bilboard_p").html(dataPrev.penyebaran_pemasangan_bilboard)
                    $("#penyebaran_pemasangan_bilboard").html(dataCurrent.penyebaran_pemasangan_bilboard)
                    $("#status_penyebaran_pemasangan_bilboard").html(percentageStatus(dataCurrent.penyebaran_pemasangan_bilboard, dataPrev.penyebaran_pemasangan_bilboard))
                    $("#persentase_penyebaran_pemasangan_bilboard").html(percentageValue(dataCurrent.penyebaran_pemasangan_bilboard, dataPrev.penyebaran_pemasangan_bilboard))

                    $("#polisi_sahabat_anak_p").html(dataPrev.polisi_sahabat_anak)
                    $("#polisi_sahabat_anak").html(dataCurrent.polisi_sahabat_anak)
                    $("#status_polisi_sahabat_anak").html(percentageStatus(dataCurrent.polisi_sahabat_anak, dataPrev.polisi_sahabat_anak))
                    $("#persentase_polisi_sahabat_anak").html(percentageValue(dataCurrent.polisi_sahabat_anak, dataPrev.polisi_sahabat_anak))

                    $("#cara_aman_sekolah_p").html(dataPrev.cara_aman_sekolah)
                    $("#cara_aman_sekolah").html(dataCurrent.cara_aman_sekolah)
                    $("#status_cara_aman_sekolah").html(percentageStatus(dataCurrent.cara_aman_sekolah, dataPrev.cara_aman_sekolah))
                    $("#persentase_cara_aman_sekolah").html(percentageValue(dataCurrent.cara_aman_sekolah, dataPrev.cara_aman_sekolah))

                    $("#patroli_keamanan_sekolah_p").html(dataPrev.patroli_keamanan_sekolah)
                    $("#patroli_keamanan_sekolah").html(dataCurrent.patroli_keamanan_sekolah)
                    $("#status_patroli_keamanan_sekolah").html(percentageStatus(dataCurrent.patroli_keamanan_sekolah, dataPrev.patroli_keamanan_sekolah))
                    $("#persentase_patroli_keamanan_sekolah").html(percentageValue(dataCurrent.patroli_keamanan_sekolah, dataPrev.patroli_keamanan_sekolah))

                    $("#pramuka_bhayangkara_krida_lalu_lintas_p").html(dataPrev.pramuka_bhayangkara_krida_lalu_lintas)
                    $("#pramuka_bhayangkara_krida_lalu_lintas").html(dataCurrent.pramuka_bhayangkara_krida_lalu_lintas)
                    $("#status_pramuka_bhayangkara_krida_lalu_lintas").html(percentageStatus(dataCurrent.pramuka_bhayangkara_krida_lalu_lintas, dataPrev.pramuka_bhayangkara_krida_lalu_lintas))
                    $("#persentase_pramuka_bhayangkara_krida_lalu_lintas").html(percentageValue(dataCurrent.pramuka_bhayangkara_krida_lalu_lintas, dataPrev.pramuka_bhayangkara_krida_lalu_lintas))

                    $("#police_goes_to_campus_p").html(dataPrev.police_goes_to_campus)
                    $("#police_goes_to_campus").html(dataCurrent.police_goes_to_campus)
                    $("#status_police_goes_to_campus").html(percentageStatus(dataCurrent.police_goes_to_campus, dataPrev.police_goes_to_campus))
                    $("#persentase_police_goes_to_campus").html(percentageValue(dataCurrent.police_goes_to_campus, dataPrev.police_goes_to_campus))

                    $("#safety_riding_driving_p").html(dataPrev.safety_riding_driving)
                    $("#safety_riding_driving").html(dataCurrent.safety_riding_driving)
                    $("#status_safety_riding_driving").html(percentageStatus(dataCurrent.safety_riding_driving, dataPrev.safety_riding_driving))
                    $("#persentase_safety_riding_driving").html(percentageValue(dataCurrent.safety_riding_driving, dataPrev.safety_riding_driving))

                    $("#forum_lalu_lintas_angkutan_umum_p").html(dataPrev.forum_lalu_lintas_angkutan_umum)
                    $("#forum_lalu_lintas_angkutan_umum").html(dataCurrent.forum_lalu_lintas_angkutan_umum)
                    $("#status_forum_lalu_lintas_angkutan_umum").html(percentageStatus(dataCurrent.forum_lalu_lintas_angkutan_umum, dataPrev.forum_lalu_lintas_angkutan_umum))
                    $("#persentase_forum_lalu_lintas_angkutan_umum").html(percentageValue(dataCurrent.forum_lalu_lintas_angkutan_umum, dataPrev.forum_lalu_lintas_angkutan_umum))

                    $("#kampanye_keselamatan_p").html(dataPrev.kampanye_keselamatan)
                    $("#kampanye_keselamatan").html(dataCurrent.kampanye_keselamatan)
                    $("#status_kampanye_keselamatan").html(percentageStatus(dataCurrent.kampanye_keselamatan, dataPrev.kampanye_keselamatan))
                    $("#persentase_kampanye_keselamatan").html(percentageValue(dataCurrent.kampanye_keselamatan, dataPrev.kampanye_keselamatan))

                    $("#sekolah_mengemudi_p").html(dataPrev.sekolah_mengemudi)
                    $("#sekolah_mengemudi").html(dataCurrent.sekolah_mengemudi)
                    $("#status_sekolah_mengemudi").html(percentageStatus(dataCurrent.sekolah_mengemudi, dataPrev.sekolah_mengemudi))
                    $("#persentase_sekolah_mengemudi").html(percentageValue(dataCurrent.sekolah_mengemudi, dataPrev.sekolah_mengemudi))

                    $("#taman_lalu_lintas_p").html(dataPrev.taman_lalu_lintas)
                    $("#taman_lalu_lintas").html(dataCurrent.taman_lalu_lintas)
                    $("#status_taman_lalu_lintas").html(percentageStatus(dataCurrent.taman_lalu_lintas, dataPrev.taman_lalu_lintas))
                    $("#persentase_taman_lalu_lintas").html(percentageValue(dataCurrent.taman_lalu_lintas, dataPrev.taman_lalu_lintas))

                    $("#global_road_safety_partnership_action_p").html(dataPrev.global_road_safety_partnership_action)
                    $("#global_road_safety_partnership_action").html(dataCurrent.global_road_safety_partnership_action)
                    $("#status_global_road_safety_partnership_action").html(percentageStatus(dataCurrent.global_road_safety_partnership_action, dataPrev.global_road_safety_partnership_action))
                    $("#persentase_global_road_safety_partnership_action").html(percentageValue(dataCurrent.global_road_safety_partnership_action, dataPrev.global_road_safety_partnership_action))

                    $("#giat_lantas_pengaturan_p").html(dataPrev.giat_lantas_pengaturan)
                    $("#giat_lantas_pengaturan").html(dataCurrent.giat_lantas_pengaturan)
                    $("#status_giat_lantas_pengaturan").html(percentageStatus(dataCurrent.giat_lantas_pengaturan, dataPrev.giat_lantas_pengaturan))
                    $("#persentase_giat_lantas_pengaturan").html(percentageValue(dataCurrent.giat_lantas_pengaturan, dataPrev.giat_lantas_pengaturan))

                    $("#giat_lantas_penjagaan_p").html(dataPrev.giat_lantas_penjagaan)
                    $("#giat_lantas_penjagaan").html(dataCurrent.giat_lantas_penjagaan)
                    $("#status_giat_lantas_penjagaan").html(percentageStatus(dataCurrent.giat_lantas_penjagaan, dataPrev.giat_lantas_penjagaan))
                    $("#persentase_giat_lantas_penjagaan").html(percentageValue(dataCurrent.giat_lantas_penjagaan, dataPrev.giat_lantas_penjagaan))

                    $("#giat_lantas_pengawalan_p").html(dataPrev.giat_lantas_pengawalan)
                    $("#giat_lantas_pengawalan").html(dataCurrent.giat_lantas_pengawalan)
                    $("#status_giat_lantas_pengawalan").html(percentageStatus(dataCurrent.giat_lantas_pengawalan, dataPrev.giat_lantas_pengawalan))
                    $("#persentase_giat_lantas_pengawalan").html(percentageValue(dataCurrent.giat_lantas_pengawalan, dataPrev.giat_lantas_pengawalan))

                    $("#giat_lantas_patroli_p").html(dataPrev.giat_lantas_patroli)
                    $("#giat_lantas_patroli").html(dataCurrent.giat_lantas_patroli)
                    $("#status_giat_lantas_patroli").html(percentageStatus(dataCurrent.giat_lantas_patroli, dataPrev.giat_lantas_patroli))
                    $("#persentase_giat_lantas_patroli").html(percentageValue(dataCurrent.giat_lantas_patroli, dataPrev.giat_lantas_patroli))

                    $("#arus_mudik_jumlah_bus_keberangkatan_p").html(dataPrev.arus_mudik_jumlah_bus_keberangkatan)
                    $("#arus_mudik_jumlah_bus_keberangkatan").html(dataCurrent.arus_mudik_jumlah_bus_keberangkatan)
                    $("#status_arus_mudik_jumlah_bus_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_jumlah_bus_keberangkatan, dataPrev.arus_mudik_jumlah_bus_keberangkatan))
                    $("#persentase_arus_mudik_jumlah_bus_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_jumlah_bus_keberangkatan, dataPrev.arus_mudik_jumlah_bus_keberangkatan))

                    $("#arus_mudik_jumlah_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_jumlah_penumpang_keberangkatan)
                    $("#arus_mudik_jumlah_penumpang_keberangkatan").html(dataCurrent.arus_mudik_jumlah_penumpang_keberangkatan)
                    $("#status_arus_mudik_jumlah_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_jumlah_penumpang_keberangkatan, dataPrev.arus_mudik_jumlah_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_jumlah_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_jumlah_penumpang_keberangkatan, dataPrev.arus_mudik_jumlah_penumpang_keberangkatan))

                    $("#arus_mudik_jumlah_bus_kedatangan_p").html(dataPrev.arus_mudik_jumlah_bus_kedatangan)
                    $("#arus_mudik_jumlah_bus_kedatangan").html(dataCurrent.arus_mudik_jumlah_bus_kedatangan)
                    $("#status_arus_mudik_jumlah_bus_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_jumlah_bus_kedatangan, dataPrev.arus_mudik_jumlah_bus_kedatangan))
                    $("#persentase_arus_mudik_jumlah_bus_kedatangan").html(percentageValue(dataCurrent.arus_mudik_jumlah_bus_kedatangan, dataPrev.arus_mudik_jumlah_bus_kedatangan))

                    $("#arus_mudik_jumlah_penumpang_kedatangan_p").html(dataPrev.arus_mudik_jumlah_penumpang_kedatangan)
                    $("#arus_mudik_jumlah_penumpang_kedatangan").html(dataCurrent.arus_mudik_jumlah_penumpang_kedatangan)
                    $("#status_arus_mudik_jumlah_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_jumlah_penumpang_kedatangan, dataPrev.arus_mudik_jumlah_penumpang_kedatangan))
                    $("#persentase_arus_mudik_jumlah_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_jumlah_penumpang_kedatangan, dataPrev.arus_mudik_jumlah_penumpang_kedatangan))

                    $("#arus_mudik_total_terminal_p").html(dataPrev.arus_mudik_total_terminal)
                    $("#arus_mudik_total_terminal").html(dataCurrent.arus_mudik_total_terminal)
                    $("#status_arus_mudik_total_terminal").html(percentageStatus(dataCurrent.arus_mudik_total_terminal, dataPrev.arus_mudik_total_terminal))
                    $("#persentase_arus_mudik_total_terminal").html(percentageValue(dataCurrent.arus_mudik_total_terminal, dataPrev.arus_mudik_total_terminal))

                    $("#arus_mudik_total_bus_keberangkatan_p").html(dataPrev.arus_mudik_total_bus_keberangkatan)
                    $("#arus_mudik_total_bus_keberangkatan").html(dataCurrent.arus_mudik_total_bus_keberangkatan)
                    $("#status_arus_mudik_total_bus_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_total_bus_keberangkatan, dataPrev.arus_mudik_total_bus_keberangkatan))
                    $("#persentase_arus_mudik_total_bus_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_total_bus_keberangkatan, dataPrev.arus_mudik_total_bus_keberangkatan))

                    $("#arus_mudik_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_penumpang_keberangkatan)
                    $("#arus_mudik_penumpang_keberangkatan").html(dataCurrent.arus_mudik_penumpang_keberangkatan)
                    $("#status_arus_mudik_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_penumpang_keberangkatan, dataPrev.arus_mudik_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_penumpang_keberangkatan, dataPrev.arus_mudik_penumpang_keberangkatan))

                    $("#arus_mudik_total_bus_kedatangan_p").html(dataPrev.arus_mudik_total_bus_kedatangan)
                    $("#arus_mudik_total_bus_kedatangan").html(dataCurrent.arus_mudik_total_bus_kedatangan)
                    $("#status_arus_mudik_total_bus_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_total_bus_kedatangan, dataPrev.arus_mudik_total_bus_kedatangan))
                    $("#persentase_arus_mudik_total_bus_kedatangan").html(percentageValue(dataCurrent.arus_mudik_total_bus_kedatangan, dataPrev.arus_mudik_total_bus_kedatangan))

                    $("#arus_mudik_penumpang_kedatangan_p").html(dataPrev.arus_mudik_penumpang_kedatangan)
                    $("#arus_mudik_penumpang_kedatangan").html(dataCurrent.arus_mudik_penumpang_kedatangan)
                    $("#status_arus_mudik_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_penumpang_kedatangan, dataPrev.arus_mudik_penumpang_kedatangan))
                    $("#persentase_arus_mudik_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_penumpang_kedatangan, dataPrev.arus_mudik_penumpang_kedatangan))

                    $("#arus_mudik_kereta_api_total_stasiun_p").html(dataPrev.arus_mudik_kereta_api_total_stasiun)
                    $("#arus_mudik_kereta_api_total_stasiun").html(dataCurrent.arus_mudik_kereta_api_total_stasiun)
                    $("#status_arus_mudik_kereta_api_total_stasiun").html(percentageStatus(dataCurrent.arus_mudik_kereta_api_total_stasiun, dataPrev.arus_mudik_kereta_api_total_stasiun))
                    $("#persentase_arus_mudik_kereta_api_total_stasiun").html(percentageValue(dataCurrent.arus_mudik_kereta_api_total_stasiun, dataPrev.arus_mudik_kereta_api_total_stasiun))

                    $("#arus_mudik_kereta_api_total_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_kereta_api_total_penumpang_keberangkatan)
                    $("#arus_mudik_kereta_api_total_penumpang_keberangkatan").html(dataCurrent.arus_mudik_kereta_api_total_penumpang_keberangkatan)
                    $("#status_arus_mudik_kereta_api_total_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_kereta_api_total_penumpang_keberangkatan, dataPrev.arus_mudik_kereta_api_total_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_kereta_api_total_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_kereta_api_total_penumpang_keberangkatan, dataPrev.arus_mudik_kereta_api_total_penumpang_keberangkatan))

                    $("#arus_mudik_kereta_api_total_penumpang_kedatangan_p").html(dataPrev.arus_mudik_kereta_api_total_penumpang_kedatangan)
                    $("#arus_mudik_kereta_api_total_penumpang_kedatangan").html(dataCurrent.arus_mudik_kereta_api_total_penumpang_kedatangan)
                    $("#status_arus_mudik_kereta_api_total_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_kereta_api_total_penumpang_kedatangan, dataPrev.arus_mudik_kereta_api_total_penumpang_kedatangan))
                    $("#persentase_arus_mudik_kereta_api_total_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_kereta_api_total_penumpang_kedatangan, dataPrev.arus_mudik_kereta_api_total_penumpang_kedatangan))

                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan)
                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan").html(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan)
                    $("#status_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan))

                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4)
                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4").html(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4)
                    $("#status_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4))

                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2)
                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2").html(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2)
                    $("#status_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2))

                    $("#arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan)
                    $("#arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan").html(dataCurrent.arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan)
                    $("#status_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan, dataPrev.arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan, dataPrev.arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan))

                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan)
                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan").html(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan)
                    $("#status_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan))

                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4)
                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4").html(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4)
                    $("#status_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4))

                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2)
                    $("#arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2").html(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2)
                    $("#status_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2, dataPrev.arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2))

                    $("#arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p").html(dataPrev.arus_mudik_pelabuhan_jumlah_penumpang_kedatangan)
                    $("#arus_mudik_pelabuhan_jumlah_penumpang_kedatangan").html(dataCurrent.arus_mudik_pelabuhan_jumlah_penumpang_kedatangan)
                    $("#status_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_jumlah_penumpang_kedatangan, dataPrev.arus_mudik_pelabuhan_jumlah_penumpang_kedatangan))
                    $("#persentase_arus_mudik_pelabuhan_jumlah_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_jumlah_penumpang_kedatangan, dataPrev.arus_mudik_pelabuhan_jumlah_penumpang_kedatangan))

                    $("#arus_mudik_total_pelabuhan_p").html(dataPrev.arus_mudik_total_pelabuhan)
                    $("#arus_mudik_total_pelabuhan").html(dataCurrent.arus_mudik_total_pelabuhan)
                    $("#status_arus_mudik_total_pelabuhan").html(percentageStatus(dataCurrent.arus_mudik_total_pelabuhan, dataPrev.arus_mudik_total_pelabuhan))
                    $("#persentase_arus_mudik_total_pelabuhan").html(percentageValue(dataCurrent.arus_mudik_total_pelabuhan, dataPrev.arus_mudik_total_pelabuhan))

                    $("#arus_mudik_pelabuhan_kendaraan_keberangkatan_p").html(dataPrev.arus_mudik_pelabuhan_kendaraan_keberangkatan)
                    $("#arus_mudik_pelabuhan_kendaraan_keberangkatan").html(dataCurrent.arus_mudik_pelabuhan_kendaraan_keberangkatan)
                    $("#status_arus_mudik_pelabuhan_kendaraan_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_kendaraan_keberangkatan, dataPrev.arus_mudik_pelabuhan_kendaraan_keberangkatan))
                    $("#persentase_arus_mudik_pelabuhan_kendaraan_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_kendaraan_keberangkatan, dataPrev.arus_mudik_pelabuhan_kendaraan_keberangkatan))

                    $("#arus_mudik_pelabuhan_kendaraan_kedatangan_p").html(dataPrev.arus_mudik_pelabuhan_kendaraan_kedatangan)
                    $("#arus_mudik_pelabuhan_kendaraan_kedatangan").html(dataCurrent.arus_mudik_pelabuhan_kendaraan_kedatangan)
                    $("#status_arus_mudik_pelabuhan_kendaraan_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_kendaraan_kedatangan, dataPrev.arus_mudik_pelabuhan_kendaraan_kedatangan))
                    $("#persentase_arus_mudik_pelabuhan_kendaraan_kedatangan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_kendaraan_kedatangan, dataPrev.arus_mudik_pelabuhan_kendaraan_kedatangan))

                    $("#arus_mudik_pelabuhan_total_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_pelabuhan_total_penumpang_keberangkatan)
                    $("#arus_mudik_pelabuhan_total_penumpang_keberangkatan").html(dataCurrent.arus_mudik_pelabuhan_total_penumpang_keberangkatan)
                    $("#status_arus_mudik_pelabuhan_total_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_total_penumpang_keberangkatan, dataPrev.arus_mudik_pelabuhan_total_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_pelabuhan_total_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_total_penumpang_keberangkatan, dataPrev.arus_mudik_pelabuhan_total_penumpang_keberangkatan))

                    $("#arus_mudik_pelabuhan_total_penumpang_kedatangan_p").html(dataPrev.arus_mudik_pelabuhan_total_penumpang_kedatangan)
                    $("#arus_mudik_pelabuhan_total_penumpang_kedatangan").html(dataCurrent.arus_mudik_pelabuhan_total_penumpang_kedatangan)
                    $("#status_arus_mudik_pelabuhan_total_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_pelabuhan_total_penumpang_kedatangan, dataPrev.arus_mudik_pelabuhan_total_penumpang_kedatangan))
                    $("#persentase_arus_mudik_pelabuhan_total_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_pelabuhan_total_penumpang_kedatangan, dataPrev.arus_mudik_pelabuhan_total_penumpang_kedatangan))

                    $("#arus_mudik_bandara_jumlah_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_bandara_jumlah_penumpang_keberangkatan)
                    $("#arus_mudik_bandara_jumlah_penumpang_keberangkatan").html(dataCurrent.arus_mudik_bandara_jumlah_penumpang_keberangkatan)
                    $("#status_arus_mudik_bandara_jumlah_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_bandara_jumlah_penumpang_keberangkatan, dataPrev.arus_mudik_bandara_jumlah_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_bandara_jumlah_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_bandara_jumlah_penumpang_keberangkatan, dataPrev.arus_mudik_bandara_jumlah_penumpang_keberangkatan))

                    $("#arus_mudik_bandara_jumlah_penumpang_kedatangan_p").html(dataPrev.arus_mudik_bandara_jumlah_penumpang_kedatangan)
                    $("#arus_mudik_bandara_jumlah_penumpang_kedatangan").html(dataCurrent.arus_mudik_bandara_jumlah_penumpang_kedatangan)
                    $("#status_arus_mudik_bandara_jumlah_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_bandara_jumlah_penumpang_kedatangan, dataPrev.arus_mudik_bandara_jumlah_penumpang_kedatangan))
                    $("#persentase_arus_mudik_bandara_jumlah_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_bandara_jumlah_penumpang_kedatangan, dataPrev.arus_mudik_bandara_jumlah_penumpang_kedatangan))

                    $("#arus_mudik_total_bandara_p").html(dataPrev.arus_mudik_total_bandara)
                    $("#arus_mudik_total_bandara").html(dataCurrent.arus_mudik_total_bandara)
                    $("#status_arus_mudik_total_bandara").html(percentageStatus(dataCurrent.arus_mudik_total_bandara, dataPrev.arus_mudik_total_bandara))
                    $("#persentase_arus_mudik_total_bandara").html(percentageValue(dataCurrent.arus_mudik_total_bandara, dataPrev.arus_mudik_total_bandara))

                    $("#arus_mudik_bandara_total_penumpang_keberangkatan_p").html(dataPrev.arus_mudik_bandara_total_penumpang_keberangkatan)
                    $("#arus_mudik_bandara_total_penumpang_keberangkatan").html(dataCurrent.arus_mudik_bandara_total_penumpang_keberangkatan)
                    $("#status_arus_mudik_bandara_total_penumpang_keberangkatan").html(percentageStatus(dataCurrent.arus_mudik_bandara_total_penumpang_keberangkatan, dataPrev.arus_mudik_bandara_total_penumpang_keberangkatan))
                    $("#persentase_arus_mudik_bandara_total_penumpang_keberangkatan").html(percentageValue(dataCurrent.arus_mudik_bandara_total_penumpang_keberangkatan, dataPrev.arus_mudik_bandara_total_penumpang_keberangkatan))

                    $("#arus_mudik_bandara_total_penumpang_kedatangan_p").html(dataPrev.arus_mudik_bandara_total_penumpang_kedatangan)
                    $("#arus_mudik_bandara_total_penumpang_kedatangan").html(dataCurrent.arus_mudik_bandara_total_penumpang_kedatangan)
                    $("#status_arus_mudik_bandara_total_penumpang_kedatangan").html(percentageStatus(dataCurrent.arus_mudik_bandara_total_penumpang_kedatangan, dataPrev.arus_mudik_bandara_total_penumpang_kedatangan))
                    $("#persentase_arus_mudik_bandara_total_penumpang_kedatangan").html(percentageValue(dataCurrent.arus_mudik_bandara_total_penumpang_kedatangan, dataPrev.arus_mudik_bandara_total_penumpang_kedatangan))

                    $("#prokes_covid_teguran_gar_prokes_p").html(dataPrev.prokes_covid_teguran_gar_prokes)
                    $("#prokes_covid_teguran_gar_prokes").html(dataCurrent.prokes_covid_teguran_gar_prokes)
                    $("#status_prokes_covid_teguran_gar_prokes").html(percentageStatus(dataCurrent.prokes_covid_teguran_gar_prokes, dataPrev.prokes_covid_teguran_gar_prokes))
                    $("#persentase_prokes_covid_teguran_gar_prokes").html(percentageValue(dataCurrent.prokes_covid_teguran_gar_prokes, dataPrev.prokes_covid_teguran_gar_prokes))

                    $("#prokes_covid_pembagian_masker_p").html(dataPrev.prokes_covid_pembagian_masker)
                    $("#prokes_covid_pembagian_masker").html(dataCurrent.prokes_covid_pembagian_masker)
                    $("#status_prokes_covid_pembagian_masker").html(percentageStatus(dataCurrent.prokes_covid_pembagian_masker, dataPrev.prokes_covid_pembagian_masker))
                    $("#persentase_prokes_covid_pembagian_masker").html(percentageValue(dataCurrent.prokes_covid_pembagian_masker, dataPrev.prokes_covid_pembagian_masker))

                    $("#prokes_covid_sosialisasi_tentang_prokes_p").html(dataPrev.prokes_covid_sosialisasi_tentang_prokes)
                    $("#prokes_covid_sosialisasi_tentang_prokes").html(dataCurrent.prokes_covid_sosialisasi_tentang_prokes)
                    $("#status_prokes_covid_sosialisasi_tentang_prokes").html(percentageStatus(dataCurrent.prokes_covid_sosialisasi_tentang_prokes, dataPrev.prokes_covid_sosialisasi_tentang_prokes))
                    $("#persentase_prokes_covid_sosialisasi_tentang_prokes").html(percentageValue(dataCurrent.prokes_covid_sosialisasi_tentang_prokes, dataPrev.prokes_covid_sosialisasi_tentang_prokes))

                    $("#prokes_covid_giat_baksos_p").html(dataPrev.prokes_covid_giat_baksos)
                    $("#prokes_covid_giat_baksos").html(dataCurrent.prokes_covid_giat_baksos)
                    $("#status_prokes_covid_giat_baksos").html(percentageStatus(dataCurrent.prokes_covid_giat_baksos, dataPrev.prokes_covid_giat_baksos))
                    $("#persentase_prokes_covid_giat_baksos").html(percentageValue(dataCurrent.prokes_covid_giat_baksos, dataPrev.prokes_covid_giat_baksos))

                    })
                .catch(function(error) {
                    $("#panelLoading").addClass("d-none")
                    $("#panelData").removeClass("d-none")
                    swal("Data belum lengkap. Silakan periksa data yang akan diproses", error.response.data.output, "error")
                })
            }
        }
    })

    $(document).ready(function () {
        $("#btnUnduhData").prop('disabled', true)
    })
</script>
@endpush