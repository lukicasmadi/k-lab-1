<div class="modal fade" id="form_edit_rekap" tabindex="-1" role="dialog" aria-labelledby="form_edit_rekap" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('korlantas_rekap_update') }}" id="form_edit_rekap">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <span class="colorblue">EDIT REKAP LAPORAN</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                                <div class="row imgpopup">
                                    <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                                </div>
                            </div>

                            <div class="row">
                                <input type="hidden" name="uuid_edit" id="uuid_edit" value="">
                                <div class="col-md-12 mb-3">
                                    <label class="text-popup">Nama Laporan</label>
                                    <input type="text" name="report_name_edit" id="report_name_edit" class="form-control popoups" autocomplete="off" placeholder="- Tulis jenis operasi yang akan Anda laksanakan">
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Pilih Polda</label>
                                    <select class="form-control form-custom height-form" id="polda_edit" name="polda_edit">
                                        <option selected="selected" value="polda_all">-   Semua Polda</option>
                                        @foreach($listPolda as $key => $val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Tahun</label>
                                    <select class="form-control form-custom height-form" id="year_edit" name="year_edit">
                                        <option selected="" value="">-   Pilih Tahun</option>
                                        @foreach($cleanYear as $key => $val)
                                            <option value="{{$val}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Nama Operasi</label>
                                    <select class="form-control form-custom height-form" id="rencana_operasi_id_edit" name="rencana_operasi_id_edit">
                                        <option selected="selected" value="">-   Pilih operasi yang akan Anda laksanakan</option>
                                        @foreach($rencanaOperasi as $key => $val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="text-popup">Hari Operasi</label>
                                    <select class="form-control form-custom height-form" id="operation_date_edit" name="operation_date_edit">
                                        <option value="semua_hari" selected="selected">-   Semua Hari</option>
                                        <option value="pilih_hari">-   Pilih Hari</option>
                                    </select>
                                    <input type="text" name="hari_edit" id="hari_edit" class="form-control popoups inp-icon d-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btnBlue" value="EDIT LAPORAN">
                </div>
            </form>
        </div>
    </div>
</div>