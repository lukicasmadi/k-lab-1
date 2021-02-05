<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>FAKTOR PENYEBAB KECELAKAAN</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <blockquote class="blockquote">
                <p class="d-inline">1) MANUSIA</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. NGANTUK/LELAH (PSL 283)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_ngantuk_lelah') is-invalid @enderror" name="faktor_penyebab_kecelakaan_ngantuk_lelah" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_ngantuk_lelah') }}">
                @error('faktor_penyebab_kecelakaan_ngantuk_lelah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. MABUK /PENGARUH ALKOHOL DAN OBAT (PSL 283)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_mabuk_obat') is-invalid @enderror" name="faktor_penyebab_kecelakaan_mabuk_obat" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_mabuk_obat') }}">
                @error('faktor_penyebab_kecelakaan_mabuk_obat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. SAKIT (PSL 283)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_sakit') is-invalid @enderror" name="faktor_penyebab_kecelakaan_sakit" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_sakit') }}">
                @error('faktor_penyebab_kecelakaan_sakit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. HAND PHONE/ ALAT ELEKTRONIK LAIN (PSL 283)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_handphone_elektronik') is-invalid @enderror" name="faktor_penyebab_kecelakaan_handphone_elektronik" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_handphone_elektronik') }}">
                @error('faktor_penyebab_kecelakaan_handphone_elektronik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>e. MENEROBOS LAMPU MERAH(PSL 287 AY 2)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_menerobos_lampu_merah') is-invalid @enderror" name="faktor_penyebab_kecelakaan_menerobos_lampu_merah" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_menerobos_lampu_merah') }}">
                @error('faktor_penyebab_kecelakaan_menerobos_lampu_merah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>f. MELANGGAR BATAS KECEPATAN (PSL 287 AY 7)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_melanggar_batas_kecepatan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan') }}">
                @error('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>g. TIDAK MENJAGA JARAK</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_tidak_menjaga_jarak') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_menjaga_jarak" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_menjaga_jarak') }}">
                @error('faktor_penyebab_kecelakaan_tidak_menjaga_jarak')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>h. MENDAHULUI/BERBELOK/BERPINDAH JALUR (PSL 294)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur') is-invalid @enderror" name="faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur') }}">
                @error('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>I. BERPINDAH LAJUR ( PSL 295)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_berpindah_jalur') is-invalid @enderror" name="faktor_penyebab_kecelakaan_berpindah_jalur" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_berpindah_jalur') }}">
                @error('faktor_penyebab_kecelakaan_berpindah_jalur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>j. TIDAK MEMBERIKAN LAMPU ISYARAT BERHENTI/BERBELOK/BERUBAH ARAH</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat') }}">
                @error('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>k. TIDAK MENGUTAMAKAN PEJALAN KAKI (PSL 284 JO 106 AY 2)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki') }}">
                @error('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>l. LAINNYA</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_lainnya') is-invalid @enderror" name="faktor_penyebab_kecelakaan_lainnya" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_lainnya') }}">
                @error('faktor_penyebab_kecelakaan_lainnya')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) ALAM</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_alam') is-invalid @enderror" name="faktor_penyebab_kecelakaan_alam" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_alam') }}">
                @error('faktor_penyebab_kecelakaan_alam')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) KELAIKAN KENDARAAN</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_kelaikan_kendaraan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_kelaikan_kendaraan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_kelaikan_kendaraan') }}">
                @error('faktor_penyebab_kecelakaan_kelaikan_kendaraan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) JALAN (KONDISI JALAN)</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_kondisi_jalan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_kondisi_jalan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_kondisi_jalan') }}">
                @error('faktor_penyebab_kecelakaan_kondisi_jalan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">5) PRASARANA JALAN</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>a. RAMBU</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_rambu') is-invalid @enderror" name="faktor_penyebab_kecelakaan_rambu" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_rambu') }}">
                @error('faktor_penyebab_kecelakaan_rambu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>b. MARKA</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_marka') is-invalid @enderror" name="faktor_penyebab_kecelakaan_marka" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_marka') }}">
                @error('faktor_penyebab_kecelakaan_marka')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>c. APIL</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_apil') is-invalid @enderror" name="faktor_penyebab_kecelakaan_apil" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_apil') }}">
                @error('faktor_penyebab_kecelakaan_apil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>d. PERLINTASAN KA TANPA PALANG PINTU</label>
                <input type="number" class="form-control @error('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu') is-invalid @enderror" name="faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu') }}">
                @error('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>