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
                                <input type="submit" name="btnUnduhData" id="btnUnduhData" class="mt-4 mb-4 btn btn-primary" value="Unduh Data" disabled>
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
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
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

                var DateTime = luxon.DateTime;
                var now = DateTime.now().setLocale("id")

                var startDate = response.data.start_date
                var endDate = response.data.end_date

                $(".pembanding").removeClass("d-none")

                $('#tanggal_pembanding_1').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    autoclose: true,
                    startDate: DateTime.fromISO(startDate).toFormat('dd-MM-yyyy'),
                    endDate: DateTime.fromISO(endDate).toFormat('dd-MM-yyyy'),
                })

                $('#tanggal_pembanding_2').datepicker({
                    format: 'dd-mm-yyyy',
                    todayHighlight: true,
                    autoclose: true,
                    startDate: DateTime.fromISO(startDate).toFormat('dd-MM-yyyy'),
                    endDate: DateTime.fromISO(endDate).toFormat('dd-MM-yyyy'),
                })
            })
            .catch(function (error) {
                swal("Data tidak ditemukan. Silakan periksa data yang akan diproses", null, "error")
            })
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

            $("#panelLoading").removeClass("d-none")

            const popupCenter = ({url, title, w, h}) => {
                const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
                const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

                const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
                const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

                const systemZoom = width / window.screen.availWidth;
                const left = (width - w) / 2 / systemZoom + dualScreenLeft
                const top = (height - h) / 2 / systemZoom + dualScreenTop
                const newWindow = window.open(url, title,
                `
                scrollbars=yes,
                width=${w / systemZoom},
                height=${h / systemZoom},
                top=${top},
                left=${left}
                `
                )

                if (window.focus) newWindow.focus();
            }

            if(operation_id != "" && startDate != "") {
                popupCenter({
                    url: route('show_excel_to_view_anev', {
                        operation_id: operation_id,
                        start_date: startDate,
                        end_date: endDate,
                    }),
                    title: 'Detail',
                    w: 1000, h: 600
                })

                $("#panelLoading").addClass("d-none")
                $("#btnUnduhData").prop('disabled', false)
            }
        }
    })

    $(document).ready(function () {
        //
    })
</script>
@endpush