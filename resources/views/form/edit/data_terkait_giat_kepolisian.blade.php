<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">

        <blockquote class="blockquote">
            <p class="d-inline">DATA TERKAIT GIAT KEPOLISIAN</p>
        </blockquote>

        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>GIAT LANTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. PENGATURAN</label>
                <input type="number" class="form-control @error('giat_lantas_pengaturan') is-invalid @enderror" name="giat_lantas_pengaturan" autocomplete="off" value="{{ $data->dailyInput->giat_lantas_pengaturan }}">
                @error('giat_lantas_pengaturan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. PENJAGAAN</label>
                <input type="number" class="form-control @error('giat_lantas_penjagaan') is-invalid @enderror" name="giat_lantas_penjagaan" autocomplete="off" value="{{ $data->dailyInput->giat_lantas_penjagaan }}">
                @error('giat_lantas_penjagaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. PENGAWALAN</label>
                <input type="number" class="form-control @error('giat_lantas_pengawalan') is-invalid @enderror" name="giat_lantas_pengawalan" autocomplete="off" value="{{ $data->dailyInput->giat_lantas_pengawalan }}">
                @error('giat_lantas_pengawalan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. PATROLI</label>
                <input type="number" class="form-control @error('giat_lantas_patroli') is-invalid @enderror" name="giat_lantas_patroli" autocomplete="off" value="{{ $data->dailyInput->giat_lantas_patroli }}">
                @error('giat_lantas_patroli')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>