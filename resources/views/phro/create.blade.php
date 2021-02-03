@extends('layouts.template_admin')

@section('content')
<form method="POST" action="{{ route('phro_store') }}">
    @csrf
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            @include('form.pelanggaran_lalin')
            {{-- @include('form.jenis_pelanggaran_lalin')
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
            @include('form.data_terkait_giat_kepolisian') --}}
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
// $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast");
</script>
@endpush