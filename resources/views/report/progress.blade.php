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
        {{--
        <div class="col-lg-12 col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <p><h3><span id="processJob">{{ $batch->processedJobs() }}</span> selesai dari total <span id="totalJobs">{{ $batch->totalJobs }}</span> data yg diproses</h3></p>
                    <p><h3>Proses <span id="progress">{{ $batch->progress() }}</span>%</h3></p>
                </div>
                <a href="{{ route('open_ready_report', session("progres_report_id")) }}" id="visitBtn" class="btn btn-info invisible">View Report</a>
            </div>
        </div> --}}

        <input type="hidden" name="batch_id" id="batch_id" value="{{ $batch->id }}">

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-five">
                <div class="widget-content">

                    <div class="header">
                        <div class="header-body">
                            <h6>Processing Tasks ID</h6>
                            <p class="meta-date">{{ $batch->id }}</p>
                        </div>
                        {{-- <div class="task-action">
                            <div class="dropdown  custom-dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                    <a class="dropdown-item" href="javascript:void(0);">Add</a>
                                    <a class="dropdown-item" href="javascript:void(0);">View</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Clear All</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="w-content">
                        <div class="">
                            <p class="task-left"><span id="progress">{{ $batch->progress() }}</span> %</p>
                            <p class="task-completed"><span id="processJob">{{ $batch->processedJobs() }}</span> done and <span id="pendingJobs">{{ $batch->pendingJobs }}</span> waiting</p>
                            <p class="task-hight-priority"><span>Total <span id="totalJobs">{{ $batch->totalJobs }}</span> Task</span> with High priority</p>
                            <span id="visitBtn" class="invisible">
                                <br>
                                <p><a href="{{ route('open_ready_report', session("progres_report_id")) }}" class="btn btn-info">View Report</a></p>
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

function loadTrus() {

}

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
        } else {
            $("#visitBtn").addClass('invisible')
        }
    })
}
</script>
@endpush