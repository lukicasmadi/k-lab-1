@extends('layouts.template_admin')

@section('content')
<form method="POST" action="{{ route('phro_update') }}">
    @csrf
    @method('PATCH')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            @include('form.edit.pelanggaran_lalin')
            @include('form.edit.jenis_pelanggaran_lalin')
            @include('form.edit.pelanggaran_barang_bukti_yang_disita')
            @include('form.edit.kendaraan_terlibat_pelanggaran')
            @include('form.edit.profesi_pelaku_pelanggaran')
            @include('form.edit.usia_pelaku_pelanggaran')
            @include('form.edit.sim_pelaku_pelanggaran')
            @include('form.edit.lokasi_pelanggaran_lalin')
            @include('form.edit.kecelakaan_lalin')
            @include('form.edit.kecelakaan_barang_bukti_yang_disita')
            @include('form.edit.profesi_korban_kecelakaan')
            @include('form.edit.usia_korban_kecelakaan')
            @include('form.edit.sim_korban_kecelakaan')
            @include('form.edit.kendaraan_yang_terlibat_kecelakaan_lalin')
            @include('form.edit.jenis_kecelakaan_lalin')
            @include('form.edit.profesi_pelaku_kecelakaan_lalin')
            @include('form.edit.usia_pelaku_kecelakaan_lalin')
            @include('form.edit.sim_pelaku_kecelakaan_lalin')
            @include('form.edit.lokasi_kecelakaan_lalin')
            @include('form.edit.faktor_penyebab_kecelakaan')
            @include('form.edit.waktu_kejadian_kecelakaan_lalin')
            @include('form.edit.kecelakaan_lalin_menonjol')
            @include('form.edit.kecelakaan_lalin_tunggal')
            @include('form.edit.kecelakaan_lalin_tabrak_pejalan_kaki')
            @include('form.edit.kecelakaan_lalin_tabrak_lari')
            @include('form.edit.kecelakaan_lalin_tabrak_sepeda_motor')
            @include('form.edit.kecelakaan_lalin_tabrak_roda_empat')
            @include('form.edit.kecelakaan_lalin_tabrak_tidak_bermotor')
            @include('form.edit.kecelakaan_lalin_perlintasan_ka')
            @include('form.edit.kecelakaan_transportasi')
            @include('form.edit.data_terkait_dimas_lantas')
            @include('form.edit.data_terkait_giat_kepolisian')

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
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast");
});
</script>
@endpush