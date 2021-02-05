<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>LOKASI PELANGGARAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <blockquote class="blockquote">
                <p class="d-inline">a. BERDASARKAN KAWASAN</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) KAWASAN PEMUKIMAN</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_pemukiman') is-invalid @enderror" name="lokasi_pelanggaran_pemukiman" autocomplete="off" value="{{ old('lokasi_pelanggaran_pemukiman') }}">
                @error('lokasi_pelanggaran_pemukiman')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) KAWASAN PERBELANJAAN</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_perbelanjaan') is-invalid @enderror" name="lokasi_pelanggaran_perbelanjaan" autocomplete="off" value="{{ old('lokasi_pelanggaran_perbelanjaan') }}">
                @error('lokasi_pelanggaran_perbelanjaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) PERKANTORAN</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_perkantoran') is-invalid @enderror" name="lokasi_pelanggaran_perkantoran" autocomplete="off" value="{{ old('lokasi_pelanggaran_perkantoran') }}">
                @error('lokasi_pelanggaran_perkantoran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) KAWASAN WISATA</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_wisata') is-invalid @enderror" name="lokasi_pelanggaran_wisata" autocomplete="off" value="{{ old('lokasi_pelanggaran_wisata') }}">
                @error('lokasi_pelanggaran_wisata')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>5) KAWASAN INDUTRI</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_industri') is-invalid @enderror" name="lokasi_pelanggaran_industri" autocomplete="off" value="{{ old('lokasi_pelanggaran_industri') }}">
                @error('lokasi_pelanggaran_industri')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">b. STATUS JALAN</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) NASIONAL</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_status_jalan_nasional') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_nasional" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_nasional') }}">
                @error('lokasi_pelanggaran_status_jalan_nasional')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) PROPINSI</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_status_jalan_propinsi') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_propinsi" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_propinsi') }}">
                @error('lokasi_pelanggaran_status_jalan_propinsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) KAB/KOTA</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_status_jalan_kab_kota') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_kab_kota" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_kab_kota') }}">
                @error('lokasi_pelanggaran_status_jalan_kab_kota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) DESA / LINGKUNGAN</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_status_jalan_desa_lingkungan') is-invalid @enderror" name="lokasi_pelanggaran_status_jalan_desa_lingkungan" autocomplete="off" value="{{ old('lokasi_pelanggaran_status_jalan_desa_lingkungan') }}">
                @error('lokasi_pelanggaran_status_jalan_desa_lingkungan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">c. BERDASARKAN FUNGSI JALAN</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) ARTERI</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_fungsi_jalan_arteri') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_arteri" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_arteri') }}">
                @error('lokasi_pelanggaran_fungsi_jalan_arteri')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) KOLEKTOR</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_fungsi_jalan_kolektor') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_kolektor" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_kolektor') }}">
                @error('lokasi_pelanggaran_fungsi_jalan_kolektor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) LOKAL</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_fungsi_jalan_lokal') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_lokal" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_lokal') }}">
                @error('lokasi_pelanggaran_fungsi_jalan_lokal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) LINGKUNGAN</label>
                <input type="number" class="form-control @error('lokasi_pelanggaran_fungsi_jalan_lingkungan') is-invalid @enderror" name="lokasi_pelanggaran_fungsi_jalan_lingkungan" autocomplete="off" value="{{ old('lokasi_pelanggaran_fungsi_jalan_lingkungan') }}">
                @error('lokasi_pelanggaran_fungsi_jalan_lingkungan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>