@extends('layouts.template_login')

@section('content')
<div class="container container-xxl">
    <div class="row">
    <div class="centered">
        <div class="col-sm-12">
            <div class="col-sm-12 head-logo">
                <img src="{{ secure_asset('/img/korlantas.png') }}">
                <h3>korlantas polri</h3>
            </div>
            <div class="col-sm-6 offset-md-3">
                <img class="logo-presisi" src="{{ secure_asset('/img/presisi.png') }}">
            </div>
            <div class="col-sm-2 offset-md-5">
            <a href="{{ route('login') }}">
                <img class="button-login" src="{{ secure_asset('/img/loginon.png') }}">
                <div class="text-center text-login">Login</div>
            </a>
            </div>
            <div class="article-bottom">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="730" height="12" viewBox="0 0 730 12"><defs><style>.a{fill:none;stroke:#00adef;}.b,.c{fill:#00adef;}.d,.e{stroke:none;}.e{fill:#00adef;}</style></defs><g transform="translate(-140 -783)"><line class="a" x2="710" transform="translate(140.5 790)"/><g transform="translate(140 783)"><path class="b" d="M0-.052H25.578l4.422,7H0Z" transform="translate(0 0.052)"/><path class="b" d="M-3.068,0H3.219l3,4.948H0Z" transform="translate(32.44 0.012)"/><path class="b" d="M-3.068,0H.521l3,4.948H0Z" transform="translate(41.727 0.012)"/><path class="b" d="M-3.068,0H-.316l3,4.948H0Z" transform="translate(48.316 0.012)"/></g><g class="c" transform="translate(870 785) rotate(90)"><path class="d" d="M 9.028401374816895 6.5 L 0.9715985655784607 6.5 L 5 0.8602380156517029 L 9.028401374816895 6.5 Z"/><path class="e" d="M 5 1.720461845397949 L 1.94318675994873 6 L 8.05681324005127 6 L 5 1.720461845397949 M 5 0 L 10 7 L 0 7 L 5 0 Z"/></g><g class="c" transform="translate(860 785) rotate(90)"><path class="d" d="M 5 6.499995231628418 C 4.208119869232178 6.499995231628418 3.519030094146729 6.079625606536865 3.156680107116699 5.375515460968018 C 2.794329881668091 4.671395301818848 2.852790117263794 3.866335391998291 3.31306004524231 3.221955537796021 C 3.707129955291748 2.670245409011841 4.322000026702881 2.353825330734253 5 2.353825330734253 C 5.677999973297119 2.353825330734253 6.292870044708252 2.670245409011841 6.68694019317627 3.221955537796021 C 7.147210121154785 3.866335391998291 7.20566987991333 4.671395301818848 6.843319892883301 5.375515460968018 C 6.480969905853271 6.079625606536865 5.791880130767822 6.499995231628418 5 6.499995231628418 Z"/><path class="e" d="M 5 2.853825092315674 C 4.485519886016846 2.853825092315674 4.01894998550415 3.093924999237061 3.71992015838623 3.512575149536133 C 3.370659828186035 4.001534938812256 3.326300144195557 4.612434864044189 3.601260185241699 5.146724700927734 C 3.876220226287842 5.681015014648438 4.399109840393066 5.999995231628418 5 5.999995231628418 C 5.600890159606934 5.999995231628418 6.123780250549316 5.681015014648438 6.398739814758301 5.146724700927734 C 6.673700332641602 4.612434864044189 6.629340171813965 4.001534938812256 6.28007984161377 3.512575149536133 C 5.98105001449585 3.093924999237061 5.514480113983154 2.853825092315674 5 2.853825092315674 M 5 1.853825092315674 C 5.790355205535889 1.853825092315674 6.580709934234619 2.212995052337646 7.093810081481934 2.931334972381592 C 8.310270309448242 4.634374618530273 7.092880249023438 6.999995231628418 5 6.999995231628418 C 2.907120227813721 6.999995231628418 1.689729690551758 4.634374618530273 2.906189918518066 2.931334972381592 C 3.419290065765381 2.212995052337646 4.209644794464111 1.853825092315674 5 1.853825092315674 Z"/></g></g></svg>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="">
                                <div class="text-center title-news">BERITA TERKINI</div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                            <svg style="-webkit-transform: scaleX(-1);
  transform: scaleX(-1);" xmlns="http://www.w3.org/2000/svg" width="730" height="12" viewBox="0 0 730 12"><defs><style>.a{fill:none;stroke:#00adef;}.b,.c{fill:#00adef;}.d,.e{stroke:none;}.e{fill:#00adef;}</style></defs><g transform="translate(-140 -783)"><line class="a" x2="710" transform="translate(140.5 790)"/><g transform="translate(140 783)"><path class="b" d="M0-.052H25.578l4.422,7H0Z" transform="translate(0 0.052)"/><path class="b" d="M-3.068,0H3.219l3,4.948H0Z" transform="translate(32.44 0.012)"/><path class="b" d="M-3.068,0H.521l3,4.948H0Z" transform="translate(41.727 0.012)"/><path class="b" d="M-3.068,0H-.316l3,4.948H0Z" transform="translate(48.316 0.012)"/></g><g class="c" transform="translate(870 785) rotate(90)"><path class="d" d="M 9.028401374816895 6.5 L 0.9715985655784607 6.5 L 5 0.8602380156517029 L 9.028401374816895 6.5 Z"/><path class="e" d="M 5 1.720461845397949 L 1.94318675994873 6 L 8.05681324005127 6 L 5 1.720461845397949 M 5 0 L 10 7 L 0 7 L 5 0 Z"/></g><g class="c" transform="translate(860 785) rotate(90)"><path class="d" d="M 5 6.499995231628418 C 4.208119869232178 6.499995231628418 3.519030094146729 6.079625606536865 3.156680107116699 5.375515460968018 C 2.794329881668091 4.671395301818848 2.852790117263794 3.866335391998291 3.31306004524231 3.221955537796021 C 3.707129955291748 2.670245409011841 4.322000026702881 2.353825330734253 5 2.353825330734253 C 5.677999973297119 2.353825330734253 6.292870044708252 2.670245409011841 6.68694019317627 3.221955537796021 C 7.147210121154785 3.866335391998291 7.20566987991333 4.671395301818848 6.843319892883301 5.375515460968018 C 6.480969905853271 6.079625606536865 5.791880130767822 6.499995231628418 5 6.499995231628418 Z"/><path class="e" d="M 5 2.853825092315674 C 4.485519886016846 2.853825092315674 4.01894998550415 3.093924999237061 3.71992015838623 3.512575149536133 C 3.370659828186035 4.001534938812256 3.326300144195557 4.612434864044189 3.601260185241699 5.146724700927734 C 3.876220226287842 5.681015014648438 4.399109840393066 5.999995231628418 5 5.999995231628418 C 5.600890159606934 5.999995231628418 6.123780250549316 5.681015014648438 6.398739814758301 5.146724700927734 C 6.673700332641602 4.612434864044189 6.629340171813965 4.001534938812256 6.28007984161377 3.512575149536133 C 5.98105001449585 3.093924999237061 5.514480113983154 2.853825092315674 5 2.853825092315674 M 5 1.853825092315674 C 5.790355205535889 1.853825092315674 6.580709934234619 2.212995052337646 7.093810081481934 2.931334972381592 C 8.310270309448242 4.634374618530273 7.092880249023438 6.999995231628418 5 6.999995231628418 C 2.907120227813721 6.999995231628418 1.689729690551758 4.634374618530273 2.906189918518066 2.931334972381592 C 3.419290065765381 2.212995052337646 4.209644794464111 1.853825092315674 5 1.853825092315674 Z"/></g></g></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right more-article">Lihat Selangkapnya <img src="{{ secure_asset('/img/chevron_big_left.png') }}"></div>
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
        </div>
    </div>
    </div>
</div>
@endsection