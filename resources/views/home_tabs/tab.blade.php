<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="widget-content justify-pill">

        <ul class="nav nav-pills2 nav-fill" id="justify-pills-tab" role="tablist">

            <li class="nav-item mr-3">
                <a class="nav-link2 active" id="tab_link_absesnsi_polda" data-toggle="pill" href="#absensi" role="tab" aria-controls="absensi" aria-selected="true">Data Absensi Polda</a>
            </li>

            <li class="nav-item mr-3">
                <a class="nav-link2" id="tab_link_data_laphar" data-toggle="pill" href="#laphar" role="tab" aria-controls="laphar" aria-selected="false">Data Laporan Harian</a>
            </li>

            <li class="nav-item mr-3">
                <a class="nav-link2" id="tab_link_data_total_laphar" data-toggle="pill" href="#total-laphar" role="tab" aria-controls="total-laphar" aria-selected="false">Data Total Laporan Harian</a>
            </li>

            <li class="nav-item mr-3">
                <a class="nav-link2" id="tab_link_data_laporan_anev" data-toggle="pill" href="#laporan-anev" role="tab" aria-controls="laporan-anev" aria-selected="false">Data Laporan Anev</a>
            </li>

            <li class="nav-item mr-3">
                <a class="nav-link2" id="tab_link_data_total_laporan_anev" data-toggle="pill" href="#total-laporan-anev" role="tab" aria-controls="total-laporan-anev" aria-selected="false">Data Total Laporan Anev</a>
            </li>

            <li class="nav-item mr-3">
                <a class="nav-link2" id="tab_link_total_all" data-toggle="pill" href="#total-all" role="tab" aria-controls="total-all" aria-selected="false">Semua Data Laporan</a>
            </li>

        </ul>

        <div class="tab-content" id="justify-pills-tabContent">
            <div class="tab-pane fade show active" id="absensi" role="tabpanel" aria-labelledby="tab_link_absesnsi_polda">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-activity-three">
                        <div class="widget-heading">
                            <div class="row">
                                <h5 class="ml-n3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-n1" width="20" height="20" viewBox="0 0 20 20">
                                        <path id="bar_chart_alt" d="M22,22H2V11.474A2.055,2.055,0,0,1,4,9.368H8V4.105A2.055,2.055,0,0,1,10,2h4a2.055,2.055,0,0,1,2,2.105V7.263h4a2.055,2.055,0,0,1,2,2.105ZM16,9.368V19.895h4V9.368ZM10,4.105V19.895h4V4.105ZM4,11.474v8.421H8V11.474Z" transform="translate(-2 -2)" fill="#00adef"/>
                                    </svg>
                                    <span>DATA ABSENSI POLDA</span>
                                    <p class="mar20 ml-n1">total data laporan</p>
                                    <b class="ml-n1">34 laporan</b>
                                </h5>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                                    <div class="mx-auto">
                                        <div id="incoming_report"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing mt-n3">
                    <img src="{{ asset('/img/line-poldaup.png') }}" width="100%">
                </div>
            </div>

            <div class="tab-pane fade" id="laphar" role="tabpanel" aria-labelledby="tab_link_data_laphar">
                @include('home_tabs.tab_laphar')
            </div>

            <div class="tab-pane fade" id="total-laphar" role="tabpanel" aria-labelledby="tab_link_data_total_laphar">
                @include('home_tabs.tab_total_laphar')
            </div>

            <div class="tab-pane fade" id="laporan-anev" role="tabpanel" aria-labelledby="tab_link_data_total_laphar">
                @include('home_tabs.tab_laporan_anev')
            </div>

            <div class="tab-pane fade" id="total-laporan-anev" role="tabpanel" aria-labelledby="tab_link_data_laporan_anev">
                @include('home_tabs.tab_total_laporan_anev')
            </div>

            <div class="tab-pane fade" id="total-all" role="tabpanel" aria-labelledby="tab_link_total_all">
                @include('home_tabs.tab_all_data')
            </div>
        </div>
    </div>
</div>