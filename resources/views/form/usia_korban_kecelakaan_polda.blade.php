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
                                12
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                USIA KORBAN KECELAKAAN LALU LINTAS
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
                <div id="defaultAccordion04" class="collapse show" aria-labelledby="heading04" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                A. > 15 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_kurang_15_prev') is-invalid @enderror" name="usia_korban_kecelakaan_kurang_15_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_kurang_15_prev') }}">
                                    @error('usia_korban_kecelakaan_kurang_15_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_kurang_15') is-invalid @enderror" name="usia_korban_kecelakaan_kurang_15" autocomplete="off" value="{{ old('usia_korban_kecelakaan_kurang_15') }}">
                                    @error('usia_korban_kecelakaan_kurang_15')
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
                                B. 16 - 20 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_16_20_prev') is-invalid @enderror" name="usia_korban_kecelakaan_16_20_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_16_20_prev') }}">
                                    @error('usia_korban_kecelakaan_16_20_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_16_20') is-invalid @enderror" name="usia_korban_kecelakaan_16_20" autocomplete="off" value="{{ old('usia_korban_kecelakaan_16_20') }}">
                                    @error('usia_korban_kecelakaan_16_20')
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
                                C. 21 - 25 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_21_25_prev') is-invalid @enderror" name="usia_korban_kecelakaan_21_25_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_21_25_prev') }}">
                                    @error('usia_korban_kecelakaan_21_25_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_21_25') is-invalid @enderror" name="usia_korban_kecelakaan_21_25" autocomplete="off" value="{{ old('usia_korban_kecelakaan_21_25') }}">
                                    @error('usia_korban_kecelakaan_21_25')
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
                                D. 26 - 30 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_26_30_prev') is-invalid @enderror" name="usia_korban_kecelakaan_26_30_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_26_30_prev') }}">
                                    @error('usia_korban_kecelakaan_26_30_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_26_30') is-invalid @enderror" name="usia_korban_kecelakaan_26_30" autocomplete="off" value="{{ old('usia_korban_kecelakaan_26_30') }}">
                                    @error('usia_korban_kecelakaan_26_30')
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
                                E. 31 - 35 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_31_35_prev') is-invalid @enderror" name="usia_korban_kecelakaan_31_35_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_31_35_prev') }}">
                                    @error('usia_korban_kecelakaan_31_35_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_31_35') is-invalid @enderror" name="usia_korban_kecelakaan_31_35" autocomplete="off" value="{{ old('usia_korban_kecelakaan_31_35') }}">
                                    @error('usia_korban_kecelakaan_31_35')
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
                                F. 36 - 40 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_36_40_prev') is-invalid @enderror" name="usia_korban_kecelakaan_36_40_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_36_40_prev') }}">
                                    @error('usia_korban_kecelakaan_36_40_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_36_40') is-invalid @enderror" name="usia_korban_kecelakaan_36_40" autocomplete="off" value="{{ old('usia_korban_kecelakaan_36_40') }}">
                                    @error('usia_korban_kecelakaan_36_40')
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
                                G. 41 - 45 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_41_45_prev') is-invalid @enderror" name="usia_korban_kecelakaan_41_45_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_41_45_prev') }}">
                                    @error('usia_korban_kecelakaan_41_45_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_41_45') is-invalid @enderror" name="usia_korban_kecelakaan_41_45" autocomplete="off" value="{{ old('usia_korban_kecelakaan_41_45') }}">
                                    @error('usia_korban_kecelakaan_41_45')
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
                                H. 46 - 50 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_45_50_prev') is-invalid @enderror" name="usia_korban_kecelakaan_45_50_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_45_50_prev') }}">
                                    @error('usia_korban_kecelakaan_45_50_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_45_50') is-invalid @enderror" name="usia_korban_kecelakaan_45_50" autocomplete="off" value="{{ old('usia_korban_kecelakaan_45_50') }}">
                                    @error('usia_korban_kecelakaan_45_50')
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
                                I. 51 - 55 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_51_55_prev') is-invalid @enderror" name="usia_korban_kecelakaan_51_55_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_51_55_prev') }}">
                                    @error('usia_korban_kecelakaan_51_55_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_51_55') is-invalid @enderror" name="usia_korban_kecelakaan_51_55" autocomplete="off" value="{{ old('usia_korban_kecelakaan_51_55') }}">
                                    @error('usia_korban_kecelakaan_51_55')
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
                                J. 56 - 60 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_56_60_prev') is-invalid @enderror" name="usia_korban_kecelakaan_56_60_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_56_60_prev') }}">
                                    @error('usia_korban_kecelakaan_56_60_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_56_60') is-invalid @enderror" name="usia_korban_kecelakaan_56_60" autocomplete="off" value="{{ old('usia_korban_kecelakaan_56_60') }}">
                                    @error('usia_korban_kecelakaan_56_60')
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
                                K. > 60 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_diatas_60_prev') is-invalid @enderror" name="usia_korban_kecelakaan_diatas_60_prev" autocomplete="off" value="{{ old('usia_korban_kecelakaan_diatas_60_prev') }}">
                                    @error('usia_korban_kecelakaan_diatas_60_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_korban_kecelakaan_diatas_60') is-invalid @enderror" name="usia_korban_kecelakaan_diatas_60" autocomplete="off" value="{{ old('usia_korban_kecelakaan_diatas_60') }}">
                                    @error('usia_korban_kecelakaan_diatas_60')
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