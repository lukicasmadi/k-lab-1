<div class="modal fade" id="modalReportAllPoldaByOperation" tabindex="-1" role="dialog" aria-labelledby="modalReportAllPoldaByOperation" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <span class="colorblue">REPORT POLDA</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                            <div class="row imgpopup">
                                <img src="{{ asset('/img/line_popbottom.png') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-popup">Nama Operasi</label>
                                <select class="form-control form-custom height-form" id="operation_uuid" name="operation_uuid">
                                    <option selected="selected" value="">-   Pilih Nama Operasi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-biru" value="LIHAT" id="btnViewReportHTML">
            </div>
        </div>
    </div>
</div>