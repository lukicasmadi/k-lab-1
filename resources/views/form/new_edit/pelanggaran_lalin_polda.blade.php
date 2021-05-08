<div class="col-lg-12 layout-spacing">

    @if ($errors->any())
        <div class="alert alert-danger custom">
            <ul>
                <li>Inputan anda belum lengkap. Silakan diperiksa lagi</li>
            </ul>
        </div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('flash::message')

    <blockquote class="blockquote">
        <p class="d-inline">LAPORAN HARIAN {{ upperCase(operationPlans()->name) }}</p>
        <span class="sub-inline">TANGGAL : {{ upperCase(indonesianDate(operationPlans()->start_date)) }} S/D {{ upperCase(indonesianDate(operationPlans()->end_date)) }}</span>
        <div class="button-onsite">
            <a href="{{ route('phro_index') }}"><span class="seehow">lihat data</span></a>
        </div>
    </blockquote>

    <blockquote class="blockquote mb-4">
        <div class="row mt-3">

            <div class="col-md-4 mb-4">
                <label class="text-popup">Nama Kesatuan</label>
                <input type="text" class="form-control popoups mt-1 @error('nama_kesatuan') is-invalid @enderror" name="nama_kesatuan" id="nama_kesatuan" autocomplete="off" value="{{ $data->nama_kesatuan }}">
                @error('nama_kesatuan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-4 mb-4">
                <label class="text-popup">Nama Atasan</label>
                <input type="text" class="form-control popoups mt-1 @error('nama_atasan') is-invalid @enderror" name="nama_atasan" id="nama_atasan" autocomplete="off" value="{{ $data->nama_atasan }}">
                @error('nama_atasan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-4 mb-4">
                <label class="text-popup">Pangkat dan nrp</label>
                <input type="text" class="form-control popoups mt-1 @error('pangkat_dan_nrp') is-invalid @enderror" name="pangkat_dan_nrp" id="pangkat_dan_nrp" autocomplete="off" value="{{ $data->pangkat_dan_nrp }}">
                @error('pangkat_dan_nrp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-4 mb-4">
                <label class="text-popup">Jabatan</label>
                <input type="text" class="form-control popoups mt-1 @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" autocomplete="off" value="{{ $data->jabatan }}">
                @error('jabatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-4 mb-4">
                <label class="text-popup">Nama Laporan</label>
                <input type="text" class="form-control popoups mt-1 @error('nama_laporan') is-invalid @enderror" name="nama_laporan" id="nama_laporan" autocomplete="off" value="{{ $data->nama_laporan }}">
                @error('nama_laporan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-4 mb-4">
                <label class="text-popup">Nama Kota</label>
                <input type="text" class="form-control popoups mt-1 @error('nama_kota') is-invalid @enderror" name="nama_kota" id="nama_kota" autocomplete="off" value="{{ $data->nama_kota }}">
                @error('nama_kota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <blockquote class="blockquote">
                    <p class="d-inline">Dokumen form ini pernah diupload. Jika anda ingin menggantinya silahkan gunakan menu upload dibawah. Jika tidak, biarkan kosong</p>
                </blockquote>
            </div>

            <div class="col-md-12 mb-4">
            <div class="custom-file-container mb-4" data-upload-id="myFirstImage">
                    <label>Upload Dokomen (pdf, ppt, word, zip) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input @error('document_upload') is-invalid @enderror" name="document_upload" id="document_upload">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        @error('document_upload')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview" style="display: none;"></div>
                </div>
            </div>

        </div>
    </blockquote>

    <div class="statbox widget box box-shadow">
        <div id="toggleAccordion">
            <div class="card">
                <div class="card-header" id="heading01">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion01" aria-expanded="false" aria-controls="defaultAccordion01">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-2 col-md-12 col-sm-12 col-12">
                                NO.
                                </div>
                                <div class="col-xl-6 col-md-12 col-sm-12 col-12">
                                URAIAN
                                </div>
                                <div class="col-xl-4 col-md-12 col-sm-12 col-12">
                                TAHUN
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="defaultAccordion01" class="collapse show" aria-labelledby="heading01" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                I DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="heading02">
                    <section class="mb-0 mt-0">
                        <div role="menu" class="" data-toggle="collapse" data-target="#defaultAccordion02" aria-expanded="false" aria-controls="defaultAccordion02">
                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" heighviewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-widstroke-linecap="round" stroke-linejoin="round" class="ffeather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                01
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                PELANGGARAN LALU LINTAS
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
                <div id="defaultAccordion02" class="collapse show" aria-labelledby="heading02" data-parent="#toggleAccordion">
                    <div class="card-body">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                A. TILANG
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_lalu_lintas_tilang_p') is-invalid @enderror" name="pelanggaran_lalu_lintas_tilang_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_lalu_lintas_tilang_p }}">
                                    @error('pelanggaran_lalu_lintas_tilang_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_lalu_lintas_tilang') is-invalid @enderror" name="pelanggaran_lalu_lintas_tilang" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_lalu_lintas_tilang }}">
                                    @error('pelanggaran_lalu_lintas_tilang')
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
                                B. TEGURAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_lalu_lintas_teguran_p') is-invalid @enderror" name="pelanggaran_lalu_lintas_teguran_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_lalu_lintas_teguran_p }}">
                                    @error('pelanggaran_lalu_lintas_teguran_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_lalu_lintas_teguran') is-invalid @enderror" name="pelanggaran_lalu_lintas_teguran" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_lalu_lintas_teguran }}">
                                    @error('pelanggaran_lalu_lintas_teguran')
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