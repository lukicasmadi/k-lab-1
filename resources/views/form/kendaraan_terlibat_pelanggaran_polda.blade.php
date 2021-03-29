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
                                04
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                KENDARAAN YANG TERLIBAT PELANGGARAN
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
                                A. SEPEDA MOTOR
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_sepeda_motor') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_sepeda_motor" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_sepeda_motor') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_sepeda_motor')
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
                                B. MOBIL PENUMPANG
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_mobil_penumpang') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_mobil_penumpang" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_mobil_penumpang') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_mobil_penumpang')
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
                                C. MOBIL BUS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_mobil_bus_p') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_mobil_bus_p" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_mobil_bus_p') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_mobil_bus_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_mobil_bus') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_mobil_bus" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_mobil_bus') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_mobil_bus')
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
                                D. MOBIL BARANG
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_mobil_barang_p') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_mobil_barang_p" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_mobil_barang_p') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_mobil_barang_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_mobil_barang') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_mobil_barang" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_mobil_barang') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_mobil_barang')
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
                                E. KENDARAAN KHUSUS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus') is-invalid @enderror" name="kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus" autocomplete="off" value="{{ old('kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus') }}">
                                    @error('kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus')
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