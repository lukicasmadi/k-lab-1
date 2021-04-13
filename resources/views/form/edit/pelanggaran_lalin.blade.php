<div class="col-lg-12 layout-spacing">

    @if ($errors->any())
        <div class="alert alert-danger custom">
            <ul>
                <li>Inputan anda belum lengkap. Silakan diperiksa lagi</li>
            </ul>
        </div>
    @endif

    @include('flash::message')

    <blockquote class="blockquote">
        <p class="d-inline">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</p>
    </blockquote>

    <div class="statbox widget box box-shadow">

        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>PELANGGARAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">
            <div class="form-group mb-4">
                <label><span class="require">*</span>TILANG</label>
                <input type="number" class="form-control @error('pelanggaran_lalu_lintas_tilang') is-invalid @enderror" name="pelanggaran_lalu_lintas_tilang" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_lalu_lintas_tilang }}">
                @error('pelanggaran_lalu_lintas_tilang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>TEGURAN</label>
                <input type="number" class="form-control @error('pelanggaran_lalu_lintas_teguran') is-invalid @enderror" name="pelanggaran_lalu_lintas_teguran" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_lalu_lintas_teguran }}">
                @error('pelanggaran_lalu_lintas_teguran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>