<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>WAKTU KEJADIAN KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. 00.00 - 03.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_00_03') is-invalid @enderror" name="waktu_kejadian_kecelakaan_00_03" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_00_03') }}">
                @error('waktu_kejadian_kecelakaan_00_03')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. 03.00 - 06.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_03_06') is-invalid @enderror" name="waktu_kejadian_kecelakaan_03_06" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_03_06') }}">
                @error('waktu_kejadian_kecelakaan_03_06')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. 06.00- 09.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_06_09') is-invalid @enderror" name="waktu_kejadian_kecelakaan_06_09" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_06_09') }}">
                @error('waktu_kejadian_kecelakaan_06_09')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. 09.00 - 12.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_09_12') is-invalid @enderror" name="waktu_kejadian_kecelakaan_09_12" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_09_12') }}">
                @error('waktu_kejadian_kecelakaan_09_12')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. 12.00 - 15.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_12_15') is-invalid @enderror" name="waktu_kejadian_kecelakaan_12_15" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_12_15') }}">
                @error('waktu_kejadian_kecelakaan_12_15')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. 15.00 - 18.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_15_18') is-invalid @enderror" name="waktu_kejadian_kecelakaan_15_18" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_15_18') }}">
                @error('waktu_kejadian_kecelakaan_15_18')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. 18.00 - 21.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_18_21') is-invalid @enderror" name="waktu_kejadian_kecelakaan_18_21" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_18_21') }}">
                @error('waktu_kejadian_kecelakaan_18_21')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>h. 21.00 - 24.00</label>
                <input type="number" class="form-control @error('waktu_kejadian_kecelakaan_21_24') is-invalid @enderror" name="waktu_kejadian_kecelakaan_21_24" autocomplete="off" value="{{ old('waktu_kejadian_kecelakaan_21_24') }}">
                @error('waktu_kejadian_kecelakaan_21_24')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>