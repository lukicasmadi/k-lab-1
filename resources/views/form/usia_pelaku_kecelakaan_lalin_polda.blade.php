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
                                17
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                USIA PELAKU KECELAKAAN LALU LINTAS
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
                                A. < 15 TAHUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_kurang_dari_15_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_kurang_dari_15_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_kurang_dari_15_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_kurang_dari_15_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_kurang_dari_15_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_kurang_dari_15_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_kurang_dari_15_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_kurang_dari_15_tahun')
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
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_16_20_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_16_20_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_16_20_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_16_20_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_16_20_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_16_20_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_16_20_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_16_20_tahun')
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
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_21_25_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_21_25_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_21_25_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_21_25_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_21_25_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_21_25_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_21_25_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_21_25_tahun')
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
                                   <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_26_30_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_26_30_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_26_30_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_26_30_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_26_30_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_26_30_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_26_30_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_26_30_tahun')
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
                                   <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_31_35_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_31_35_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_31_35_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_31_35_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_31_35_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_31_35_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_31_35_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_31_35_tahun')
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
                                   <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_36_40_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_36_40_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_36_40_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_36_40_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_36_40_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_36_40_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_36_40_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_36_40_tahun')
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
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_41_45_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_41_45_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_41_45_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_41_45_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_41_45_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_41_45_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_41_45_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_41_45_tahun')
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
                                   <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_46_50_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_46_50_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_46_50_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_45_50_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_46_50_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_46_50_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_46_50_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_46_50_tahun')
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
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_51_55_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_51_55_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_51_55_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_51_55_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_51_55_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_51_55_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_51_55_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_51_55_tahun')
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
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_56_60_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_56_60_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_56_60_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_56_60_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_56_60_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_56_60_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_56_60_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_56_60_tahun')
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
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_diatas_60_tahun_p') is-invalid @enderror" name="usia_pelaku_kecelakaan_diatas_60_tahun_p" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_diatas_60_tahun_p') }}">
                                    @error('usia_pelaku_kecelakaan_diatas_60_tahun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('usia_pelaku_kecelakaan_diatas_60_tahun') is-invalid @enderror" name="usia_pelaku_kecelakaan_diatas_60_tahun" autocomplete="off" value="{{ old('usia_pelaku_kecelakaan_diatas_60_tahun') }}">
                                    @error('usia_pelaku_kecelakaan_diatas_60_tahun')
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