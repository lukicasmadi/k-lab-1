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
<form method="POST" action="{{ route('phro_store') }}">
    @csrf
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            @include('form.pelanggaran_lalin')
            @include('form.jenis_pelanggaran_lalin')
            @include('form.pelanggaran_barang_bukti_yang_disita')
            @include('form.kendaraan_terlibat_pelanggaran')
            @include('form.profesi_pelaku_pelanggaran')
            @include('form.usia_pelaku_pelanggaran')
            @include('form.sim_pelaku_pelanggaran')
            @include('form.lokasi_pelanggaran_lalin')
            @include('form.kecelakaan_lalin')
            @include('form.kecelakaan_barang_bukti_yang_disita')
            @include('form.profesi_korban_kecelakaan')
            @include('form.usia_korban_kecelakaan')
            @include('form.sim_korban_kecelakaan')
            @include('form.kendaraan_yang_terlibat_kecelakaan_lalin')
            @include('form.jenis_kecelakaan_lalin')
            @include('form.profesi_pelaku_kecelakaan_lalin')
            @include('form.usia_pelaku_kecelakaan_lalin')
            @include('form.sim_pelaku_kecelakaan_lalin')
            @include('form.lokasi_kecelakaan_lalin')
            @include('form.faktor_penyebab_kecelakaan')
            @include('form.waktu_kejadian_kecelakaan_lalin')
            @include('form.kecelakaan_lalin_menonjol')
            @include('form.kecelakaan_lalin_tunggal')
            @include('form.kecelakaan_lalin_tabrak_pejalan_kaki')
            @include('form.kecelakaan_lalin_tabrak_lari')
            @include('form.kecelakaan_lalin_tabrak_sepeda_motor')
            @include('form.kecelakaan_lalin_tabrak_roda_empat')
            @include('form.kecelakaan_lalin_tabrak_tidak_bermotor')
            @include('form.kecelakaan_lalin_perlintasan_ka')
            @include('form.kecelakaan_transportasi')
            @include('form.data_terkait_dimas_lantas')
            @include('form.data_terkait_giat_kepolisian')

            @include('form.button')

        </div>
    </div>
</form>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('page_js')
<script>

$(function () {
    $("input[type=number]").val("5")
    // $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast")
});
</script>
@endpush