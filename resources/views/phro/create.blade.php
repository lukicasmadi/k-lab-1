@extends('layouts.template_admin')

@section('content')
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

    </div>
</div>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('page_js')
<script>
$("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast");
</script>
@endpush