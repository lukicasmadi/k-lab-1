@extends('layouts.template_admin')

@push('page_title')
<div class="page-title">
    <h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.556" viewBox="0 0 20 15.556">
        <path id="text_align_left" d="M16.333,20.556H3V18.333H16.333ZM23,16.111H3V13.889H23Zm-6.667-4.444H3V9.444H16.333ZM23,7.222H3V5H23Z" transform="translate(-3 -5)" fill="#00adef"/>
        </svg>
        <span>MANUAL BOOK WEB SISLAPOPS KORLANTAS POLRI</span>
        <p class="tutor">Silakan dibaca dan diikuti panduan websitenya dibawah ini!</p>
    </h3>
</div>
@endpush

@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-n3 mb-4">
            <img class="linetop-dashboard" src="{{ asset('/img/line-poldaup.png') }}" width="100%">
            <img class="linetoplight-dashboard" src="{{ asset('/img/line-poldaup-light.png') }}" width="100%">
        </div>
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-25 layout-spacing">
            <div class="widget-content">
                <div class="col-md-12 text-left mb-4">
                    <div class="text-left">
                        <img src="{{ asset('/img/tutorial/panduan__03.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__06.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__08.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__10.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__12.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__14.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__16.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__18.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__20.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__22.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__24.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__26.jpg') }}" width="100%">
                        <img src="{{ asset('/img/tutorial/panduan__28.jpg') }}" width="100%">
                    </div>
                </div>
                <div class="col-md-12 text-center mb-5">
                        <a href="{{ route('download_file_panduan') }}" class="btn btn-warning">UNDUH</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('library_css')
<link rel="stylesheet" type="text/css" href="{{ asset('template/custom.css') }}">
@endpush