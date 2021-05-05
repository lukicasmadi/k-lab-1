@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>Edit Data Polda</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-12 col-12 mb-5 layout-spacing">
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

                <div class="widget-content text-artikel mt-1">
                    <form method="POST" action="{{ route('polda_update', $data->uuid) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-4">
                            <label>Nama Polda</label>
                            <input type="text" class="form-control artikel @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" autocomplete="off" value="{{ $data->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Nama Singkatan</label>
                            <input type="text" class="form-control artikel @error('name') is-invalid @enderror" id="short_name" name="short_name" placeholder="Short Name" autocomplete="off" value="{{ $data->short_name }}">
                            @error('short_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="custom-file-container mb-4" data-upload-id="myFirstImage">
                            <label>Logo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview" style="display: none;"></div>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3 mr-1" value="Submit">
                        <a href="{{ route('polda_index') }}" class="btn btn-warning mt-3">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_js')
<script src="{{ asset('template/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/file-upload/file-upload-with-preview.min.css') }}">
@endpush

@push('page_js')
<script>
var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endpush