<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">

        <blockquote class="blockquote">
            <p class="d-inline">DATA TERKAIT DIKMAS LANTAS</p>
        </blockquote>

        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>DIKMAS LANTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <blockquote class="blockquote">
                <p class="d-inline">a. PENLUH</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) MELALUI MEDIA CETAK</label>
                <input type="number" class="form-control @error('penlu_melalui_media_cetak') is-invalid @enderror" name="penlu_melalui_media_cetak" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_media_cetak }}">
                @error('penlu_melalui_media_cetak')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) MELALUI MEDIA ELEKTRONIK</label>
                <input type="number" class="form-control @error('penlu_melalui_media_elektronik') is-invalid @enderror" name="penlu_melalui_media_elektronik" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_media_elektronik }}">
                @error('penlu_melalui_media_elektronik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) TEMPAT KERAMAIAN</label>
                <input type="number" class="form-control @error('penlu_melalui_tempat_keramaian') is-invalid @enderror" name="penlu_melalui_tempat_keramaian" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_tempat_keramaian }}">
                @error('penlu_melalui_tempat_keramaian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) TEMPAT ISTIRAHAT</label>
                <input type="number" class="form-control @error('penlu_melalui_tempat_istirahat') is-invalid @enderror" name="penlu_melalui_tempat_istirahat" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_tempat_istirahat }}">
                @error('penlu_melalui_tempat_istirahat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>5) DAERAH RAWAN LAKA & LANGGAR</label>
                <input type="number" class="form-control @error('penlu_melalui_daerah_rawan_laka_dan_langgar') is-invalid @enderror" name="penlu_melalui_daerah_rawan_laka_dan_langgar" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_daerah_rawan_laka_dan_langgar }}">
                @error('penlu_melalui_daerah_rawan_laka_dan_langgar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">b. PENYEBARAN / PEMASANGAN</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) SPANDUK</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_spanduk') is-invalid @enderror" name="penyebaran_pemasangan_spanduk" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_spanduk }}">
                @error('penyebaran_pemasangan_spanduk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) LEAFLET</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_leaflet') is-invalid @enderror" name="penyebaran_pemasangan_leaflet" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_leaflet }}">
                @error('penyebaran_pemasangan_leaflet')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) STICKER</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_sticker') is-invalid @enderror" name="penyebaran_pemasangan_sticker" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_sticker }}">
                @error('penyebaran_pemasangan_sticker')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) BILBOARD</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_bilboard') is-invalid @enderror" name="penyebaran_pemasangan_bilboard" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_bilboard }}">
                @error('penyebaran_pemasangan_bilboard')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">c. PROGRAM NASIONAL KEAMANAN LALU LINTAS</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) POLISI SAHABAT ANAK</label>
                <input type="number" class="form-control @error('polisi_sahabat_anak') is-invalid @enderror" name="polisi_sahabat_anak" autocomplete="off" value="{{ $data->dailyInput->polisi_sahabat_anak }}">
                @error('polisi_sahabat_anak')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) CARA AMAN SEKOLAH</label>
                <input type="number" class="form-control @error('cara_aman_sekolah') is-invalid @enderror" name="cara_aman_sekolah" autocomplete="off" value="{{ $data->dailyInput->cara_aman_sekolah }}">
                @error('cara_aman_sekolah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) PATROLI KEAMANAN SEKOLAH</label>
                <input type="number" class="form-control @error('patroli_keamanan_sekolah') is-invalid @enderror" name="patroli_keamanan_sekolah" autocomplete="off" value="{{ $data->dailyInput->patroli_keamanan_sekolah }}">
                @error('patroli_keamanan_sekolah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) PRAMUKA SAKA BHAYANGKARA KRIDA LALU LINTAS</label>
                <input type="number" class="form-control @error('pramuka_bhayangkara_krida_lalu_lintas') is-invalid @enderror" name="pramuka_bhayangkara_krida_lalu_lintas" autocomplete="off" value="{{ $data->dailyInput->pramuka_bhayangkara_krida_lalu_lintas }}">
                @error('pramuka_bhayangkara_krida_lalu_lintas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">d. PROGRAM NASIONAL KESELAMATAN LALU LINTAS</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) POLICE GOES TO CAMPUS</label>
                <input type="number" class="form-control @error('police_goes_to_campus') is-invalid @enderror" name="police_goes_to_campus" autocomplete="off" value="{{ $data->dailyInput->police_goes_to_campus }}">
                @error('police_goes_to_campus')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) SAFETY RIDING & DRIVING</label>
                <input type="number" class="form-control @error('safety_riding_driving') is-invalid @enderror" name="safety_riding_driving" autocomplete="off" value="{{ $data->dailyInput->safety_riding_driving }}">
                @error('safety_riding_driving')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) FORUM LALU LINTAS & ANGKUTAN JALAN</label>
                <input type="number" class="form-control @error('forum_lalu_lintas_angkutan_umum') is-invalid @enderror" name="forum_lalu_lintas_angkutan_umum" autocomplete="off" value="{{ $data->dailyInput->forum_lalu_lintas_angkutan_umum }}">
                @error('forum_lalu_lintas_angkutan_umum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) KAMPANYE KESELAMATAN</label>
                <input type="number" class="form-control @error('kampanye_keselamatan') is-invalid @enderror" name="kampanye_keselamatan" autocomplete="off" value="{{ $data->dailyInput->kampanye_keselamatan }}">
                @error('kampanye_keselamatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>5) SEKOLAH MENGEMUDI</label>
                <input type="number" class="form-control @error('sekolah_mengemudi') is-invalid @enderror" name="sekolah_mengemudi" autocomplete="off" value="{{ $data->dailyInput->sekolah_mengemudi }}">
                @error('sekolah_mengemudi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>6) TAMAN LALU LINTAS</label>
                <input type="number" class="form-control @error('taman_lalu_lintas') is-invalid @enderror" name="taman_lalu_lintas" autocomplete="off" value="{{ $data->dailyInput->taman_lalu_lintas }}">
                @error('taman_lalu_lintas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>7) GLOBAL ROAD SAFETY PARTNERSHIP ACTION</label>
                <input type="number" class="form-control @error('global_road_safety_partnership_action') is-invalid @enderror" name="global_road_safety_partnership_action" autocomplete="off" value="{{ $data->dailyInput->global_road_safety_partnership_action }}">
                @error('global_road_safety_partnership_action')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>