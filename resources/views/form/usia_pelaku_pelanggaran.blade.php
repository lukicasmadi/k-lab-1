<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>USIA PELAKU PELANGGARAN</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. >15 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_kurang_dari_15_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_kurang_dari_15_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_kurang_dari_15_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. 16-20 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_16_20_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_16_20_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_16_20_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. 21-25 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_21_25_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_21_25_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_21_25_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. 26-30 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_26_30_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_26_30_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_26_30_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. 31-35 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_31_35_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_31_35_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_31_35_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. 36-40 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_36_40_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_36_40_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_36_40_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. 41-45 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_41_45_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_41_45_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_41_45_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. 46-50 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_46_50_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_46_50_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_46_50_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. 51-55 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_51_55_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_51_55_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_51_55_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>h. 56-60 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_66_60_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_66_60_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_66_60_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>k. > 60 Tahun</label>
                <input type="number" class="form-control @error('usia_pelaku_pelanggaran_diatas_60_tahun') is-invalid @enderror" name="usia_pelaku_pelanggaran_diatas_60_tahun" autocomplete="off">
                @error('usia_pelaku_pelanggaran_diatas_60_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>