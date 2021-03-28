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
                                2019
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12 text-center">
                                2020
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
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_cetak_prev') is-invalid @enderror" name="penlu_melalui_media_cetak_prev" autocomplete="off" value="{{ old('penlu_melalui_media_cetak_prev') }}">
                                    @error('penlu_melalui_media_cetak_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_cetak') is-invalid @enderror" name="penlu_melalui_media_cetak" autocomplete="off" value="{{ old('penlu_melalui_media_cetak') }}">
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
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_elektronik_prev') is-invalid @enderror" name="penlu_melalui_media_elektronik_prev" autocomplete="off" value="{{ old('penlu_melalui_media_elektronik_prev') }}">
                                    @error('penlu_melalui_media_elektronik_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_media_elektronik') is-invalid @enderror" name="penlu_melalui_media_elektronik" autocomplete="off" value="{{ old('penlu_melalui_media_elektronik') }}">
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
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_keramaian_prev') is-invalid @enderror" name="penlu_melalui_tempat_keramaian_prev" autocomplete="off" value="{{ old('penlu_melalui_tempat_keramaian_prev') }}">
                                    @error('penlu_melalui_tempat_keramaian_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_keramaian') is-invalid @enderror" name="penlu_melalui_tempat_keramaian" autocomplete="off" value="{{ old('penlu_melalui_tempat_keramaian') }}">
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
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_istirahat_prev') is-invalid @enderror" name="penlu_melalui_tempat_istirahat_prev" autocomplete="off" value="{{ old('penlu_melalui_tempat_istirahat_prev') }}">
                                    @error('penlu_melalui_tempat_istirahat_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_tempat_istirahat') is-invalid @enderror" name="penlu_melalui_tempat_istirahat" autocomplete="off" value="{{ old('penlu_melalui_tempat_istirahat') }}">
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
                                    <input type="number" class="form-onsite @error('penlu_melalui_daerah_rawan_laka_dan_langgar_prev') is-invalid @enderror" name="penlu_melalui_daerah_rawan_laka_dan_langgar_prev" autocomplete="off" value="{{ old('penlu_melalui_daerah_rawan_laka_dan_langgar_prev') }}">
                                    @error('penlu_melalui_daerah_rawan_laka_dan_langgar_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penlu_melalui_daerah_rawan_laka_dan_langgar') is-invalid @enderror" name="penlu_melalui_daerah_rawan_laka_dan_langgar" autocomplete="off" value="{{ old('penlu_melalui_daerah_rawan_laka_dan_langgar') }}">
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
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_spanduk_prev') is-invalid @enderror" name="penyebaran_pemasangan_spanduk_prev" autocomplete="off" value="{{ old('penyebaran_pemasangan_spanduk_prev') }}">
                                    @error('penyebaran_pemasangan_spanduk_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_spanduk') is-invalid @enderror" name="penyebaran_pemasangan_spanduk" autocomplete="off" value="{{ old('penyebaran_pemasangan_spanduk') }}">
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
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_leaflet_prev') is-invalid @enderror" name="penyebaran_pemasangan_leaflet_prev" autocomplete="off" value="{{ old('penyebaran_pemasangan_leaflet_prev') }}">
                                    @error('penyebaran_pemasangan_leaflet_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_leaflet') is-invalid @enderror" name="penyebaran_pemasangan_leaflet" autocomplete="off" value="{{ old('penyebaran_pemasangan_leaflet') }}">
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
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_sticker_prev') is-invalid @enderror" name="penyebaran_pemasangan_sticker_prev" autocomplete="off" value="{{ old('penyebaran_pemasangan_sticker_prev') }}">
                                    @error('penyebaran_pemasangan_sticker_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_sticker') is-invalid @enderror" name="penyebaran_pemasangan_sticker" autocomplete="off" value="{{ old('penyebaran_pemasangan_sticker') }}">
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
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_bilboard_prev') is-invalid @enderror" name="penyebaran_pemasangan_bilboard_prev" autocomplete="off" value="{{ old('penyebaran_pemasangan_bilboard_prev') }}">
                                    @error('penyebaran_pemasangan_bilboard_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('penyebaran_pemasangan_bilboard') is-invalid @enderror" name="penyebaran_pemasangan_bilboard" autocomplete="off" value="{{ old('penyebaran_pemasangan_bilboard') }}">
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
                                    <input type="number" class="form-onsite @error('polisi_sahabat_anak_prev') is-invalid @enderror" name="polisi_sahabat_anak_prev" autocomplete="off" value="{{ old('polisi_sahabat_anak_prev') }}">
                                    @error('polisi_sahabat_anak_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('polisi_sahabat_anak') is-invalid @enderror" name="polisi_sahabat_anak" autocomplete="off" value="{{ old('polisi_sahabat_anak') }}">
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
                                    <input type="number" class="form-onsite @error('cara_aman_sekolah_prev') is-invalid @enderror" name="cara_aman_sekolah_prev" autocomplete="off" value="{{ old('cara_aman_sekolah_prev') }}">
                                    @error('cara_aman_sekolah_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('cara_aman_sekolah') is-invalid @enderror" name="cara_aman_sekolah" autocomplete="off" value="{{ old('cara_aman_sekolah') }}">
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
                                    <input type="number" class="form-onsite @error('patroli_keamanan_sekolah_prev') is-invalid @enderror" name="patroli_keamanan_sekolah_prev" autocomplete="off" value="{{ old('patroli_keamanan_sekolah_prev') }}">
                                    @error('patroli_keamanan_sekolah_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('patroli_keamanan_sekolah') is-invalid @enderror" name="patroli_keamanan_sekolah" autocomplete="off" value="{{ old('patroli_keamanan_sekolah') }}">
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
                                    <input type="number" class="form-onsite @error('pramuka_bhayangkara_krida_lalu_lintas_prev') is-invalid @enderror" name="pramuka_bhayangkara_krida_lalu_lintas_prev" autocomplete="off" value="{{ old('pramuka_bhayangkara_krida_lalu_lintas_prev') }}">
                                    @error('pramuka_bhayangkara_krida_lalu_lintas_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pramuka_bhayangkara_krida_lalu_lintas') is-invalid @enderror" name="pramuka_bhayangkara_krida_lalu_lintas" autocomplete="off" value="{{ old('pramuka_bhayangkara_krida_lalu_lintas') }}">
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
                                    <input type="number" class="form-onsite @error('police_goes_to_campus_prev') is-invalid @enderror" name="police_goes_to_campus_prev" autocomplete="off" value="{{ old('police_goes_to_campus_prev') }}">
                                    @error('police_goes_to_campus_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('police_goes_to_campus') is-invalid @enderror" name="police_goes_to_campus" autocomplete="off" value="{{ old('police_goes_to_campus') }}">
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
                                    <input type="number" class="form-onsite @error('safety_riding_driving_prev') is-invalid @enderror" name="safety_riding_driving_prev" autocomplete="off" value="{{ old('safety_riding_driving_prev') }}">
                                    @error('safety_riding_driving_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('safety_riding_driving') is-invalid @enderror" name="safety_riding_driving" autocomplete="off" value="{{ old('safety_riding_driving') }}">
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
                                    <input type="number" class="form-onsite @error('forum_lalu_lintas_angkutan_umum_prev') is-invalid @enderror" name="forum_lalu_lintas_angkutan_umum_prev" autocomplete="off" value="{{ old('forum_lalu_lintas_angkutan_umum_prev') }}">
                                    @error('forum_lalu_lintas_angkutan_umum_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('forum_lalu_lintas_angkutan_umum') is-invalid @enderror" name="forum_lalu_lintas_angkutan_umum" autocomplete="off" value="{{ old('forum_lalu_lintas_angkutan_umum') }}">
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
                                    <input type="number" class="form-onsite @error('kampanye_keselamatan_prev') is-invalid @enderror" name="kampanye_keselamatan_prev" autocomplete="off" value="{{ old('kampanye_keselamatan_prev') }}">
                                    @error('kampanye_keselamatan_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kampanye_keselamatan') is-invalid @enderror" name="kampanye_keselamatan" autocomplete="off" value="{{ old('kampanye_keselamatan') }}">
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
                                    <input type="number" class="form-onsite @error('sekolah_mengemudi_prev') is-invalid @enderror" name="sekolah_mengemudi_prev" autocomplete="off" value="{{ old('sekolah_mengemudi_prev') }}">
                                    @error('sekolah_mengemudi_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sekolah_mengemudi') is-invalid @enderror" name="sekolah_mengemudi" autocomplete="off" value="{{ old('sekolah_mengemudi') }}">
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
                                    <input type="number" class="form-onsite @error('taman_lalu_lintas_prev') is-invalid @enderror" name="taman_lalu_lintas_prev" autocomplete="off" value="{{ old('taman_lalu_lintas_prev') }}">
                                    @error('taman_lalu_lintas_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('taman_lalu_lintas') is-invalid @enderror" name="taman_lalu_lintas" autocomplete="off" value="{{ old('taman_lalu_lintas') }}">
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
                                    <input type="number" class="form-onsite @error('global_road_safety_partnership_action_prev') is-invalid @enderror" name="global_road_safety_partnership_action_prev" autocomplete="off" value="{{ old('global_road_safety_partnership_action_prev') }}">
                                    @error('global_road_safety_partnership_action_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('global_road_safety_partnership_action') is-invalid @enderror" name="global_road_safety_partnership_action" autocomplete="off" value="{{ old('global_road_safety_partnership_action') }}">
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