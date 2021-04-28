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
<form method="POST" action="{{ route('phro_store') }}" enctype="multipart/form-data">
    @csrf
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            @include('form.pelanggaran_lalin_polda')
            @include('form.jenis_pelanggaran_lalin_polda')
            @include('form.pelanggaran_barang_bukti_yang_disita_polda')
            @include('form.kendaraan_terlibat_pelanggaran_polda')
            @include('form.profesi_pelaku_pelanggaran_polda')
            @include('form.usia_pelaku_pelanggaran_polda')
            @include('form.sim_pelaku_pelanggaran_polda')
            @include('form.lokasi_pelanggaran_lalin_polda')
            @include('form.kecelakaan_lalin_polda')
            @include('form.kecelakaan_barang_bukti_yang_disita_polda')
            @include('form.profesi_korban_kecelakaan_polda')
            @include('form.usia_korban_kecelakaan_polda')
            @include('form.sim_korban_kecelakaan_polda')
            @include('form.kendaraan_yang_terlibat_kecelakaan_lalin_polda')
            @include('form.jenis_kecelakaan_lalin_polda')
            @include('form.profesi_pelaku_kecelakaan_lalin_polda')
            @include('form.usia_pelaku_kecelakaan_lalin_polda')
            @include('form.sim_pelaku_kecelakaan_lalin_polda')
            @include('form.lokasi_kecelakaan_lalin_polda')
            @include('form.faktor_penyebab_kecelakaan_polda')
            @include('form.waktu_kejadian_kecelakaan_lalin_polda')
            @include('form.kecelakaan_lalin_menonjol_polda')
            @include('form.kecelakaan_lalin_tunggal_polda')
            @include('form.kecelakaan_lalin_tabrak_pejalan_kaki_polda')
            @include('form.kecelakaan_lalin_tabrak_lari_polda')
            @include('form.kecelakaan_lalin_tabrak_sepeda_motor_polda')
            @include('form.kecelakaan_lalin_tabrak_roda_empat_polda')
            @include('form.kecelakaan_lalin_tabrak_tidak_bermotor_polda')
            @include('form.kecelakaan_lalin_perlintasan_ka_polda')
            @include('form.kecelakaan_transportasi_polda')
            @include('form.data_terkait_dimas_lantas_polda')
            @include('form.data_terkait_giat_kepolisian_polda')
            @include('form.data_terkait_arus_pemudik')
            @include('form.data_terkait_arus_prokes_covid')

            @include('form.button')

        </div>
    </div>
</form>
@endsection

@push('page_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/components/custom-sweetalert.css') }}" />
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
@endpush

@push('page_js')

<script>
$(document).ready(function () {
    if(location.hostname == "korlantas.test") {

    }
    let randomNum = Math.floor((Math.random() * 10) + 1)
    $("input[type=number]").val(randomNum)
    // $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast")
    $("#nama_kesatuan").val("KESATUAN LANTAS")
    $("#nama_atasan").val("BRIAN")
    $("#pangkat_dan_nrp").val("AKP NRP 12345")
    $("#jabatan").val("KASAT LANTAS")
    $("#nama_laporan").val("LAPORAN HARIAN")
    $("#nama_kota").val("ACEH")
})
</script>
@endpush