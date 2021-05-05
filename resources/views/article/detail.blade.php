@extends('layouts.template_article')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12 mt-30 head-logo">
                <img src="{{ asset('/img/korlantas.png') }}">
                <h3>korlantas polri</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">

            <div class="col-sm-8 mb-5">
                <div class="head-logo">
                    <a href="{{ route('home') }}">
                        <h3><img src="{{ asset('/img/chevron_big_right.png') }}"> <span>Kembali ke halaman utama</span></h3>
                    </a>
                </div>
                <div class="col-sm-12 style-3">
                    <div class="row">
                        <img src="{{ asset('/img/article/'.$article->small_img) }}">
                    </div>
                </div>
                <div class="show-more">
                    {!! $article->desc !!}
                </div>

                <div class="kategori-more">
                    operasi lilin
                </div>

                <div class="kategori-more">
                    operasi lilin
                </div>
            </div>

            <div class="col-sm-4 mb-5">

                <div class="more-right">
                    <div>Berita Terkini <svg xmlns="http://www.w3.org/2000/svg" width="379.5" height="7.5" viewBox="0 0 379.5 7.5"><defs><style>.a{fill:none;stroke:#105c7c;}.b{fill:#105c7c;}</style></defs><g transform="translate(-1400.5 -153)"><path class="a" d="M-1743,149h379.5" transform="translate(3143.5 11)"/><g transform="translate(1729 153)"><path class="b" d="M30-.052H4.422L0,6.948H30Z" transform="translate(21 0.052)"/><path class="b" d="M6.219,0H-.068l-3,4.948H3.151Z" transform="translate(15.409 0.012)"/><path class="b" d="M3.521,0H-.068l-3,4.948H.453Z" transform="translate(8.82 0.012)"/><path class="b" d="M2.684,0H-.068l-3,4.948H-.384Z" transform="translate(3.068 0.012)"/></g></g></svg></div>
                </div>

                @foreach ($listArticle as $item)
                    <div class="col-sm-12 sidebar-article">
                        <a href="{{ route('news_detail', $item->slug) }}">
                            <img src="{{ url('/img/article/'.$item->small_img) }}">
                            <p>
                                <label>{{ indonesianDateTime($item->created_at) }}</label>
                                {{ limitText(strip_tags($item->desc), 100) }}
                            </p>
                        </a>
                    </div>
                @endforeach

                <div class="text-right more-sidebar">Lihat Selangkapnya <img src="{{ asset('/img/chevron_big_right.png') }}"></div>

                <div class="more-right mt-4">
                    <div>Berita Lainnya <svg xmlns="http://www.w3.org/2000/svg" width="379.5" height="7.5" viewBox="0 0 379.5 7.5"><defs><style>.a{fill:none;stroke:#105c7c;}.b{fill:#105c7c;}</style></defs><g transform="translate(-1400.5 -153)"><path class="a" d="M-1743,149h379.5" transform="translate(3143.5 11)"/><g transform="translate(1729 153)"><path class="b" d="M30-.052H4.422L0,6.948H30Z" transform="translate(21 0.052)"/><path class="b" d="M6.219,0H-.068l-3,4.948H3.151Z" transform="translate(15.409 0.012)"/><path class="b" d="M3.521,0H-.068l-3,4.948H.453Z" transform="translate(8.82 0.012)"/><path class="b" d="M2.684,0H-.068l-3,4.948H-.384Z" transform="translate(3.068 0.012)"/></g></g></svg></div>
                </div>

                @foreach ($listArticle as $item)
                    <div class="col-sm-12 sidebar-article">
                        <a href="{{ route('news_detail', $item->slug) }}">
                            <img src="{{ url('/img/article/'.$item->small_img) }}">
                            <p>
                                <label>{{ indonesianDateTime($item->created_at) }}</label>
                                {{ limitText(strip_tags($item->desc), 100) }}
                            </p>
                        </a>
                    </div>
                @endforeach

                <div class="text-right more-sidebar mb-5">Lihat Selangkapnya <img src="{{ asset('/img/chevron_big_right.png') }}"></div>

            </div>
        </div>
    </div>
</div>
@endsection