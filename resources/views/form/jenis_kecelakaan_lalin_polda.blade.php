<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
    <div id="toggleAccordion">
            <div class="card">
                <div class="card-header" id="heading04">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion04" aria-expanded="false" aria-controls="defaultAccordion04">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                15
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                JENIS KECELAKAAN LALU LINTAS
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
                <div id="defaultAccordion04" class="collapse show" aria-labelledby="heading04" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                A. TUNGGAL / OUT OF CONTROL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_tunggal_ooc_prev') is-invalid @enderror" name="jenis_kecelakaan_tunggal_ooc_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_tunggal_ooc_prev') }}">
                                    @error('jenis_kecelakaan_tunggal_ooc_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_tunggal_ooc') is-invalid @enderror" name="jenis_kecelakaan_tunggal_ooc" autocomplete="off" value="{{ old('jenis_kecelakaan_tunggal_ooc') }}">
                                    @error('jenis_kecelakaan_tunggal_ooc')
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
                                B. DEPAN-DEPAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_depan_depan_prev') is-invalid @enderror" name="jenis_kecelakaan_depan_depan_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_depan_prev') }}">
                                    @error('jenis_kecelakaan_depan_depan_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_depan_depan') is-invalid @enderror" name="jenis_kecelakaan_depan_depan" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_depan') }}">
                                    @error('jenis_kecelakaan_depan_depan')
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
                                C. DEPAN-BELAKANG
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_depan_belakang_prev') is-invalid @enderror" name="jenis_kecelakaan_depan_belakang_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_belakang_prev') }}">
                                    @error('jenis_kecelakaan_depan_belakang_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_depan_belakang') is-invalid @enderror" name="jenis_kecelakaan_depan_belakang" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_belakang') }}">
                                    @error('jenis_kecelakaan_depan_belakang')
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
                                D. DEPAN-SAMPING
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_depan_samping_prev') is-invalid @enderror" name="jenis_kecelakaan_depan_samping_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_samping_prev') }}">
                                    @error('jenis_kecelakaan_depan_samping_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_depan_samping') is-invalid @enderror" name="jenis_kecelakaan_depan_samping" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_samping') }}">
                                    @error('jenis_kecelakaan_depan_samping')
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
                                E. BERUNTUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_beruntun_prev') is-invalid @enderror" name="jenis_kecelakaan_beruntun_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_beruntun_prev') }}">
                                    @error('jenis_kecelakaan_beruntun_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_beruntun') is-invalid @enderror" name="jenis_kecelakaan_beruntun" autocomplete="off" value="{{ old('jenis_kecelakaan_beruntun') }}">
                                    @error('jenis_kecelakaan_beruntun')
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
                                F. TABRAK PEJALAN KAKI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_pejalan_kaki_prev') is-invalid @enderror" name="jenis_kecelakaan_pejalan_kaki_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_pejalan_kaki_prev') }}">
                                    @error('jenis_kecelakaan_pejalan_kaki_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_pejalan_kaki') is-invalid @enderror" name="jenis_kecelakaan_pejalan_kaki" autocomplete="off" value="{{ old('jenis_kecelakaan_pejalan_kaki') }}">
                                    @error('jenis_kecelakaan_pejalan_kaki')
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
                                G. TABRAK LARI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_tabrak_lari_prev') is-invalid @enderror" name="jenis_kecelakaan_tabrak_lari_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_tabrak_lari_prev') }}">
                                    @error('jenis_kecelakaan_tabrak_lari_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_tabrak_lari') is-invalid @enderror" name="jenis_kecelakaan_tabrak_lari" autocomplete="off" value="{{ old('jenis_kecelakaan_tabrak_lari') }}">
                                    @error('jenis_kecelakaan_tabrak_lari')
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
                                H. TABRAK HEWAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_tabrak_hewan_prev') is-invalid @enderror" name="jenis_kecelakaan_tabrak_hewan_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_tabrak_hewan_prev') }}">
                                    @error('jenis_kecelakaan_tabrak_hewan_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_tabrak_hewan') is-invalid @enderror" name="jenis_kecelakaan_tabrak_hewan" autocomplete="off" value="{{ old('jenis_kecelakaan_tabrak_hewan') }}">
                                    @error('jenis_kecelakaan_tabrak_hewan')
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
                                I. SAMPING-SAMPING
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_samping_samping_prev') is-invalid @enderror" name="jenis_kecelakaan_samping_samping_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_samping_samping_prev') }}">
                                    @error('jenis_kecelakaan_samping_samping_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_samping_samping') is-invalid @enderror" name="jenis_kecelakaan_samping_samping" autocomplete="off" value="{{ old('jenis_kecelakaan_samping_samping') }}">
                                    @error('jenis_kecelakaan_samping_samping')
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
                                J. LAINNYA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_lainnya_prev') is-invalid @enderror" name="jenis_kecelakaan_lainnya_prev" autocomplete="off" value="{{ old('jenis_kecelakaan_lainnya_prev') }}">
                                    @error('jenis_kecelakaan_lainnya_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('jenis_kecelakaan_lainnya') is-invalid @enderror" name="jenis_kecelakaan_lainnya" autocomplete="off" value="{{ old('jenis_kecelakaan_lainnya') }}">
                                    @error('jenis_kecelakaan_lainnya')
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