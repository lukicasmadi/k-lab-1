<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>PROFESI PELAKU KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. PEGAWAI NEGERI SIPIL</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_pns') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_pns" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_pns') }}">
                @error('profesi_pelaku_kecelakaan_lalin_pns')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. KARYAWAN / SWASTA</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_karyawan_swasta') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_karyawan_swasta" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_karyawan_swasta') }}">
                @error('profesi_pelaku_kecelakaan_lalin_karyawan_swasta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. MAHASISWA / PELAJAR</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar') }}">
                @error('profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. PENGEMUDI</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_pengemudi') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_pengemudi" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_pengemudi') }}">
                @error('profesi_pelaku_kecelakaan_lalin_pengemudi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. TNI</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_tni') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_tni" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_tni') }}">
                @error('profesi_pelaku_kecelakaan_lalin_tni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. POLRI</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_polri') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_polri" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_polri') }}">
                @error('profesi_pelaku_kecelakaan_lalin_polri')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. LAIN-LAIN</label>
                <input type="number" class="form-control @error('profesi_pelaku_kecelakaan_lalin_lain_lain') is-invalid @enderror" name="profesi_pelaku_kecelakaan_lalin_lain_lain" autocomplete="off" value="{{ old('profesi_pelaku_kecelakaan_lalin_lain_lain') }}">
                @error('profesi_pelaku_kecelakaan_lalin_lain_lain')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>
