@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>INPUT LAPORAN OPERASI</span>
    </h3>
</div>
@endpush

@section('content')
<form method="POST" action="{{ route('phro_update', $uuid) }}" enctype="multipart/form-data">
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
            @include('form.new_edit.peyekatan')
            @include('form.new_edit.rapid_antigen')

            @include('form.new_edit.button')

        </div>
    </div>
</form>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/file-upload/file-upload-with-preview.min.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
@endpush

@push('page_js')
<script>
var firstUpload = new FileUploadWithPreview('myFirstImage')
$(document).ready(function () {
    // $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, "fast")
});
</script>
@endpush