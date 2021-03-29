<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div id="toggleAccordion">
            <div class="card">
                <div class="card-header" id="heading03">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion03" aria-expanded="false" aria-controls="defaultAccordion03">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                08
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                LOKASI PELANGGARAN LALU LINTAS
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
                                A. BERDASARKAN KAWASAN
                                </div>
                            </div>                                            
                        </div>                        
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. KAWASAN PEMUKIMAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_pemukiman_prev') is-invalid @enderror" name="lokasi_pelanggaran_pemukiman_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_pemukiman_prev') }}">
                                    @error('lokasi_pelanggaran_pemukiman_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_pemukiman') is-invalid @enderror" name="lokasi_pelanggaran_pemukiman" autocomplete="off" value="{{ old('lokasi_pelanggaran_pemukiman') }}">
                                    @error('lokasi_pelanggaran_pemukiman')
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
                                2. KAWASAN PERBELANJAAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_perbelanjaan_prev') is-invalid @enderror" name="lokasi_pelanggaran_perbelanjaan_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_perbelanjaan_prev') }}">
                                    @error('lokasi_pelanggaran_perbelanjaan_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_perbelanjaan') is-invalid @enderror" name="lokasi_pelanggaran_perbelanjaan" autocomplete="off" value="{{ old('lokasi_pelanggaran_perbelanjaan') }}">
                                    @error('lokasi_pelanggaran_perbelanjaan')
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
                                3. PERKANTORAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_perkantoran_prev') is-invalid @enderror" name="lokasi_pelanggaran_perkantoran_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_perkantoran_prev') }}">
                                    @error('lokasi_pelanggaran_perkantoran_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_perkantoran') is-invalid @enderror" name="lokasi_pelanggaran_perkantoran" autocomplete="off" value="{{ old('lokasi_pelanggaran_perkantoran') }}">
                                    @error('lokasi_pelanggaran_perkantoran')
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
                                4. KAWASAN WISATA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_wisata_prev') is-invalid @enderror" name="lokasi_pelanggaran_wisata_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_wisata_prev') }}">
                                    @error('lokasi_pelanggaran_wisata_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_wisata') is-invalid @enderror" name="lokasi_pelanggaran_wisata" autocomplete="off" value="{{ old('lokasi_pelanggaran_wisata') }}">
                                    @error('lokasi_pelanggaran_wisata')
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
                                5. KAWASAN INDUSTRI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_industri_prev') is-invalid @enderror" name="lokasi_pelanggaran_industri_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_industri_prev') }}">
                                    @error('lokasi_pelanggaran_industri_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_industri') is-invalid @enderror" name="lokasi_pelanggaran_industri" autocomplete="off" value="{{ old('lokasi_pelanggaran_industri') }}">
                                    @error('lokasi_pelanggaran_industri')
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
                                B. STATUS JALAN
                                </div>
                            </div>                                            
                        </div>                        
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. NASIONAL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_nasional_prev') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_nasional_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_nasional_prev') }}">
                                    @error('lokasi_pelanggaran_status_jalan_nasional_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_nasional') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_nasional" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_nasional') }}">
                                    @error('lokasi_pelanggaran_status_jalan_nasional')
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
                                2. PROPINSI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_propinsi_prev') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_propinsi_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_propinsi_prev') }}">
                                    @error('lokasi_pelanggaran_status_jalan_propinsi_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_propinsi') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_propinsi" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_propinsi') }}">
                                    @error('lokasi_pelanggaran_status_jalan_propinsi')
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
                                3. KAB/KOTA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_kab_kota_prev') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_kab_kota_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_kab_kota_prev') }}">
                                    @error('lokasi_pelanggaran_status_jalan_kab_kota_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_kab_kota') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_kab_kota" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_kab_kota') }}">
                                    @error('lokasi_pelanggaran_status_jalan_kab_kota')
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
                                4. DESA / LINGKUNGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_desa_lingkungan_prev') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_desa_lingkungan_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_desa_lingkungan_prev') }}">
                                    @error('lokasi_pelanggaran_status_jalan_desa_lingkungan_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_status_jalan_desa_lingkungan') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_desa_lingkungan" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_desa_lingkungan') }}">
                                    @error('lokasi_pelanggaran_status_jalan_desa_lingkungan')
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
                                C. BERDASARKAN FUNGSI JALAN
                                </div>
                            </div>                                            
                        </div>                        
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. ARTERI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_arteri_prev') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_arteri_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_arteri_prev') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_arteri_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_arteri') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_arteri" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_arteri') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_arteri')
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
                                2. KOLEKTOR
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_kolektor_prev') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_kolektor_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_kolektor_prev') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_kolektor_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_kolektor') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_kolektor" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_kolektor') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_kolektor')
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
                                3. LOKAL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_lokal_prev') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_lokal_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_lokal_prev') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_lokal_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_lokal') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_lokal" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_lokal') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_lokal')
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
                                4. LINGKUNGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_lingkungan_prev') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_lingkungan_prev" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_lingkungan_prev') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_lingkungan_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('lokasi_pelanggaran_fungsi_jalan_lingkungan') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_lingkungan" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_lingkungan') }}">
                                    @error('lokasi_pelanggaran_fungsi_jalan_lingkungan')
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