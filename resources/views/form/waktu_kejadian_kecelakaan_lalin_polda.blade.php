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
                                21
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                WAKTU KEJADIAN KECELAKAAN LALU LINTAS
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
                                A. 00.00 - 03.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_00_03_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_00_03_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_00_03_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_00_03_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_00_03') is-invalid @enderror" name="waktu_kejadian_kecelakaan_00_03" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_00_03') }}">
                                    @error('waktu_kejadian_kecelakaan_00_03')
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
                                B. 03.00 - 06.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_03_06_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_03_06_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_03_06_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_03_06_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_03_06') is-invalid @enderror" name="waktu_kejadian_kecelakaan_03_06" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_03_06') }}">
                                    @error('waktu_kejadian_kecelakaan_03_06')
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
                                C. 06.00- 09.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_06_09_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_06_09_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_06_09_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_06_09_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_06_09') is-invalid @enderror" name="waktu_kejadian_kecelakaan_06_09" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_06_09') }}">
                                    @error('waktu_kejadian_kecelakaan_06_09')
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
                                D. 09.00 - 12.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_09_12_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_09_12_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_09_12_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_09_12_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_09_12') is-invalid @enderror" name="waktu_kejadian_kecelakaan_09_12" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_09_12') }}">
                                    @error('waktu_kejadian_kecelakaan_09_12')
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
                                E. 12.00 - 15.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_12_15_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_12_15_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_12_15_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_12_15_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_12_15') is-invalid @enderror" name="waktu_kejadian_kecelakaan_12_15" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_12_15') }}">
                                    @error('waktu_kejadian_kecelakaan_12_15')
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
                                F. 15.00 - 18.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_15_18_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_15_18_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_15_18_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_15_18_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_15_18') is-invalid @enderror" name="waktu_kejadian_kecelakaan_15_18" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_15_18') }}">
                                    @error('waktu_kejadian_kecelakaan_15_18')
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
                                G. 18.00 - 21.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_18_21_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_18_21_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_18_21_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_18_21_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_18_21') is-invalid @enderror" name="waktu_kejadian_kecelakaan_18_21" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_18_21') }}">
                                    @error('waktu_kejadian_kecelakaan_18_21')
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
                                H. 21.00 - 24.00
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_21_24_prev') is-invalid @enderror" name="waktu_kejadian_kecelakaan_21_24_prev" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_21_24_prev') }}">
                                    @error('waktu_kejadian_kecelakaan_21_24_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('waktu_kejadian_kecelakaan_21_24') is-invalid @enderror" name="waktu_kejadian_kecelakaan_21_24" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_21_24') }}">
                                    @error('waktu_kejadian_kecelakaan_21_24')
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