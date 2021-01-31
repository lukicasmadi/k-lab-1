@extends('layouts.template_admin')

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-12 col-12  layout-spacing">
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


                <blockquote class="blockquote">
                    <p class="d-inline">The operation that is currently running is <mark>{{ $op->name }}</mark></p>
                    <small>Administrator</small>
                </blockquote>

                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Create Operation Report</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('phro_store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Operation Name</label>
                            <input type="text" class="form-control @error('operation_name') is-invalid @enderror" id="operation_name" name="operation_name" placeholder="Operation Name" autocomplete="off" value="{{ old('operation_name') }}">
                            @error('operation_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Detail Operation</label>
                            <textarea class="form-control @error('detail_operation') is-invalid @enderror" id="detail_operation" name="detail_operation" rows="6">{{ old('detail_operation') }}</textarea>
                            @error('detail_operation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Additional Info</label>
                            <textarea class="form-control @error('additional_info') is-invalid @enderror" id="additional_info" name="additional_info" rows="6">{{ old('additional_info') }}</textarea>
                            @error('additional_info')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Attachment File</label>
                            <input type="file" class="form-control @error('attachement') is-invalid @enderror" id="attachement" name="attachement">
                            @error('attachement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        <a href="{{ route('phro_index') }}" class="btn btn-warning mt-3">Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush