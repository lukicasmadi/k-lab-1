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
                                11
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                PROFESI KORBAN KECELAKAAN LALU LINTAS
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
                                A. PEGAWAI NEGERI SIPIL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_pns_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_pns_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_pns_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_pns_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_pns') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_pns" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_pns') }}">
                                    @error('profesi_korban_kecelakaan_lalin_pns')
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
                                B. KARYAWAN / SWASTA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_karwayan_swasta_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_karwayan_swasta_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_karwayan_swasta_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_karwayan_swasta_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_karwayan_swasta') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_karwayan_swasta" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_karwayan_swasta') }}">
                                    @error('profesi_korban_kecelakaan_lalin_karwayan_swasta')
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
                                C. MAHASISWA / PELAJAR
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_pelajar_mahasiswa') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_pelajar_mahasiswa" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_pelajar_mahasiswa') }}">
                                    @error('profesi_korban_kecelakaan_lalin_pelajar_mahasiswa')
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
                                D. PENGEMUDI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_pengemudi_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_pengemudi_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_pengemudi_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_pengemudi_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_pengemudi') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_pengemudi" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_pengemudi') }}">
                                    @error('profesi_korban_kecelakaan_lalin_pengemudi')
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
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_tni_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_tni_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_tni_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_tni_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_tni') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_tni" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_tni') }}">
                                    @error('profesi_korban_kecelakaan_lalin_tni')
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
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_polri_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_polri_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_polri_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_polri_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_polri') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_polri" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_polri') }}">
                                    @error('profesi_korban_kecelakaan_lalin_polri')
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
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_lain_lain_prev') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_lain_lain_prev" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_lain_lain_prev') }}">
                                    @error('profesi_korban_kecelakaan_lalin_lain_lain_prev')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('profesi_korban_kecelakaan_lalin_lain_lain') is-invalid @enderror" name="profesi_korban_kecelakaan_lalin_lain_lain" autocomplete="off" value="{{ old('profesi_korban_kecelakaan_lalin_lain_lain') }}">
                                    @error('profesi_korban_kecelakaan_lalin_lain_lain')
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