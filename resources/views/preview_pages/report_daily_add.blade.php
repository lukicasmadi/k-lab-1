<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('daily_rekap_store') }}" id="form_add_rekap">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <span class="colorblue">REKAP LAPORAN</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                                <div class="row imgpopup">
                                    <img src="{{ asset('/img/line_popbottom.png') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="text-popup">Nama Laporan</label>
                                    <input type="text" name="report_name" id="report_name" class="form-control popoups" autocomplete="off" placeholder="- Tulis jenis operasi yang akan Anda laksanakan">
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Pilih Polda</label>
                                    <select class="form-control form-custom height-form" id="polda" name="polda">
                                        <option selected="selected" value="polda_all">-   Semua Polda</option>
                                            @foreach($listPolda as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Tahun</label>
                                    <select class="form-control form-custom height-form" id="year" name="year">
                                        <option selected="" value="">-   Pilih Tahun</option>
                                            @foreach($cleanYear as $key => $val)
                                                <option value="{{$val}}">{{$val}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Nama Operasi</label>
                                    <select class="form-control form-custom height-form" id="rencana_operasi_id" name="rencana_operasi_id">
                                        <option selected="selected" value="">-   Pilih operasi yang akan Anda laksanakan</option>
                                            @foreach($rencanaOperasi as $key => $val)
                                                <option value="{{$key}}">{{$val}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 d-none" id="div_hari_operasi">
                                    <label class="text-popup">Hari Operasi</label>
                                    <select class="form-control form-custom height-form" id="config_date" name="config_date">
                                        <option value="all" selected="selected">-   Semua Hari</option>
                                        <option value="custom">-   Pilih Hari</option>
                                    </select>
                                </div>

                                <div class="col-md-12 d-none" id="loadingPanel">
                                    <div class="loadingio-spinner-ellipsis-fvt532hptk7">
                                        <div class="ldio-7zzkgq4jab8">
                                            <div></div><div></div><div></div><div></div><div></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 custom_hari d-none" id="div_tanggal_mulai">
                                    <label class="text-popup">Tanggal Mulai</label>
                                    <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control popoups inp-icon" value="" placeholder="- dd-mm-yyyy">
                                </div>

                                <div class="col-md-6 custom_hari d-none" id="div_tanggal_selesai">
                                    <label class="text-popup">Tanggal Selesai</label>
                                    <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control popoups inp-icon" value="" placeholder="- dd-mm-yyyy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btnBlue" value="BUAT LAPORAN">
            </div>
            </form>
        </div>
    </div>
</div>