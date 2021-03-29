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
                                10
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                BARANG BUKTI YANG DISITA
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
                                1. SIM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kecelakaan_barang_bukti_yg_disita_sim_p') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_sim_p" autocomplete="off" value="{{ old('kecelakaan_barang_bukti_yg_disita_sim_p') }}">
                                    @error('kecelakaan_barang_bukti_yg_disita_sim_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kecelakaan_barang_bukti_yg_disita_sim') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_sim" autocomplete="off" value="{{ old('kecelakaan_barang_bukti_yg_disita_sim') }}">
                                    @error('kecelakaan_barang_bukti_yg_disita_sim')
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
                                2. STNK
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kecelakaan_barang_bukti_yg_disita_stnk_p') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_stnk_p" autocomplete="off" value="{{ old('kecelakaan_barang_bukti_yg_disita_stnk_p') }}">
                                    @error('kecelakaan_barang_bukti_yg_disita_stnk_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kecelakaan_barang_bukti_yg_disita_stnk') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_stnk" autocomplete="off" value="{{ old('kecelakaan_barang_bukti_yg_disita_stnk') }}">
                                    @error('kecelakaan_barang_bukti_yg_disita_stnk')
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
                                3. KENDARAAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kecelakaan_barang_bukti_yg_disita_kendaraan_p') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_kendaraan_p" autocomplete="off" value="{{ old('kecelakaan_barang_bukti_yg_disita_kendaraan_p') }}">
                                    @error('kecelakaan_barang_bukti_yg_disita_kendaraan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kecelakaan_barang_bukti_yg_disita_kendaraan') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_kendaraan" autocomplete="off" value="{{ old('kecelakaan_barang_bukti_yg_disita_kendaraan') }}">
                                    @error('kecelakaan_barang_bukti_yg_disita_kendaraan')
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