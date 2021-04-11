@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>REKAP HARIAN</span>
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
    @include('flash::message')
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                <div class="col-md-12 text-left mb-3">
                    <div class="text-left">
                        <div class="row">
                            <a id="btnShowModal" class="btn add-operasi" href="javascript:void(0);"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="add_to_queue" d="M16,22H4a2,2,0,0,1-2-2V8H4V20H16Zm4-4H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2H20a2,2,0,0,1,2,2V16A2,2,0,0,1,20,18ZM8,4V16H20V4Zm7,10H13V11H10V9h3V6h2V9h3v2H15Z" transform="translate(-2 -2)" fill="#fff"/></svg>
                            REKAP LAPORAN
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-5">
                    <table id="tbl_rekap_daily" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="20%">Nama Laporan</th>
                                <th width="13%">Polda</th>
                                <th width="10%">Tahun</th>
                                <th width="21%">Nama Operasi</th>
                                <th width="20%">Tanggal Operasi</th>
                                <th width="6%">Lihat</th>
                                <th width="10%">Pilihan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('preview_pages.report_daily_add')
        @include('preview_pages.report_daily_edit')
        @include('preview_pages.report_daily_preview')
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/components/custom-sweetalert.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ secure_asset('template/datepicker/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ secure_asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ secure_asset('template/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('page_js')
<script>

$('#modalForm').on('hidden.bs.modal', function () {
    $("#report_name").val('')
    $("#hari").val('')
    $("#hari").addClass('d-none')
    $("#modalForm select").prop('selectedIndex', 0)
})

$('#daily_preview').on('hidden.bs.modal', function () {
    $(".data_load").empty()
})

$('#form_edit_rekap').on('hidden.bs.modal', function () {
    $("#hari_edit").addClass("d-none")
})

$(document).ready(function () {

    $("#btnShowModal").click(function (e) {
        e.preventDefault()
        $('#modalForm').modal('show')
    })

    $("#operation_date").change(function (e) {
        e.preventDefault()
        $("#hari").val('')
        if($(this).val() == "pilih_hari") {
            $("#hari").removeClass("d-none")
        } else {
            $("#hari").addClass("d-none")
        }
    })

    $("#operation_date_edit").change(function (e) {
        e.preventDefault()
        $("#hari_edit").val('')
        if($(this).val() == "pilih_hari") {
            $("#hari_edit").removeClass("d-none")
        } else {
            $("#hari_edit").addClass("d-none")
        }
    })

    $('#hari').datepicker({
        format: 'yyyy-mm-dd',
    })

    $('#hari_edit').datepicker({
        format: 'yyyy-mm-dd',
    })

    var table = $('#tbl_rekap_daily').DataTable({
        processing: true,
        serverSide: true,
        columnDefs: [
            {
                className: "tengah", "targets": [6]
            }
        ],
        ajax: route('korlantas_rekap_data'),
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
                searchable: false,
                sortable: true
            },
            {
                data: 'report_name',
            },
            {
                data: 'polda_relation',
                name: 'poldaData.name',
            },
            {
                data: 'year',
            },
            {
                data: 'rencana_operasi_relation',
                name: 'rencaraOperasi.name',
            },
            {
                data: 'operation_date',
                render: function (data, type, row, meta) {
                    if(data == "semua_hari") {
                        return "Semua Hari"
                    } else {
                        return data
                    }
                }
            },
            {
                data: 'uuid',
                render: function(data, type, row) {
                    return `
                    <div class="icon-container">
                        <a href="#" id="btnView" data-id="`+data+`">
                            <img src="{{ secure_asset('/img/search.png') }}" width="45%">
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
                    return `
                    <div class="ubah-change">
                        <a href="`+route('report_download_excel', data)+`" id="btnDownload" data-id="`+data+`">UNDUH</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#" id="btnEdit" data-id="`+data+`">EDIT</a>
                    </div>
                    `;
                },
                searchable: false,
                sortable: false,
            }
        ]
    })
})

$('body').on('click', '#btnView', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')

    axios.get(route('korlantas_rekap_data_byuuid', uuid)).then(function(response) {

        $("#idTahunPrev").html(response.data.dailyPrev)
        $("#idTahun").html(response.data.daily)

        if(response.data.dailyInput) {
            var dataCurrent = response.data.dailyInput
            $("#pelanggaran_lalu_lintas_tilang").html(dataCurrent.pelanggaran_lalu_lintas_tilang)
            $("#pelanggaran_lalu_lintas_teguran").html(dataCurrent.pelanggaran_lalu_lintas_teguran)
            $("#pelanggaran_lalin_motor_gunhelm").html(dataCurrent.pelanggaran_sepeda_motor_gun_helm_sni)
            $("#pelanggaran_lalin_motor_lawan_arus").html(dataCurrent.pelanggaran_sepeda_motor_melawan_arus)
            $("#pelanggaran_lalin_motor_gunhp").html(dataCurrent.pelanggaran_sepeda_motor_gun_hp_saat_berkendara)
            $("#pelanggaran_lalin_motor_pengaruh_alkohol").html(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol)
            $("#pelanggaran_lalin_motor_batas_kecepatan").html(dataCurrent.pelanggaran_sepeda_motor_melebihi_batas_kecepatan)
            $("#pelanggaran_lalin_motor_bawah_umur").html(dataCurrent.pelanggaran_sepeda_motor_berkendara_dibawah_umur)
            $("#pelanggaran_lalin_motor_lain_lain").html(dataCurrent.pelanggaran_sepeda_motor_lain_lain)
            $("#pelanggaran_lalin_mobil_lawan_arus").html(dataCurrent.pelanggaran_mobil_melawan_arus)
            $("#pelanggaran_lalin_mobil_gunhp").html(dataCurrent.pelanggaran_mobil_gun_hp_saat_berkendara)
            $("#pelanggaran_lalin_mobil_pengaruh_alkohol").html(dataCurrent.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol)
            $("#pelanggaran_lalin_mobil_batas_kecepatan").html(dataCurrent.pelanggaran_mobil_melebihi_batas_kecepatan)
            $("#pelanggaran_lalin_mobil_bawah_umur").html(dataCurrent.pelanggaran_mobil_berkendara_dibawah_umur)
            $("#pelanggaran_lalin_mobil_gunsafety_belt").html(dataCurrent.pelanggaran_mobil_gun_safety_belt)
            $("#pelanggaran_lalin_mobil_lain_lain").html(dataCurrent.pelanggaran_mobil_lain_lain)
            $("#pelanggaran_lalin_barang_bukti_sim").html(dataCurrent.barang_bukti_yg_disita_sim)
            $("#pelanggaran_lalin_barang_bukti_stnk").html(dataCurrent.barang_bukti_yg_disita_stnk)
            $("#pelanggaran_lalin_barang_bukti_kendaraan").html(dataCurrent.barang_bukti_yg_disita_kendaraan)
            $("#pelanggaran_lalin_terlibat_pelanggaran_motor").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_sepeda_motor)
            $("#pelanggaran_lalin_terlibat_pelanggaran_mob_png").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang)
            $("#pelanggaran_lalin_terlibat_pelanggaran_bus").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_bus)
            $("#pelanggaran_lalin_terlibat_pelanggaran_mob_brg").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_mobil_barang)
            $("#pelanggaran_lalin_terlibat_pelanggaran_khusus").html(dataCurrent.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus)
            $("#pelanggaran_lalin_profesi_pelaku_pns").html(dataCurrent.profesi_pelaku_pelanggaran_pns)
            $("#pelanggaran_lalin_profesi_pelaku_swasta").html(dataCurrent.profesi_pelaku_pelanggaran_karyawan_swasta)
            $("#pelanggaran_lalin_profesi_pelaku_pelajar").html(dataCurrent.profesi_pelaku_pelanggaran_pelajar_mahasiswa)
            $("#pelanggaran_lalin_profesi_pelaku_supir").html(dataCurrent.profesi_pelaku_pelanggaran_pengemudi_supir)
            $("#pelanggaran_lalin_profesi_pelaku_tni").html(dataCurrent.profesi_pelaku_pelanggaran_tni)
            $("#pelanggaran_lalin_profesi_pelaku_polri").html(dataCurrent.profesi_pelaku_pelanggaran_polri)
            $("#pelanggaran_lalin_profesi_pelaku_lainnya").html(dataCurrent.profesi_pelaku_pelanggaran_lain_lain)
            $("#pelanggaran_lalin_profesi_pelaku_15tahun").html(dataCurrent.usia_pelaku_pelanggaran_kurang_dari_15_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_1620tahun").html(dataCurrent.usia_pelaku_pelanggaran_16_20_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_2125tahun").html(dataCurrent.usia_pelaku_pelanggaran_21_25_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_2630tahun").html(dataCurrent.usia_pelaku_pelanggaran_26_30_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_3135tahun").html(dataCurrent.usia_pelaku_pelanggaran_31_35_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_3640tahun").html(dataCurrent.usia_pelaku_pelanggaran_36_40_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_4145tahun").html(dataCurrent.usia_pelaku_pelanggaran_41_45_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_4650tahun").html(dataCurrent.usia_pelaku_pelanggaran_46_50_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_5155tahun").html(dataCurrent.usia_pelaku_pelanggaran_51_55_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_5660tahun").html(dataCurrent.usia_pelaku_pelanggaran_56_60_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_60tahun").html(dataCurrent.usia_pelaku_pelanggaran_diatas_60_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_a").html(dataCurrent.sim_pelaku_pelanggaran_sim_a)
            $("#pelanggaran_lalin_profesi_pelaku_a_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_a_umum)
            $("#pelanggaran_lalin_profesi_pelaku_b1").html(dataCurrent.sim_pelaku_pelanggaran_sim_b1)
            $("#pelanggaran_lalin_profesi_pelaku_b1umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_b1_umum)
            $("#pelanggaran_lalin_profesi_pelaku_bii").html(dataCurrent.sim_pelaku_pelanggaran_sim_b2)
            $("#pelanggaran_lalin_profesi_pelaku_bii_umum").html(dataCurrent.sim_pelaku_pelanggaran_sim_b2_umum)
            $("#pelanggaran_lalin_profesi_pelaku_c").html(dataCurrent.sim_pelaku_pelanggaran_sim_c)
            $("#pelanggaran_lalin_profesi_pelaku_d").html(dataCurrent.sim_pelaku_pelanggaran_sim_d)
            $("#pelanggaran_lalin_profesi_pelaku_sim_internasional").html(dataCurrent.sim_pelaku_pelanggaran_sim_internasional)
            $("#pelanggaran_lalin_profesi_pelaku_tanpa_sim").html(dataCurrent.sim_pelaku_pelanggaran_tanpa_sim)
            $("#pelanggaran_lalin_kawasan_pemukiman").html(dataCurrent.lokasi_pelanggaran_pemukiman)
            $("#pelanggaran_lalin_kawasan_perbelanjaan").html(dataCurrent.lokasi_pelanggaran_perbelanjaan)
            $("#pelanggaran_lalin_kawasan_perkantoran").html(dataCurrent.lokasi_pelanggaran_perkantoran)
            $("#pelanggaran_lalin_kawasan_wisata").html(dataCurrent.lokasi_pelanggaran_wisata)
            $("#pelanggaran_lalin_kawasan_industri").html(dataCurrent.lokasi_pelanggaran_industri)
            $("#pelanggaran_lalin_status_jalan_nasional").html(dataCurrent.lokasi_pelanggaran_status_jalan_nasional)
            $("#pelanggaran_lalin_status_jalan_propinsi").html(dataCurrent.lokasi_pelanggaran_status_jalan_propinsi)
            $("#pelanggaran_lalin_status_jalan_kabkota").html(dataCurrent.lokasi_pelanggaran_status_jalan_kab_kota)
            $("#pelanggaran_lalin_status_jalan_desa").html(dataCurrent.lokasi_pelanggaran_status_jalan_desa_lingkungan)
            $("#kecelakaan_lalin_jumlah_kejadian").html(dataCurrent.kecelakaan_lalin_jumlah_kejadian)
            $("#pelanggaran_lalin_status_jalan_arteri").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_arteri)
            $("#pelanggaran_lalin_status_jalan_kolektor").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_kolektor)
            $("#pelanggaran_lalin_status_jalan_lokal").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lokal)
            $("#pelanggaran_lalin_status_jalan_lingkungan").html(dataCurrent.lokasi_pelanggaran_fungsi_jalan_lingkungan)
            $("#kecelakaan_lalin_korban_meninggal").html(dataCurrent.kecelakaan_lalin_jumlah_korban_meninggal)
            $("#kecelakaan_lalin_korban_lukaberat").html(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_berat)
            $("#kecelakaan_lalin_korban_lukaringan").html(dataCurrent.kecelakaan_lalin_jumlah_korban_luka_ringan)
            $("#kecelakaan_lalin_kerugian_materil").html(dataCurrent.kecelakaan_lalin_jumlah_kerugian_materiil)
            $("#kecelakaan_lalin_barbuk_sim").html(dataCurrent.kecelakaan_barang_bukti_yg_disita_sim)
            $("#kecelakaan_lalin_barbuk_stnk").html(dataCurrent.kecelakaan_barang_bukti_yg_disita_stnk)
            $("#kecelakaan_lalin_barbuk_kendaraan").html(dataCurrent.kecelakaan_barang_bukti_yg_disita_kendaraan)
            $("#kecelakaan_lalin_pns").html(dataCurrent.profesi_korban_kecelakaan_lalin_pns)
            $("#kecelakaan_lalin_swasta").html(dataCurrent.profesi_korban_kecelakaan_lalin_karwayan_swasta)
            $("#kecelakaan_lalin_pelajar").html(dataCurrent.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa)
            $("#kecelakaan_lalin_pengemudi").html(dataCurrent.profesi_korban_kecelakaan_lalin_pengemudi)
            $("#kecelakaan_lalin_tni").html(dataCurrent.profesi_korban_kecelakaan_lalin_tni)
            $("#kecelakaan_lalin_polri").html(dataCurrent.profesi_korban_kecelakaan_lalin_polri)
            $("#kecelakaan_lalin_lain").html(dataCurrent.profesi_korban_kecelakaan_lalin_lain_lain)
            $("#kecelakaan_lalin_15tahun").html(dataCurrent.usia_korban_kecelakaan_kurang_15)
            $("#kecelakaan_lalin_1620tahun").html(dataCurrent.usia_korban_kecelakaan_16_20)
            $("#kecelakaan_lalin_2125tahun").html(dataCurrent.usia_korban_kecelakaan_21_25)
            $("#kecelakaan_lalin_2630tahun").html(dataCurrent.usia_korban_kecelakaan_26_30)
            $("#kecelakaan_lalin_3135tahun").html(dataCurrent.usia_korban_kecelakaan_31_35)
            $("#kecelakaan_lalin_3640tahun").html(dataCurrent.usia_korban_kecelakaan_36_40)
            $("#kecelakaan_lalin_4145tahun").html(dataCurrent.usia_korban_kecelakaan_41_45)
            $("#kecelakaan_lalin_4650tahun").html(dataCurrent.usia_korban_kecelakaan_45_50)
            $("#kecelakaan_lalin_5155tahun").html(dataCurrent.usia_korban_kecelakaan_51_55)
            $("#kecelakaan_lalin_5660tahun").html(dataCurrent.usia_korban_kecelakaan_56_60)
            $("#kecelakaan_lalin_60tahun").html(dataCurrent.usia_korban_kecelakaan_diatas_60)
            $("#kecelakaan_lalin_sima").html(dataCurrent.sim_korban_kecelakaan_sim_a)
            $("#kecelakaan_lalin_sima_umum").html(dataCurrent.sim_korban_kecelakaan_sim_a_umum)
            $("#kecelakaan_lalin_b1").html(dataCurrent.sim_korban_kecelakaan_sim_b1)
            $("#kecelakaan_lalin_b1umum").html(dataCurrent.sim_korban_kecelakaan_sim_b1_umum)
            $("#kecelakaan_lalin_bii").html(dataCurrent.sim_korban_kecelakaan_sim_b2)
            $("#kecelakaan_lalin_bii_umum").html(dataCurrent.sim_korban_kecelakaan_sim_b2_umum)
            $("#kecelakaan_lalin_simc").html(dataCurrent.sim_korban_kecelakaan_sim_c)
            $("#kecelakaan_lalin_simd").html(dataCurrent.sim_korban_kecelakaan_sim_d)
            $("#kecelakaan_lalin_sim_internasional").html(dataCurrent.sim_korban_kecelakaan_sim_internasional)
            $("#kecelakaan_lalin_tanpa_sim").html(dataCurrent.sim_korban_kecelakaan_tanpa_sim)
            $("#kecelakaan_lalin_motor").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_sepeda_motor)
            $("#kecelakaan_lalin_mobil_penumpang").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang)
            $("#kecelakaan_lalin_bus").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_bus)
            $("#kecelakaan_lalin_barang").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_mobil_barang)
            $("#kecelakaan_lalin_kendaraankhusus").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus)
            $("#kecelakaan_lalin_tidak_bermotor").html(dataCurrent.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor)
            $("#kecelakaan_lalin_tunggal").html(dataCurrent.jenis_kecelakaan_tunggal_ooc)
            $("#kecelakaan_lalin_depan").html(dataCurrent.jenis_kecelakaan_depan_depan)
            $("#kecelakaan_lalin_depan_belakang").html(dataCurrent.jenis_kecelakaan_depan_belakang)
            $("#kecelakaan_lalin_depan_samping").html(dataCurrent.jenis_kecelakaan_depan_samping)
            $("#kecelakaan_lalin_beruntun").html(dataCurrent.jenis_kecelakaan_beruntun)
            $("#kecelakaan_lalin_pejalan_kaki").html(dataCurrent.jenis_kecelakaan_pejalan_kaki)
            $("#kecelakaan_lalin_tabrak_lari").html(dataCurrent.jenis_kecelakaan_tabrak_lari)
            $("#kecelakaan_lalin_tabrak_hewan").html(dataCurrent.jenis_kecelakaan_tabrak_hewan)
            $("#kecelakaan_lalin_samping").html(dataCurrent.jenis_kecelakaan_samping_samping)
            $("#kecelakaan_lalin_lainnya").html(dataCurrent.jenis_kecelakaan_lainnya)
            $("#kecelakaan_lalin_pelaku_pns").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_pns)
            $("#kecelakaan_lalin_pelaku_swasta").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_karyawan_swasta)
            $("#kecelakaan_lalin_pelaku_pelajar").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar)
            $("#kecelakaan_lalin_pelaku_pengemudi").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_pengemudi)
            $("#kecelakaan_lalin_pelaku_tni").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_tni)
            $("#kecelakaan_lalin_pelaku_polri").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_polri)
            $("#kecelakaan_lalin_pelaku_lain").html(dataCurrent.profesi_pelaku_kecelakaan_lalin_lain_lain)
            $("#kecelakaan_lalin_pelaku_15tahun").html(dataCurrent.usia_pelaku_kecelakaan_kurang_dari_15_tahun)
            $("#kecelakaan_lalin_pelaku_1620tahun").html(dataCurrent.usia_pelaku_kecelakaan_16_20_tahun)
            $("#kecelakaan_lalin_pelaku_2125tahun").html(dataCurrent.usia_pelaku_kecelakaan_21_25_tahun)
            $("#kecelakaan_lalin_pelaku_2630tahun").html(dataCurrent.usia_pelaku_kecelakaan_26_30_tahun)
            $("#kecelakaan_lalin_pelaku_3135tahun").html(dataCurrent.usia_pelaku_kecelakaan_31_35_tahun)
            $("#kecelakaan_lalin_pelaku_3640tahun").html(dataCurrent.usia_pelaku_kecelakaan_36_40_tahun)
            $("#kecelakaan_lalin_pelaku_4145tahun").html(dataCurrent.usia_pelaku_kecelakaan_41_45_tahun)
            $("#kecelakaan_lalin_pelaku_4650tahun").html(dataCurrent.usia_pelaku_kecelakaan_46_50_tahun)
            $("#kecelakaan_lalin_pelaku_5155tahun").html(dataCurrent.usia_pelaku_kecelakaan_51_55_tahun)
            $("#kecelakaan_lalin_pelaku_5660tahun").html(dataCurrent.usia_pelaku_kecelakaan_56_60_tahun)
            $("#kecelakaan_lalin_pelaku_60tahun").html(dataCurrent.usia_pelaku_kecelakaan_diatas_60_tahun)
            $("#kecelakaan_lalin_pelaku_sim_a").html(dataCurrent.sim_pelaku_kecelakaan_sim_a)
            $("#kecelakaan_lalin_pelaku_sim_a_umum").html(dataCurrent.sim_pelaku_kecelakaan_sim_a_umum)
            $("#kecelakaan_lalin_pelaku_sim_b1").html(dataCurrent.sim_pelaku_kecelakaan_sim_b1)
            $("#kecelakaan_lalin_pelaku_sim_b1umum").html(dataCurrent.sim_pelaku_kecelakaan_sim_b1_umum)
            $("#kecelakaan_lalin_pelaku_sim_bii").html(dataCurrent.sim_pelaku_kecelakaan_sim_b2)
            $("#kecelakaan_lalin_pelaku_sim_bii_umum").html(dataCurrent.sim_pelaku_kecelakaan_sim_b2_umum)
            $("#kecelakaan_lalin_pelaku_sim_c").html(dataCurrent.sim_pelaku_kecelakaan_sim_c)
            $("#kecelakaan_lalin_pelaku_sim_d").html(dataCurrent.sim_pelaku_kecelakaan_sim_d)
            $("#kecelakaan_lalin_pelaku_sim_sim_internasional").html(dataCurrent.sim_pelaku_kecelakaan_sim_internasional)
            $("#kecelakaan_lalin_pelaku_sim_tanpa_sim").html(dataCurrent.sim_pelaku_kecelakaan_tanpa_sim)
            $("#kecelakaan_lalin_kawasan_pemukiman").html(dataCurrent.lokasi_kecelakaan_lalin_pemukiman)
            $("#kecelakaan_lalin_kawasan_perbelanjaan").html(dataCurrent.lokasi_kecelakaan_lalin_perbelanjaan)
            $("#kecelakaan_lalin_kawasan_perkantoran").html(dataCurrent.lokasi_kecelakaan_lalin_perkantoran)
            $("#kecelakaan_lalin_kawasan_wisata").html(dataCurrent.lokasi_kecelakaan_lalin_wisata)
            $("#kecelakaan_lalin_kawasan_industri").html(dataCurrent.lokasi_kecelakaan_lalin_industri)
            $("#kecelakaan_lalin_kawasan_lainlain").html(dataCurrent.lokasi_kecelakaan_lalin_lain_lain)
            $("#kecelakaan_lalin_status_jalan_nasional").html(dataCurrent.lokasi_kecelakaan_status_jalan_nasional)
            $("#kecelakaan_lalin_status_jalan_propinsi").html(dataCurrent.lokasi_kecelakaan_status_jalan_propinsi)
            $("#kecelakaan_lalin_status_jalan_kabkota").html(dataCurrent.lokasi_kecelakaan_status_jalan_kab_kota)
            $("#kecelakaan_lalin_status_jalan_desa").html(dataCurrent.lokasi_kecelakaan_status_jalan_desa_lingkungan)
            $("#kecelakaan_lalin_status_jalan_arteri").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_arteri)
            $("#kecelakaan_lalin_status_jalan_kolektor").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_kolektor)
            $("#kecelakaan_lalin_status_jalan_lokal").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lokal)
            $("#kecelakaan_lalin_status_jalan_lingkungan").html(dataCurrent.lokasi_kecelakaan_fungsi_jalan_lingkungan)
            $("#kecelakaan_lalin_penyebab_manusia").html(dataCurrent.faktor_penyebab_kecelakaan_manusia)
            $("#kecelakaan_lalin_penyebab_ngantuk").html(dataCurrent.faktor_penyebab_kecelakaan_ngantuk_lelah)
            $("#kecelakaan_lalin_penyebab_mabuk").html(dataCurrent.faktor_penyebab_kecelakaan_mabuk_obat)
            $("#kecelakaan_lalin_penyebab_sakit").html(dataCurrent.faktor_penyebab_kecelakaan_sakit)
            $("#kecelakaan_lalin_penyebab_hp").html(dataCurrent.faktor_penyebab_kecelakaan_handphone_elektronik)
            $("#kecelakaan_lalin_penyebab_lampu_merah").html(dataCurrent.faktor_penyebab_kecelakaan_menerobos_lampu_merah)
            $("#kecelakaan_lalin_penyebab_batas_cepat").html(dataCurrent.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan)
            $("#kecelakaan_lalin_penyebab_jaga_jarak").html(dataCurrent.faktor_penyebab_kecelakaan_tidak_menjaga_jarak)
            $("#kecelakaan_lalin_penyebab_pindah_jalur").html(dataCurrent.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur)
            $("#kecelakaan_lalin_penyebab_pindah_lajur").html(dataCurrent.faktor_penyebab_kecelakaan_berpindah_jalur)
            $("#kecelakaan_lalin_penyebab_lampu_isyarat").html(dataCurrent.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat)
            $("#kecelakaan_lalin_penyebab_pejalan_kaki").html(dataCurrent.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki)
            $("#kecelakaan_lalin_penyebab_lainnya").html(dataCurrent.faktor_penyebab_kecelakaan_lainnya)
            $("#kecelakaan_lalin_penyebab_alam").html(dataCurrent.faktor_penyebab_kecelakaan_alam)
            $("#kecelakaan_lalin_penyebab_kendaraan").html(dataCurrent.faktor_penyebab_kecelakaan_kelaikan_kendaraan)
            $("#kecelakaan_lalin_penyebab_kondisi_jalan").html(dataCurrent.faktor_penyebab_kecelakaan_kondisi_jalan)
            $("#kecelakaan_lalin_penyebab_prasarana").html(dataCurrent.faktor_penyebab_kecelakaan_prasarana_jalan)
            $("#kecelakaan_lalin_penyebab_prasarana_rambu").html(dataCurrent.faktor_penyebab_kecelakaan_rambu)
            $("#kecelakaan_lalin_penyebab_prasarana_makna").html(dataCurrent.faktor_penyebab_kecelakaan_marka)
            $("#kecelakaan_lalin_penyebab_prasarana_apil").html(dataCurrent.faktor_penyebab_kecelakaan_apil)
            $("#kecelakaan_lalin_penyebab_prasarana_palangpintu").html(dataCurrent.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu)
            $("#kecelakaan_lalin_waktu_0003").html(dataCurrent.waktu_kejadian_kecelakaan_00_03)
            $("#kecelakaan_lalin_waktu_0306").html(dataCurrent.waktu_kejadian_kecelakaan_03_06)
            $("#kecelakaan_lalin_waktu_0609").html(dataCurrent.waktu_kejadian_kecelakaan_06_09)
            $("#kecelakaan_lalin_waktu_0912").html(dataCurrent.waktu_kejadian_kecelakaan_09_12)
            $("#kecelakaan_lalin_waktu_1215").html(dataCurrent.waktu_kejadian_kecelakaan_12_15)
            $("#kecelakaan_lalin_waktu_1518").html(dataCurrent.waktu_kejadian_kecelakaan_15_18)
            $("#kecelakaan_lalin_waktu_1821").html(dataCurrent.waktu_kejadian_kecelakaan_18_21)
            $("#kecelakaan_lalin_waktu_2124").html(dataCurrent.waktu_kejadian_kecelakaan_21_24)
            $("#kecelakaan_lalin_menonjol_kejadian").html(dataCurrent.kecelakaan_lalin_menonjol_jumlah_kejadian)
            $("#kecelakaan_lalin_menonjol_meninggal").html(dataCurrent.kecelakaan_lalin_menonjol_korban_meninggal)
            $("#kecelakaan_lalin_menonjol_luka_berat").html(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_berat)
            $("#kecelakaan_lalin_menonjol_luka_ringan").html(dataCurrent.kecelakaan_lalin_menonjol_korban_luka_ringan)
            $("#kecelakaan_lalin_menonjol_materiil").html(dataCurrent.kecelakaan_lalin_menonjol_materiil)
            $("#kecelakaan_lalin_tunggal_kejadian").html(dataCurrent.kecelakaan_lalin_tunggal_jumlah_kejadian)
            $("#kecelakaan_lalin_tunggal_meninggal").html(dataCurrent.kecelakaan_lalin_tunggal_korban_meninggal)
            $("#kecelakaan_lalin_tunggal_luka_berat").html(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_berat)
            $("#kecelakaan_lalin_tunggal_luka_ringan").html(dataCurrent.kecelakaan_lalin_tunggal_korban_luka_ringan)
            $("#kecelakaan_lalin_tunggal_materiil").html(dataCurrent.kecelakaan_lalin_tunggal_materiil)
            $("#kecelakaan_lalin_jalan_kaki_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian)
            $("#kecelakaan_lalin_jalan_kaki_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal)
            $("#kecelakaan_lalin_jalan_kaki_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat)
            $("#kecelakaan_lalin_jalan_kaki_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan)
            $("#kecelakaan_lalin_jalan_kaki_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_pejalan_kaki_materiil)
            $("#kecelakaan_lalin_tabrak_lari_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_lari_jumlah_kejadian)
            $("#kecelakaan_lalin_tabrak_lari_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_meninggal)
            $("#kecelakaan_lalin_tabrak_lari_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_berat)
            $("#kecelakaan_lalin_tabrak_lari_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_lari_korban_luka_ringan)
            $("#kecelakaan_lalin_tabrak_lari_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_lari_materiil)
            $("#kecelakaan_lalin_tabrak_motor_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian)
            $("#kecelakaan_lalin_tabrak_motor_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal)
            $("#kecelakaan_lalin_tabrak_motor_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat)
            $("#kecelakaan_lalin_tabrak_motor_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan)
            $("#kecelakaan_lalin_tabrak_motor_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_sepeda_motor_materiil)
            $("#kecelakaan_lalin_tabrak_roda4_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian)
            $("#kecelakaan_lalin_tabrak_roda4_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal)
            $("#kecelakaan_lalin_tabrak_roda4_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat)
            $("#kecelakaan_lalin_tabrak_roda4_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan)
            $("#kecelakaan_lalin_tabrak_roda4_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_roda_empat_materiil)
            $("#kecelakaan_lalin_tidak_motor_kejadian").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian)
            $("#kecelakaan_lalin_tidak_motor_meninggal").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal)
            $("#kecelakaan_lalin_tidak_motor_luka_berat").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat)
            $("#kecelakaan_lalin_tidak_motor_luka_ringan").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan)
            $("#kecelakaan_lalin_tidak_motor_materiil").html(dataCurrent.kecelakaan_lalin_tabrak_tidak_bermotor_materiil)
            $("#kecelakaan_lalin_pelintasan_ka_kejadian").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian)
            $("#kecelakaan_lalin_pelintasan_ka_berpalang").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_berpalang_pintu)
            $("#kecelakaan_lalin_pelintasan_ka_tidak_berpalang").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu)
            $("#kecelakaan_lalin_pelintasan_ka_luka_ringan").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan)
            $("#kecelakaan_lalin_pelintasan_ka_luka_berat").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_luka_berat)
            $("#kecelakaan_lalin_pelintasan_ka_meninggal").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_korban_meninggal)
            $("#kecelakaan_lalin_pelintasan_ka_materiil").html(dataCurrent.kecelakaan_lalin_perlintasan_ka_materiil)
            $("#kecelakaan_lalin_transportasi_ka").html(dataCurrent.kecelakaan_transportasi_kereta_api)
            $("#kecelakaan_lalin_transportasi_laut").html(dataCurrent.kecelakaan_transportasi_laut_perairan)
            $("#kecelakaan_lalin_transportasi_udara").html(dataCurrent.kecelakaan_transportasi_udara)
            $("#dikmas_lantas_penluh_cetak").html(dataCurrent.penlu_melalui_media_cetak)
            $("#dikmas_lantas_penluh_elektronik").html(dataCurrent.penlu_melalui_media_elektronik)
            $("#dikmas_lantas_penluh_keramaian").html(dataCurrent.penlu_melalui_tempat_keramaian)
            $("#dikmas_lantas_penluh_istirahat").html(dataCurrent.penlu_melalui_tempat_istirahat)
            $("#dikmas_lantas_penluh_langgar").html(dataCurrent.penlu_melalui_daerah_rawan_laka_dan_langgar)
            $("#dikmas_lantas_penluh_spanduk").html(dataCurrent.penyebaran_pemasangan_spanduk)
            $("#dikmas_lantas_penluh_leaflet").html(dataCurrent.penyebaran_pemasangan_leaflet)
            $("#dikmas_lantas_penluh_sticker").html(dataCurrent.penyebaran_pemasangan_sticker)
            $("#dikmas_lantas_penluh_bilboard").html(dataCurrent.penyebaran_pemasangan_bilboard)
            $("#dikmas_lantas_penluh_polisi_anak").html(dataCurrent.polisi_sahabat_anak)
            $("#dikmas_lantas_penluh_cara_aman").html(dataCurrent.cara_aman_sekolah)
            $("#dikmas_lantas_penluh_patroli").html(dataCurrent.patroli_keamanan_sekolah)
            $("#dikmas_lantas_penluh_pramuka").html(dataCurrent.pramuka_bhayangkara_krida_lalu_lintas)
            $("#dikmas_lantas_penluh_police_campus").html(dataCurrent.police_goes_to_campus)
            $("#dikmas_lantas_penluh_safety_riding").html(dataCurrent.safety_riding_driving)
            $("#dikmas_lantas_forum_lalin").html(dataCurrent.forum_lalu_lintas_angkutan_umum)
            $("#dikmas_lantas_penluh_kampanye").html(dataCurrent.kampanye_keselamatan)
            $("#dikmas_lantas_penluh_mengemudi").html(dataCurrent.sekolah_mengemudi)
            $("#dikmas_lantas_penluh_taman_lalin").html(dataCurrent.taman_lalu_lintas)
            $("#dikmas_lantas_penluh_global_road").html(dataCurrent.global_road_safety_partnership_action)
            $("#dikmas_lantas_giatlantas_pengaturan").html(dataCurrent.giat_lantas_pengaturan)
            $("#dikmas_lantas_giatlantas_penjagaan").html(dataCurrent.giat_lantas_penjagaan)
            $("#dikmas_lantas_giatlantas_pengawalan").html(dataCurrent.giat_lantas_pengawalan)
            $("#dikmas_lantas_giatlantas_patroli").html(dataCurrent.giat_lantas_patroli)
        }

        if(response.data.dailyInputPrev) {
            var dataPrev = response.data.dailyInputPrev
            $("#pelanggaran_lalu_lintas_tilang_prev").html(dataPrev.pelanggaran_lalu_lintas_tilang)
            $("#pelanggaran_lalu_lintas_teguran_prev").html(dataPrev.pelanggaran_lalu_lintas_teguran)
            $("#pelanggaran_lalin_motor_gunhelm_prev").html(dataPrev.pelanggaran_sepeda_motor_gun_helm_sni)
            $("#pelanggaran_lalin_motor_lawan_arus_prev").html(dataPrev.pelanggaran_sepeda_motor_melawan_arus)
            $("#pelanggaran_lalin_motor_gunhp_prev").html(dataPrev.pelanggaran_sepeda_motor_gun_hp_saat_berkendara)
            $("#pelanggaran_lalin_motor_pengaruh_alkohol_prev").html(dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol)
            $("#pelanggaran_lalin_motor_batas_kecepatan_prev").html(dataPrev.pelanggaran_sepeda_motor_melebihi_batas_kecepatan)
            $("#pelanggaran_lalin_motor_bawah_umur_prev").html(dataPrev.pelanggaran_sepeda_motor_berkendara_dibawah_umur)
            $("#pelanggaran_lalin_motor_lain_lain_prev").html(dataPrev.pelanggaran_sepeda_motor_lain_lain)
            $("#pelanggaran_lalin_mobil_lawan_arus_prev").html(dataPrev.pelanggaran_mobil_melawan_arus)
            $("#pelanggaran_lalin_mobil_gunhp_prev").html(dataPrev.pelanggaran_mobil_gun_hp_saat_berkendara)
            $("#pelanggaran_lalin_mobil_pengaruh_alkohol_prev").html(dataPrev.pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol)
            $("#pelanggaran_lalin_mobil_batas_kecepatan_prev").html(dataPrev.pelanggaran_mobil_melebihi_batas_kecepatan)
            $("#pelanggaran_lalin_mobil_bawah_umur_prev").html(dataPrev.pelanggaran_mobil_berkendara_dibawah_umur)
            $("#pelanggaran_lalin_mobil_gunsafety_belt_prev").html(dataPrev.pelanggaran_mobil_gun_safety_belt)
            $("#pelanggaran_lalin_mobil_lain_lain_prev").html(dataPrev.pelanggaran_mobil_lain_lain)
            $("#pelanggaran_lalin_barang_bukti_sim_prev").html(dataPrev.barang_bukti_yg_disita_sim)
            $("#pelanggaran_lalin_barang_bukti_stnk_prev").html(dataPrev.barang_bukti_yg_disita_stnk)
            $("#pelanggaran_lalin_barang_bukti_kendaraan_prev").html(dataPrev.barang_bukti_yg_disita_kendaraan)
            $("#pelanggaran_lalin_terlibat_pelanggaran_motor_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_sepeda_motor)
            $("#pelanggaran_lalin_terlibat_pelanggaran_mob_png_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_penumpang)
            $("#pelanggaran_lalin_terlibat_pelanggaran_bus_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_bus)
            $("#pelanggaran_lalin_terlibat_pelanggaran_mob_brg_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_mobil_barang)
            $("#pelanggaran_lalin_terlibat_pelanggaran_khusus_prev").html(dataPrev.kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus)
            $("#pelanggaran_lalin_profesi_pelaku_pns_prev").html(dataPrev.profesi_pelaku_pelanggaran_pns)
            $("#pelanggaran_lalin_profesi_pelaku_swasta_prev").html(dataPrev.profesi_pelaku_pelanggaran_karyawan_swasta)
            $("#pelanggaran_lalin_profesi_pelaku_pelajar_prev").html(dataPrev.profesi_pelaku_pelanggaran_pelajar_mahasiswa)
            $("#pelanggaran_lalin_profesi_pelaku_supir_prev").html(dataPrev.profesi_pelaku_pelanggaran_pengemudi_supir)
            $("#pelanggaran_lalin_profesi_pelaku_tni_prev").html(dataPrev.profesi_pelaku_pelanggaran_tni)
            $("#pelanggaran_lalin_profesi_pelaku_polri_prev").html(dataPrev.profesi_pelaku_pelanggaran_polri)
            $("#pelanggaran_lalin_profesi_pelaku_lainnya_prev").html(dataPrev.profesi_pelaku_pelanggaran_lain_lain)
            $("#pelanggaran_lalin_profesi_pelaku_15tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_kurang_dari_15_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_1620tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_16_20_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_2125tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_21_25_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_2630tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_26_30_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_3135tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_31_35_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_3640tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_36_40_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_4145tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_41_45_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_4650tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_46_50_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_5155tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_51_55_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_5660tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_56_60_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_60tahun_prev").html(dataPrev.usia_pelaku_pelanggaran_diatas_60_tahun)
            $("#pelanggaran_lalin_profesi_pelaku_a_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_a)
            $("#pelanggaran_lalin_profesi_pelaku_a_umum_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_a_umum)
            $("#pelanggaran_lalin_profesi_pelaku_b1_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b1)
            $("#pelanggaran_lalin_profesi_pelaku_b1umum_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b1_umum)
            $("#pelanggaran_lalin_profesi_pelaku_bii_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b2)
            $("#pelanggaran_lalin_profesi_pelaku_bii_umum_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_b2_umum)
            $("#pelanggaran_lalin_profesi_pelaku_c_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_c)
            $("#pelanggaran_lalin_profesi_pelaku_d_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_d)
            $("#pelanggaran_lalin_profesi_pelaku_sim_internasional_prev").html(dataPrev.sim_pelaku_pelanggaran_sim_internasional)
            $("#pelanggaran_lalin_profesi_pelaku_tanpa_sim_prev").html(dataPrev.sim_pelaku_pelanggaran_tanpa_sim)
            $("#pelanggaran_lalin_kawasan_pemukiman_prev").html(dataPrev.lokasi_pelanggaran_pemukiman)
            $("#pelanggaran_lalin_kawasan_perbelanjaan_prev").html(dataPrev.lokasi_pelanggaran_perbelanjaan)
            $("#pelanggaran_lalin_kawasan_perkantoran_prev").html(dataPrev.lokasi_pelanggaran_perkantoran)
            $("#pelanggaran_lalin_kawasan_wisata_prev").html(dataPrev.lokasi_pelanggaran_wisata)
            $("#pelanggaran_lalin_kawasan_industri_prev").html(dataPrev.lokasi_pelanggaran_industri)
            $("#pelanggaran_lalin_status_jalan_nasional_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_nasional)
            $("#pelanggaran_lalin_status_jalan_propinsi_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_propinsi)
            $("#pelanggaran_lalin_status_jalan_kabkota_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_kab_kota)
            $("#pelanggaran_lalin_status_jalan_desa_prev").html(dataPrev.lokasi_pelanggaran_status_jalan_desa_lingkungan)
            $("#pelanggaran_lalin_status_jalan_arteri_prev").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_arteri)
            $("#pelanggaran_lalin_status_jalan_kolektor_prev").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_kolektor)
            $("#pelanggaran_lalin_status_jalan_lokal_prev").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_lokal)
            $("#pelanggaran_lalin_status_jalan_lingkungan_prev").html(dataPrev.lokasi_pelanggaran_fungsi_jalan_lingkungan)
            $("#kecelakaan_lalin_jumlah_kejadian_prev").html(dataPrev.kecelakaan_lalin_jumlah_kejadian)
            $("#kecelakaan_lalin_korban_meninggal_prev").html(dataPrev.kecelakaan_lalin_jumlah_korban_meninggal)
            $("#kecelakaan_lalin_korban_lukaberat_prev").html(dataPrev.kecelakaan_lalin_jumlah_korban_luka_berat)
            $("#kecelakaan_lalin_korban_lukaringan_prev").html(dataPrev.kecelakaan_lalin_jumlah_korban_luka_ringan)
            $("#kecelakaan_lalin_kerugian_materil_prev").html(dataPrev.kecelakaan_lalin_jumlah_kerugian_materiil)
            $("#kecelakaan_lalin_barbuk_sim_prev").html(dataPrev.kecelakaan_barang_bukti_yg_disita_sim)
            $("#kecelakaan_lalin_barbuk_stnk_prev").html(dataPrev.kecelakaan_barang_bukti_yg_disita_stnk)
            $("#kecelakaan_lalin_barbuk_kendaraan_prev").html(dataPrev.kecelakaan_barang_bukti_yg_disita_kendaraan)
            $("#kecelakaan_lalin_pns_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_pns)
            $("#kecelakaan_lalin_swasta_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_karwayan_swasta)
            $("#kecelakaan_lalin_pelajar_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_pelajar_mahasiswa)
            $("#kecelakaan_lalin_pengemudi_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_pengemudi)
            $("#kecelakaan_lalin_tni_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_tni)
            $("#kecelakaan_lalin_polri_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_polri)
            $("#kecelakaan_lalin_lain_prev").html(dataPrev.profesi_korban_kecelakaan_lalin_lain_lain)
            $("#kecelakaan_lalin_15tahun_prev").html(dataPrev.usia_korban_kecelakaan_kurang_15)
            $("#kecelakaan_lalin_1620tahun_prev").html(dataPrev.usia_korban_kecelakaan_16_20)
            $("#kecelakaan_lalin_2125tahun_prev").html(dataPrev.usia_korban_kecelakaan_21_25)
            $("#kecelakaan_lalin_2630tahun_prev").html(dataPrev.usia_korban_kecelakaan_26_30)
            $("#kecelakaan_lalin_3135tahun_prev").html(dataPrev.usia_korban_kecelakaan_31_35)
            $("#kecelakaan_lalin_3640tahun_prev").html(dataPrev.usia_korban_kecelakaan_36_40)
            $("#kecelakaan_lalin_4145tahun_prev").html(dataPrev.usia_korban_kecelakaan_41_45)
            $("#kecelakaan_lalin_4650tahun_prev").html(dataPrev.usia_korban_kecelakaan_45_50)
            $("#kecelakaan_lalin_5155tahun_prev").html(dataPrev.usia_korban_kecelakaan_51_55)
            $("#kecelakaan_lalin_5660tahun_prev").html(dataPrev.usia_korban_kecelakaan_56_60)
            $("#kecelakaan_lalin_60tahun_prev").html(dataPrev.usia_korban_kecelakaan_diatas_60)
            $("#kecelakaan_lalin_sima_prev").html(dataPrev.sim_korban_kecelakaan_sim_a)
            $("#kecelakaan_lalin_sima_umum_prev").html(dataPrev.sim_korban_kecelakaan_sim_a_umum)
            $("#kecelakaan_lalin_b1_prev").html(dataPrev.sim_korban_kecelakaan_sim_b1)
            $("#kecelakaan_lalin_b1umum_prev").html(dataPrev.sim_korban_kecelakaan_sim_b1_umum)
            $("#kecelakaan_lalin_bii_prev").html(dataPrev.sim_korban_kecelakaan_sim_b2)
            $("#kecelakaan_lalin_bii_umum_prev").html(dataPrev.sim_korban_kecelakaan_sim_b2_umum)
            $("#kecelakaan_lalin_simc_prev").html(dataPrev.sim_korban_kecelakaan_sim_c)
            $("#kecelakaan_lalin_simd_prev").html(dataPrev.sim_korban_kecelakaan_sim_d)
            $("#kecelakaan_lalin_sim_internasional_prev").html(dataPrev.sim_korban_kecelakaan_sim_internasional)
            $("#kecelakaan_lalin_tanpa_sim_prev").html(dataPrev.sim_korban_kecelakaan_tanpa_sim)
            $("#kecelakaan_lalin_motor_prev").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_sepeda_motor)
            $("#kecelakaan_lalin_mobil_penumpang_prev").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_penumpang)
            $("#kecelakaan_lalin_bus_prev").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_bus)
            $("#kecelakaan_lalin_barang_prev").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_mobil_barang)
            $("#kecelakaan_lalin_kendaraankhusus_prev").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus)
            $("#kecelakaan_lalin_tidak_bermotor_prev").html(dataPrev.kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor)
            $("#kecelakaan_lalin_tunggal_prev").html(dataPrev.jenis_kecelakaan_tunggal_ooc)
            $("#kecelakaan_lalin_depan_prev").html(dataPrev.jenis_kecelakaan_depan_depan)
            $("#kecelakaan_lalin_depan_belakang_prev").html(dataPrev.jenis_kecelakaan_depan_belakang)
            $("#kecelakaan_lalin_depan_samping_prev").html(dataPrev.jenis_kecelakaan_depan_samping)
            $("#kecelakaan_lalin_beruntun_prev").html(dataPrev.jenis_kecelakaan_beruntun)
            $("#kecelakaan_lalin_pejalan_kaki_prev").html(dataPrev.jenis_kecelakaan_pejalan_kaki)
            $("#kecelakaan_lalin_tabrak_lari_prev").html(dataPrev.jenis_kecelakaan_tabrak_lari)
            $("#kecelakaan_lalin_tabrak_hewan_prev").html(dataPrev.jenis_kecelakaan_tabrak_hewan)
            $("#kecelakaan_lalin_samping_prev").html(dataPrev.jenis_kecelakaan_samping_samping)
            $("#kecelakaan_lalin_lainnya_prev").html(dataPrev.jenis_kecelakaan_lainnya)
            $("#kecelakaan_lalin_pelaku_pns_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_pns)
            $("#kecelakaan_lalin_pelaku_swasta_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_karyawan_swasta)
            $("#kecelakaan_lalin_pelaku_pelajar_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar)
            $("#kecelakaan_lalin_pelaku_pengemudi_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_pengemudi)
            $("#kecelakaan_lalin_pelaku_tni_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_tni)
            $("#kecelakaan_lalin_pelaku_polri_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_polri)
            $("#kecelakaan_lalin_pelaku_lain_prev").html(dataPrev.profesi_pelaku_kecelakaan_lalin_lain_lain)
            $("#kecelakaan_lalin_pelaku_15tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_kurang_dari_15_tahun)
            $("#kecelakaan_lalin_pelaku_1620tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_16_20_tahun)
            $("#kecelakaan_lalin_pelaku_2125tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_21_25_tahun)
            $("#kecelakaan_lalin_pelaku_2630tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_26_30_tahun)
            $("#kecelakaan_lalin_pelaku_3135tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_31_35_tahun)
            $("#kecelakaan_lalin_pelaku_3640tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_36_40_tahun)
            $("#kecelakaan_lalin_pelaku_4145tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_41_45_tahun)
            $("#kecelakaan_lalin_pelaku_4650tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_46_50_tahun)
            $("#kecelakaan_lalin_pelaku_5155tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_51_55_tahun)
            $("#kecelakaan_lalin_pelaku_5660tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_56_60_tahun)
            $("#kecelakaan_lalin_pelaku_60tahun_prev").html(dataPrev.usia_pelaku_kecelakaan_diatas_60_tahun)
            $("#kecelakaan_lalin_pelaku_sim_a_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_a)
            $("#kecelakaan_lalin_pelaku_sim_a_umum_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_a_umum)
            $("#kecelakaan_lalin_pelaku_sim_b1_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_b1)
            $("#kecelakaan_lalin_pelaku_sim_b1umum_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_b1_umum)
            $("#kecelakaan_lalin_pelaku_sim_bii_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_b2)
            $("#kecelakaan_lalin_pelaku_sim_bii_umum_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_b2_umum)
            $("#kecelakaan_lalin_pelaku_sim_c_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_c)
            $("#kecelakaan_lalin_pelaku_sim_d_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_d)
            $("#kecelakaan_lalin_pelaku_sim_sim_internasional_prev").html(dataPrev.sim_pelaku_kecelakaan_sim_internasional)
            $("#kecelakaan_lalin_pelaku_sim_tanpa_sim_prev").html(dataPrev.sim_pelaku_kecelakaan_tanpa_sim)
            $("#kecelakaan_lalin_kawasan_pemukiman_prev").html(dataPrev.lokasi_kecelakaan_lalin_pemukiman)
            $("#kecelakaan_lalin_kawasan_perbelanjaan_prev").html(dataPrev.lokasi_kecelakaan_lalin_perbelanjaan)
            $("#kecelakaan_lalin_kawasan_perkantoran_prev").html(dataPrev.lokasi_kecelakaan_lalin_perkantoran)
            $("#kecelakaan_lalin_kawasan_wisata_prev").html(dataPrev.lokasi_kecelakaan_lalin_wisata)
            $("#kecelakaan_lalin_kawasan_industri_prev").html(dataPrev.lokasi_kecelakaan_lalin_industri)
            $("#kecelakaan_lalin_kawasan_lainlain_prev").html(dataPrev.lokasi_kecelakaan_lalin_lain_lain)
            $("#kecelakaan_lalin_status_jalan_nasional_prev").html(dataPrev.lokasi_kecelakaan_status_jalan_nasional)
            $("#kecelakaan_lalin_status_jalan_propinsi_prev").html(dataPrev.lokasi_kecelakaan_status_jalan_propinsi)
            $("#kecelakaan_lalin_status_jalan_kabkota_prev").html(dataPrev.lokasi_kecelakaan_status_jalan_kab_kota)
            $("#kecelakaan_lalin_status_jalan_desa_prev").html(dataPrev.lokasi_kecelakaan_status_jalan_desa_lingkungan)
            $("#kecelakaan_lalin_status_jalan_arteri_prev").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_arteri)
            $("#kecelakaan_lalin_status_jalan_kolektor_prev").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_kolektor)
            $("#kecelakaan_lalin_status_jalan_lokal_prev").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_lokal)
            $("#kecelakaan_lalin_status_jalan_lingkungan_prev").html(dataPrev.lokasi_kecelakaan_fungsi_jalan_lingkungan)
            $("#kecelakaan_lalin_penyebab_manusia_prev").html(dataPrev.faktor_penyebab_kecelakaan_manusia)
            $("#kecelakaan_lalin_penyebab_ngantuk_prev").html(dataPrev.faktor_penyebab_kecelakaan_ngantuk_lelah)
            $("#kecelakaan_lalin_penyebab_mabuk_prev").html(dataPrev.faktor_penyebab_kecelakaan_mabuk_obat)
            $("#kecelakaan_lalin_penyebab_sakit_prev").html(dataPrev.faktor_penyebab_kecelakaan_sakit)
            $("#kecelakaan_lalin_penyebab_hp_prev").html(dataPrev.faktor_penyebab_kecelakaan_handphone_elektronik)
            $("#kecelakaan_lalin_penyebab_lampu_merah_prev").html(dataPrev.faktor_penyebab_kecelakaan_menerobos_lampu_merah)
            $("#kecelakaan_lalin_penyebab_batas_cepat_prev").html(dataPrev.faktor_penyebab_kecelakaan_melanggar_batas_kecepatan)
            $("#kecelakaan_lalin_penyebab_jaga_jarak_prev").html(dataPrev.faktor_penyebab_kecelakaan_tidak_menjaga_jarak)
            $("#kecelakaan_lalin_penyebab_pindah_jalur_prev").html(dataPrev.faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur)
            $("#kecelakaan_lalin_penyebab_pindah_lajur_prev").html(dataPrev.faktor_penyebab_kecelakaan_berpindah_jalur)
            $("#kecelakaan_lalin_penyebab_lampu_isyarat_prev").html(dataPrev.faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat)
            $("#kecelakaan_lalin_penyebab_pejalan_kaki_prev").html(dataPrev.faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki)
            $("#kecelakaan_lalin_penyebab_lainnya_prev").html(dataPrev.faktor_penyebab_kecelakaan_lainnya)
            $("#kecelakaan_lalin_penyebab_alam_prev").html(dataPrev.faktor_penyebab_kecelakaan_alam)
            $("#kecelakaan_lalin_penyebab_kendaraan_prev").html(dataPrev.faktor_penyebab_kecelakaan_kelaikan_kendaraan)
            $("#kecelakaan_lalin_penyebab_kondisi_jalan_prev").html(dataPrev.faktor_penyebab_kecelakaan_kondisi_jalan)
            $("#kecelakaan_lalin_penyebab_prasarana_prev").html(dataPrev.faktor_penyebab_kecelakaan_prasarana_jalan)
            $("#kecelakaan_lalin_penyebab_prasarana_rambu_prev").html(dataPrev.faktor_penyebab_kecelakaan_rambu)
            $("#kecelakaan_lalin_penyebab_prasarana_makna_prev").html(dataPrev.faktor_penyebab_kecelakaan_marka)
            $("#kecelakaan_lalin_penyebab_prasarana_apil_prev").html(dataPrev.faktor_penyebab_kecelakaan_apil)
            $("#kecelakaan_lalin_penyebab_prasarana_palangpintu_prev").html(dataPrev.faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu)
            $("#kecelakaan_lalin_waktu_0003_prev").html(dataPrev.waktu_kejadian_kecelakaan_00_03)
            $("#kecelakaan_lalin_waktu_0306_prev").html(dataPrev.waktu_kejadian_kecelakaan_03_06)
            $("#kecelakaan_lalin_waktu_0609_prev").html(dataPrev.waktu_kejadian_kecelakaan_06_09)
            $("#kecelakaan_lalin_waktu_0912_prev").html(dataPrev.waktu_kejadian_kecelakaan_09_12)
            $("#kecelakaan_lalin_waktu_1215_prev").html(dataPrev.waktu_kejadian_kecelakaan_12_15)
            $("#kecelakaan_lalin_waktu_1518_prev").html(dataPrev.waktu_kejadian_kecelakaan_15_18)
            $("#kecelakaan_lalin_waktu_1821_prev").html(dataPrev.waktu_kejadian_kecelakaan_18_21)
            $("#kecelakaan_lalin_waktu_2124_prev").html(dataPrev.waktu_kejadian_kecelakaan_21_24)
            $("#kecelakaan_lalin_menonjol_kejadian_prev").html(dataPrev.kecelakaan_lalin_menonjol_jumlah_kejadian)
            $("#kecelakaan_lalin_menonjol_meninggal_prev").html(dataPrev.kecelakaan_lalin_menonjol_korban_meninggal)
            $("#kecelakaan_lalin_menonjol_luka_berat_prev").html(dataPrev.kecelakaan_lalin_menonjol_korban_luka_berat)
            $("#kecelakaan_lalin_menonjol_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_menonjol_korban_luka_ringan)
            $("#kecelakaan_lalin_menonjol_materiil_prev").html(dataPrev.kecelakaan_lalin_menonjol_materiil)
            $("#kecelakaan_lalin_tunggal_kejadian_prev").html(dataPrev.kecelakaan_lalin_tunggal_jumlah_kejadian)
            $("#kecelakaan_lalin_tunggal_meninggal_prev").html(dataPrev.kecelakaan_lalin_tunggal_korban_meninggal)
            $("#kecelakaan_lalin_tunggal_luka_berat_prev").html(dataPrev.kecelakaan_lalin_tunggal_korban_luka_berat)
            $("#kecelakaan_lalin_tunggal_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_tunggal_korban_luka_ringan)
            $("#kecelakaan_lalin_tunggal_materiil_prev").html(dataPrev.kecelakaan_lalin_tunggal_materiil)
            $("#kecelakaan_lalin_jalan_kaki_kejadian_prev").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian)
            $("#kecelakaan_lalin_jalan_kaki_meninggal_prev").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal)
            $("#kecelakaan_lalin_jalan_kaki_luka_berat_prev").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat)
            $("#kecelakaan_lalin_jalan_kaki_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan)
            $("#kecelakaan_lalin_jalan_kaki_materiil_prev").html(dataPrev.kecelakaan_lalin_tabrak_pejalan_kaki_materiil)
            $("#kecelakaan_lalin_tabrak_lari_kejadian_prev").html(dataPrev.kecelakaan_lalin_tabrak_lari_jumlah_kejadian)
            $("#kecelakaan_lalin_tabrak_lari_meninggal_prev").html(dataPrev.kecelakaan_lalin_tabrak_lari_korban_meninggal)
            $("#kecelakaan_lalin_tabrak_lari_luka_berat_prev").html(dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_berat)
            $("#kecelakaan_lalin_tabrak_lari_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_tabrak_lari_korban_luka_ringan)
            $("#kecelakaan_lalin_tabrak_lari_materiil_prev").html(dataPrev.kecelakaan_lalin_tabrak_lari_materiil)
            $("#kecelakaan_lalin_tabrak_motor_kejadian_prev").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian)
            $("#kecelakaan_lalin_tabrak_motor_meninggal_prev").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal)
            $("#kecelakaan_lalin_tabrak_motor_luka_berat_prev").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat)
            $("#kecelakaan_lalin_tabrak_motor_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan)
            $("#kecelakaan_lalin_tabrak_motor_materiil_prev").html(dataPrev.kecelakaan_lalin_tabrak_sepeda_motor_materiil)
            $("#kecelakaan_lalin_tabrak_roda4_kejadian_prev").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian)
            $("#kecelakaan_lalin_tabrak_roda4_meninggal_prev").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_meninggal)
            $("#kecelakaan_lalin_tabrak_roda4_luka_berat_prev").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat)
            $("#kecelakaan_lalin_tabrak_roda4_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan)
            $("#kecelakaan_lalin_tabrak_roda4_materiil_prev").html(dataPrev.kecelakaan_lalin_tabrak_roda_empat_materiil)
            $("#kecelakaan_lalin_tidak_motor_kejadian_prev").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian)
            $("#kecelakaan_lalin_tidak_motor_meninggal_prev").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal)
            $("#kecelakaan_lalin_tidak_motor_luka_berat_prev").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat)
            $("#kecelakaan_lalin_tidak_motor_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan)
            $("#kecelakaan_lalin_tidak_motor_materiil_prev").html(dataPrev.kecelakaan_lalin_tabrak_tidak_bermotor_materiil)
            $("#kecelakaan_lalin_pelintasan_ka_kejadian_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_jumlah_kejadian)
            $("#kecelakaan_lalin_pelintasan_ka_berpalang_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_berpalang_pintu)
            $("#kecelakaan_lalin_pelintasan_ka_tidak_berpalang_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu)
            $("#kecelakaan_lalin_pelintasan_ka_luka_ringan_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_ringan)
            $("#kecelakaan_lalin_pelintasan_ka_luka_berat_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_korban_luka_berat)
            $("#kecelakaan_lalin_pelintasan_ka_meninggal_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_korban_meninggal)
            $("#kecelakaan_lalin_pelintasan_ka_materiil_prev").html(dataPrev.kecelakaan_lalin_perlintasan_ka_materiil)
            $("#kecelakaan_lalin_transportasi_ka_prev").html(dataPrev.kecelakaan_transportasi_kereta_api)
            $("#kecelakaan_lalin_transportasi_laut_prev").html(dataPrev.kecelakaan_transportasi_laut_perairan)
            $("#kecelakaan_lalin_transportasi_udara_prev").html(dataPrev.kecelakaan_transportasi_udara)
            $("#dikmas_lantas_penluh_cetak_prev").html(dataPrev.penlu_melalui_media_cetak)
            $("#dikmas_lantas_penluh_elektronik_prev").html(dataPrev.penlu_melalui_media_elektronik)
            $("#dikmas_lantas_penluh_keramaian_prev").html(dataPrev.penlu_melalui_tempat_keramaian)
            $("#dikmas_lantas_penluh_istirahat_prev").html(dataPrev.penlu_melalui_tempat_istirahat)
            $("#dikmas_lantas_penluh_langgar_prev").html(dataPrev.penlu_melalui_daerah_rawan_laka_dan_langgar)
            $("#dikmas_lantas_penluh_spanduk_prev").html(dataPrev.penyebaran_pemasangan_spanduk)
            $("#dikmas_lantas_penluh_leaflet_prev").html(dataPrev.penyebaran_pemasangan_leaflet)
            $("#dikmas_lantas_penluh_sticker_prev").html(dataPrev.penyebaran_pemasangan_sticker)
            $("#dikmas_lantas_penluh_bilboard_prev").html(dataPrev.penyebaran_pemasangan_bilboard)
            $("#dikmas_lantas_penluh_polisi_anak_prev").html(dataPrev.polisi_sahabat_anak)
            $("#dikmas_lantas_penluh_cara_aman_prev").html(dataPrev.cara_aman_sekolah)
            $("#dikmas_lantas_penluh_patroli_prev").html(dataPrev.patroli_keamanan_sekolah)
            $("#dikmas_lantas_penluh_pramuka_prev").html(dataPrev.pramuka_bhayangkara_krida_lalu_lintas)
            $("#dikmas_lantas_penluh_police_campus_prev").html(dataPrev.police_goes_to_campus)
            $("#dikmas_lantas_penluh_safety_riding_prev").html(dataPrev.safety_riding_driving)
            $("#dikmas_lantas_forum_lalin_prev").html(dataPrev.forum_lalu_lintas_angkutan_umum)
            $("#dikmas_lantas_penluh_kampanye_prev").html(dataPrev.kampanye_keselamatan)
            $("#dikmas_lantas_penluh_mengemudi_prev").html(dataPrev.sekolah_mengemudi)
            $("#dikmas_lantas_penluh_taman_lalin_prev").html(dataPrev.taman_lalu_lintas)
            $("#dikmas_lantas_penluh_global_road_prev").html(dataPrev.global_road_safety_partnership_action)
            $("#dikmas_lantas_giatlantas_pengaturan_prev").html(dataPrev.giat_lantas_pengaturan)
            $("#dikmas_lantas_giatlantas_penjagaan_prev").html(dataPrev.giat_lantas_penjagaan)
            $("#dikmas_lantas_giatlantas_pengawalan_prev").html(dataPrev.giat_lantas_pengawalan)
            $("#dikmas_lantas_giatlantas_patroli_prev").html(dataPrev.giat_lantas_patroli)
        }

        $('#daily_preview').modal('show')
    })
    .catch(function(error) {
        if(error.response.status == 404) {
            swal("Data tidak ditemukan. Periksa kembali data anda", null, "error")
        }

        if(error.response.status == 401) {
            swal("Anda tidak diijinkan mengakses data ini", null, "error")
        }
    })
})

$('body').on('click', '#btnEdit', function(e) {
    e.preventDefault()
    var uuid = $(this).attr('data-id')

    axios.get(route('korlantas_rekap', uuid)).then(function(response) {

        $("#uuid_edit").val(response.data.uuid)

        $("#report_name_edit").val(response.data.report_name)

        if(response.data.polda != "polda_all") {
            $('#polda_edit option[value='+response.data.polda+']').prop("selected", true)
        }

        $('#year_edit option[value="'+response.data.year+'"]').prop("selected", true)

        $('#rencana_operasi_id_edit option[value='+response.data.rencana_operasi_id+']').prop("selected", true)

        if(response.data.operation_date != "semua_hari") {
            $("#hari_edit").removeClass("d-none")
            $('#operation_date_edit option[value="pilih_hari"]').prop("selected", true)
            $("#hari_edit").val(response.data.operation_date)
        } else {
            $('#operation_date_edit option[value="semua_hari"]').prop("selected", true)
            $("#hari_edit").addClass("d-none")
        }

        $('#form_edit_rekap').modal('show')
    })
    .catch(function(error) {
        if(error.response.status == 404) {
            swal("Data tidak ditemukan. Periksa kembali data anda", null, "error")
        }
        if(error.response.status == 401) {
            swal("Anda tidak diijinkan mengakses data ini", null, "error")
        }
    })
})
</script>
@endpush