<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">

        <blockquote class="blockquote">
            <p class="d-inline">DATA TERKAIT DIKMAS LANTAS</p>
        </blockquote>

        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>DIKMAS LANTAS</h4>
                </div>
            </div>
        </div>

        <div class="widget-content widget-content-area">

            <blockquote class="blockquote">
                <p class="d-inline">a. PENLUH</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) MELALUI MEDIA CETAK</label>
                <input type="number" class="form-control @error('penlu_melalui_media_cetak') is-invalid @enderror" name="penlu_melalui_media_cetak" autocomplete="off" value="{{ old('penlu_melalui_media_cetak') }}">
                @error('penlu_melalui_media_cetak')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) MELALUI MEDIA ELEKTRONIK</label>
                <input type="number" class="form-control @error('penlu_melalui_media_elektronik') is-invalid @enderror" name="penlu_melalui_media_elektronik" autocomplete="off" value="{{ old('penlu_melalui_media_elektronik') }}">
                @error('penlu_melalui_media_elektronik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) TEMPAT KERAMAIAN</label>
                <input type="number" class="form-control @error('penlu_melalui_tempat_keramaian') is-invalid @enderror" name="penlu_melalui_tempat_keramaian" autocomplete="off" value="{{ old('penlu_melalui_tempat_keramaian') }}">
                @error('penlu_melalui_tempat_keramaian')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) TEMPAT ISTIRAHAT</label>
                <input type="number" class="form-control @error('penlu_melalui_tempat_istirahat') is-invalid @enderror" name="penlu_melalui_tempat_istirahat" autocomplete="off" value="{{ old('penlu_melalui_tempat_istirahat') }}">
                @error('penlu_melalui_tempat_istirahat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>5) DAERAH RAWAN LAKA & LANGGAR</label>
                <input type="number" class="form-control @error('penlu_melalui_daerah_rawan_laka_dan_langgar') is-invalid @enderror" name="penlu_melalui_daerah_rawan_laka_dan_langgar" autocomplete="off" value="{{ old('penlu_melalui_daerah_rawan_laka_dan_langgar') }}">
                @error('penlu_melalui_daerah_rawan_laka_dan_langgar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <blockquote class="blockquote">
                <p class="d-inline">b. PENYEBARAN / PEMASANGAN</p>
            </blockquote>

            <div class="form-group mb-4">
                <label><span class="require">*</span>1) SPANDUK</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_spanduk') is-invalid @enderror" name="penyebaran_pemasangan_spanduk" autocomplete="off" value="{{ old('penyebaran_pemasangan_spanduk') }}">
                @error('penyebaran_pemasangan_spanduk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>2) LEAFLET</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_leaflet') is-invalid @enderror" name="penyebaran_pemasangan_leaflet" autocomplete="off" value="{{ old('penyebaran_pemasangan_leaflet') }}">
                @error('penyebaran_pemasangan_leaflet')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>3) STICKER</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_sticker') is-invalid @enderror" name="penyebaran_pemasangan_sticker" autocomplete="off" value="{{ old('penyebaran_pemasangan_sticker') }}">
                @error('penyebaran_pemasangan_sticker')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label><span class="require">*</span>4) BILBOARD</label>
                <input type="number" class="form-control @error('penyebaran_pemasangan_bilboard') is-invalid @enderror" name="penyebaran_pemasangan_bilboard" autocomplete="off" value="{{ old('penyebaran_pemasangan_bilboard') }}">
                @error('penyebaran_pemasangan_bilboard')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
    </div>
</div>