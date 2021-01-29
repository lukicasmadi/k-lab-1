@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-6 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">

                @if ($errors->any())
                    <div class="alert alert-danger custom">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                            <h4>Create Operation Plan</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('rencana_operasi_store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" autocomplete="off" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Operation Type</label>
                            <input type="text" class="form-control @error('operation_type') is-invalid @enderror" id="operation_type" name="operation_type" placeholder="Operation Type" autocomplete="off" value="{{ old('operation_type') }}">
                            @error('operation_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Description</label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="10">{{ old('operation_type') }}</textarea>
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Start and End Date</label>
                            <input type="text" class="form-control flatpickr flatpickr-input active @error('operation_periode') is-invalid @enderror" id="operation_periode" name="operation_periode" placeholder="Operation Date Range" autocomplete="off" value="{{ old('operation_periode') }}">
                            @error('operation_periode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Document Attachment</label>
                            <input type="file" class="form-control @error('attachement') is-invalid @enderror" id="attachement" name="attachement">
                            @error('attachement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        <a href="{{ route('rencana_operasi_index') }}" class="btn btn-warning mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')
<link href="{{ secure_asset('template/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
<link href="{{ secure_asset('template/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('library_js')
<script src="{{ secure_asset('template/plugins/flatpickr/flatpickr.js') }}"></script>
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('page_js')
<script>
    flatpickr(document.getElementById('operation_periode'), {
        mode: "range",
        dateFormat: "d-m-Y"
    })
</script>
@endpush