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
        <div class="col-lg-12 col-12">
            <div class="statbox widget box box-shadow">
                @include('flash::message')
                <div class="widget-content mt-3 widget-content-area">
                    <form action="{{ route('report_comparison_process') }}" id="comparison_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-popup">Pilih Operasi</label>
                            <select class="form-control form-custom height-form" name="operation_id" id="operation_id">
                                @foreach($rencanaOperasi as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-n3">
                            <label class="text-popup">Pilih Tahun Pembanding 1</label>
                            <select id="tahun_pembanding_pertama" name="tahun_pembanding_pertama" class="form-control form-custom height-form">
                                @foreach($prevYear as $py){
                                <option value="{{ $py }}">{{ $py }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-n3">
                            <label class="text-popup">Pilih Tahun Pembanding 2</label>
                            <select id="tahun_pembanding_kedua" name="tahun_pembanding_kedua" class="form-control form-custom height-form">
                                @foreach($currentYear as $cy){
                                <option value="{{ $cy }}">{{ $cy }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-n3">
                            <label class="text-popup">Pilih Hari</label>
                            <input id="tanggal" name="tanggal" class="form-control popoups inp-icon flatpickr flatpickr-input active form-control-lg" type="text" placeholder="- Pilih Tanggal -">
                        </div>
                        <input type="submit" name="btnUnduhData" id="btnUnduhData" class="mt-4 mb-4 btn btn-primary" value="Unduh Data">
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

<div class="modal fade" id="debugModal" tabindex="-1" role="dialog" aria-labelledby="debugModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content" id="debugdata"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('library_css')
<link href="{{ asset('template/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('template/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('template/plugins/bootstrap-range-Slider/bootstrap-slider.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/custom.css') }}" rel="stylesheet" type="text/css">
<style>
#sheet0 {
    width: 100%;
}
</style>
@endpush

@push('library_js')
<script src="{{ asset('template/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js') }}"></script>
<script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
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

    $(document).ready(function () {
        $("#btnUnduhData").prop('disabled', true)
        var f1 = flatpickr(document.getElementById('tanggal'), {
            mode: "range",
            onClose: function(selectedDates, dateStr, instance) {
                if(dateStr) {
                    $("#panelData").empty().addClass("d-none")
                    $("#panelLoading").removeClass("d-none")

                    axios.post(route('show_excel_to_view'), {})
                    .then(function(response) {
                        $("#panelLoading").addClass("d-none")
                        $("#panelData").removeClass("d-none")

                        $("#panelData").empty().html(response.data)
                    })
                    .catch(function(error) {
                        swal("Data belum lengkap. Silakan periksa data yang akan diproses", error.response.data.output, "error")
                    })
                }
            }
        })
    })
</script>
@endpush