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
                                02
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                JENIS PELANGGARAN LALU LINTAS
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
                                A. SEPEDA MOTOR
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. KECEPATAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_kecepatan_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_kecepatan_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_kecepatan_p }}">
                                    @error('pelanggaran_sepeda_motor_kecepatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_kecepatan') is-invalid @enderror" name="pelanggaran_sepeda_motor_kecepatan" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_kecepatan }}">
                                    @error('pelanggaran_sepeda_motor_kecepatan')
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
                                2. HELM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_helm_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_helm_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_helm_p }}">
                                    @error('pelanggaran_sepeda_motor_helm_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_helm') is-invalid @enderror" name="pelanggaran_sepeda_motor_helm" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_helm }}">
                                    @error('pelanggaran_sepeda_motor_helm')
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
                                3. BONCENGAN LEBIH DARI 1 (satu) ORANG
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p }}">
                                    @error('pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_bonceng_lebih_dari_satu') is-invalid @enderror" name="pelanggaran_sepeda_motor_bonceng_lebih_dari_satu" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu }}">
                                    @error('pelanggaran_sepeda_motor_bonceng_lebih_dari_satu')
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
                                4. MARKA MENERUS / RAMBU MENYALIP
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_marka_menerus_menyalip_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_marka_menerus_menyalip_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_marka_menerus_menyalip_p }}">
                                    @error('pelanggaran_sepeda_motor_marka_menerus_menyalip_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_marka_menerus_menyalip') is-invalid @enderror" name="pelanggaran_sepeda_motor_marka_menerus_menyalip" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_marka_menerus_menyalip }}">
                                    @error('pelanggaran_sepeda_motor_marka_menerus_menyalip')
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
                                5. MELAWAN ARUS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melawan_arus_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_melawan_arus_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_melawan_arus_p }}">
                                    @error('pelanggaran_sepeda_motor_melawan_arus_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melawan_arus') is-invalid @enderror" name="pelanggaran_sepeda_motor_melawan_arus" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_melawan_arus }}">
                                    @error('pelanggaran_sepeda_motor_melawan_arus')
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
                                6. MELANGGAR LAMPU LALU LINTAS
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melanggar_lampu_lalin_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_melanggar_lampu_lalin_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_melanggar_lampu_lalin_p }}">
                                    @error('pelanggaran_sepeda_motor_melanggar_lampu_lalin_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melanggar_lampu_lalin') is-invalid @enderror" name="pelanggaran_sepeda_motor_melanggar_lampu_lalin" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_melanggar_lampu_lalin }}">
                                    @error('pelanggaran_sepeda_motor_melanggar_lampu_lalin')
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
                                7. MENGEMUDIKAN KENDARAAN DENGAN TIDAK WAJAR(PSL 283)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p }}">
                                    @error('pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_mengemudikan_tidak_wajar') is-invalid @enderror" name="pelanggaran_sepeda_motor_mengemudikan_tidak_wajar" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar }}">
                                    @error('pelanggaran_sepeda_motor_mengemudikan_tidak_wajar')
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
                                8. SYARAT TEKNIS DAN LAYAK JALAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p }}">
                                    @error('pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_syarat_teknis_layak_jalan') is-invalid @enderror" name="pelanggaran_sepeda_motor_syarat_teknis_layak_jalan" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan }}">
                                    @error('pelanggaran_sepeda_motor_syarat_teknis_layak_jalan')
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
                                9. TIDAK MENYALAKAN LAMPU UTAMA SIANG/MALAM
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p }}">
                                    @error('pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam') is-invalid @enderror" name="pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam }}">
                                    @error('pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam')
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
                                10. BERBELOK TANPA ISYARAT
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p }}">
                                    @error('pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_berbelok_tanpa_isyarat') is-invalid @enderror" name="pelanggaran_sepeda_motor_berbelok_tanpa_isyarat" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat }}">
                                    @error('pelanggaran_sepeda_motor_berbelok_tanpa_isyarat')
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
                                11. BERBALAPAN DI JALAN RAYA (PSL 297)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p }}">
                                    @error('pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_berbalapan_di_jalan_raya') is-invalid @enderror" name="pelanggaran_sepeda_motor_berbalapan_di_jalan_raya" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya }}">
                                    @error('pelanggaran_sepeda_motor_berbalapan_di_jalan_raya')
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
                                12. MELANGGAR RAMBU BERHENTI DAN PARKIR
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p }}">
                                    @error('pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir') is-invalid @enderror" name="pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir }}">
                                    @error('pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir')
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
                                13. MELANGGAR MARKA BERHENTI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melanggar_marka_berhenti_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_melanggar_marka_berhenti_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_melanggar_marka_berhenti_p }}">
                                    @error('pelanggaran_sepeda_motor_melanggar_marka_berhenti_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_melanggar_marka_berhenti') is-invalid @enderror" name="pelanggaran_sepeda_motor_melanggar_marka_berhenti" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_melanggar_marka_berhenti }}">
                                    @error('pelanggaran_sepeda_motor_melanggar_marka_berhenti')
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
                                14. TIDAK MEMATUHI PERINTAH PETUGAS POLRI(PSL 104)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p }}">
                                    @error('pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas') is-invalid @enderror" name="pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas }}">
                                    @error('pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas')
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
                                15. SURAT-SURAT
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_surat_surat_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_surat_surat_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_surat_surat_p }}">
                                    @error('pelanggaran_sepeda_motor_surat_surat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_surat_surat') is-invalid @enderror" name="pelanggaran_sepeda_motor_surat_surat" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_surat_surat }}">
                                    @error('pelanggaran_sepeda_motor_surat_surat')
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
                                16. Kelengkapan Kendaraan
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_kelengkapan_kendaraan_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_kelengkapan_kendaraan_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_kelengkapan_kendaraan_p }}">
                                    @error('pelanggaran_sepeda_motor_kelengkapan_kendaraan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_kelengkapan_kendaraan') is-invalid @enderror" name="pelanggaran_sepeda_motor_kelengkapan_kendaraan" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_kelengkapan_kendaraan }}">
                                    @error('pelanggaran_sepeda_motor_kelengkapan_kendaraan')
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
                                17. LAIN-LAIN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_lain_lain_p') is-invalid @enderror" name="pelanggaran_sepeda_motor_lain_lain_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_sepeda_motor_lain_lain_p }}">
                                    @error('pelanggaran_sepeda_motor_lain_lain_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_sepeda_motor_lain_lain') is-invalid @enderror" name="pelanggaran_sepeda_motor_lain_lain" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_sepeda_motor_lain_lain }}">
                                    @error('pelanggaran_sepeda_motor_lain_lain')
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
                                B. MOBIL DAN KENDARAAN KHUSUS
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. KECEPATAN ( PSL 287 AY 5 JO 106  AY 4)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_kecepatan_p') is-invalid @enderror" name="pelanggaran_mobil_kecepatan_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_kecepatan_p }}">
                                    @error('pelanggaran_mobil_kecepatan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_kecepatan') is-invalid @enderror" name="pelanggaran_mobil_kecepatan" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_kecepatan }}">
                                    @error('pelanggaran_mobil_kecepatan')
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
                                2. SAFETY BELT
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_safety_belt_p') is-invalid @enderror" name="pelanggaran_mobil_safety_belt_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_safety_belt_p }}">
                                    @error('pelanggaran_mobil_safety_belt_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_safety_belt') is-invalid @enderror" name="pelanggaran_mobil_safety_belt" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_safety_belt }}">
                                    @error('pelanggaran_mobil_safety_belt')
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
                                3. MUATAN (OVER LOADING)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_muatan_overload_p') is-invalid @enderror" name="pelanggaran_mobil_muatan_overload_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_muatan_overload_p }}">
                                    @error('pelanggaran_mobil_muatan_overload_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_muatan_overload') is-invalid @enderror" name="pelanggaran_mobil_muatan_overload" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_muatan_overload }}">
                                    @error('pelanggaran_mobil_muatan_overload')
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
                                4. MARKA MENERUS / RAMBU MENYALIP
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_marka_menerus_menyalip_p') is-invalid @enderror" name="pelanggaran_mobil_marka_menerus_menyalip_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_marka_menerus_menyalip_p }}">
                                    @error('pelanggaran_mobil_marka_menerus_menyalip_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_marka_menerus_menyalip') is-invalid @enderror" name="pelanggaran_mobil_marka_menerus_menyalip" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_marka_menerus_menyalip }}">
                                    @error('pelanggaran_mobil_marka_menerus_menyalip')
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
                                5. MELAWAN ARUS (PSL 105)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melawan_arus_p') is-invalid @enderror" name="pelanggaran_mobil_melawan_arus_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_melawan_arus_p }}">
                                    @error('pelanggaran_mobil_melawan_arus_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melawan_arus') is-invalid @enderror" name="pelanggaran_mobil_melawan_arus" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_melawan_arus }}">
                                    @error('pelanggaran_mobil_melawan_arus')
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
                                6. MELANGGAR LAMPU LALU LINTAS (PSL 287 AYT 2 JO 106 AY 4)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melanggar_lampu_lalin_p') is-invalid @enderror" name="pelanggaran_mobil_melanggar_lampu_lalin_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_melanggar_lampu_lalin_p }}">
                                    @error('pelanggaran_mobil_melanggar_lampu_lalin_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melanggar_lampu_lalin') is-invalid @enderror" name="pelanggaran_mobil_melanggar_lampu_lalin" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_melanggar_lampu_lalin }}">
                                    @error('pelanggaran_mobil_melanggar_lampu_lalin')
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
                                7. MENGEMUDIKAN KENDARAAN DENGAN TIDAK WAJAR(PSL 283)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_mengemudi_tidak_wajar_p') is-invalid @enderror" name="pelanggaran_mobil_mengemudi_tidak_wajar_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_mengemudi_tidak_wajar_p }}">
                                    @error('pelanggaran_mobil_mengemudi_tidak_wajar_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_mengemudi_tidak_wajar') is-invalid @enderror" name="pelanggaran_mobil_mengemudi_tidak_wajar" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_mengemudi_tidak_wajar }}">
                                    @error('pelanggaran_mobil_mengemudi_tidak_wajar')
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
                                8. SYARAT TEKNIS DAN LAYAK JALAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_syarat_teknis_layak_jalan_p') is-invalid @enderror" name="pelanggaran_mobil_syarat_teknis_layak_jalan_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_syarat_teknis_layak_jalan_p }}">
                                    @error('pelanggaran_mobil_syarat_teknis_layak_jalan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_syarat_teknis_layak_jalan') is-invalid @enderror" name="pelanggaran_mobil_syarat_teknis_layak_jalan" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_syarat_teknis_layak_jalan }}">
                                    @error('pelanggaran_mobil_syarat_teknis_layak_jalan')
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
                                9. TIDAK MENYALAKAN LAMPU UTAMA MLM HARI (PSL 293 JO 107)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_tidak_nyala_lampu_malam_p') is-invalid @enderror" name="pelanggaran_mobil_tidak_nyala_lampu_malam_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_tidak_nyala_lampu_malam_p }}">
                                    @error('pelanggaran_mobil_tidak_nyala_lampu_malam_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_tidak_nyala_lampu_malam') is-invalid @enderror" name="pelanggaran_mobil_tidak_nyala_lampu_malam" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_tidak_nyala_lampu_malam }}">
                                    @error('pelanggaran_mobil_tidak_nyala_lampu_malam')
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
                                10. BERBELOK TANPA ISYARAT (PSL 295)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_berbelok_tanpa_isyarat_p') is-invalid @enderror" name="pelanggaran_mobil_berbelok_tanpa_isyarat_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_berbelok_tanpa_isyarat_p }}">
                                    @error('pelanggaran_mobil_berbelok_tanpa_isyarat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_berbelok_tanpa_isyarat') is-invalid @enderror" name="pelanggaran_mobil_berbelok_tanpa_isyarat" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_berbelok_tanpa_isyarat }}">
                                    @error('pelanggaran_mobil_berbelok_tanpa_isyarat')
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
                                11. BERBALAPAN DI JALAN RAYA (PSL 297)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_berbalapan_di_jalan_raya_p') is-invalid @enderror" name="pelanggaran_mobil_berbalapan_di_jalan_raya_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_berbalapan_di_jalan_raya_p }}">
                                    @error('pelanggaran_mobil_berbalapan_di_jalan_raya_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_berbalapan_di_jalan_raya') is-invalid @enderror" name="pelanggaran_mobil_berbalapan_di_jalan_raya" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_berbalapan_di_jalan_raya }}">
                                    @error('pelanggaran_mobil_berbalapan_di_jalan_raya')
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
                                12. MELANGGAR RAMBU BERHENTI DAN PARKIR
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p') is-invalid @enderror" name="pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p }}">
                                    @error('pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir') is-invalid @enderror" name="pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir }}">
                                    @error('pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir')
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
                                13. MELANGGAR MARKA BERHENTI
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melanggar_marka_berhenti_p') is-invalid @enderror" name="pelanggaran_mobil_melanggar_marka_berhenti_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_melanggar_marka_berhenti_p }}">
                                    @error('pelanggaran_mobil_melanggar_marka_berhenti_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_melanggar_marka_berhenti') is-invalid @enderror" name="pelanggaran_mobil_melanggar_marka_berhenti" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_melanggar_marka_berhenti }}">
                                    @error('pelanggaran_mobil_melanggar_marka_berhenti')
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
                                14. TIDAK MEMATUHI PERINTAH PETUGAS POLRI(PSL 104)
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_tidak_patuh_perintah_petugas_p') is-invalid @enderror" name="pelanggaran_mobil_tidak_patuh_perintah_petugas_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_tidak_patuh_perintah_petugas_p }}">
                                    @error('pelanggaran_mobil_tidak_patuh_perintah_petugas_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_tidak_patuh_perintah_petugas') is-invalid @enderror" name="pelanggaran_mobil_tidak_patuh_perintah_petugas" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_tidak_patuh_perintah_petugas }}">
                                    @error('pelanggaran_mobil_tidak_patuh_perintah_petugas')
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
                                15. SURAT-SURAT
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_surat_surat_p') is-invalid @enderror" name="pelanggaran_mobil_surat_surat_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_surat_surat_p }}">
                                    @error('pelanggaran_mobil_surat_surat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_surat_surat') is-invalid @enderror" name="pelanggaran_mobil_surat_surat" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_surat_surat }}">
                                    @error('pelanggaran_mobil_surat_surat')
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
                                16. KELENGKAPAN KENDARAAN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_kelengkapan_kendaraan_p') is-invalid @enderror" name="pelanggaran_mobil_kelengkapan_kendaraan_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_kelengkapan_kendaraan_p }}">
                                    @error('pelanggaran_mobil_kelengkapan_kendaraan_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_kelengkapan_kendaraan') is-invalid @enderror" name="pelanggaran_mobil_kelengkapan_kendaraan" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_kelengkapan_kendaraan }}">
                                    @error('pelanggaran_mobil_kelengkapan_kendaraan')
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
                                17. LAIN-LAIN
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_lain_lain_p') is-invalid @enderror" name="pelanggaran_mobil_lain_lain_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_mobil_lain_lain_p }}">
                                    @error('pelanggaran_mobil_lain_lain_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_mobil_lain_lain') is-invalid @enderror" name="pelanggaran_mobil_lain_lain" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_mobil_lain_lain }}">
                                    @error('pelanggaran_mobil_lain_lain')
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
                                C. KENDARAAN TIDAK BERMOTOR DAN PEJALAN KAKI
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 line-onsite">
                            <div class="row">
                                <div class="col-xl-1 col-md-12 col-sm-12 col-12">
                                </div>
                                <div class="col-xl-5 col-md-12 col-sm-12 col-12">
                                1. MENYEBRANG TIDAK PADA TEMPATNYA
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p') is-invalid @enderror" name="pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p" autocomplete="off" value="{{ $data->dailyInputPrev->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p }}">
                                    @error('pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                                    <input type="number" class="form-onsite @error('pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat') is-invalid @enderror" name="pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat" autocomplete="off" value="{{ $data->dailyInput->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat }}">
                                    @error('pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat')
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