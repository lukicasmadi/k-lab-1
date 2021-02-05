<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>USIA KORBAN KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. < 15 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_kurang_15') is-invalid @enderror" name="usia_korban_kecelakaan_kurang_15" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_kurang_15 }}">
                @error('usia_korban_kecelakaan_kurang_15')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. 16 - 20 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_16_20') is-invalid @enderror" name="usia_korban_kecelakaan_16_20" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_16_20 }}">
                @error('usia_korban_kecelakaan_16_20')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. 21 - 25 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_21_25') is-invalid @enderror" name="usia_korban_kecelakaan_21_25" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_21_25 }}">
                @error('usia_korban_kecelakaan_21_25')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. 26 - 30 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_26_30') is-invalid @enderror" name="usia_korban_kecelakaan_26_30" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_26_30 }}">
                @error('usia_korban_kecelakaan_26_30')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. 31 - 35 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_31_35') is-invalid @enderror" name="usia_korban_kecelakaan_31_35" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_31_35 }}">
                @error('usia_korban_kecelakaan_31_35')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. 36 - 40 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_36_40') is-invalid @enderror" name="usia_korban_kecelakaan_36_40" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_36_40 }}">
                @error('usia_korban_kecelakaan_36_40')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. 41 - 45 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_41_45') is-invalid @enderror" name="usia_korban_kecelakaan_41_45" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_41_45 }}">
                @error('usia_korban_kecelakaan_41_45')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>h. 46 - 50 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_45_50') is-invalid @enderror" name="usia_korban_kecelakaan_45_50" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_45_50 }}">
                @error('usia_korban_kecelakaan_45_50')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>I. 51 - 55 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_51_55') is-invalid @enderror" name="usia_korban_kecelakaan_51_55" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_51_55 }}">
                @error('usia_korban_kecelakaan_51_55')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>j. 56 - 60 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_56_60') is-invalid @enderror" name="usia_korban_kecelakaan_56_60" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_56_60 }}">
                @error('usia_korban_kecelakaan_56_60')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>k. > 60 TAHUN</label>
                <input type="number" class="form-control @error('usia_korban_kecelakaan_diatas_60') is-invalid @enderror" name="usia_korban_kecelakaan_diatas_60" autocomplete="off" value="{{ $data->dailyInput->usia_korban_kecelakaan_diatas_60 }}">
                @error('usia_korban_kecelakaan_diatas_60')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>