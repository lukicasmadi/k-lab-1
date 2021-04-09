<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\DailyInput;
use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Models\DailyInputPrev;
use App\Http\Requests\PHRORequest;
use Illuminate\Support\Facades\DB;
use App\Exports\PoldaSubmitedExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PoldaHasRencanaOperasiController extends Controller
{

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
            flash('Tidak ada operasi yang sedang berjalan')->error();
            return redirect()->route('phro_index');
        }

        $poldaId = UserHasPolda::where("user_id", myUserId())->first()->polda_id;

        $todayInsert = PoldaSubmited::where("polda_id", $poldaId)->where("submited_date", date("Y-m-d"))->first();

        if(!empty($todayInsert)) {
            flash('Maaf, anda sudah menginput laporan hari ini! Silahkan gunakan menu edit')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.create', compact('op'));
    }

    public function store(PHRORequest $request)
    {
        DB::beginTransaction();

        try {

            $poldaSubmit = PoldaSubmited::create([
                'uuid' => genUuid(),
                'polda_id' => poldaId(),
                'rencana_operasi_id' => operationPlans()->id,
                'status' => "SUDAH MENGIRIMKAN LAPORAN",
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
            flash('Data gagal dikirim. Silahkan dicoba kembali atau hubungi admin jika masih gagal')->error();
            return redirect()->back();
        }
    }

    public function edit($uuid)
    {
        $data = PoldaSubmited::with('dailyInput', 'dailyInputPrev')->whereUuid($uuid)->firstOrFail();

        return view('phro.edit', compact('data', 'uuid'));
    }

    public function update(PHRORequest $request, $uuid)
    {
        DB::beginTransaction();

        try {

            $payload = $request->except([
                '_token',
                'submit',
                '_method',
                'pelanggaran_lalu_lintas_tilang_p',
                'pelanggaran_lalu_lintas_teguran_p',
                'pelanggaran_sepeda_motor_gun_helm_sni_p',
                'pelanggaran_sepeda_motor_melawan_arus_p',
                'pelanggaran_sepeda_motor_gun_hp_saat_berkendara_p',
                'pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol_p',
                'pelanggaran_sepeda_motor_melebihi_batas_kecepatan_p',
                'pelanggaran_sepeda_motor_berkendara_dibawah_umur_p',
                'pelanggaran_sepeda_motor_lain_lain_p',
                'pelanggaran_mobil_melawan_arus_p',
                'pelanggaran_mobil_gun_hp_saat_berkendara_p',
                'pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol_p',
                'pelanggaran_mobil_melebihi_batas_kecepatan_p',
                'pelanggaran_mobil_berkendara_dibawah_umur_p',
                'pelanggaran_mobil_gun_safety_belt_p',
                'pelanggaran_mobil_lain_lain_p',
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
            ]);

            $payloadPrev = $request->except([
                '_token',
                'submit',
                '_method',
                'pelanggaran_lalu_lintas_tilang',
                'pelanggaran_lalu_lintas_teguran',
                'pelanggaran_sepeda_motor_gun_helm_sni',
                'pelanggaran_sepeda_motor_melawan_arus',
                'pelanggaran_sepeda_motor_gun_hp_saat_berkendara',
                'pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol',
                'pelanggaran_sepeda_motor_melebihi_batas_kecepatan',
                'pelanggaran_sepeda_motor_berkendara_dibawah_umur',
                'pelanggaran_sepeda_motor_lain_lain',
                'pelanggaran_mobil_melawan_arus',
                'pelanggaran_mobil_gun_hp_saat_berkendara',
                'pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol',
                'pelanggaran_mobil_melebihi_batas_kecepatan',
                'pelanggaran_mobil_berkendara_dibawah_umur',
                'pelanggaran_mobil_gun_safety_belt',
                'pelanggaran_mobil_lain_lain',
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
            ]);

            $poldaSubmited = PoldaSubmited::whereUuid($uuid)->firstOrFail();

            DailyInput::where("polda_submited_id", $poldaSubmited->id)
                ->where(DB::raw('DATE(created_at)'), $poldaSubmited->submited_date)
                ->update($payload);

            DailyInputPrev::where("polda_submited_id", $poldaSubmited->id)
                ->where(DB::raw('DATE(created_at)'), $poldaSubmited->submited_date)
                ->update($payloadPrev);

            DB::commit();
            flash('Seluruh data berhasil diupdate')->success();

            return redirect()->route('phro_index');
        } catch (\Exception $e) {
            DB::rollback();
            logger($e);
            flash('Data gagal diupdate. Silahkan dicoba kembali atau hubungi admin jika masih gagal')->error();
            return redirect()->back();
        }
    }

    public function preview($uuid)
    {
        $data = PoldaSubmited::with('dailyInput')->whereUuid($uuid)->firstOrFail();
        return view('phro.preview_load', compact('data'));
    }

    public function previewPhroDashboard($uuid)
    {
        $polda = Polda::whereUuid($uuid)->firstOrFail();
        $data = PoldaSubmited::where("polda_id", $polda->id)->where('submited_date', date('Y-m-d'))->firstOrFail();

        $dailyInput = dailyInput(
            $data->rencana_operasi_id,
            date('Y'),
            $data->polda_id,
            date('Y-m-d')
        );

        $dailyInputPrev = dailyInputPrev(
            $data->rencana_operasi_id,
            date('Y'),
            $data->polda_id,
            date('Y-m-d')
        );

        return [
            'dailyInput' => $dailyInput,
            'dailyInputPrev' => $dailyInputPrev
        ];
    }

    public function download($uuid)
    {
        $polda = Polda::whereUuid($uuid)->firstOrFail();
        $now = now()->format("Y-m-d");
        $filename = 'daily-report-'.$polda->short_name.'-'.$now.'.xlsx';
        return Excel::download(new PoldaSubmitedExport($uuid), $filename);
    }
}
