<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\DailyInput;
use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Models\DailyInputPrev;
use Illuminate\Support\Carbon;
use App\Http\Requests\PHRORequest;
use Illuminate\Support\Facades\DB;
use App\Exports\NewComparisonExport;
use App\Exports\PoldaSubmitedExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PoldaDailyComparison;
use Illuminate\Support\Facades\Storage;
use App\Models\PoldaCustomOperationName;

class PoldaHasRencanaOperasiController extends Controller
{

    public function downloadDocument($uuid)
    {
        try {
            $file = PoldaSubmited::with('polda')->where('uuid', $uuid)->firstOrFail();

            $name = explode(".", $file->document_upload);

            $poldaName = $file->polda->name;

            $fileName = $poldaName." Report File ".indonesianStandart($file->submited_date);
            return response()->download(public_path('document-upload/polda/'.$file->document_upload), $fileName.".".$name[1]);
        } catch (\Exception $e) {
            logger($e);
            flash('Data gagal didownload. Silakan dicoba kembali atau hubungi admin jika masih bermasalah')->error();
            return redirect(route('phro_index'));
        }
    }

    public function data()
    {
        $model = PoldaSubmited::perpolda()->with('polda');

        return datatables()->eloquent($model)
        ->addColumn('polda_name', function (PoldaSubmited $ps) {
            return $ps->polda->name;
        })
        ->addColumn('editable', function (PoldaSubmited $ps) {
            if(indonesianStandart($ps->submited_date) == now()->format("d-m-Y")) {
                return true;
            } else {
                return false;
            }
        })
        ->toJson();
    }

    public function index()
    {
        return view('phro.index_polda');
    }

    public function create()
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('Tidak ada operasi yang sedang berjalan saat ini')->error();
            return redirect()->route('phro_index');
        }

        $customNameOperation = PoldaCustomOperationName::where('polda_id', poldaId())->where('rencana_operasi_id', operationPlans()->id)->first();

        if(empty($customNameOperation)) {
            flash('Anda belum membuat alias dari nama operasi <b>'.operationPlans()->name.'</b>')->error();
            return redirect()->route('phro_index');
        }

        $poldaId = UserHasPolda::where("user_id", myUserId())->first()->polda_id;

        $todayInsert = PoldaSubmited::where("polda_id", $poldaId)->where("submited_date", date("Y-m-d"))->first();

        if(!empty($todayInsert)) {
            flash('Maaf, anda sudah menginput laporan hari ini! Silakan gunakan menu ubah')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.create', compact('op'));
    }

    public function store(PHRORequest $request)
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('Tidak ada operasi yang sedang berjalan saat ini')->error();
            return redirect()->route('phro_index');
        }

        $todayInsert = PoldaSubmited::where("polda_id", poldaId())->where("submited_date", date("Y-m-d"))->first();

        if(!empty($todayInsert)) {
            flash('Maaf, Anda sudah menginput laporan hari ini! Silakan gunakan menu ubah')->error();
            return redirect()->route('phro_index');
        }

        DB::beginTransaction();

        try {

            if($request->hasFile('document_upload')) {
                $file = $request->file('document_upload');
                $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('document-upload/polda/');
                $file->move($destinationPath, $randomName);
                $data['document_upload'] = $randomName;
            } else {
                $data['document_upload'] = 'default.pdf';
            }

            $poldaSubmit = PoldaSubmited::create([
                'uuid' => genUuid(),
                'polda_id' => poldaId(),
                'rencana_operasi_id' => operationPlans()->id,
                'status' => "SUDAH MENGIRIMKAN LAPORAN PADA ".indonesianDateTime(date('Y-m-d H:i:s')),
                'nama_kesatuan' => upperCase($request->nama_kesatuan),
                'nama_atasan' => upperCase($request->nama_atasan),
                'pangkat_dan_nrp' => upperCase($request->pangkat_dan_nrp),
                'jabatan' => upperCase($request->jabatan),
                'nama_laporan' => upperCase($request->nama_laporan),
                'nama_kota' => upperCase($request->nama_kota),
                'document_upload' => $data['document_upload'],
                'submited_date' => date("Y-m-d")
            ]);

            $payload = $request->except(['_token', 'submit']);
            $payload["polda_submited_id"] = $poldaSubmit->id;
            $payload["polda_id"] = poldaId();
            $payload["rencana_operasi_id"] = operationPlans()->id;
            $payload["year"] = year();

            $payloadPrev = $request->except(['_token', 'submit']);
            $payloadPrev["polda_submited_id"] = $poldaSubmit->id;
            $payloadPrev["polda_id"] = poldaId();
            $payloadPrev["rencana_operasi_id"] = operationPlans()->id;
            $payloadPrev["year"] = yearMinus();

            DailyInput::create($payload);

            DailyInputPrev::create($payloadPrev);

            DB::commit();
            flash('Seluruh data berhasil dikirim ke pusat')->success();

            return redirect()->route('phro_index');
        } catch (\Exception $e) {
            DB::rollback();
            logger($e);
            flash('Data gagal dikirim. Silakan dicoba kembali atau hubungi admin jika masih gagal')->error();
            return redirect()->back();
        }
    }

    public function edit($uuid)
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('Tidak ada operasi yang sedang berjalan saat ini')->error();
            return redirect()->route('phro_index');
        }

        $data = PoldaSubmited::with('dailyInput', 'dailyInputPrev')->whereUuid($uuid)->firstOrFail();

        if(dateOnly($data->submited_date) != nowToday()) {
            flash('Anda tidak bisa mengubah data yang sudah melewati hari saat penginputan')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.edit', compact('data', 'uuid'));
    }

    public function update(PHRORequest $request, $uuid)
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('Tidak ada operasi yang sedang berjalan saat ini')->error();
            return redirect()->route('phro_index');
        }

        $poldaSubmited = PoldaSubmited::whereUuid($uuid)->firstOrFail();

        if(dateOnly($poldaSubmited->submited_date) != nowToday()) {
            flash('Anda tidak diijinkan mengubah data yang telah lewat hari penginputannya')->error();
            return redirect()->route('phro_index');
        }

        DB::beginTransaction();

        try {

            $payloadPrev = $request->only([
                'pelanggaran_lalu_lintas_tilang_p',
                'pelanggaran_lalu_lintas_teguran_p',
                'pelanggaran_sepeda_motor_kecepatan_p',
                'pelanggaran_sepeda_motor_helm_p',
                'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p',
                'pelanggaran_sepeda_motor_marka_menerus_menyalip_p',
                'pelanggaran_sepeda_motor_melawan_arus_p',
                'pelanggaran_sepeda_motor_melanggar_lampu_lalin_p',
                'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p',
                'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p',
                'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p',
                'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p',
                'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p',
                'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p',
                'pelanggaran_sepeda_motor_melanggar_marka_berhenti_p',
                'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p',
                'pelanggaran_sepeda_motor_surat_surat_p',
                'pelanggaran_sepeda_motor_kelengkapan_kendaraan_p',
                'pelanggaran_sepeda_motor_lain_lain_p',
                'pelanggaran_mobil_kecepatan_p',
                'pelanggaran_mobil_safety_belt_p',
                'pelanggaran_mobil_muatan_overload_p',
                'pelanggaran_mobil_marka_menerus_menyalip_p',
                'pelanggaran_mobil_melawan_arus_p',
                'pelanggaran_mobil_melanggar_lampu_lalin_p',
                'pelanggaran_mobil_mengemudi_tidak_wajar_p',
                'pelanggaran_mobil_syarat_teknis_layak_jalan_p',
                'pelanggaran_mobil_tidak_nyala_lampu_malam_p',
                'pelanggaran_mobil_berbelok_tanpa_isyarat_p',
                'pelanggaran_mobil_berbalapan_di_jalan_raya_p',
                'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p',
                'pelanggaran_mobil_melanggar_marka_berhenti_p',
                'pelanggaran_mobil_tidak_patuh_perintah_petugas_p',
                'pelanggaran_mobil_surat_surat_p',
                'pelanggaran_mobil_kelengkapan_kendaraan_p',
                'pelanggaran_mobil_lain_lain_p',
                'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p',
                'barang_bukti_yg_disita_sim_p',
                'barang_bukti_yg_disita_stnk_p',
                'barang_bukti_yg_disita_kendaraan_p',
                'kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p',
                'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p',
                'kendaraan_yang_terlibat_pelanggaran_mobil_bus_p',
                'kendaraan_yang_terlibat_pelanggaran_mobil_barang_p',
                'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p',
                'profesi_pelaku_pelanggaran_pns_p',
                'profesi_pelaku_pelanggaran_karyawan_swasta_p',
                'profesi_pelaku_pelanggaran_pelajar_mahasiswa_p',
                'profesi_pelaku_pelanggaran_pengemudi_supir_p',
                'profesi_pelaku_pelanggaran_tni_p',
                'profesi_pelaku_pelanggaran_polri_p',
                'profesi_pelaku_pelanggaran_lain_lain_p',
                'usia_pelaku_pelanggaran_kurang_dari_15_tahun_p',
                'usia_pelaku_pelanggaran_16_20_tahun_p',
                'usia_pelaku_pelanggaran_21_25_tahun_p',
                'usia_pelaku_pelanggaran_26_30_tahun_p',
                'usia_pelaku_pelanggaran_31_35_tahun_p',
                'usia_pelaku_pelanggaran_36_40_tahun_p',
                'usia_pelaku_pelanggaran_41_45_tahun_p',
                'usia_pelaku_pelanggaran_46_50_tahun_p',
                'usia_pelaku_pelanggaran_51_55_tahun_p',
                'usia_pelaku_pelanggaran_56_60_tahun_p',
                'usia_pelaku_pelanggaran_diatas_60_tahun_p',
                'sim_pelaku_pelanggaran_sim_a_p',
                'sim_pelaku_pelanggaran_sim_a_umum_p',
                'sim_pelaku_pelanggaran_sim_b1_p',
                'sim_pelaku_pelanggaran_sim_b1_umum_p',
                'sim_pelaku_pelanggaran_sim_b2_p',
                'sim_pelaku_pelanggaran_sim_b2_umum_p',
                'sim_pelaku_pelanggaran_sim_c_p',
                'sim_pelaku_pelanggaran_sim_d_p',
                'sim_pelaku_pelanggaran_sim_internasional_p',
                'sim_pelaku_pelanggaran_tanpa_sim_p',
                'lokasi_pelanggaran_pemukiman_p',
                'lokasi_pelanggaran_perbelanjaan_p',
                'lokasi_pelanggaran_perkantoran_p',
                'lokasi_pelanggaran_wisata_p',
                'lokasi_pelanggaran_industri_p',
                'lokasi_pelanggaran_status_jalan_nasional_p',
                'lokasi_pelanggaran_status_jalan_propinsi_p',
                'lokasi_pelanggaran_status_jalan_kab_kota_p',
                'lokasi_pelanggaran_status_jalan_desa_lingkungan_p',
                'lokasi_pelanggaran_fungsi_jalan_arteri_p',
                'lokasi_pelanggaran_fungsi_jalan_kolektor_p',
                'lokasi_pelanggaran_fungsi_jalan_lokal_p',
                'lokasi_pelanggaran_fungsi_jalan_lingkungan_p',
                'kecelakaan_lalin_jumlah_kejadian_p',
                'kecelakaan_lalin_jumlah_korban_meninggal_p',
                'kecelakaan_lalin_jumlah_korban_luka_berat_p',
                'kecelakaan_lalin_jumlah_korban_luka_ringan_p',
                'kecelakaan_lalin_jumlah_kerugian_materiil_p',
                'kecelakaan_barang_bukti_yg_disita_sim_p',
                'kecelakaan_barang_bukti_yg_disita_stnk_p',
                'kecelakaan_barang_bukti_yg_disita_kendaraan_p',
                'profesi_korban_kecelakaan_lalin_pns_p',
                'profesi_korban_kecelakaan_lalin_karwayan_swasta_p',
                'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p',
                'profesi_korban_kecelakaan_lalin_pengemudi_p',
                'profesi_korban_kecelakaan_lalin_tni_p',
                'profesi_korban_kecelakaan_lalin_polri_p',
                'profesi_korban_kecelakaan_lalin_lain_lain_p',
                'usia_korban_kecelakaan_kurang_15_p',
                'usia_korban_kecelakaan_16_20_p',
                'usia_korban_kecelakaan_21_25_p',
                'usia_korban_kecelakaan_26_30_p',
                'usia_korban_kecelakaan_31_35_p',
                'usia_korban_kecelakaan_36_40_p',
                'usia_korban_kecelakaan_41_45_p',
                'usia_korban_kecelakaan_45_50_p',
                'usia_korban_kecelakaan_51_55_p',
                'usia_korban_kecelakaan_56_60_p',
                'usia_korban_kecelakaan_diatas_60_p',
                'sim_korban_kecelakaan_sim_a_p',
                'sim_korban_kecelakaan_sim_a_umum_p',
                'sim_korban_kecelakaan_sim_b1_p',
                'sim_korban_kecelakaan_sim_b1_umum_p',
                'sim_korban_kecelakaan_sim_b2_p',
                'sim_korban_kecelakaan_sim_b2_umum_p',
                'sim_korban_kecelakaan_sim_c_p',
                'sim_korban_kecelakaan_sim_d_p',
                'sim_korban_kecelakaan_sim_internasional_p',
                'sim_korban_kecelakaan_tanpa_sim_p',
                'kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p',
                'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p',
                'kendaraan_yg_terlibat_kecelakaan_mobil_bus_p',
                'kendaraan_yg_terlibat_kecelakaan_mobil_barang_p',
                'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p',
                'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p',
                'jenis_kecelakaan_tunggal_ooc_p',
                'jenis_kecelakaan_depan_depan_p',
                'jenis_kecelakaan_depan_belakang_p',
                'jenis_kecelakaan_depan_samping_p',
                'jenis_kecelakaan_beruntun_p',
                'jenis_kecelakaan_pejalan_kaki_p',
                'jenis_kecelakaan_tabrak_lari_p',
                'jenis_kecelakaan_tabrak_hewan_p',
                'jenis_kecelakaan_samping_samping_p',
                'jenis_kecelakaan_lainnya_p',
                'profesi_pelaku_kecelakaan_lalin_pns_p',
                'profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p',
                'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p',
                'profesi_pelaku_kecelakaan_lalin_pengemudi_p',
                'profesi_pelaku_kecelakaan_lalin_tni_p',
                'profesi_pelaku_kecelakaan_lalin_polri_p',
                'profesi_pelaku_kecelakaan_lalin_lain_lain_p',
                'usia_pelaku_kecelakaan_kurang_dari_15_tahun_p',
                'usia_pelaku_kecelakaan_16_20_tahun_p',
                'usia_pelaku_kecelakaan_21_25_tahun_p',
                'usia_pelaku_kecelakaan_26_30_tahun_p',
                'usia_pelaku_kecelakaan_31_35_tahun_p',
                'usia_pelaku_kecelakaan_36_40_tahun_p',
                'usia_pelaku_kecelakaan_41_45_tahun_p',
                'usia_pelaku_kecelakaan_46_50_tahun_p',
                'usia_pelaku_kecelakaan_51_55_tahun_p',
                'usia_pelaku_kecelakaan_56_60_tahun_p',
                'usia_pelaku_kecelakaan_diatas_60_tahun_p',
                'sim_pelaku_kecelakaan_sim_a_p',
                'sim_pelaku_kecelakaan_sim_a_umum_p',
                'sim_pelaku_kecelakaan_sim_b1_p',
                'sim_pelaku_kecelakaan_sim_b1_umum_p',
                'sim_pelaku_kecelakaan_sim_b2_p',
                'sim_pelaku_kecelakaan_sim_b2_umum_p',
                'sim_pelaku_kecelakaan_sim_c_p',
                'sim_pelaku_kecelakaan_sim_d_p',
                'sim_pelaku_kecelakaan_sim_internasional_p',
                'sim_pelaku_kecelakaan_tanpa_sim_p',
                'lokasi_kecelakaan_lalin_pemukiman_p',
                'lokasi_kecelakaan_lalin_perbelanjaan_p',
                'lokasi_kecelakaan_lalin_perkantoran_p',
                'lokasi_kecelakaan_lalin_wisata_p',
                'lokasi_kecelakaan_lalin_industri_p',
                'lokasi_kecelakaan_lalin_lain_lain_p',
                'lokasi_kecelakaan_status_jalan_nasional_p',
                'lokasi_kecelakaan_status_jalan_propinsi_p',
                'lokasi_kecelakaan_status_jalan_kab_kota_p',
                'lokasi_kecelakaan_status_jalan_desa_lingkungan_p',
                'lokasi_kecelakaan_fungsi_jalan_arteri_p',
                'lokasi_kecelakaan_fungsi_jalan_kolektor_p',
                'lokasi_kecelakaan_fungsi_jalan_lokal_p',
                'lokasi_kecelakaan_fungsi_jalan_lingkungan_p',
                'faktor_penyebab_kecelakaan_ngantuk_lelah_p',
                'faktor_penyebab_kecelakaan_mabuk_obat_p',
                'faktor_penyebab_kecelakaan_sakit_p',
                'faktor_penyebab_kecelakaan_handphone_elektronik_p',
                'faktor_penyebab_kecelakaan_menerobos_lampu_merah_p',
                'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p',
                'faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p',
                'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p',
                'faktor_penyebab_kecelakaan_berpindah_jalur_p',
                'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p',
                'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p',
                'faktor_penyebab_kecelakaan_lainnya_p',
                'faktor_penyebab_kecelakaan_alam_p',
                'faktor_penyebab_kecelakaan_kelaikan_kendaraan_p',
                'faktor_penyebab_kecelakaan_kondisi_jalan_p',
                'faktor_penyebab_kecelakaan_rambu_p',
                'faktor_penyebab_kecelakaan_marka_p',
                'faktor_penyebab_kecelakaan_apil_p',
                'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p',
                'waktu_kejadian_kecelakaan_00_03_p',
                'waktu_kejadian_kecelakaan_03_06_p',
                'waktu_kejadian_kecelakaan_06_09_p',
                'waktu_kejadian_kecelakaan_09_12_p',
                'waktu_kejadian_kecelakaan_12_15_p',
                'waktu_kejadian_kecelakaan_15_18_p',
                'waktu_kejadian_kecelakaan_18_21_p',
                'waktu_kejadian_kecelakaan_21_24_p',
                'kecelakaan_lalin_menonjol_jumlah_kejadian_p',
                'kecelakaan_lalin_menonjol_korban_meninggal_p',
                'kecelakaan_lalin_menonjol_korban_luka_berat_p',
                'kecelakaan_lalin_menonjol_korban_luka_ringan_p',
                'kecelakaan_lalin_menonjol_materiil_p',
                'kecelakaan_lalin_tunggal_jumlah_kejadian_p',
                'kecelakaan_lalin_tunggal_korban_meninggal_p',
                'kecelakaan_lalin_tunggal_korban_luka_berat_p',
                'kecelakaan_lalin_tunggal_korban_luka_ringan_p',
                'kecelakaan_lalin_tunggal_materiil_p',
                'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p',
                'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p',
                'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p',
                'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p',
                'kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p',
                'kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p',
                'kecelakaan_lalin_tabrak_lari_korban_meninggal_p',
                'kecelakaan_lalin_tabrak_lari_korban_luka_berat_p',
                'kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p',
                'kecelakaan_lalin_tabrak_lari_materiil_p',
                'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p',
                'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p',
                'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p',
                'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p',
                'kecelakaan_lalin_tabrak_sepeda_motor_materiil_p',
                'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p',
                'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p',
                'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p',
                'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p',
                'kecelakaan_lalin_tabrak_roda_empat_materiil_p',
                'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p',
                'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p',
                'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p',
                'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p',
                'kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p',
                'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p',
                'kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p',
                'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p',
                'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p',
                'kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p',
                'kecelakaan_lalin_perlintasan_ka_korban_meninggal_p',
                'kecelakaan_lalin_perlintasan_ka_materiil_p',
                'kecelakaan_transportasi_kereta_api_p',
                'kecelakaan_transportasi_laut_perairan_p',
                'kecelakaan_transportasi_udara_p',
                'penlu_melalui_media_cetak_p',
                'penlu_melalui_media_elektronik_p',
                'penlu_melalui_tempat_keramaian_p',
                'penlu_melalui_tempat_istirahat_p',
                'penlu_melalui_daerah_rawan_laka_dan_langgar_p',
                'penyebaran_pemasangan_spanduk_p',
                'penyebaran_pemasangan_leaflet_p',
                'penyebaran_pemasangan_sticker_p',
                'penyebaran_pemasangan_bilboard_p',
                'polisi_sahabat_anak_p',
                'cara_aman_sekolah_p',
                'patroli_keamanan_sekolah_p',
                'pramuka_bhayangkara_krida_lalu_lintas_p',
                'police_goes_to_campus_p',
                'safety_riding_driving_p',
                'forum_lalu_lintas_angkutan_umum_p',
                'kampanye_keselamatan_p',
                'sekolah_mengemudi_p',
                'taman_lalu_lintas_p',
                'global_road_safety_partnership_action_p',
                'giat_lantas_pengaturan_p',
                'giat_lantas_penjagaan_p',
                'giat_lantas_pengawalan_p',
                'giat_lantas_patroli_p',
                'faktor_penyebab_kecelakaan_manusia_p',
                'faktor_penyebab_kecelakaan_prasarana_jalan_p',
                'arus_mudik_jumlah_bus_keberangkatan_p',
                'arus_mudik_jumlah_penumpang_keberangkatan_p',
                'arus_mudik_jumlah_bus_kedatangan_p',
                'arus_mudik_jumlah_penumpang_kedatangan_p',
                'arus_mudik_total_terminal_p',
                'arus_mudik_total_bus_keberangkatan_p',
                'arus_mudik_penumpang_keberangkatan_p',
                'arus_mudik_total_bus_kedatangan_p',
                'arus_mudik_penumpang_kedatangan_p',
                'arus_mudik_kereta_api_total_stasiun_p',
                'arus_mudik_kereta_api_total_penumpang_keberangkatan_p',
                'arus_mudik_kereta_api_total_penumpang_kedatangan_p',
                'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p',
                'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p',
                'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p',
                'arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p',
                'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p',
                'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p',
                'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p',
                'arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p',
                'arus_mudik_total_pelabuhan_p',
                'arus_mudik_pelabuhan_kendaraan_keberangkatan_p',
                'arus_mudik_pelabuhan_kendaraan_kedatangan_p',
                'arus_mudik_pelabuhan_total_penumpang_keberangkatan_p',
                'arus_mudik_pelabuhan_total_penumpang_kedatangan_p',
                'arus_mudik_bandara_jumlah_penumpang_keberangkatan_p',
                'arus_mudik_bandara_jumlah_penumpang_kedatangan_p',
                'arus_mudik_total_bandara_p',
                'arus_mudik_bandara_total_penumpang_keberangkatan_p',
                'arus_mudik_bandara_total_penumpang_kedatangan_p',
                'prokes_covid_teguran_gar_prokes_p',
                'prokes_covid_pembagian_masker_p',
                'prokes_covid_sosialisasi_tentang_prokes_p',
                'prokes_covid_giat_baksos_p',
            ]);

            $payload = $request->only([
                'pelanggaran_lalu_lintas_tilang',
                'pelanggaran_lalu_lintas_teguran',
                'pelanggaran_sepeda_motor_kecepatan',
                'pelanggaran_sepeda_motor_helm',
                'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu',
                'pelanggaran_sepeda_motor_marka_menerus_menyalip',
                'pelanggaran_sepeda_motor_melawan_arus',
                'pelanggaran_sepeda_motor_melanggar_lampu_lalin',
                'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar',
                'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan',
                'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam',
                'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat',
                'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya',
                'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir',
                'pelanggaran_sepeda_motor_melanggar_marka_berhenti',
                'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas',
                'pelanggaran_sepeda_motor_surat_surat',
                'pelanggaran_sepeda_motor_kelengkapan_kendaraan',
                'pelanggaran_sepeda_motor_lain_lain',
                'pelanggaran_mobil_kecepatan',
                'pelanggaran_mobil_safety_belt',
                'pelanggaran_mobil_muatan_overload',
                'pelanggaran_mobil_marka_menerus_menyalip',
                'pelanggaran_mobil_melawan_arus',
                'pelanggaran_mobil_melanggar_lampu_lalin',
                'pelanggaran_mobil_mengemudi_tidak_wajar',
                'pelanggaran_mobil_syarat_teknis_layak_jalan',
                'pelanggaran_mobil_tidak_nyala_lampu_malam',
                'pelanggaran_mobil_berbelok_tanpa_isyarat',
                'pelanggaran_mobil_berbalapan_di_jalan_raya',
                'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir',
                'pelanggaran_mobil_melanggar_marka_berhenti',
                'pelanggaran_mobil_tidak_patuh_perintah_petugas',
                'pelanggaran_mobil_surat_surat',
                'pelanggaran_mobil_kelengkapan_kendaraan',
                'pelanggaran_mobil_lain_lain',
                'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat',
                'barang_bukti_yg_disita_sim',
                'barang_bukti_yg_disita_stnk',
                'barang_bukti_yg_disita_kendaraan',
                'kendaraan_yang_terlibat_pelanggaran_sepeda_motor',
                'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang',
                'kendaraan_yang_terlibat_pelanggaran_mobil_bus',
                'kendaraan_yang_terlibat_pelanggaran_mobil_barang',
                'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus',
                'profesi_pelaku_pelanggaran_pns',
                'profesi_pelaku_pelanggaran_karyawan_swasta',
                'profesi_pelaku_pelanggaran_pelajar_mahasiswa',
                'profesi_pelaku_pelanggaran_pengemudi_supir',
                'profesi_pelaku_pelanggaran_tni',
                'profesi_pelaku_pelanggaran_polri',
                'profesi_pelaku_pelanggaran_lain_lain',
                'usia_pelaku_pelanggaran_kurang_dari_15_tahun',
                'usia_pelaku_pelanggaran_16_20_tahun',
                'usia_pelaku_pelanggaran_21_25_tahun',
                'usia_pelaku_pelanggaran_26_30_tahun',
                'usia_pelaku_pelanggaran_31_35_tahun',
                'usia_pelaku_pelanggaran_36_40_tahun',
                'usia_pelaku_pelanggaran_41_45_tahun',
                'usia_pelaku_pelanggaran_46_50_tahun',
                'usia_pelaku_pelanggaran_51_55_tahun',
                'usia_pelaku_pelanggaran_56_60_tahun',
                'usia_pelaku_pelanggaran_diatas_60_tahun',
                'sim_pelaku_pelanggaran_sim_a',
                'sim_pelaku_pelanggaran_sim_a_umum',
                'sim_pelaku_pelanggaran_sim_b1',
                'sim_pelaku_pelanggaran_sim_b1_umum',
                'sim_pelaku_pelanggaran_sim_b2',
                'sim_pelaku_pelanggaran_sim_b2_umum',
                'sim_pelaku_pelanggaran_sim_c',
                'sim_pelaku_pelanggaran_sim_d',
                'sim_pelaku_pelanggaran_sim_internasional',
                'sim_pelaku_pelanggaran_tanpa_sim',
                'lokasi_pelanggaran_pemukiman',
                'lokasi_pelanggaran_perbelanjaan',
                'lokasi_pelanggaran_perkantoran',
                'lokasi_pelanggaran_wisata',
                'lokasi_pelanggaran_industri',
                'lokasi_pelanggaran_status_jalan_nasional',
                'lokasi_pelanggaran_status_jalan_propinsi',
                'lokasi_pelanggaran_status_jalan_kab_kota',
                'lokasi_pelanggaran_status_jalan_desa_lingkungan',
                'lokasi_pelanggaran_fungsi_jalan_arteri',
                'lokasi_pelanggaran_fungsi_jalan_kolektor',
                'lokasi_pelanggaran_fungsi_jalan_lokal',
                'lokasi_pelanggaran_fungsi_jalan_lingkungan',
                'kecelakaan_lalin_jumlah_kejadian',
                'kecelakaan_lalin_jumlah_korban_meninggal',
                'kecelakaan_lalin_jumlah_korban_luka_berat',
                'kecelakaan_lalin_jumlah_korban_luka_ringan',
                'kecelakaan_lalin_jumlah_kerugian_materiil',
                'kecelakaan_barang_bukti_yg_disita_sim',
                'kecelakaan_barang_bukti_yg_disita_stnk',
                'kecelakaan_barang_bukti_yg_disita_kendaraan',
                'profesi_korban_kecelakaan_lalin_pns',
                'profesi_korban_kecelakaan_lalin_karwayan_swasta',
                'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa',
                'profesi_korban_kecelakaan_lalin_pengemudi',
                'profesi_korban_kecelakaan_lalin_tni',
                'profesi_korban_kecelakaan_lalin_polri',
                'profesi_korban_kecelakaan_lalin_lain_lain',
                'usia_korban_kecelakaan_kurang_15',
                'usia_korban_kecelakaan_16_20',
                'usia_korban_kecelakaan_21_25',
                'usia_korban_kecelakaan_26_30',
                'usia_korban_kecelakaan_31_35',
                'usia_korban_kecelakaan_36_40',
                'usia_korban_kecelakaan_41_45',
                'usia_korban_kecelakaan_45_50',
                'usia_korban_kecelakaan_51_55',
                'usia_korban_kecelakaan_56_60',
                'usia_korban_kecelakaan_diatas_60',
                'sim_korban_kecelakaan_sim_a',
                'sim_korban_kecelakaan_sim_a_umum',
                'sim_korban_kecelakaan_sim_b1',
                'sim_korban_kecelakaan_sim_b1_umum',
                'sim_korban_kecelakaan_sim_b2',
                'sim_korban_kecelakaan_sim_b2_umum',
                'sim_korban_kecelakaan_sim_c',
                'sim_korban_kecelakaan_sim_d',
                'sim_korban_kecelakaan_sim_internasional',
                'sim_korban_kecelakaan_tanpa_sim',
                'kendaraan_yg_terlibat_kecelakaan_sepeda_motor',
                'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang',
                'kendaraan_yg_terlibat_kecelakaan_mobil_bus',
                'kendaraan_yg_terlibat_kecelakaan_mobil_barang',
                'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus',
                'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor',
                'jenis_kecelakaan_tunggal_ooc',
                'jenis_kecelakaan_depan_depan',
                'jenis_kecelakaan_depan_belakang',
                'jenis_kecelakaan_depan_samping',
                'jenis_kecelakaan_beruntun',
                'jenis_kecelakaan_pejalan_kaki',
                'jenis_kecelakaan_tabrak_lari',
                'jenis_kecelakaan_tabrak_hewan',
                'jenis_kecelakaan_samping_samping',
                'jenis_kecelakaan_lainnya',
                'profesi_pelaku_kecelakaan_lalin_pns',
                'profesi_pelaku_kecelakaan_lalin_karyawan_swasta',
                'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar',
                'profesi_pelaku_kecelakaan_lalin_pengemudi',
                'profesi_pelaku_kecelakaan_lalin_tni',
                'profesi_pelaku_kecelakaan_lalin_polri',
                'profesi_pelaku_kecelakaan_lalin_lain_lain',
                'usia_pelaku_kecelakaan_kurang_dari_15_tahun',
                'usia_pelaku_kecelakaan_16_20_tahun',
                'usia_pelaku_kecelakaan_21_25_tahun',
                'usia_pelaku_kecelakaan_26_30_tahun',
                'usia_pelaku_kecelakaan_31_35_tahun',
                'usia_pelaku_kecelakaan_36_40_tahun',
                'usia_pelaku_kecelakaan_41_45_tahun',
                'usia_pelaku_kecelakaan_46_50_tahun',
                'usia_pelaku_kecelakaan_51_55_tahun',
                'usia_pelaku_kecelakaan_56_60_tahun',
                'usia_pelaku_kecelakaan_diatas_60_tahun',
                'sim_pelaku_kecelakaan_sim_a',
                'sim_pelaku_kecelakaan_sim_a_umum',
                'sim_pelaku_kecelakaan_sim_b1',
                'sim_pelaku_kecelakaan_sim_b1_umum',
                'sim_pelaku_kecelakaan_sim_b2',
                'sim_pelaku_kecelakaan_sim_b2_umum',
                'sim_pelaku_kecelakaan_sim_c',
                'sim_pelaku_kecelakaan_sim_d',
                'sim_pelaku_kecelakaan_sim_internasional',
                'sim_pelaku_kecelakaan_tanpa_sim',
                'lokasi_kecelakaan_lalin_pemukiman',
                'lokasi_kecelakaan_lalin_perbelanjaan',
                'lokasi_kecelakaan_lalin_perkantoran',
                'lokasi_kecelakaan_lalin_wisata',
                'lokasi_kecelakaan_lalin_industri',
                'lokasi_kecelakaan_lalin_lain_lain',
                'lokasi_kecelakaan_status_jalan_nasional',
                'lokasi_kecelakaan_status_jalan_propinsi',
                'lokasi_kecelakaan_status_jalan_kab_kota',
                'lokasi_kecelakaan_status_jalan_desa_lingkungan',
                'lokasi_kecelakaan_fungsi_jalan_arteri',
                'lokasi_kecelakaan_fungsi_jalan_kolektor',
                'lokasi_kecelakaan_fungsi_jalan_lokal',
                'lokasi_kecelakaan_fungsi_jalan_lingkungan',
                'faktor_penyebab_kecelakaan_ngantuk_lelah',
                'faktor_penyebab_kecelakaan_mabuk_obat',
                'faktor_penyebab_kecelakaan_sakit',
                'faktor_penyebab_kecelakaan_handphone_elektronik',
                'faktor_penyebab_kecelakaan_menerobos_lampu_merah',
                'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan',
                'faktor_penyebab_kecelakaan_tidak_menjaga_jarak',
                'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur',
                'faktor_penyebab_kecelakaan_berpindah_jalur',
                'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat',
                'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki',
                'faktor_penyebab_kecelakaan_lainnya',
                'faktor_penyebab_kecelakaan_alam',
                'faktor_penyebab_kecelakaan_kelaikan_kendaraan',
                'faktor_penyebab_kecelakaan_kondisi_jalan',
                'faktor_penyebab_kecelakaan_rambu',
                'faktor_penyebab_kecelakaan_marka',
                'faktor_penyebab_kecelakaan_apil',
                'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu',
                'waktu_kejadian_kecelakaan_00_03',
                'waktu_kejadian_kecelakaan_03_06',
                'waktu_kejadian_kecelakaan_06_09',
                'waktu_kejadian_kecelakaan_09_12',
                'waktu_kejadian_kecelakaan_12_15',
                'waktu_kejadian_kecelakaan_15_18',
                'waktu_kejadian_kecelakaan_18_21',
                'waktu_kejadian_kecelakaan_21_24',
                'kecelakaan_lalin_menonjol_jumlah_kejadian',
                'kecelakaan_lalin_menonjol_korban_meninggal',
                'kecelakaan_lalin_menonjol_korban_luka_berat',
                'kecelakaan_lalin_menonjol_korban_luka_ringan',
                'kecelakaan_lalin_menonjol_materiil',
                'kecelakaan_lalin_tunggal_jumlah_kejadian',
                'kecelakaan_lalin_tunggal_korban_meninggal',
                'kecelakaan_lalin_tunggal_korban_luka_berat',
                'kecelakaan_lalin_tunggal_korban_luka_ringan',
                'kecelakaan_lalin_tunggal_materiil',
                'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian',
                'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal',
                'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat',
                'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan',
                'kecelakaan_lalin_tabrak_pejalan_kaki_materiil',
                'kecelakaan_lalin_tabrak_lari_jumlah_kejadian',
                'kecelakaan_lalin_tabrak_lari_korban_meninggal',
                'kecelakaan_lalin_tabrak_lari_korban_luka_berat',
                'kecelakaan_lalin_tabrak_lari_korban_luka_ringan',
                'kecelakaan_lalin_tabrak_lari_materiil',
                'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian',
                'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal',
                'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat',
                'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan',
                'kecelakaan_lalin_tabrak_sepeda_motor_materiil',
                'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian',
                'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal',
                'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat',
                'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan',
                'kecelakaan_lalin_tabrak_roda_empat_materiil',
                'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian',
                'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal',
                'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat',
                'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan',
                'kecelakaan_lalin_tabrak_tidak_bermotor_materiil',
                'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian',
                'kecelakaan_lalin_perlintasan_ka_berpalang_pintu',
                'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu',
                'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan',
                'kecelakaan_lalin_perlintasan_ka_korban_luka_berat',
                'kecelakaan_lalin_perlintasan_ka_korban_meninggal',
                'kecelakaan_lalin_perlintasan_ka_materiil',
                'kecelakaan_transportasi_kereta_api',
                'kecelakaan_transportasi_laut_perairan',
                'kecelakaan_transportasi_udara',
                'penlu_melalui_media_cetak',
                'penlu_melalui_media_elektronik',
                'penlu_melalui_media_sosial',
                'penlu_melalui_tempat_keramaian',
                'penlu_melalui_tempat_istirahat',
                'penlu_melalui_daerah_rawan_laka_dan_langgar',
                'penyebaran_pemasangan_spanduk',
                'penyebaran_pemasangan_leaflet',
                'penyebaran_pemasangan_sticker',
                'penyebaran_pemasangan_bilboard',
                'polisi_sahabat_anak',
                'cara_aman_sekolah',
                'patroli_keamanan_sekolah',
                'pramuka_bhayangkara_krida_lalu_lintas',
                'police_goes_to_campus',
                'safety_riding_driving',
                'forum_lalu_lintas_angkutan_umum',
                'kampanye_keselamatan',
                'sekolah_mengemudi',
                'taman_lalu_lintas',
                'global_road_safety_partnership_action',
                'giat_lantas_pengaturan',
                'giat_lantas_penjagaan',
                'giat_lantas_pengawalan',
                'giat_lantas_patroli',
                'faktor_penyebab_kecelakaan_manusia',
                'faktor_penyebab_kecelakaan_prasarana_jalan',
                'arus_mudik_jumlah_bus_keberangkatan',
                'arus_mudik_jumlah_penumpang_keberangkatan',
                'arus_mudik_jumlah_bus_kedatangan',
                'arus_mudik_jumlah_penumpang_kedatangan',
                'arus_mudik_total_terminal',
                'arus_mudik_total_bus_keberangkatan',
                'arus_mudik_penumpang_keberangkatan',
                'arus_mudik_total_bus_kedatangan',
                'arus_mudik_penumpang_kedatangan',
                'arus_mudik_kereta_api_total_stasiun',
                'arus_mudik_kereta_api_total_penumpang_keberangkatan',
                'arus_mudik_kereta_api_total_penumpang_kedatangan',
                'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan',
                'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4',
                'arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2',
                'arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan',
                'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan',
                'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4',
                'arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2',
                'arus_mudik_pelabuhan_jumlah_penumpang_kedatangan',
                'arus_mudik_total_pelabuhan',
                'arus_mudik_pelabuhan_kendaraan_keberangkatan',
                'arus_mudik_pelabuhan_kendaraan_kedatangan',
                'arus_mudik_pelabuhan_total_penumpang_keberangkatan',
                'arus_mudik_pelabuhan_total_penumpang_kedatangan',
                'arus_mudik_bandara_jumlah_penumpang_keberangkatan',
                'arus_mudik_bandara_jumlah_penumpang_kedatangan',
                'arus_mudik_total_bandara',
                'arus_mudik_bandara_total_penumpang_keberangkatan',
                'arus_mudik_bandara_total_penumpang_kedatangan',
                'prokes_covid_teguran_gar_prokes',
                'prokes_covid_pembagian_masker',
                'prokes_covid_sosialisasi_tentang_prokes',
                'prokes_covid_giat_baksos',
            ]);

            DailyInput::where("polda_submited_id", $poldaSubmited->id)
                ->where(DB::raw('DATE(created_at)'), $poldaSubmited->submited_date)
                ->update($payload);

            DailyInputPrev::where("polda_submited_id", $poldaSubmited->id)
                ->where(DB::raw('DATE(created_at)'), $poldaSubmited->submited_date)
                ->update($payloadPrev);

            $dataPoldaSubmited = [
                'nama_kesatuan' => upperCase($request->nama_kesatuan),
                'nama_atasan' => upperCase($request->nama_atasan),
                'pangkat_dan_nrp' => upperCase($request->pangkat_dan_nrp),
                'jabatan' => upperCase($request->jabatan),
                'nama_laporan' => upperCase($request->nama_laporan),
                'nama_kota' => upperCase($request->nama_kota),
            ];

            if($request->hasFile('document_upload')) {
                $file = $request->file('document_upload');
                $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('document-upload/polda/');
                $file->move($destinationPath, $randomName);
                $dataPoldaSubmited['document_upload'] = $randomName;
            }

            $poldaSubmited->update($dataPoldaSubmited);

            DB::commit();
            flash('Seluruh data berhasil diupdate')->success();

            return redirect()->route('phro_index');
        } catch (\Exception $e) {
            DB::rollback();
            logger($e);
            flash('Data gagal diupdate. Silakan dicoba kembali atau hubungi admin jika masih gagal')->error();
            return redirect()->back();
        }
    }

    public function preview(Request $request, $uuid)
    {
        $poldaSubmited = PoldaSubmited::whereUuid($uuid)->firstOrFail();
        $daily = DailyInput::select('year')->where("polda_submited_id", $poldaSubmited->id)->first();
        $dailyPrev = DailyInputPrev::select('year')->where("polda_submited_id", $poldaSubmited->id)->first();
        $prevYear = $daily->year - 1;

        $prev = reportDailyPrev($poldaSubmited->polda_id, $prevYear, $poldaSubmited->rencana_operasi_id, null, $poldaSubmited->submited_date, $poldaSubmited->submited_date);
        $current = reportDailyCurrent($poldaSubmited->polda_id, $daily->year, $poldaSubmited->rencana_operasi_id, null, $poldaSubmited->submited_date, $poldaSubmited->submited_date);

        return excelTemplateDisplay(
            $prev,
            $current,
            yearMinus(),
            year()
        );
    }

    public function previewPhroDashboard(Request $request, $uuid)
    {
        $polda = Polda::whereUuid($uuid)->firstOrFail();

        $poldaSubmited = PoldaSubmited::where("polda_id", $polda->id)->where('submited_date', nowToday())->firstOrFail();

        $prev = reportDailyPrev($polda->id, yearMinus(), $poldaSubmited->rencana_operasi_id, null, nowToday(), nowToday());
        $current = reportDailyCurrent($polda->id, year(), $poldaSubmited->rencana_operasi_id, null, nowToday(), nowToday());

        return excelTemplateDisplay(
            $prev,
            $current,
            yearMinus(),
            year()
        );
    }

    public function download($uuid)
    {
        $polda = Polda::whereUuid($uuid)->first();

        $now = now()->format("Y-m-d");

        if(empty($polda)) {
            flash('Data Polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        $poldaSubmited = PoldaSubmited::where('polda_id', $polda->id)->where('submited_date', date('Y-m-d'))->first();

        if(empty($poldaSubmited)) {
            flash('Data inputan polda tidak ditemukan. Silakan refresh halaman dan coba lagi')->error();
            return redirect()->back();
        }

        $polda_id = $poldaSubmited->polda_id;
        $rencana_operasi_id = $poldaSubmited->rencana_operasi_id;
        $submited_date = $poldaSubmited->submited_date;

        $filename = 'daily-report-'.$polda->short_name.'-'.$now.'.xlsx';

        $prev = reportDailyPrev($polda_id, nowYearMinusOne(), $rencana_operasi_id, 'custom', $now, $now);
        $current = reportDailyCurrent($polda_id, nowYear(), $rencana_operasi_id, 'custom', $now, $now);

        excelTemplate(
            'per_polda',
            $prev,
            $current,
            'KESATUAN : '.$poldaSubmited->nama_kesatuan,
            $poldaSubmited->nama_kota.", ".indonesianDate(date("Y-m-d")),
            'NAMA : '.$poldaSubmited->nama_atasan,
            $poldaSubmited->pangkat_dan_nrp,
            $poldaSubmited->jabatan,
            $poldaSubmited->nama_laporan
        );
    }
}
