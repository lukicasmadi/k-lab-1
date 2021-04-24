<div class="modal fade" id="polda_report_date_range" tabindex="-1" role="dialog" aria-labelledby="polda_report_date_range" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('polda_report_date_range') }}" id="polda_date_range">
                @csrf
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <span class="colorblue">LAPORAN BERDASARKAN TANGGAL</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-popup">
                                <div class="row imgpopup">
                                    <img src="{{ asset('/img/line_popbottom.png') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 custom_hari">
                                    <label class="text-popup">Tanggal Mulai</label>
                                    <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="form-control popoups inp-icon" value="" placeholder="- dd-mm-yyyy" autocomplete="off">
                                </div>

                                <div class="col-md-6 custom_hari">
                                    <label class="text-popup">Tanggal Selesai</label>
                                    <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="form-control popoups inp-icon" value="" placeholder="- dd-mm-yyyy" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <input type="submit" class="btn btnBlue" value="DOWNLOAD">
            </div>
            </form>
        </div>
    </div>
</div>