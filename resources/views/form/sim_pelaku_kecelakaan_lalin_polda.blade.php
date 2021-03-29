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
                                18
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                SIM PELAKU KECELAKAAN LALU LINTAS
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
                                A. A
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_a_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_a_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_a_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_a_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_a') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_a" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_a') }}">
                                    @error('sim_pelaku_kecelakaan_sim_a')
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
                                B. A UMUM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_a_umum_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_a_umum_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_a_umum_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_a_umum_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_a_umum') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_a_umum" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_a_umum') }}">
                                    @error('sim_pelaku_kecelakaan_sim_a_umum')
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
                                C. B1
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b1_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b1_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b1_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b1_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b1') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b1" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b1') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b1')
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
                                D. B1 UMUM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b1_umum_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b1_umum_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b1_umum_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b1_umum_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b1_umum') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b1_umum" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b1_umum') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b1_umum')
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
                                E. BII
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b2_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b2_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b2_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b2_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b2') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b2" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b2') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b2')
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
                                F. B II UMUM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b2_umum_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b2_umum_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b2_umum_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b2_umum_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_b2_umum') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_b2_umum" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_b2_umum') }}">
                                    @error('sim_pelaku_kecelakaan_sim_b2_umum')
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
                                G. C
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_c_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_c_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_c_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_c_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_c') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_c" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_c') }}">
                                    @error('sim_pelaku_kecelakaan_sim_c')
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
                                H. D
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_d_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_d_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_d_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_d_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_d') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_d" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_d') }}">
                                    @error('sim_pelaku_kecelakaan_sim_d')
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
                                I. SIM INTERNASIONAL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_internasional_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_internasional_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_internasional_prev') }}">
                                    @error('sim_pelaku_kecelakaan_sim_internasional_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_sim_internasional') is-invalid @enderror" name="sim_pelaku_kecelakaan_sim_internasional" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_sim_internasional') }}">
                                    @error('sim_pelaku_kecelakaan_sim_internasional')
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
                                J. TANPA SIM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_tanpa_sim_prev') is-invalid @enderror" name="sim_pelaku_kecelakaan_tanpa_sim_prev" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_tanpa_sim_prev') }}">
                                    @error('sim_pelaku_kecelakaan_tanpa_sim_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_pelaku_kecelakaan_tanpa_sim') is-invalid @enderror" name="sim_pelaku_kecelakaan_tanpa_sim" autocomplete="off" value="{{ old('sim_pelaku_kecelakaan_tanpa_sim') }}">
                                    @error('sim_pelaku_kecelakaan_tanpa_sim')
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