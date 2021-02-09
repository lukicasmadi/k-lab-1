@extends('layouts.template_login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="col-sm-12 head-logo">
                <img src="{{ secure_asset('/img/korlantas.png') }}">
                <h3>korlantas polri</h3>
            </div>
        </div>
    </div>
    <img class="logo-presisi" src="{{ secure_asset('/img/presisi.png') }}">
    <a href="{{ route('login') }}">
        <img class="button-login" src="{{ secure_asset('/img/loginon.png') }}">
        <div class="text-center text-login">Login</div>
    </a>
    <div class="text-center title-news">BERITA TERKINI</div>
    <div class="text-right more-article">Lihat Selangkapnya</div>
    <div class="row">
        <div class="col-sm-4">
            <div class="col-sm-12 home-article">
                <img src="{{ secure_asset('/img/article/img_20200113.jpg') }}">
                <p>
                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                <label>baca selangkapnya <span>&#187;</span></label>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 home-article">
                <img src="{{ secure_asset('/img/article/img_20200110.jpg') }}">
                <p>
                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                <label>baca selangkapnya <span>&#187;</span></label>
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 home-article">
                <img src="{{ secure_asset('/img/article/img_20200111.jpg') }}">
                <p>
                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                <label>baca selangkapnya <span>&#187;</span></label>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection