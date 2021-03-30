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
                                05
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                PROFESI PELAKU PELANGGARAN
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
                                A. PEGAWAI NEGERI SIPIL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_pns_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_pns_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_pns_p }}">
                                    @error('profesi_pelaku_pelanggaran_pns_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_pns') is-invalid @enderror" name="profesi_pelaku_pelanggaran_pns" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_pns }}">
                                    @error('profesi_pelaku_pelanggaran_pns')
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
                                B. KARYAWAN SWASTA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_karyawan_swasta_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_karyawan_swasta_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_karyawan_swasta_p }}">
                                    @error('profesi_pelaku_pelanggaran_karyawan_swasta_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_karyawan_swasta') is-invalid @enderror" name="profesi_pelaku_pelanggaran_karyawan_swasta" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_karyawan_swasta }}">
                                    @error('profesi_pelaku_pelanggaran_karyawan_swasta')
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
                                C. PELAJAR/MAHASISWA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_pelajar_mahasiswa_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_pelajar_mahasiswa_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_pelajar_mahasiswa_p }}">
                                    @error('profesi_pelaku_pelanggaran_pelajar_mahasiswa_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_pelajar_mahasiswa') is-invalid @enderror" name="profesi_pelaku_pelanggaran_pelajar_mahasiswa" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_pelajar_mahasiswa }}">
                                    @error('profesi_pelaku_pelanggaran_pelajar_mahasiswa')
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
                                D. PENGEMUDI(SUPIR)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_pengemudi_supir_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_pengemudi_supir_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_pengemudi_supir_p }}">
                                    @error('profesi_pelaku_pelanggaran_pengemudi_supir_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_pengemudi_supir') is-invalid @enderror" name="profesi_pelaku_pelanggaran_pengemudi_supir" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_pengemudi_supir }}">
                                    @error('profesi_pelaku_pelanggaran_pengemudi_supir')
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
                                E. TNI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_tni_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_tni_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_tni_p }}">
                                    @error('profesi_pelaku_pelanggaran_tni_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_tni') is-invalid @enderror" name="profesi_pelaku_pelanggaran_tni" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_tni }}">
                                    @error('profesi_pelaku_pelanggaran_tni')
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
                                F. POLRI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_polri_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_polri_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_polri_p }}">
                                    @error('profesi_pelaku_pelanggaran_polri_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_polri') is-invalid @enderror" name="profesi_pelaku_pelanggaran_polri" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_polri }}">
                                    @error('profesi_pelaku_pelanggaran_polri')
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
                                G. LAIN-LAIN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_lain_lain_p') is-invalid @enderror" name="profesi_pelaku_pelanggaran_lain_lain_p" autocomplete="off" value="{{ $data->dailyInputPrev->profesi_pelaku_pelanggaran_lain_lain_p }}">
                                    @error('profesi_pelaku_pelanggaran_lain_lain_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_pelaku_pelanggaran_lain_lain') is-invalid @enderror" name="profesi_pelaku_pelanggaran_lain_lain" autocomplete="off" value="{{ $data->dailyInput->profesi_pelaku_pelanggaran_lain_lain }}">
                                    @error('profesi_pelaku_pelanggaran_lain_lain')
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