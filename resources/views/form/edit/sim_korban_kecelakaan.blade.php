<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>SIM KORBAN KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. A</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_a') is-invalid @enderror" name="sim_korban_kecelakaan_sim_a" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_a }}">
                @error('sim_korban_kecelakaan_sim_a')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. A UMUM</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_a_umum') is-invalid @enderror" name="sim_korban_kecelakaan_sim_a_umum" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_a_umum }}">
                @error('sim_korban_kecelakaan_sim_a_umum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. B1</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_b1') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b1" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b1 }}">
                @error('sim_korban_kecelakaan_sim_b1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. B1 UMUM</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_b1_umum') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b1_umum" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b1_umum }}">
                @error('sim_korban_kecelakaan_sim_b1_umum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. BII</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_b2') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b2" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b2 }}">
                @error('sim_korban_kecelakaan_sim_b2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. BII UMUM</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_b2_umum') is-invalid @enderror" name="sim_korban_kecelakaan_sim_b2_umum" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_b2_umum }}">
                @error('sim_korban_kecelakaan_sim_b2_umum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. C</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_c') is-invalid @enderror" name="sim_korban_kecelakaan_sim_c" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_c }}">
                @error('sim_korban_kecelakaan_sim_c')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>h. D</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_d') is-invalid @enderror" name="sim_korban_kecelakaan_sim_d" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_d }}">
                @error('sim_korban_kecelakaan_sim_d')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>I. SIM INTERNASIONAL</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_sim_internasional') is-invalid @enderror" name="sim_korban_kecelakaan_sim_internasional" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_sim_internasional }}">
                @error('sim_korban_kecelakaan_sim_internasional')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>j. TANPA SIM</label>
                <input type="number" class="form-control @error('sim_korban_kecelakaan_tanpa_sim') is-invalid @enderror" name="sim_korban_kecelakaan_tanpa_sim" autocomplete="off" value="{{ $data->dailyInput->sim_korban_kecelakaan_tanpa_sim }}">
                @error('sim_korban_kecelakaan_tanpa_sim')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>