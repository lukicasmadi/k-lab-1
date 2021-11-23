@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>UBAH PROFIL</span>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">

        <div class="col-lg-12 col-12 mb-5 layout-spacing">
            @include('flash::message')
            <div class="statbox widget box box-shadow">

                <div class="widget-content text-artikel">
                    <form method="POST" action="{{ route('profile_process') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label>Nama</label>
                            <input type="text" class="form-control artikel @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" autocomplete="off" value="{{ $profile->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Email</label>
                            <input type="email" class="form-control artikel @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" autocomplete="off" value="{{ $profile->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Profile</label>
                            <input type="text" class="form-control artikel @error('profile') is-invalid @enderror" id="profile" name="profile" placeholder="Profile" autocomplete="off" value="{{ $profile->profile }}">
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="custom-file-container mb-4" data-upload-id="myFirstImage">
                            <label>Avatar (max 300x300) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input @error('avatar') is-invalid @enderror" id="avatar" name="avatar" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview" style="display: none;"></div>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3 mr-1" value="Update">
                        <a href="{{ route('article_index') }}" class="btn btn-warning mt-3">KEMBALI</a>
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
<style>
    .invalid-feedback {
        font-size: 14px;
    }
</style>
@endpush

@push('page_js')
<script>
var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endpush