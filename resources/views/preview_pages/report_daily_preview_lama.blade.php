<div class="modal fade" id="previewForm" tabindex="-1" role="dialog" aria-labelledby="previewForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <span class="colorblue">PREVIEW LAPORAN</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                            <div class="row imgpopup">
                                <img src="{{ secure_asset('/img/line_popbottom.png') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="text-popup">Laporan</label>
                                <br>
                                <span class="colorgray" id="preiew_report_name"></span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="text-popup">Polda</label>
                                <br>
                                <span class="colorgray" id="preiew_polda"></span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="text-popup">Tahun</label>
                                <br>
                                <span class="colorgray" id="preiew_year"></span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="text-popup">Nama Operasi</label>
                                <br>
                                <span class="colorgray" id="preiew_rencana_operasi_id"></span>
                            </div>

                            <div class="col-md-12 mb-n2">
                                <label class="text-popup">Hari Operasi</label>
                                <br>
                                <span class="colorgray" id="preiew_operation_date"></span>
                                <input type="text" name="hari" id="hari" class="form-control popoups d-none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>