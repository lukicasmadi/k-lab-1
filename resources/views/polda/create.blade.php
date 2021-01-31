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
                            <h4>Create Polda</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('polda_store') }}" enctype="multipart/form-data">
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
                            <label><span class="require">*</span>Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Jurisdiction</label>
                            <input type="text" class="form-control @error('jurisdiction') is-invalid @enderror" id="jurisdiction" name="jurisdiction" placeholder="Jurisdiction" autocomplete="off" value="{{ old('jurisdiction') }}">
                            @error('jurisdiction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Headquarters</label>
                            <input type="text" class="form-control @error('headquarters') is-invalid @enderror" id="headquarters" name="headquarters" placeholder="Headquarters" autocomplete="off" value="{{ old('headquarters') }}">
                            @error('headquarters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Type" autocomplete="off" value="{{ old('type') }}">
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Official Site</label>
                            <input type="text" class="form-control @error('official_site') is-invalid @enderror" id="official_site" name="official_site" placeholder="Official Site" autocomplete="off" value="{{ old('official_site') }}">
                            @error('official_site')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        <a href="{{ route('polda_index') }}" class="btn btn-warning mt-3">Back</a>
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