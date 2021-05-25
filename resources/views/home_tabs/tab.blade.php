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
        </ul>

        <div style="margin-top: 20px;"></div>

        <div class="tab-content" id="justify-pills-tabContent">
            <div class="tab-pane fade show active" id="absensi" role="tabpanel" aria-labelledby="tab_link_absesnsi_polda">
                @include('home_tabs.tab_absensi')
            </div>
            <div class="tab-pane fade" id="laphar" role="tabpanel" aria-labelledby="tab_link_data_laphar">
                @include('home_tabs.tab_laphar')
            </div>
            <div class="tab-pane fade" id="total-laphar" role="tabpanel" aria-labelledby="tab_link_data_total_laphar">
                @include('home_tabs.tab_total_laphar')
            </div>
        </div>
    </div>
</div>