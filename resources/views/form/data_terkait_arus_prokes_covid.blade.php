<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div id="toggleAccordion">
            <div class="card">
                <div id="defaultAccordion01" class="collapse show" aria-labelledby="heading01" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                VI DATA TERKAIT PROKES COVID-19
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
                                34
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                GIAT PROTOKOL KESEHATAN
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
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                A. TEGURAN GAR PROTOKOL KESEHATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_teguran_gar_prokes_p') is-invalid @enderror" name="prokes_covid_teguran_gar_prokes_p" autocomplete="off" value="{{ old('prokes_covid_teguran_gar_prokes_p') }}">
                                    @error('prokes_covid_teguran_gar_prokes_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_teguran_gar_prokes') is-invalid @enderror" name="prokes_covid_teguran_gar_prokes" autocomplete="off" value="{{ old('prokes_covid_teguran_gar_prokes') }}">
                                    @error('prokes_covid_teguran_gar_prokes')
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
                                B. PEMBAGIAN MASKER
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_pembagian_masker_p') is-invalid @enderror" name="prokes_covid_pembagian_masker_p" autocomplete="off" value="{{ old('prokes_covid_pembagian_masker_p') }}">
                                    @error('prokes_covid_pembagian_masker_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_pembagian_masker') is-invalid @enderror" name="prokes_covid_pembagian_masker" autocomplete="off" value="{{ old('prokes_covid_pembagian_masker') }}">
                                    @error('prokes_covid_pembagian_masker')
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
                                C. SOSIALISASI TTG PROTOKOL KESEHATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_sosialisasi_tentang_prokes_p') is-invalid @enderror" name="prokes_covid_sosialisasi_tentang_prokes_p" autocomplete="off" value="{{ old('prokes_covid_sosialisasi_tentang_prokes_p') }}">
                                    @error('prokes_covid_sosialisasi_tentang_prokes_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_sosialisasi_tentang_prokes') is-invalid @enderror" name="prokes_covid_sosialisasi_tentang_prokes" autocomplete="off" value="{{ old('prokes_covid_sosialisasi_tentang_prokes') }}">
                                    @error('prokes_covid_sosialisasi_tentang_prokes')
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
                                D. GIAT BAKSOS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_giat_baksos_p') is-invalid @enderror" name="prokes_covid_giat_baksos_p" autocomplete="off" value="{{ old('prokes_covid_giat_baksos_p') }}">
                                    @error('prokes_covid_giat_baksos_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('prokes_covid_giat_baksos') is-invalid @enderror" name="prokes_covid_giat_baksos" autocomplete="off" value="{{ old('prokes_covid_giat_baksos') }}">
                                    @error('prokes_covid_giat_baksos')
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