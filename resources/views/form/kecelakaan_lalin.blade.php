<div class="col-lg-12 layout-spacing">

    <blockquote class="blockquote">
        <p class="d-inline">DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</p>
    </blockquote>

    <div class="statbox widget box box-shadow">

        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. JUMLAH KEJADIAN</label>
                <input type="number" class="form-control @error('kecelakaan_lalin_jumlah_kejadian') is-invalid @enderror" name="kecelakaan_lalin_jumlah_kejadian" autocomplete="off" value="{{ old('kecelakaan_lalin_jumlah_kejadian') }}">
                @error('kecelakaan_lalin_jumlah_kejadian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. KORBAN MENINGGAL DUNIA</label>
                <input type="number" class="form-control @error('kecelakaan_lalin_jumlah_korban_meninggal') is-invalid @enderror" name="kecelakaan_lalin_jumlah_korban_meninggal" autocomplete="off" value="{{ old('kecelakaan_lalin_jumlah_korban_meninggal') }}">
                @error('kecelakaan_lalin_jumlah_korban_meninggal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. KORBAN LUKA BERAT</label>
                <input type="number" class="form-control @error('kecelakaan_lalin_jumlah_korban_luka_berat') is-invalid @enderror" name="kecelakaan_lalin_jumlah_korban_luka_berat" autocomplete="off" value="{{ old('kecelakaan_lalin_jumlah_korban_luka_berat') }}">
                @error('kecelakaan_lalin_jumlah_korban_luka_berat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. KORBAN LUKA RINGAN</label>
                <input type="number" class="form-control @error('kecelakaan_lalin_jumlah_korban_luka_ringan') is-invalid @enderror" name="kecelakaan_lalin_jumlah_korban_luka_ringan" autocomplete="off" value="{{ old('kecelakaan_lalin_jumlah_korban_luka_ringan') }}">
                @error('kecelakaan_lalin_jumlah_korban_luka_ringan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. KERUGIAN MATERIIL</label>
                <input type="number" class="form-control @error('kecelakaan_lalin_jumlah_kerugian_materiil') is-invalid @enderror" name="kecelakaan_lalin_jumlah_kerugian_materiil" autocomplete="off" value="{{ old('kecelakaan_lalin_jumlah_kerugian_materiil') }}">
                @error('kecelakaan_lalin_jumlah_kerugian_materiil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>