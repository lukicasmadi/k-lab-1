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
                                13
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                SIM KORBAN KECELAKAAN LALU LINTAS
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_a_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_a_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_a_p }}">
                                    @error('sim_korban_kecelakaan_sim_a_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_a') is-invalid @enderror" name="sim_korban_kecelakaan_sim_a" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_a }}">
                                    @error('sim_korban_kecelakaan_sim_a')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_a_umum_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_a_umum_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_a_umum_p }}">
                                    @error('sim_korban_kecelakaan_sim_a_umum_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_a_umum') is-invalid @enderror" name="sim_korban_kecelakaan_sim_a_umum" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_a_umum }}">
                                    @error('sim_korban_kecelakaan_sim_a_umum')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b1_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b1_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_b1_p }}">
                                    @error('sim_korban_kecelakaan_sim_b1_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b1') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b1" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b1 }}">
                                    @error('sim_korban_kecelakaan_sim_b1')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b1_umum_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b1_umum_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_b1_umum_p }}">
                                    @error('sim_korban_kecelakaan_sim_b1_umum_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b1_umum') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b1_umum" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b1_umum }}">
                                    @error('sim_korban_kecelakaan_sim_b1_umum')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b2_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b2_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_b2_p }}">
                                    @error('sim_korban_kecelakaan_sim_b2_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b2') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b2" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b2 }}">
                                    @error('sim_korban_kecelakaan_sim_b2')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b2_umum_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b2_umum_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_b2_umum_p }}">
                                    @error('sim_korban_kecelakaan_sim_b2_umum_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_b2_umum') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b2_umum" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b2_umum }}">
                                    @error('sim_korban_kecelakaan_sim_b2_umum')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_c_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_c_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_c_p }}">
                                    @error('sim_korban_kecelakaan_sim_c_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_c') is-invalid @enderror" name="sim_korban_kecelakaan_sim_c" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_c }}">
                                    @error('sim_korban_kecelakaan_sim_c')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_d_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_d_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_d_p }}">
                                    @error('sim_korban_kecelakaan_sim_d_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_d') is-invalid @enderror" name="sim_korban_kecelakaan_sim_d" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_d }}">
                                    @error('sim_korban_kecelakaan_sim_d')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_internasional_p') is-invalid @enderror" name="sim_korban_kecelakaan_sim_internasional_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_sim_internasional_p }}">
                                    @error('sim_korban_kecelakaan_sim_internasional_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_sim_internasional') is-invalid @enderror" name="sim_korban_kecelakaan_sim_internasional" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_internasional }}">
                                    @error('sim_korban_kecelakaan_sim_internasional')
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
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_tanpa_sim_p') is-invalid @enderror" name="sim_korban_kecelakaan_tanpa_sim_p" autocomplete="off" value="{{ $data->dailyInputPrev->sim_korban_kecelakaan_tanpa_sim_p }}">
                                    @error('sim_korban_kecelakaan_tanpa_sim_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('sim_korban_kecelakaan_tanpa_sim') is-invalid @enderror" name="sim_korban_kecelakaan_tanpa_sim" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_tanpa_sim }}">
                                    @error('sim_korban_kecelakaan_tanpa_sim')
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