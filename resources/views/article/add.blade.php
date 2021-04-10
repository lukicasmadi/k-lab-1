@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>TAMBAH ARTIKEL</span>
    </h3>
</div>
@endpush

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

                <div class="widget-content widget-content-area">
                    <form method="POST" action="{{ route('article_save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Judul</label>
                            <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" placeholder="Judul" autocomplete="off" value="{{ old('topic') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Deskripsi</label>
                            <textarea id="desc" name="desc" class="editor @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active">AKTIF</option>
                                <option value="nonactive">TIDAK AKTIF</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label><span class="require">*</span>Thumbnail</label>
                            <input type="file" class="form-control @error('small_img') is-invalid @enderror" id="small_img" name="small_img">
                            @error('small_img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary mt-3" value="Submit">
                        <a href="{{ route('article_index') }}" class="btn btn-warning mt-3">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('library_css')
{{-- <link rel="stylesheet" href="{{ secure_asset('template/plugins/editors/markdown/simplemde.min.css') }}"> --}}
<link rel="stylesheet" href="{{ secure_asset('template/ckeditor5/sample/styles.css') }}">
@endpush

@push('library_js')
{{-- <script src="{{ secure_asset('template/plugins/editors/markdown/simplemde.min.js') }}"></script> --}}
<script src="{{ secure_asset('template/ckeditor5/build/ckeditor.js') }}"></script>
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ secure_asset('template/custom.css') }}">
@endpush

@push('page_js')
<script>
$(document).ready(function() {
    // new SimpleMDE({
    //     element: document.getElementById("desc"),
    //     spellChecker: false,
    // })
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