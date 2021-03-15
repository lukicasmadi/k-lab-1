@extends('layouts.template_article')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12 mt-30 head-logo">
                <img src="{{ secure_asset('/img/korlantas.png') }}">
                <h3>korlantas polri</h3>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-8">
                <div class="head-logo">
                    <a href="{{ route('home') }}">
                        <h3><img src="{{ secure_asset('/img/chevron_big_right.png') }}"> <span>informasi detail</span></h3>
                    </a>
                </div>
                <div class="col-sm-12 detail-article">
                <div class="row">
                    <img src="{{ secure_asset('/img/article/img_20200110.jpg') }}">
                </div>
                </div>
                <div class="show-more">
                <p><b>KORLANTAS POLRI</b> - Kepala Korps Lalu Lintas (Kakorlantas) Polri Irjen Pol Istiono bersama Ditjen Perhubungan Darat Budi Setyadi melepas keberangkatan Tim Perwira Pengamat Wilayah (Pamatwil). Tim ini akan disebar ke seluruh wilayah Indonesia dalam pelaksanaan Operasi Lilin 2020 pengamanan Natal dan Tahun Baru 2021 yang digelar mulai tanggal 21 Desember 2020 sampai 4 Januari 2021.</p>

                <p>Apel pelepasan Pamatwil digelar di halaman gedung NTMC Polri, Cawang, Jakarta Timur, Senin (21/12/2020). Apel digelar dengan tetap menerapkan protokol kesehatan Covid-19.</p>

                <p>Sebelum pelepasan, para perwira Korlantas Polri melakukan pemeriksaan dengan Swab Antigen, untuk memastikan langsung kesehatan para perwira sebelum bertugas dilapangan. Kakorlantas Polri mengatakan bahwa Operasi Lilin Tahun 2020 ini adalah Operasi Kemanusiaan yang mengedepankan tindakan preventif preemtif, juga persuasif humanis.</p>

                <p>"Kita membuat posko-posko kemanusiaan dibeberapa titik, terutama di rest area untuk menggelar random cek swab antigen di beberapa lokasi tertentu yang sudah ditetapkan," kata Kakorlantas.</p>

                <p>Jumlah personel yang diturunkan dalam Operasi Lilin 2020 sekitar 123.451 yang disebar ke seluruh Indonesia.</p>

                <p>Kakorlantas menambahkan dalam pelaksanaan Operasi Lilin Tahun 2020 ada beberapa titik yang menjadi atensi pengamanan dengan menerapkan disiplin protokol covid-19 demi mencegah penyebaran virus tersebut, diantaranya tempat moda transportasi darat, laut dan udara.</p>

                <p>"Serta lokasi wisata dan lokasi kerumunan lain yang berpotensi untuk penularan covid-19. Kegiatan yang kita lakukan ini, nanti bersinergi semua dengan instansi terkait dan kita laksanakan secara maksimal," terang Kakorlantas.</p>

                <p>Kakorlantas mengimbau agar dalam malam ibadah Natal tahun 2020 untuk masyarakat yang hadir di gereja kurang lebih hanya 20-30 persen.</p>

                <p>"Yang lainnya virtual dan jangan memasang tenda. Ini yang kita tegaskan untuk mencegah protokol covid-19. Termasuk juga di penghujung tahun nanti. di tempat keramaian tidak ada ijin untuk keramaian. Ini kita lakukan untuk mencegah penyebaran covid-19," pungkas Kakorlantas Polri.</p>
                <div class="label-more">
                <label>operasi lilin</label>
                <label>operasi patuh</label>
                </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="more-right">
                    <div>Berita Terkini <svg xmlns="http://www.w3.org/2000/svg" width="379.5" height="7.5" viewBox="0 0 379.5 7.5"><defs><style>.a{fill:none;stroke:#105c7c;}.b{fill:#105c7c;}</style></defs><g transform="translate(-1400.5 -153)"><path class="a" d="M-1743,149h379.5" transform="translate(3143.5 11)"/><g transform="translate(1729 153)"><path class="b" d="M30-.052H4.422L0,6.948H30Z" transform="translate(21 0.052)"/><path class="b" d="M6.219,0H-.068l-3,4.948H3.151Z" transform="translate(15.409 0.012)"/><path class="b" d="M3.521,0H-.068l-3,4.948H.453Z" transform="translate(8.82 0.012)"/><path class="b" d="M2.684,0H-.068l-3,4.948H-.384Z" transform="translate(3.068 0.012)"/></g></g></svg></div>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200113.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200110.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200111.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="text-right more-sidebar">Lihat Selangkapnya <img src="{{ secure_asset('/img/chevron_big_right.png') }}"></div>
                <div class="more-right">
                    <div>Berita lainnya <svg xmlns="http://www.w3.org/2000/svg" width="379.5" height="7.5" viewBox="0 0 379.5 7.5"><defs><style>.a{fill:none;stroke:#105c7c;}.b{fill:#105c7c;}</style></defs><g transform="translate(-1400.5 -153)"><path class="a" d="M-1743,149h379.5" transform="translate(3143.5 11)"/><g transform="translate(1729 153)"><path class="b" d="M30-.052H4.422L0,6.948H30Z" transform="translate(21 0.052)"/><path class="b" d="M6.219,0H-.068l-3,4.948H3.151Z" transform="translate(15.409 0.012)"/><path class="b" d="M3.521,0H-.068l-3,4.948H.453Z" transform="translate(8.82 0.012)"/><path class="b" d="M2.684,0H-.068l-3,4.948H-.384Z" transform="translate(3.068 0.012)"/></g></g></svg></div>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200113.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200110.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200111.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="col-sm-12 sidebar-article">
                    <img src="{{ secure_asset('/img/article/img_20200110.jpg') }}">
                    <p>
                        <label>Senin, 10 Apr 2021</label>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    </p>
                </div>
                <div class="text-right more-sidebar">Lihat Selangkapnya <img src="{{ secure_asset('/img/chevron_big_right.png') }}"></div>
            </div>
        </div>
    </div>
</div>
@endsection