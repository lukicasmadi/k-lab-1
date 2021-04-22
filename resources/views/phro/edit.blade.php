@extends('layouts.template_admin')

@section('content')
<form method="POST" action="{{ route('phro_update', $uuid) }}">
    @csrf
    @method('PATCH')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            @include('form.new_edit.pelanggaran_lalin_polda')
            @include('form.new_edit.jenis_pelanggaran_lalin_polda')
            @include('form.new_edit.pelanggaran_barang_bukti_yang_disita_polda')
            @include('form.new_edit.kendaraan_terlibat_pelanggaran_polda')
            @include('form.new_edit.profesi_pelaku_pelanggaran_polda')
            @include('form.new_edit.usia_pelaku_pelanggaran_polda')
            @include('form.new_edit.sim_pelaku_pelanggaran_polda')
            @include('form.new_edit.lokasi_pelanggaran_lalin_polda')
            @include('form.new_edit.kecelakaan_lalin_polda')
            @include('form.new_edit.kecelakaan_barang_bukti_yang_disita_polda')
            @include('form.new_edit.profesi_korban_kecelakaan_polda')
            @include('form.new_edit.usia_korban_kecelakaan_polda')
            @include('form.new_edit.sim_korban_kecelakaan_polda')
            @include('form.new_edit.kendaraan_yang_terlibat_kecelakaan_lalin_polda')
            @include('form.new_edit.jenis_kecelakaan_lalin_polda')
            @include('form.new_edit.profesi_pelaku_kecelakaan_lalin_polda')
            @include('form.new_edit.usia_pelaku_kecelakaan_lalin_polda')
            @include('form.new_edit.sim_pelaku_kecelakaan_lalin_polda')
            @include('form.new_edit.lokasi_kecelakaan_lalin_polda')
            @include('form.new_edit.faktor_penyebab_kecelakaan_polda')
            @include('form.new_edit.waktu_kejadian_kecelakaan_lalin_polda')
            @include('form.new_edit.kecelakaan_lalin_menonjol_polda')
            @include('form.new_edit.kecelakaan_lalin_tunggal_polda')
            @include('form.new_edit.kecelakaan_lalin_tabrak_pejalan_kaki_polda')
            @include('form.new_edit.kecelakaan_lalin_tabrak_lari_polda')
            @include('form.new_edit.kecelakaan_lalin_tabrak_sepeda_motor_polda')
            @include('form.new_edit.kecelakaan_lalin_tabrak_roda_empat_polda')
            @include('form.new_edit.kecelakaan_lalin_tabrak_tidak_bermotor_polda')
            @include('form.new_edit.kecelakaan_lalin_perlintasan_ka_polda')
            @include('form.new_edit.kecelakaan_transportasi_polda')
            @include('form.new_edit.data_terkait_dimas_lantas_polda')
            @include('form.new_edit.data_terkait_giat_kepolisian_polda')
            @include('form.new_edit.data_terkait_arus_pemudik')
            @include('form.new_edit.data_terkait_arus_prokes_covid')

            @include('form.new_edit.button')

        </div>
    </div>
</form>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
@endpush

@push('page_js')
<script>

$(document).ready(function () {
    // $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast");
});
</script>
@endpush