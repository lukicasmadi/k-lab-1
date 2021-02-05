<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>KECELAKAAN TRANSPORTASI</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. KECELAKAAN KERETA API</label>
                <input type="number" class="form-control @error('kecelakaan_transportasi_kereta_api') is-invalid @enderror" name="kecelakaan_transportasi_kereta_api" autocomplete="off" value="{{ old('kecelakaan_transportasi_kereta_api') }}">
                @error('kecelakaan_transportasi_kereta_api')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. KECELAKAAN LAUT / PERAIRAN</label>
                <input type="number" class="form-control @error('kecelakaan_transportasi_laut_perairan') is-invalid @enderror" name="kecelakaan_transportasi_laut_perairan" autocomplete="off" value="{{ old('kecelakaan_transportasi_laut_perairan') }}">
                @error('kecelakaan_transportasi_laut_perairan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. KECELAKAAN UDARA</label>
                <input type="number" class="form-control @error('kecelakaan_transportasi_udara') is-invalid @enderror" name="kecelakaan_transportasi_udara" autocomplete="off" value="{{ old('kecelakaan_transportasi_udara') }}">
                @error('kecelakaan_transportasi_udara')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>
