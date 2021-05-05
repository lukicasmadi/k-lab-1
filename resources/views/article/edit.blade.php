@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>EDIT ARTIKEL</span>
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

                <div class="widget-content text-artikel">
                    <form method="POST" action="{{ route('article_update', $articleUuid->uuid) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $articleUuid->id }}">
                        <div class="form-group mb-4">
                            <label>Judul Artikel</label>
                            <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" placeholder="Judul" autocomplete="off" value="{{ $articleUuid->topic }}">
                        </div>

                        <div class="form-group mb-4">
                            <label>Deskripsi</label>
                            <textarea id="desc" name="desc" class="editor @error('desc') is-invalid @enderror">{{ $articleUuid->desc }}</textarea>
                        </div>

                        <div class="form-group mb-1">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control form-custom artc-form @error('status') is-invalid @enderror">
                                <option value="active" @if ($articleUuid->status == "active") selected @endif>AKTIF</option>
                                <option value="nonactive" @if ($articleUuid->status == "nonactive") selected @endif>TIDAK AKTIF</option>
                            </select>
                        </div>

                        <div class="custom-file-container mb-4" data-upload-id="myFirstImage">
                            <label>Thumbnail <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input @error('small_img') is-invalid @enderror" id="small_img" name="small_img" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                @error('small_img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview" style="display: none;"></div>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3 mr-1" value="UPDATE">
                        <a href="{{ route('article_index') }}" class="btn btn-warning mt-3">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" href="{{ asset('template/ckeditor5/sample/styles.css') }}">
@endpush

@push('library_js')
<script src="{{ asset('template/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('template/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ asset('template/custom.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/file-upload/file-upload-with-preview.min.css') }}">
@endpush

@push('page_js')
<script>
var firstUpload = new FileUploadWithPreview('myFirstImage')
$(document).ready(function() {
    ClassicEditor.create(document.querySelector('.editor'), {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'outdent',
                'indent',
                '|',
                'imageUpload',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo'
            ]
        },
        language: 'en',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        licenseKey: '',
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: 7mbdfn5lcdew-nohdljl880ze' );
        console.error( error );
    });
})
</script>
@endpush