<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</h4>
                    <p class="ml-3">PELANGGARAN LALU LINTAS</p>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">
            <div class="form-group mb-4">
                <label><span class="require">*</span>TILANG</label>
                <input type="number" class="form-control @error('pelanggaran_lalu_lintas_tilang') is-invalid @enderror" name="pelanggaran_lalu_lintas_tilang" autocomplete="off" value="{{ old('pelanggaran_lalu_lintas_tilang') }}">
                @error('pelanggaran_lalu_lintas_tilang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>TEGURAN</label>
                <input type="number" class="form-control @error('pelanggaran_lalu_lintas_teguran') is-invalid @enderror" name="pelanggaran_lalu_lintas_teguran" autocomplete="off" value="{{ old('pelanggaran_lalu_lintas_teguran') }}">
                @error('pelanggaran_lalu_lintas_teguran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>