<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. SEPEDA MOTOR</label>
                <input type="number" class="form-control @error('kendaraan_yg_terlibat_kecelakaan_sepeda_motor') is-invalid @enderror" name="kendaraan_yg_terlibat_kecelakaan_sepeda_motor" autocomplete="off" value="{{ $data->dailyInput->kendaraan_yg_terlibat_kecelakaan_sepeda_motor }}">
                @error('kendaraan_yg_terlibat_kecelakaan_sepeda_motor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. MOBIL PENUMPANG</label>
                <input type="number" class="form-control @error('kendaraan_yg_terlibat_kecelakaan_mobil_penumpang') is-invalid @enderror" name="kendaraan_yg_terlibat_kecelakaan_mobil_penumpang" autocomplete="off" value="{{ $data->dailyInput->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang }}">
                @error('kendaraan_yg_terlibat_kecelakaan_mobil_penumpang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. MOBIL BUS</label>
                <input type="number" class="form-control @error('kendaraan_yg_terlibat_kecelakaan_mobil_bus') is-invalid @enderror" name="kendaraan_yg_terlibat_kecelakaan_mobil_bus" autocomplete="off" value="{{ $data->dailyInput->kendaraan_yg_terlibat_kecelakaan_mobil_bus }}">
                @error('kendaraan_yg_terlibat_kecelakaan_mobil_bus')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. MOBIL BARANG</label>
                <input type="number" class="form-control @error('kendaraan_yg_terlibat_kecelakaan_mobil_barang') is-invalid @enderror" name="kendaraan_yg_terlibat_kecelakaan_mobil_barang" autocomplete="off" value="{{ $data->dailyInput->kendaraan_yg_terlibat_kecelakaan_mobil_barang }}">
                @error('kendaraan_yg_terlibat_kecelakaan_mobil_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. KENDARAAN KHUSUS</label>
                <input type="number" class="form-control @error('kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus') is-invalid @enderror" name="kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus" autocomplete="off" value="{{ $data->dailyInput->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus }}">
                @error('kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. KENDARAAN TIDAK BERMOTOR</label>
                <input type="number" class="form-control @error('kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor') is-invalid @enderror" name="kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor" autocomplete="off" value="{{ $data->dailyInput->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor }}">
                @error('kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>