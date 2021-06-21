<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div id="toggleAccordion">
            <div class="card">
                <div class="card-header" id="heading03">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion03" aria-expanded="false" aria-controls="defaultAccordion03">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                20
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                FAKTOR PENYEBAB KECELAKAAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12 text-center">
                                    {{ yearMinus() }}
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12 text-center">
                                    {{ year() }}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="defaultAccordion03" class="collapse show" aria-labelledby="heading03" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 second-toogle">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. MANUSIA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_manusia_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_manusia_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_manusia_p') }}">
                                    @error('faktor_penyebab_kecelakaan_manusia_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_manusia') is-invalid @enderror" name="faktor_penyebab_kecelakaan_manusia" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_manusia') }}">
                                    @error('faktor_penyebab_kecelakaan_manusia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                               A. NGANTUK/LELAH (PSL 283)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_ngantuk_lelah_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_ngantuk_lelah_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_ngantuk_lelah_p') }}">
                                    @error('faktor_penyebab_kecelakaan_ngantuk_lelah_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_ngantuk_lelah') is-invalid @enderror" name="faktor_penyebab_kecelakaan_ngantuk_lelah" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_ngantuk_lelah') }}">
                                    @error('faktor_penyebab_kecelakaan_ngantuk_lelah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                B. MABUK /PENGARUH ALKOHOL DAN OBAT (PSL 283)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_mabuk_obat_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_mabuk_obat_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_mabuk_obat_p') }}">
                                    @error('faktor_penyebab_kecelakaan_mabuk_obat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_mabuk_obat') is-invalid @enderror" name="faktor_penyebab_kecelakaan_mabuk_obat" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_mabuk_obat') }}">
                                    @error('faktor_penyebab_kecelakaan_mabuk_obat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                C. SAKIT (PSL 283)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_sakit_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_sakit_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_sakit_p') }}">
                                    @error('faktor_penyebab_kecelakaan_sakit_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_sakit') is-invalid @enderror" name="faktor_penyebab_kecelakaan_sakit" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_sakit') }}">
                                    @error('faktor_penyebab_kecelakaan_sakit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                D. HAND PHONE/ ALAT ELEKTRONIK LAIN (PSL 283)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_handphone_elektronik_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_handphone_elektronik_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_handphone_elektronik_p') }}">
                                    @error('faktor_penyebab_kecelakaan_handphone_elektronik_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_handphone_elektronik') is-invalid @enderror" name="faktor_penyebab_kecelakaan_handphone_elektronik" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_handphone_elektronik') }}">
                                    @error('faktor_penyebab_kecelakaan_handphone_elektronik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                E. MENEROBOS LAMPU MERAH(PSL 287 AY 2)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_menerobos_lampu_merah_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_menerobos_lampu_merah_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_menerobos_lampu_merah_p') }}">
                                    @error('faktor_penyebab_kecelakaan_menerobos_lampu_merah_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_menerobos_lampu_merah') is-invalid @enderror" name="faktor_penyebab_kecelakaan_menerobos_lampu_merah" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_menerobos_lampu_merah') }}">
                                    @error('faktor_penyebab_kecelakaan_menerobos_lampu_merah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                F. MELANGGAR BATAS KECEPATAN (PSL 287 AY 7)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p') }}">
                                    @error('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_melanggar_batas_kecepatan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan') }}">
                                    @error('faktor_penyebab_kecelakaan_melanggar_batas_kecepatan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                G. TIDAK MENJAGA JARAK
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p') }}">
                                    @error('faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_tidak_menjaga_jarak') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_menjaga_jarak" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_menjaga_jarak') }}">
                                    @error('faktor_penyebab_kecelakaan_tidak_menjaga_jarak')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                H. MENDAHULUI/BERBELOK/BERPINDAH JALUR (PSL 294)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p') }}">
                                    @error('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur') is-invalid @enderror" name="faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur') }}">
                                    @error('faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                I. BERPINDAH LAJUR ( PSL 295)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_berpindah_jalur_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_berpindah_jalur_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_berpindah_jalur_p') }}">
                                    @error('faktor_penyebab_kecelakaan_berpindah_jalur_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_berpindah_jalur') is-invalid @enderror" name="faktor_penyebab_kecelakaan_berpindah_jalur" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_berpindah_jalur') }}">
                                    @error('faktor_penyebab_kecelakaan_berpindah_jalur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                J. TIDAK MEMBERIKAN LAMPU ISYARAT BERHENTI/BERBELOK/BERUBAH ARAH
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p') }}">
                                    @error('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat') }}">
                                    @error('faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                K. TIDAK MENGUTAMAKAN PEJALAN KAKI (PSL 284 JO 106 AY 2)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p') }}">
                                    @error('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki') is-invalid @enderror" name="faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki') }}">
                                    @error('faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                L. LAINNYA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_lainnya_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_lainnya_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_lainnya_p') }}">
                                    @error('faktor_penyebab_kecelakaan_lainnya_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_lainnya') is-invalid @enderror" name="faktor_penyebab_kecelakaan_lainnya" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_lainnya') }}">
                                    @error('faktor_penyebab_kecelakaan_lainnya')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                2. ALAM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_alam_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_alam_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_alam_p') }}">
                                    @error('faktor_penyebab_kecelakaan_alam_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_alam') is-invalid @enderror" name="faktor_penyebab_kecelakaan_alam" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_alam') }}">
                                    @error('faktor_penyebab_kecelakaan_alam')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite second-toogle">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                3. KELAIKAN KENDARAAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_kelaikan_kendaraan_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_kelaikan_kendaraan_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_kelaikan_kendaraan_p') }}">
                                    @error('faktor_penyebab_kecelakaan_kelaikan_kendaraan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_kelaikan_kendaraan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_kelaikan_kendaraan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_kelaikan_kendaraan') }}">
                                    @error('faktor_penyebab_kecelakaan_kelaikan_kendaraan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                4. JALAN (KONDISI JALAN)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_kondisi_jalan_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_kondisi_jalan_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_kondisi_jalan_p') }}">
                                    @error('faktor_penyebab_kecelakaan_kondisi_jalan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_kondisi_jalan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_kondisi_jalan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_kondisi_jalan') }}">
                                    @error('faktor_penyebab_kecelakaan_kondisi_jalan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 second-toogle">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                5. PRASARANA JALAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_prasarana_jalan_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_prasarana_jalan_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_prasarana_jalan_p') }}">
                                    @error('faktor_penyebab_kecelakaan_prasarana_jalan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_prasarana_jalan') is-invalid @enderror" name="faktor_penyebab_kecelakaan_prasarana_jalan" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_prasarana_jalan') }}">
                                    @error('faktor_penyebab_kecelakaan_prasarana_jalan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                A. RAMBU
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_rambu_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_rambu_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_rambu_p') }}">
                                    @error('faktor_penyebab_kecelakaan_rambu_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_rambu') is-invalid @enderror" name="faktor_penyebab_kecelakaan_rambu" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_rambu') }}">
                                    @error('faktor_penyebab_kecelakaan_rambu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                B. MARKA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_marka_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_marka_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_marka_p') }}">
                                    @error('faktor_penyebab_kecelakaan_marka_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_marka') is-invalid @enderror" name="faktor_penyebab_kecelakaan_marka" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_marka') }}">
                                    @error('faktor_penyebab_kecelakaan_marka')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                C. APIL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_apil_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_apil_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_apil_p') }}">
                                    @error('faktor_penyebab_kecelakaan_apil_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_apil') is-invalid @enderror" name="faktor_penyebab_kecelakaan_apil" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_apil') }}">
                                    @error('faktor_penyebab_kecelakaan_apil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                D. PERLINTASAN KA TANPA PALANG PINTU
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p') is-invalid @enderror" name="faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p') }}">
                                    @error('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu') is-invalid @enderror" name="faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu" autocomplete="off" value="{{ old('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu') }}">
                                    @error('faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>