<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>BARANG BUKTI YANG DISITA</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">
            <div class="form-group mb-4">
                <label><span class="require">*</span>2)a. SIM</label>
                <input type="number" class="form-control @error('kecelakaan_barang_bukti_yg_disita_sim') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_sim" autocomplete="off" value="{{ $data->dailyInput->kecelakaan_barang_bukti_yg_disita_sim }}">
                @error('kecelakaan_barang_bukti_yg_disita_sim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2)b. STNK</label>
                <input type="number" class="form-control @error('kecelakaan_barang_bukti_yg_disita_stnk') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_stnk" autocomplete="off" value="{{ $data->dailyInput->kecelakaan_barang_bukti_yg_disita_stnk }}">
                @error('kecelakaan_barang_bukti_yg_disita_stnk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2)c. KENDARAAN</label>
                <input type="number" class="form-control @error('kecelakaan_barang_bukti_yg_disita_kendaraan') is-invalid @enderror" name="kecelakaan_barang_bukti_yg_disita_kendaraan" autocomplete="off" value="{{ $data->dailyInput->kecelakaan_barang_bukti_yg_disita_kendaraan }}">
                @error('kecelakaan_barang_bukti_yg_disita_kendaraan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>