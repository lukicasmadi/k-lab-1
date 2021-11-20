@extends('layouts.template_admin')
@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333h36.333ZM23,16.111H3V13.889h33Zm-6.667-4.444H3V9.444h36.333ZM23,7.222H3V5h33Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>PROCESSING DATA</span>
    </h3>
</div>
@endpush
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <input type="hidden" name="batch_id" id="batch_id" value="{{ $batch->id }}">

        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-five">
                <div class="widget-content">

                    <div class="header">
                        <div class="header-body">
                            <h6>Processing : {{ $batch->name }}</h6>
                            <p class="meta-date">ID Task : {{ $batch->id }}</p>
                        </div>
                    </div>

                    <div class="w-content">
                        <div>
                            <p class="task-left"><span id="progress">{{ $batch->progress() }}</span> %</p>

                            <div class="process_running">
                                <p class="task-completed"><span id="processJob">{{ $batch->processedJobs() }}</span> task yg telah selesai dan menunggu <span id="pendingJobs">{{ $batch->pendingJobs }}</span> sedang diproses</p>
                                <p class="task-hight-priority">Total <span id="totalJobs">{{ $batch->totalJobs }}</span> task yang akan diproses</p>
                            </div>

                            <span id="visitBtn" class="invisible">
                                <br>
                                <a href="{{ route('open_ready_report', session("progres_report_id")) }}" class="btn btn-info" target="_blank">Laporan Perbandingan Perhari</a>
                                &nbsp;&nbsp;
                                <a href="{{ route('open_ready_report_perday', session("progres_report_id")) }}" class="btn btn-info" target="_blank">Laporan Perhari</a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('library_css')
<link href="{{ asset('template/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
<style>
.widget-five .w-content div .task-completed {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 4px;
    color: #009688;
}
.widget-five .w-content div .task-waiting {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 4px;
    color: goldenrod;
}
span#totalJobs, span#status {
    color: #acb0c3;
    font-weight: 500;
    margin-bottom: 0;
    font-size: 18px;
}
.widget-five .w-content div .task-hight-priority {
    color: #acb0c3;
    font-weight: 500;
    margin-bottom: 0;
    font-size: 18px;
}
.widget-five .w-content div .task-left {
    margin-bottom: 0;
    font-size: 40px;
    color: #25d5e4;
    background: #060818;
    font-weight: 600;
    border-radius: 50%;
    display: inline-flex;
    height: 106px;
    width: 106px;
    justify-content: center;
    padding: 20px 0px;
    border: 5px solid #191e3a;
    margin-bottom: 20px;
    -webkit-box-shadow: 0px 0px 8px 2px #e0e6ed;
    box-shadow: 0px 0px 8px 2px rgba(172, 176, 195, 0.23921568627450981);
}
.widget-five .widget-content .header-body h6 {
    font-weight: 700;
    font-size: 18px;
    letter-spacing: 0;
    margin-bottom: 0;
}
</style>
@endpush

@push('library_js')

@endpush

@push('page_js')
<script>
$(document).ready(function() {
    setInterval(function() {
        getAllData()
    }, 2000)
})

function ajax(dataURL) {
    respObj = $.ajax({
        url: dataURL,
        data: "",
        dataType: 'json',
        type: 'GET'
    });
    return respObj
}

function getAllData() {
    all_operation = ajax(route('queue_check', $("#batch_id").val()))
    all_operation.done(function(data, statusText, jqXHR) {
        var id = data.id
        var totalJobs = data.totalJobs
        var pendingJobs = data.pendingJobs
        var processedJobs = data.processedJobs
        var progress = data.progress
        var failedJobs = data.failedJobs

        $("#processJob").html(processedJobs)
        $("#totalJobs").html(totalJobs)
        $("#progress").html(progress)
        $("#pendingJobs").html(pendingJobs)

        if(progress == 100) {
            $("#visitBtn").removeClass('invisible')
            $(".task-hight-priority").html("Semua task telah selesai diproses")
        } else {
            $("#visitBtn").addClass('invisible')
        }
    })
}
</script>
@endpush