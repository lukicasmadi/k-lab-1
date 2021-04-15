@extends('layouts.template_article')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="col-sm-12 mt-30 head-logo">
                <img src="{{ asset('/img/korlantas.png') }}">
                <h3>korlantas polri</h3>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-xl-8 col-lg-5 col-md-5 col-sm-7 mt-30">
            <form class="form-inline my-2 my-lg-0">
                <div class="">
                    <input type="text" style="width: 500px; height: 10px;" class="form-control product-search" id="input-search" placeholder="Cari Berita...">
                </div>
            </form>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="col-sm-12 mt-30 head-logo">
                <a href="{{ route('home') }}">
                    <h3 class="login-arc">login</h3>
                </a>
                <a href="{{ route('home') }}">
                    <h3 class="colorback login-back"><img src="{{ asset('/img/chevron_big_right.png') }}"> kembali</h3>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12 style-3">
                <img src="{{ asset('/img/article/img_20200110.jpg') }}">
            </div>
            <div class="col-sm-12">
                <div class="head-logo">
                    <h3>berita utama</h3>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                            <a href="/article/detail">
                                <img src="{{ asset('/img/article/img_20200113.jpg') }}">
                                <p>
                                <label>Senin, 10 Apr 2021</label>
                                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                        <a href="/article/detail">
                            <img src="{{ asset('/img/article/img_20200110.jpg') }}">
                            <p>
                            <label>Senin, 10 Apr 2021</label>
                            korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                            </p>
                        </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                            <a href="/article/detail">
                                <img src="{{ asset('/img/article/img_20200111.jpg') }}">
                                <p>
                                <label>Senin, 10 Apr 2021</label>
                                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="more-right">
                    <div>Berita Terkini</div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                            <a href="/article/detail">
                                <img src="{{ asset('/img/article/img_20200113.jpg') }}">
                                <p>
                                <label>Senin, 10 Apr 2021</label>
                                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                        <a href="/article/detail">
                            <img src="{{ asset('/img/article/img_20200110.jpg') }}">
                            <p>
                            <label>Senin, 10 Apr 2021</label>
                            korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                            </p>
                        </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                            <a href="/article/detail">
                                <img src="{{ asset('/img/article/img_20200111.jpg') }}">
                                <p>
                                <label>Senin, 10 Apr 2021</label>
                                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 100px;">
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                            <a href="/article/detail">
                                <img src="{{ asset('/img/article/img_20200113.jpg') }}">
                                <p>
                                <label>Senin, 10 Apr 2021</label>
                                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                        <a href="/article/detail">
                            <img src="{{ asset('/img/article/img_20200110.jpg') }}">
                            <p>
                            <label>Senin, 10 Apr 2021</label>
                            korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                            </p>
                        </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="col-sm-12 home-article">
                            <a href="/article/detail">
                                <img src="{{ asset('/img/article/img_20200111.jpg') }}">
                                <p>
                                <label>Senin, 10 Apr 2021</label>
                                korlantas pimpin pemberangkatan tim pamatwil operasi lilin tahun 2020
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection