<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div id="toggleAccordion">
            <div class="card">
                <div id="defaultAccordion01" class="collapse show" aria-labelledby="heading01" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                V DATA TERKAIT ARUS PEMUDIK
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header" id="heading03">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion03" aria-expanded="false" aria-controls="defaultAccordion03">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                33
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                    JUMLAH PENUMPANG
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
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="background: #11425C; padding: 10px 0;">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                A. TERMINAL
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. JUMLAH BUS KEBERANGKATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_bus_keberangkatan_p') is-invalid @enderror" name="arus_mudik_jumlah_bus_keberangkatan_p" autocomplete="off" value="{{ old('arus_mudik_jumlah_bus_keberangkatan_p') }}">
                                    @error('arus_mudik_jumlah_bus_keberangkatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_bus_keberangkatan') is-invalid @enderror" name="arus_mudik_jumlah_bus_keberangkatan" autocomplete="off" value="{{ old('arus_mudik_jumlah_bus_keberangkatan') }}">
                                    @error('arus_mudik_jumlah_bus_keberangkatan')
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
                                2. JUMLAH PENUMPANG KEBERANGKATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_penumpang_keberangkatan_p') is-invalid @enderror" name="arus_mudik_jumlah_penumpang_keberangkatan_p" autocomplete="off" value="{{ old('arus_mudik_jumlah_penumpang_keberangkatan_p') }}">
                                    @error('arus_mudik_jumlah_penumpang_keberangkatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_penumpang_keberangkatan') is-invalid @enderror" name="arus_mudik_jumlah_penumpang_keberangkatan" autocomplete="off" value="{{ old('arus_mudik_jumlah_penumpang_keberangkatan') }}">
                                    @error('arus_mudik_jumlah_penumpang_keberangkatan')
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
                                3. JUMLAH BUS KEDATANGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_bus_kedatangan_p') is-invalid @enderror" name="arus_mudik_jumlah_bus_kedatangan_p" autocomplete="off" value="{{ old('arus_mudik_jumlah_bus_kedatangan_p') }}">
                                    @error('arus_mudik_jumlah_bus_kedatangan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_bus_kedatangan') is-invalid @enderror" name="arus_mudik_jumlah_bus_kedatangan" autocomplete="off" value="{{ old('arus_mudik_jumlah_bus_kedatangan') }}">
                                    @error('arus_mudik_jumlah_bus_kedatangan')
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
                                4. JUMLAH PENUMPANG KEDATANGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_penumpang_kedatangan_p') is-invalid @enderror" name="arus_mudik_jumlah_penumpang_kedatangan_p" autocomplete="off" value="{{ old('arus_mudik_jumlah_penumpang_kedatangan_p') }}">
                                    @error('arus_mudik_jumlah_penumpang_kedatangan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_jumlah_penumpang_kedatangan') is-invalid @enderror" name="arus_mudik_jumlah_penumpang_kedatangan" autocomplete="off" value="{{ old('arus_mudik_jumlah_penumpang_kedatangan') }}">
                                    @error('arus_mudik_jumlah_penumpang_kedatangan')
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
                                    TOTAL TERMINAL
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_total_terminal_p') is-invalid @enderror" name="arus_mudik_total_terminal_p" autocomplete="off" value="{{ old('arus_mudik_total_terminal_p') }}">
                                    @error('arus_mudik_total_terminal_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_total_terminal') is-invalid @enderror" name="arus_mudik_total_terminal" autocomplete="off" value="{{ old('arus_mudik_total_terminal') }}">
                                    @error('arus_mudik_total_terminal')
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
                                    TOTAL BUS KEBERANGKATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_total_bus_keberangkatan_p') is-invalid @enderror" name="arus_mudik_total_bus_keberangkatan_p" autocomplete="off" value="{{ old('arus_mudik_total_bus_keberangkatan_p') }}">
                                    @error('arus_mudik_total_bus_keberangkatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_total_bus_keberangkatan') is-invalid @enderror" name="arus_mudik_total_bus_keberangkatan" autocomplete="off" value="{{ old('arus_mudik_total_bus_keberangkatan') }}">
                                    @error('arus_mudik_total_bus_keberangkatan')
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
                                    TOTAL PENUMPANG KEBERANGKATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_penumpang_keberangkatan_p') is-invalid @enderror" name="arus_mudik_penumpang_keberangkatan_p" autocomplete="off" value="{{ old('arus_mudik_penumpang_keberangkatan_p') }}">
                                    @error('arus_mudik_penumpang_keberangkatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_penumpang_keberangkatan') is-invalid @enderror" name="arus_mudik_penumpang_keberangkatan" autocomplete="off" value="{{ old('arus_mudik_penumpang_keberangkatan') }}">
                                    @error('arus_mudik_penumpang_keberangkatan')
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
                                    TOTAL BUS KEDATANGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_total_bus_kedatangan_p') is-invalid @enderror" name="arus_mudik_total_bus_kedatangan_p" autocomplete="off" value="{{ old('arus_mudik_total_bus_kedatangan_p') }}">
                                    @error('arus_mudik_total_bus_kedatangan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_total_bus_kedatangan') is-invalid @enderror" name="arus_mudik_total_bus_kedatangan" autocomplete="off" value="{{ old('arus_mudik_total_bus_kedatangan') }}">
                                    @error('arus_mudik_total_bus_kedatangan')
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
                                    TOTAL PENUMPANG KEDATANGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_penumpang_kedatangan_p') is-invalid @enderror" name="arus_mudik_penumpang_kedatangan_p" autocomplete="off" value="{{ old('arus_mudik_penumpang_kedatangan_p') }}">
                                    @error('arus_mudik_penumpang_kedatangan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_penumpang_kedatangan') is-invalid @enderror" name="arus_mudik_penumpang_kedatangan" autocomplete="off" value="{{ old('arus_mudik_penumpang_kedatangan') }}">
                                    @error('arus_mudik_penumpang_kedatangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="background: #11425C; padding: 10px 0;">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-11 col-md-12 col-sm-12 col-12">
                                B. STASIUN KERETA API
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                    TOTAL STASIUN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_kereta_api_total_stasiun_p') is-invalid @enderror" name="arus_mudik_kereta_api_total_stasiun_p" autocomplete="off" value="{{ old('arus_mudik_kereta_api_total_stasiun_p') }}">
                                    @error('arus_mudik_kereta_api_total_stasiun_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_kereta_api_total_stasiun') is-invalid @enderror" name="arus_mudik_kereta_api_total_stasiun" autocomplete="off" value="{{ old('arus_mudik_kereta_api_total_stasiun') }}">
                                    @error('arus_mudik_kereta_api_total_stasiun')
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
                                    TOTAL PENUMPANG KEBERANGKATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_kereta_api_total_penumpang_keberangkatan_p') is-invalid @enderror" name="arus_mudik_kereta_api_total_penumpang_keberangkatan_p" autocomplete="off" value="{{ old('arus_mudik_kereta_api_total_penumpang_keberangkatan_p') }}">
                                    @error('arus_mudik_kereta_api_total_penumpang_keberangkatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_kereta_api_total_penumpang_keberangkatan') is-invalid @enderror" name="arus_mudik_kereta_api_total_penumpang_keberangkatan" autocomplete="off" value="{{ old('arus_mudik_kereta_api_total_penumpang_keberangkatan') }}">
                                    @error('arus_mudik_kereta_api_total_penumpang_keberangkatan')
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
                                    TOTAL PENUMPANG KEDATANGAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_kereta_api_total_penumpang_kedatangan_p') is-invalid @enderror" name="arus_mudik_kereta_api_total_penumpang_kedatangan_p" autocomplete="off" value="{{ old('arus_mudik_kereta_api_total_penumpang_kedatangan_p') }}">
                                    @error('arus_mudik_kereta_api_total_penumpang_kedatangan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('arus_mudik_kereta_api_total_penumpang_kedatangan') is-invalid @enderror" name="arus_mudik_kereta_api_total_penumpang_kedatangan" autocomplete="off" value="{{ old('arus_mudik_kereta_api_total_penumpang_kedatangan') }}">
                                    @error('arus_mudik_kereta_api_total_penumpang_kedatangan')
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