<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>JENIS KECELAKAAN LALU LINTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. TUNGGAL / OUT OF CONTROL</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_tunggal_ooc') is-invalid @enderror" name="jenis_kecelakaan_tunggal_ooc" autocomplete="off" value="{{ old('jenis_kecelakaan_tunggal_ooc') }}">
                @error('jenis_kecelakaan_tunggal_ooc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. DEPAN-DEPAN</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_depan_depan') is-invalid @enderror" name="jenis_kecelakaan_depan_depan" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_depan') }}">
                @error('jenis_kecelakaan_depan_depan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. DEPAN-BELAKANG</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_depan_belakang') is-invalid @enderror" name="jenis_kecelakaan_depan_belakang" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_belakang') }}">
                @error('jenis_kecelakaan_depan_belakang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. DEPAN-SAMPING</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_depan_samping') is-invalid @enderror" name="jenis_kecelakaan_depan_samping" autocomplete="off" value="{{ old('jenis_kecelakaan_depan_samping') }}">
                @error('jenis_kecelakaan_depan_samping')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. BERUNTUN</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_beruntun') is-invalid @enderror" name="jenis_kecelakaan_beruntun" autocomplete="off" value="{{ old('jenis_kecelakaan_beruntun') }}">
                @error('jenis_kecelakaan_beruntun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. TABRAK PEJALAN KAKI</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_pejalan_kaki') is-invalid @enderror" name="jenis_kecelakaan_pejalan_kaki" autocomplete="off" value="{{ old('jenis_kecelakaan_pejalan_kaki') }}">
                @error('jenis_kecelakaan_pejalan_kaki')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. TABRAK LARI</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_tabrak_lari') is-invalid @enderror" name="jenis_kecelakaan_tabrak_lari" autocomplete="off" value="{{ old('jenis_kecelakaan_tabrak_lari') }}">
                @error('jenis_kecelakaan_tabrak_lari')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>h. TABRAK HEWAN</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_tabrak_hewan') is-invalid @enderror" name="jenis_kecelakaan_tabrak_hewan" autocomplete="off" value="{{ old('jenis_kecelakaan_tabrak_hewan') }}">
                @error('jenis_kecelakaan_tabrak_hewan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>I. SAMPING-SAMPING</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_samping_samping') is-invalid @enderror" name="jenis_kecelakaan_samping_samping" autocomplete="off" value="{{ old('jenis_kecelakaan_samping_samping') }}">
                @error('jenis_kecelakaan_samping_samping')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>j. LAINNYA</label>
                <input type="number" class="form-control @error('jenis_kecelakaan_lainnya') is-invalid @enderror" name="jenis_kecelakaan_lainnya" autocomplete="off" value="{{ old('jenis_kecelakaan_lainnya') }}">
                @error('jenis_kecelakaan_lainnya')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>
