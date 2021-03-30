<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div id="toggleAccordion">
            <div class="card">
                <div id="defaultAccordion01" class="collapse show" aria-labelledby="heading01" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                III DATA TERKAIT DIKMAS LANTAS
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header" id="heading03">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion03" aria-expanded="false" aria-controls="defaultAccordion03">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                31
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                DIKMAS LANTAS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12 text-center">
                                    {{ yearMinus() }}
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12 text-center">
                                    {{ year() }}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="defaultAccordion03" class="collapse show" aria-labelledby="heading03" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="background: #11425C; padding: 10px 0;">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                A. PENLUH
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. MELALUI MEDIA CETAK
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_cetak_p') is-invalid @enderror" name="penlu_melalui_media_cetak_p" autocomplete="off" value="{{ $data->dailyInputPrev->penlu_melalui_media_cetak_p }}">
                                    @error('penlu_melalui_media_cetak_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_cetak') is-invalid @enderror" name="penlu_melalui_media_cetak" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_media_cetak }}">
                                    @error('penlu_melalui_media_cetak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                2. MELALUI MEDIA ELEKTRONIK
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_elektronik_p') is-invalid @enderror" name="penlu_melalui_media_elektronik_p" autocomplete="off" value="{{ $data->dailyInputPrev->penlu_melalui_media_elektronik_p }}">
                                    @error('penlu_melalui_media_elektronik_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_elektronik') is-invalid @enderror" name="penlu_melalui_media_elektronik" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_media_elektronik }}">
                                    @error('penlu_melalui_media_elektronik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                3. TEMPAT KERAMAIAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_keramaian_p') is-invalid @enderror" name="penlu_melalui_tempat_keramaian_p" autocomplete="off" value="{{ $data->dailyInputPrev->penlu_melalui_tempat_keramaian_p }}">
                                    @error('penlu_melalui_tempat_keramaian_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_keramaian') is-invalid @enderror" name="penlu_melalui_tempat_keramaian" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_tempat_keramaian }}">
                                    @error('penlu_melalui_tempat_keramaian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                4. TEMPAT ISTIRAHAT
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_istirahat_p') is-invalid @enderror" name="penlu_melalui_tempat_istirahat_p" autocomplete="off" value="{{ $data->dailyInputPrev->penlu_melalui_tempat_istirahat_p }}">
                                    @error('penlu_melalui_tempat_istirahat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_istirahat') is-invalid @enderror" name="penlu_melalui_tempat_istirahat" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_tempat_istirahat }}">
                                    @error('penlu_melalui_tempat_istirahat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                5. DAERAH RAWAN LAKA & LANGGAR
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_daerah_rawan_laka_dan_langgar_p') is-invalid @enderror" name="penlu_melalui_daerah_rawan_laka_dan_langgar_p" autocomplete="off" value="{{ $data->dailyInputPrev->penlu_melalui_daerah_rawan_laka_dan_langgar_p }}">
                                    @error('penlu_melalui_daerah_rawan_laka_dan_langgar_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_daerah_rawan_laka_dan_langgar') is-invalid @enderror" name="penlu_melalui_daerah_rawan_laka_dan_langgar" autocomplete="off" value="{{ $data->dailyInput->penlu_melalui_daerah_rawan_laka_dan_langgar }}">
                                    @error('penlu_melalui_daerah_rawan_laka_dan_langgar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="background: #11425C; padding: 10px 0;">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                B. PENYEBARAN / PEMASANGAN
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. SPANDUK
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_spanduk_p') is-invalid @enderror" name="penyebaran_pemasangan_spanduk_p" autocomplete="off" value="{{ $data->dailyInputPrev->penyebaran_pemasangan_spanduk_p }}">
                                    @error('penyebaran_pemasangan_spanduk_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_spanduk') is-invalid @enderror" name="penyebaran_pemasangan_spanduk" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_spanduk }}">
                                    @error('penyebaran_pemasangan_spanduk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                2. LEAFLET
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_leaflet_p') is-invalid @enderror" name="penyebaran_pemasangan_leaflet_p" autocomplete="off" value="{{ $data->dailyInputPrev->penyebaran_pemasangan_leaflet_p }}">
                                    @error('penyebaran_pemasangan_leaflet_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_leaflet') is-invalid @enderror" name="penyebaran_pemasangan_leaflet" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_leaflet }}">
                                    @error('penyebaran_pemasangan_leaflet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                3. STICKER
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_sticker_p') is-invalid @enderror" name="penyebaran_pemasangan_sticker_p" autocomplete="off" value="{{ $data->dailyInputPrev->penyebaran_pemasangan_sticker_p }}">
                                    @error('penyebaran_pemasangan_sticker_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_sticker') is-invalid @enderror" name="penyebaran_pemasangan_sticker" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_sticker }}">
                                    @error('penyebaran_pemasangan_sticker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                4. BILBOARD
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_bilboard_p') is-invalid @enderror" name="penyebaran_pemasangan_bilboard_p" autocomplete="off" value="{{ $data->dailyInputPrev->penyebaran_pemasangan_bilboard_p }}">
                                    @error('penyebaran_pemasangan_bilboard_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_bilboard') is-invalid @enderror" name="penyebaran_pemasangan_bilboard" autocomplete="off" value="{{ $data->dailyInput->penyebaran_pemasangan_bilboard }}">
                                    @error('penyebaran_pemasangan_bilboard')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="background: #11425C; padding: 10px 0;">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                C. PROGRAM NASIONAL KEAMANAN LALU LINTAS
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. POLISI SAHABAT ANAK
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('polisi_sahabat_anak_p') is-invalid @enderror" name="polisi_sahabat_anak_p" autocomplete="off" value="{{ $data->dailyInputPrev->polisi_sahabat_anak_p }}">
                                    @error('polisi_sahabat_anak_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('polisi_sahabat_anak') is-invalid @enderror" name="polisi_sahabat_anak" autocomplete="off" value="{{ $data->dailyInput->polisi_sahabat_anak }}">
                                    @error('polisi_sahabat_anak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                2. CARA AMAN SEKOLAH
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('cara_aman_sekolah_p') is-invalid @enderror" name="cara_aman_sekolah_p" autocomplete="off" value="{{ $data->dailyInputPrev->cara_aman_sekolah_p }}">
                                    @error('cara_aman_sekolah_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('cara_aman_sekolah') is-invalid @enderror" name="cara_aman_sekolah" autocomplete="off" value="{{ $data->dailyInput->cara_aman_sekolah }}">
                                    @error('cara_aman_sekolah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                3. PATROLI KEAMANAN SEKOLAH
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('patroli_keamanan_sekolah_p') is-invalid @enderror" name="patroli_keamanan_sekolah_p" autocomplete="off" value="{{ $data->dailyInputPrev->patroli_keamanan_sekolah_p }}">
                                    @error('patroli_keamanan_sekolah_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('patroli_keamanan_sekolah') is-invalid @enderror" name="patroli_keamanan_sekolah" autocomplete="off" value="{{ $data->dailyInput->patroli_keamanan_sekolah }}">
                                    @error('patroli_keamanan_sekolah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                4. PRAMUKA SAKA BHAYANGKARA KRIDA LALU LINTAS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pramuka_bhayangkara_krida_lalu_lintas_p') is-invalid @enderror" name="pramuka_bhayangkara_krida_lalu_lintas_p" autocomplete="off" value="{{ $data->dailyInputPrev->pramuka_bhayangkara_krida_lalu_lintas_p }}">
                                    @error('pramuka_bhayangkara_krida_lalu_lintas_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pramuka_bhayangkara_krida_lalu_lintas') is-invalid @enderror" name="pramuka_bhayangkara_krida_lalu_lintas" autocomplete="off" value="{{ $data->dailyInput->pramuka_bhayangkara_krida_lalu_lintas }}">
                                    @error('pramuka_bhayangkara_krida_lalu_lintas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="background: #11425C; padding: 10px 0;">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                D. PROGRAM NASIONAL KESELAMATAN LALU LINTAS
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. POLICE GOES TO CAMPUS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('police_goes_to_campus_p') is-invalid @enderror" name="police_goes_to_campus_p" autocomplete="off" value="{{ $data->dailyInputPrev->police_goes_to_campus_p }}">
                                    @error('police_goes_to_campus_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('police_goes_to_campus') is-invalid @enderror" name="police_goes_to_campus" autocomplete="off" value="{{ $data->dailyInput->police_goes_to_campus }}">
                                    @error('police_goes_to_campus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                2. SAFETY RIDING & DRIVING
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('safety_riding_driving_p') is-invalid @enderror" name="safety_riding_driving_p" autocomplete="off" value="{{ $data->dailyInputPrev->safety_riding_driving_p }}">
                                    @error('safety_riding_driving_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('safety_riding_driving') is-invalid @enderror" name="safety_riding_driving" autocomplete="off" value="{{ $data->dailyInput->safety_riding_driving }}">
                                    @error('safety_riding_driving')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                3. FORUM LALU LINTAS & ANGKUTAN JALAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('forum_lalu_lintas_angkutan_umum_p') is-invalid @enderror" name="forum_lalu_lintas_angkutan_umum_p" autocomplete="off" value="{{ $data->dailyInputPrev->forum_lalu_lintas_angkutan_umum_p }}">
                                    @error('forum_lalu_lintas_angkutan_umum_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('forum_lalu_lintas_angkutan_umum') is-invalid @enderror" name="forum_lalu_lintas_angkutan_umum" autocomplete="off" value="{{ $data->dailyInput->forum_lalu_lintas_angkutan_umum }}">
                                    @error('forum_lalu_lintas_angkutan_umum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                4. KAMPANYE KESELAMATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kampanye_keselamatan_p') is-invalid @enderror" name="kampanye_keselamatan_p" autocomplete="off" value="{{ $data->dailyInputPrev->kampanye_keselamatan_p }}">
                                    @error('kampanye_keselamatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kampanye_keselamatan') is-invalid @enderror" name="kampanye_keselamatan" autocomplete="off" value="{{ $data->dailyInput->kampanye_keselamatan }}">
                                    @error('kampanye_keselamatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                5. SEKOLAH MENGEMUDI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sekolah_mengemudi_p') is-invalid @enderror" name="sekolah_mengemudi_p" autocomplete="off" value="{{ $data->dailyInputPrev->sekolah_mengemudi_p }}">
                                    @error('sekolah_mengemudi_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sekolah_mengemudi') is-invalid @enderror" name="sekolah_mengemudi" autocomplete="off" value="{{ $data->dailyInput->sekolah_mengemudi }}">
                                    @error('sekolah_mengemudi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                6. TAMAN LALU LINTAS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('taman_lalu_lintas_p') is-invalid @enderror" name="taman_lalu_lintas_p" autocomplete="off" value="{{ $data->dailyInputPrev->taman_lalu_lintas_p }}">
                                    @error('taman_lalu_lintas_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('taman_lalu_lintas') is-invalid @enderror" name="taman_lalu_lintas" autocomplete="off" value="{{ $data->dailyInput->taman_lalu_lintas }}">
                                    @error('taman_lalu_lintas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                7. GLOBAL ROAD SAFETY PARTNERSHIP ACTION
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('global_road_safety_partnership_action_p') is-invalid @enderror" name="global_road_safety_partnership_action_p" autocomplete="off" value="{{ $data->dailyInputPrev->global_road_safety_partnership_action_p }}">
                                    @error('global_road_safety_partnership_action_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('global_road_safety_partnership_action') is-invalid @enderror" name="global_road_safety_partnership_action" autocomplete="off" value="{{ $data->dailyInput->global_road_safety_partnership_action }}">
                                    @error('global_road_safety_partnership_action')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>