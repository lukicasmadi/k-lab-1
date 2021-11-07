@extends('layouts.template_admin')
@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
            <path id="text_align_left" d="M16.333,20.556H3V18.333h36.333ZM23,16.111H3V13.889h33Zm-6.667-4.444H3V9.444h36.333ZM23,7.222H3V5h33Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>PROCESS ID : {{ $batch->id }}</span>
    </h3>
</div>
@endpush
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <input type="hidden" name="batch_id" id="batch_id" value="{{ $batch->id }}">

        <div class="col-lg-12 col-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <p><h3><span id="processJob">{{ $batch->processedJobs() }}</span> selesai dari total <span id="totalJobs">{{ $batch->totalJobs }}</span> data yg diproses</h3></p>
                    <p><h3>Proses <span id="progress">{{ $batch->progress() }}</span>%</h3></p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')

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
    })
}
</script>
@endpush