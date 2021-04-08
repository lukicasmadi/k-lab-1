<?php

namespace App\Http\Controllers;

use App\Models\DailyInput;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\KorlantasRekap;
use App\Models\RencanaOperasi;
use Illuminate\Support\Facades\DB;
use App\Models\PoldaCustomOperationName;
use App\Http\Requests\KorlantasRekapRequest;

class KorlantasRekapController extends Controller
{
    public function data()
    {
        $model = KorlantasRekap::with(['rencaraOperasi', 'poldaData']);

        return datatables()->eloquent($model)
        ->addColumn('polda_relation', function (KorlantasRekap $kr) {
            if(empty($kr->poldaData)) {
                return "Semua Polda";
            } else {
                return $kr->poldaData->name;
            }
        })
        ->addColumn('rencana_operasi_relation', function (KorlantasRekap $kr) {
            return $kr->rencaraOperasi->name;
        })
        ->toJson();

        return datatables()->eloquent($model)->toJson();
    }

    public function store(KorlantasRekapRequest $request)
    {
        $model = KorlantasRekap::create([
            'uuid' => genUuid(),
            'report_name' => $request->report_name,
            'polda' => $request->polda,
            'year' => $request->year,
            'rencana_operasi_id' => $request->rencana_operasi_id,
            'operation_date' => ($request->operation_date == "semua_hari") ? "semua_hari" : $request->hari,
        ]);

        flash('Rekap harian berhasil dibuat')->success();

        return redirect()->back();
    }

    public function byuuid($uuid)
    {
        $model = KorlantasRekap::with(['rencaraOperasi', 'poldaData'])->whereUuid($uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        $year = $model->year;
        $yearMinSatu = $model->year - 1;
        $polda = $model->polda;
        $operation_date = $model->operation_date;
        $rencana_operasi_id = $model->rencana_operasi_id;

        $cekCurrent = DailyInput::where('rencana_operasi_id', $rencana_operasi_id)
        ->where('year', $year)
        ->when($polda != 'polda_all', function ($q) use ($polda) {
            return $q->where('polda_id', $polda);
        })
        ->when($operation_date != 'semua_hari', function ($q) use ($operation_date) {
            return $q->where(DB::raw('DATE(created_at)'), $operation_date);
        })
        ->first();

        if(empty($cekCurrent)) {
            // DATA TIDAK DITEMUKAN DI TABEL CURRENT, CARI KE TABEL PREV
            $cekCurrentDua = DailyInputPrev::where('rencana_operasi_id', $rencana_operasi_id)
            ->where('year', $year)
            ->when($polda != 'polda_all', function ($q) use ($polda) {
                return $q->where('polda_id', $polda);
            })
            ->when($operation_date != 'semua_hari', function ($q) use ($operation_date) {
                return $q->where(DB::raw('DATE(created_at)'), $operation_date);
            })
            ->first();

            if(empty($cekCurrentDua)) {
                 // DATA TIDAK DITEMUKAN DI TABEL PREV, ARTINYA DATA MEMANG KOSONG
            } else {
                // DATA ADA DITEMUKAN DI TABEL PREV
                $dailyInputPrev = DailyInputPrev::selectRaw('
                    sum(pelanggaran_lalu_lintas_tilang_p) as pelanggaran_lalu_lintas_tilang,
                    sum(pelanggaran_lalu_lintas_teguran_p) as pelanggaran_lalu_lintas_teguran,
                    sum(pelanggaran_sepeda_motor_gun_helm_sni_p) as pelanggaran_sepeda_motor_gun_helm_sni,
                    sum(pelanggaran_sepeda_motor_melawan_arus_p) as pelanggaran_sepeda_motor_melawan_arus,
                    sum(pelanggaran_sepeda_motor_gun_hp_saat_berkendara_p) as pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                    sum(pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol_p) as pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                    sum(pelanggaran_sepeda_motor_melebihi_batas_kecepatan_p) as pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                    sum(pelanggaran_sepeda_motor_berkendara_dibawah_umur_p) as pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                    sum(pelanggaran_sepeda_motor_lain_lain_p) as pelanggaran_sepeda_motor_lain_lain,
                    sum(pelanggaran_mobil_melawan_arus_p) as pelanggaran_mobil_melawan_arus,
                    sum(pelanggaran_mobil_gun_hp_saat_berkendara_p) as pelanggaran_mobil_gun_hp_saat_berkendara,
                    sum(pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol_p) as pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                    sum(pelanggaran_mobil_melebihi_batas_kecepatan_p) as pelanggaran_mobil_melebihi_batas_kecepatan,
                    sum(pelanggaran_mobil_berkendara_dibawah_umur_p) as pelanggaran_mobil_berkendara_dibawah_umur,
                    sum(pelanggaran_mobil_gun_safety_belt_p) as pelanggaran_mobil_gun_safety_belt,
                    sum(pelanggaran_mobil_lain_lain_p) as pelanggaran_mobil_lain_lain,
                    sum(barang_bukti_yg_disita_sim_p) as barang_bukti_yg_disita_sim,
                    sum(barang_bukti_yg_disita_stnk_p) as barang_bukti_yg_disita_stnk,
                    sum(barang_bukti_yg_disita_kendaraan_p) as barang_bukti_yg_disita_kendaraan,
                    sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                    sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                    sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                    sum(profesi_pelaku_pelanggaran_pns_p) as profesi_pelaku_pelanggaran_pns,
                    sum(profesi_pelaku_pelanggaran_karyawan_swasta_p) as profesi_pelaku_pelanggaran_karyawan_swasta,
                    sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                    sum(profesi_pelaku_pelanggaran_pengemudi_supir_p) as profesi_pelaku_pelanggaran_pengemudi_supir,
                    sum(profesi_pelaku_pelanggaran_tni_p) as profesi_pelaku_pelanggaran_tni,
                    sum(profesi_pelaku_pelanggaran_polri_p) as profesi_pelaku_pelanggaran_polri,
                    sum(profesi_pelaku_pelanggaran_lain_lain_p) as profesi_pelaku_pelanggaran_lain_lain,
                    sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                    sum(usia_pelaku_pelanggaran_16_20_tahun_p) as usia_pelaku_pelanggaran_16_20_tahun,
                    sum(usia_pelaku_pelanggaran_21_25_tahun_p) as usia_pelaku_pelanggaran_21_25_tahun,
                    sum(usia_pelaku_pelanggaran_26_30_tahun_p) as usia_pelaku_pelanggaran_26_30_tahun,
                    sum(usia_pelaku_pelanggaran_31_35_tahun_p) as usia_pelaku_pelanggaran_31_35_tahun,
                    sum(usia_pelaku_pelanggaran_36_40_tahun_p) as usia_pelaku_pelanggaran_36_40_tahun,
                    sum(usia_pelaku_pelanggaran_41_45_tahun_p) as usia_pelaku_pelanggaran_41_45_tahun,
                    sum(usia_pelaku_pelanggaran_46_50_tahun_p) as usia_pelaku_pelanggaran_46_50_tahun,
                    sum(usia_pelaku_pelanggaran_51_55_tahun_p) as usia_pelaku_pelanggaran_51_55_tahun,
                    sum(usia_pelaku_pelanggaran_56_60_tahun_p) as usia_pelaku_pelanggaran_56_60_tahun,
                    sum(usia_pelaku_pelanggaran_diatas_60_tahun_p) as usia_pelaku_pelanggaran_diatas_60_tahun,
                    sum(sim_pelaku_pelanggaran_sim_a_p) as sim_pelaku_pelanggaran_sim_a,
                    sum(sim_pelaku_pelanggaran_sim_a_umum_p) as sim_pelaku_pelanggaran_sim_a_umum,
                    sum(sim_pelaku_pelanggaran_sim_b1_p) as sim_pelaku_pelanggaran_sim_b1,
                    sum(sim_pelaku_pelanggaran_sim_b1_umum_p) as sim_pelaku_pelanggaran_sim_b1_umum,
                    sum(sim_pelaku_pelanggaran_sim_b2_p) as sim_pelaku_pelanggaran_sim_b2,
                    sum(sim_pelaku_pelanggaran_sim_b2_umum_p) as sim_pelaku_pelanggaran_sim_b2_umum,
                    sum(sim_pelaku_pelanggaran_sim_c_p) as sim_pelaku_pelanggaran_sim_c,
                    sum(sim_pelaku_pelanggaran_sim_d_p) as sim_pelaku_pelanggaran_sim_d,
                    sum(sim_pelaku_pelanggaran_sim_internasional_p) as sim_pelaku_pelanggaran_sim_internasional,
                    sum(sim_pelaku_pelanggaran_tanpa_sim_p) as sim_pelaku_pelanggaran_tanpa_sim,
                    sum(lokasi_pelanggaran_pemukiman_p) as lokasi_pelanggaran_pemukiman,
                    sum(lokasi_pelanggaran_perbelanjaan_p) as lokasi_pelanggaran_perbelanjaan,
                    sum(lokasi_pelanggaran_perkantoran_p) as lokasi_pelanggaran_perkantoran,
                    sum(lokasi_pelanggaran_wisata_p) as lokasi_pelanggaran_wisata,
                    sum(lokasi_pelanggaran_industri_p) as lokasi_pelanggaran_industri,
                    sum(lokasi_pelanggaran_status_jalan_nasional_p) as lokasi_pelanggaran_status_jalan_nasional,
                    sum(lokasi_pelanggaran_status_jalan_propinsi_p) as lokasi_pelanggaran_status_jalan_propinsi,
                    sum(lokasi_pelanggaran_status_jalan_kab_kota_p) as lokasi_pelanggaran_status_jalan_kab_kota,
                    sum(lokasi_pelanggaran_status_jalan_desa_lingkungan_p) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                    sum(lokasi_pelanggaran_fungsi_jalan_arteri_p) as lokasi_pelanggaran_fungsi_jalan_arteri,
                    sum(lokasi_pelanggaran_fungsi_jalan_kolektor_p) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                    sum(lokasi_pelanggaran_fungsi_jalan_lokal_p) as lokasi_pelanggaran_fungsi_jalan_lokal,
                    sum(lokasi_pelanggaran_fungsi_jalan_lingkungan_p) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                    sum(kecelakaan_lalin_jumlah_kejadian_p) as kecelakaan_lalin_jumlah_kejadian,
                    sum(kecelakaan_lalin_jumlah_korban_meninggal_p) as kecelakaan_lalin_jumlah_korban_meninggal,
                    sum(kecelakaan_lalin_jumlah_korban_luka_berat_p) as kecelakaan_lalin_jumlah_korban_luka_berat,
                    sum(kecelakaan_lalin_jumlah_korban_luka_ringan_p) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                    sum(kecelakaan_lalin_jumlah_kerugian_materiil_p) as kecelakaan_lalin_jumlah_kerugian_materiil,
                    sum(kecelakaan_barang_bukti_yg_disita_sim_p) as kecelakaan_barang_bukti_yg_disita_sim,
                    sum(kecelakaan_barang_bukti_yg_disita_stnk_p) as kecelakaan_barang_bukti_yg_disita_stnk,
                    sum(kecelakaan_barang_bukti_yg_disita_kendaraan_p) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                    sum(profesi_korban_kecelakaan_lalin_pns_p) as profesi_korban_kecelakaan_lalin_pns,
                    sum(profesi_korban_kecelakaan_lalin_karwayan_swasta_p) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                    sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                    sum(profesi_korban_kecelakaan_lalin_pengemudi_p) as profesi_korban_kecelakaan_lalin_pengemudi,
                    sum(profesi_korban_kecelakaan_lalin_tni_p) as profesi_korban_kecelakaan_lalin_tni,
                    sum(profesi_korban_kecelakaan_lalin_polri_p) as profesi_korban_kecelakaan_lalin_polri,
                    sum(profesi_korban_kecelakaan_lalin_lain_lain_p) as profesi_korban_kecelakaan_lalin_lain_lain,
                    sum(usia_korban_kecelakaan_kurang_15_p) as usia_korban_kecelakaan_kurang_15,
                    sum(usia_korban_kecelakaan_16_20_p) as usia_korban_kecelakaan_16_20,
                    sum(usia_korban_kecelakaan_21_25_p) as usia_korban_kecelakaan_21_25,
                    sum(usia_korban_kecelakaan_26_30_p) as usia_korban_kecelakaan_26_30,
                    sum(usia_korban_kecelakaan_31_35_p) as usia_korban_kecelakaan_31_35,
                    sum(usia_korban_kecelakaan_36_40_p) as usia_korban_kecelakaan_36_40,
                    sum(usia_korban_kecelakaan_41_45_p) as usia_korban_kecelakaan_41_45,
                    sum(usia_korban_kecelakaan_45_50_p) as usia_korban_kecelakaan_45_50,
                    sum(usia_korban_kecelakaan_51_55_p) as usia_korban_kecelakaan_51_55,
                    sum(usia_korban_kecelakaan_56_60_p) as usia_korban_kecelakaan_56_60,
                    sum(usia_korban_kecelakaan_diatas_60_p) as usia_korban_kecelakaan_diatas_60,
                    sum(sim_korban_kecelakaan_sim_a_p) as sim_korban_kecelakaan_sim_a,
                    sum(sim_korban_kecelakaan_sim_a_umum_p) as sim_korban_kecelakaan_sim_a_umum,
                    sum(sim_korban_kecelakaan_sim_b1_p) as sim_korban_kecelakaan_sim_b1,
                    sum(sim_korban_kecelakaan_sim_b1_umum_p) as sim_korban_kecelakaan_sim_b1_umum,
                    sum(sim_korban_kecelakaan_sim_b2_p) as sim_korban_kecelakaan_sim_b2,
                    sum(sim_korban_kecelakaan_sim_b2_umum_p) as sim_korban_kecelakaan_sim_b2_umum,
                    sum(sim_korban_kecelakaan_sim_c_p) as sim_korban_kecelakaan_sim_c,
                    sum(sim_korban_kecelakaan_sim_d_p) as sim_korban_kecelakaan_sim_d,
                    sum(sim_korban_kecelakaan_sim_internasional_p) as sim_korban_kecelakaan_sim_internasional,
                    sum(sim_korban_kecelakaan_tanpa_sim_p) as sim_korban_kecelakaan_tanpa_sim,
                    sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                    sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                    sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                    sum(jenis_kecelakaan_tunggal_ooc_p) as jenis_kecelakaan_tunggal_ooc,
                    sum(jenis_kecelakaan_depan_depan_p) as jenis_kecelakaan_depan_depan,
                    sum(jenis_kecelakaan_depan_belakang_p) as jenis_kecelakaan_depan_belakang,
                    sum(jenis_kecelakaan_depan_samping_p) as jenis_kecelakaan_depan_samping,
                    sum(jenis_kecelakaan_beruntun_p) as jenis_kecelakaan_beruntun,
                    sum(jenis_kecelakaan_pejalan_kaki_p) as jenis_kecelakaan_pejalan_kaki,
                    sum(jenis_kecelakaan_tabrak_lari_p) as jenis_kecelakaan_tabrak_lari,
                    sum(jenis_kecelakaan_tabrak_hewan_p) as jenis_kecelakaan_tabrak_hewan,
                    sum(jenis_kecelakaan_samping_samping_p) as jenis_kecelakaan_samping_samping,
                    sum(jenis_kecelakaan_lainnya_p) as jenis_kecelakaan_lainnya,
                    sum(profesi_pelaku_kecelakaan_lalin_pns_p) as profesi_pelaku_kecelakaan_lalin_pns,
                    sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                    sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                    sum(profesi_pelaku_kecelakaan_lalin_pengemudi_p) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                    sum(profesi_pelaku_kecelakaan_lalin_tni_p) as profesi_pelaku_kecelakaan_lalin_tni,
                    sum(profesi_pelaku_kecelakaan_lalin_polri_p) as profesi_pelaku_kecelakaan_lalin_polri,
                    sum(profesi_pelaku_kecelakaan_lalin_lain_lain_p) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                    sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                    sum(usia_pelaku_kecelakaan_16_20_tahun_p) as usia_pelaku_kecelakaan_16_20_tahun,
                    sum(usia_pelaku_kecelakaan_21_25_tahun_p) as usia_pelaku_kecelakaan_21_25_tahun,
                    sum(usia_pelaku_kecelakaan_26_30_tahun_p) as usia_pelaku_kecelakaan_26_30_tahun,
                    sum(usia_pelaku_kecelakaan_31_35_tahun_p) as usia_pelaku_kecelakaan_31_35_tahun,
                    sum(usia_pelaku_kecelakaan_36_40_tahun_p) as usia_pelaku_kecelakaan_36_40_tahun,
                    sum(usia_pelaku_kecelakaan_41_45_tahun_p) as usia_pelaku_kecelakaan_41_45_tahun,
                    sum(usia_pelaku_kecelakaan_46_50_tahun_p) as usia_pelaku_kecelakaan_46_50_tahun,
                    sum(usia_pelaku_kecelakaan_51_55_tahun_p) as usia_pelaku_kecelakaan_51_55_tahun,
                    sum(usia_pelaku_kecelakaan_56_60_tahun_p) as usia_pelaku_kecelakaan_56_60_tahun,
                    sum(usia_pelaku_kecelakaan_diatas_60_tahun_p) as usia_pelaku_kecelakaan_diatas_60_tahun,
                    sum(sim_pelaku_kecelakaan_sim_a_p) as sim_pelaku_kecelakaan_sim_a,
                    sum(sim_pelaku_kecelakaan_sim_a_umum_p) as sim_pelaku_kecelakaan_sim_a_umum,
                    sum(sim_pelaku_kecelakaan_sim_b1_p) as sim_pelaku_kecelakaan_sim_b1,
                    sum(sim_pelaku_kecelakaan_sim_b1_umum_p) as sim_pelaku_kecelakaan_sim_b1_umum,
                    sum(sim_pelaku_kecelakaan_sim_b2_p) as sim_pelaku_kecelakaan_sim_b2,
                    sum(sim_pelaku_kecelakaan_sim_b2_umum_p) as sim_pelaku_kecelakaan_sim_b2_umum,
                    sum(sim_pelaku_kecelakaan_sim_c_p) as sim_pelaku_kecelakaan_sim_c,
                    sum(sim_pelaku_kecelakaan_sim_d_p) as sim_pelaku_kecelakaan_sim_d,
                    sum(sim_pelaku_kecelakaan_sim_internasional_p) as sim_pelaku_kecelakaan_sim_internasional,
                    sum(sim_pelaku_kecelakaan_tanpa_sim_p) as sim_pelaku_kecelakaan_tanpa_sim,
                    sum(lokasi_kecelakaan_lalin_pemukiman_p) as lokasi_kecelakaan_lalin_pemukiman,
                    sum(lokasi_kecelakaan_lalin_perbelanjaan_p) as lokasi_kecelakaan_lalin_perbelanjaan,
                    sum(lokasi_kecelakaan_lalin_perkantoran_p) as lokasi_kecelakaan_lalin_perkantoran,
                    sum(lokasi_kecelakaan_lalin_wisata_p) as lokasi_kecelakaan_lalin_wisata,
                    sum(lokasi_kecelakaan_lalin_industri_p) as lokasi_kecelakaan_lalin_industri,
                    sum(lokasi_kecelakaan_lalin_lain_lain_p) as lokasi_kecelakaan_lalin_lain_lain,
                    sum(lokasi_kecelakaan_status_jalan_nasional_p) as lokasi_kecelakaan_status_jalan_nasional,
                    sum(lokasi_kecelakaan_status_jalan_propinsi_p) as lokasi_kecelakaan_status_jalan_propinsi,
                    sum(lokasi_kecelakaan_status_jalan_kab_kota_p) as lokasi_kecelakaan_status_jalan_kab_kota,
                    sum(lokasi_kecelakaan_status_jalan_desa_lingkungan_p) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                    sum(lokasi_kecelakaan_fungsi_jalan_arteri_p) as lokasi_kecelakaan_fungsi_jalan_arteri,
                    sum(lokasi_kecelakaan_fungsi_jalan_kolektor_p) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                    sum(lokasi_kecelakaan_fungsi_jalan_lokal_p) as lokasi_kecelakaan_fungsi_jalan_lokal,
                    sum(lokasi_kecelakaan_fungsi_jalan_lingkungan_p) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                    sum(faktor_penyebab_kecelakaan_manusia_p) as faktor_penyebab_kecelakaan_manusia,
                    sum(faktor_penyebab_kecelakaan_ngantuk_lelah_p) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                    sum(faktor_penyebab_kecelakaan_mabuk_obat_p) as faktor_penyebab_kecelakaan_mabuk_obat,
                    sum(faktor_penyebab_kecelakaan_sakit_p) as faktor_penyebab_kecelakaan_sakit,
                    sum(faktor_penyebab_kecelakaan_handphone_elektronik_p) as faktor_penyebab_kecelakaan_handphone_elektronik,
                    sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                    sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                    sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                    sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                    sum(faktor_penyebab_kecelakaan_berpindah_jalur_p) as faktor_penyebab_kecelakaan_berpindah_jalur,
                    sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                    sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                    sum(faktor_penyebab_kecelakaan_lainnya_p) as faktor_penyebab_kecelakaan_lainnya,
                    sum(faktor_penyebab_kecelakaan_alam_p) as faktor_penyebab_kecelakaan_alam,
                    sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                    sum(faktor_penyebab_kecelakaan_kondisi_jalan_p) as faktor_penyebab_kecelakaan_kondisi_jalan,
                    sum(faktor_penyebab_kecelakaan_prasarana_jalan_p) as faktor_penyebab_kecelakaan_prasarana_jalan,
                    sum(faktor_penyebab_kecelakaan_rambu_p) as faktor_penyebab_kecelakaan_rambu,
                    sum(faktor_penyebab_kecelakaan_marka_p) as faktor_penyebab_kecelakaan_marka,
                    sum(faktor_penyebab_kecelakaan_apil_p) as faktor_penyebab_kecelakaan_apil,
                    sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                    sum(waktu_kejadian_kecelakaan_00_03_p) as waktu_kejadian_kecelakaan_00_03,
                    sum(waktu_kejadian_kecelakaan_03_06_p) as waktu_kejadian_kecelakaan_03_06,
                    sum(waktu_kejadian_kecelakaan_06_09_p) as waktu_kejadian_kecelakaan_06_09,
                    sum(waktu_kejadian_kecelakaan_09_12_p) as waktu_kejadian_kecelakaan_09_12,
                    sum(waktu_kejadian_kecelakaan_12_15_p) as waktu_kejadian_kecelakaan_12_15,
                    sum(waktu_kejadian_kecelakaan_15_18_p) as waktu_kejadian_kecelakaan_15_18,
                    sum(waktu_kejadian_kecelakaan_18_21_p) as waktu_kejadian_kecelakaan_18_21,
                    sum(waktu_kejadian_kecelakaan_21_24_p) as waktu_kejadian_kecelakaan_21_24,
                    sum(kecelakaan_lalin_menonjol_jumlah_kejadian_p) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                    sum(kecelakaan_lalin_menonjol_korban_meninggal_p) as kecelakaan_lalin_menonjol_korban_meninggal,
                    sum(kecelakaan_lalin_menonjol_korban_luka_berat_p) as kecelakaan_lalin_menonjol_korban_luka_berat,
                    sum(kecelakaan_lalin_menonjol_korban_luka_ringan_p) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                    sum(kecelakaan_lalin_menonjol_materiil_p) as kecelakaan_lalin_menonjol_materiil,
                    sum(kecelakaan_lalin_tunggal_jumlah_kejadian_p) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                    sum(kecelakaan_lalin_tunggal_korban_meninggal_p) as kecelakaan_lalin_tunggal_korban_meninggal,
                    sum(kecelakaan_lalin_tunggal_korban_luka_berat_p) as kecelakaan_lalin_tunggal_korban_luka_berat,
                    sum(kecelakaan_lalin_tunggal_korban_luka_ringan_p) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                    sum(kecelakaan_lalin_tunggal_materiil_p) as kecelakaan_lalin_tunggal_materiil,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                    sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_lari_korban_meninggal_p) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_lari_materiil_p) as kecelakaan_lalin_tabrak_lari_materiil,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                    sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_roda_empat_materiil_p) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                    sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                    sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                    sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                    sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                    sum(kecelakaan_lalin_perlintasan_ka_materiil_p) as kecelakaan_lalin_perlintasan_ka_materiil,
                    sum(kecelakaan_transportasi_kereta_api_p) as kecelakaan_transportasi_kereta_api,
                    sum(kecelakaan_transportasi_laut_perairan_p) as kecelakaan_transportasi_laut_perairan,
                    sum(kecelakaan_transportasi_udara_p) as kecelakaan_transportasi_udara,
                    sum(penlu_melalui_media_cetak_p) as penlu_melalui_media_cetak,
                    sum(penlu_melalui_media_elektronik_p) as penlu_melalui_media_elektronik,
                    sum(penlu_melalui_tempat_keramaian_p) as penlu_melalui_tempat_keramaian,
                    sum(penlu_melalui_tempat_istirahat_p) as penlu_melalui_tempat_istirahat,
                    sum(penlu_melalui_daerah_rawan_laka_dan_langgar_p) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                    sum(penyebaran_pemasangan_spanduk_p) as penyebaran_pemasangan_spanduk,
                    sum(penyebaran_pemasangan_leaflet_p) as penyebaran_pemasangan_leaflet,
                    sum(penyebaran_pemasangan_sticker_p) as penyebaran_pemasangan_sticker,
                    sum(penyebaran_pemasangan_bilboard_p) as penyebaran_pemasangan_bilboard,
                    sum(polisi_sahabat_anak_p) as polisi_sahabat_anak,
                    sum(cara_aman_sekolah_p) as cara_aman_sekolah,
                    sum(patroli_keamanan_sekolah_p) as patroli_keamanan_sekolah,
                    sum(pramuka_bhayangkara_krida_lalu_lintas_p) as pramuka_bhayangkara_krida_lalu_lintas,
                    sum(police_goes_to_campus_p) as police_goes_to_campus,
                    sum(safety_riding_driving_p) as safety_riding_driving,
                    sum(forum_lalu_lintas_angkutan_umum_p) as forum_lalu_lintas_angkutan_umum,
                    sum(kampanye_keselamatan_p) as kampanye_keselamatan,
                    sum(sekolah_mengemudi_p) as sekolah_mengemudi,
                    sum(taman_lalu_lintas_p) as taman_lalu_lintas,
                    sum(global_road_safety_partnership_action_p) as global_road_safety_partnership_action,
                    sum(giat_lantas_pengaturan_p) as giat_lantas_pengaturan,
                    sum(giat_lantas_penjagaan_p) as giat_lantas_penjagaan,
                    sum(giat_lantas_pengawalan_p) as giat_lantas_pengawalan,
                    sum(giat_lantas_patroli_p) as giat_lantas_patroli')
                ->where('rencana_operasi_id', $rencana_operasi_id)
                ->where('year', $year)
                ->when($polda != 'polda_all', function ($q) use ($polda) {
                    return $q->where('polda_id', $polda);
                })
                ->when($operation_date != 'semua_hari', function ($q) use ($operation_date) {
                    return $q->where(DB::raw('DATE(created_at)'), $operation_date);
                })
                ->first();
            }
        } else {
            // DATA DITEMUKAN DI TABEL CURRENT
            $dailyInput = DailyInput::selectRaw('
                sum(pelanggaran_lalu_lintas_tilang) as pelanggaran_lalu_lintas_tilang,
                sum(pelanggaran_lalu_lintas_teguran) as pelanggaran_lalu_lintas_teguran,
                sum(pelanggaran_sepeda_motor_gun_helm_sni) as pelanggaran_sepeda_motor_gun_helm_sni,
                sum(pelanggaran_sepeda_motor_melawan_arus) as pelanggaran_sepeda_motor_melawan_arus,
                sum(pelanggaran_sepeda_motor_gun_hp_saat_berkendara) as pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                sum(pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol) as pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                sum(pelanggaran_sepeda_motor_melebihi_batas_kecepatan) as pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                sum(pelanggaran_sepeda_motor_berkendara_dibawah_umur) as pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                sum(pelanggaran_sepeda_motor_lain_lain) as pelanggaran_sepeda_motor_lain_lain,
                sum(pelanggaran_mobil_melawan_arus) as pelanggaran_mobil_melawan_arus,
                sum(pelanggaran_mobil_gun_hp_saat_berkendara) as pelanggaran_mobil_gun_hp_saat_berkendara,
                sum(pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol) as pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                sum(pelanggaran_mobil_melebihi_batas_kecepatan) as pelanggaran_mobil_melebihi_batas_kecepatan,
                sum(pelanggaran_mobil_berkendara_dibawah_umur) as pelanggaran_mobil_berkendara_dibawah_umur,
                sum(pelanggaran_mobil_gun_safety_belt) as pelanggaran_mobil_gun_safety_belt,
                sum(pelanggaran_mobil_lain_lain) as pelanggaran_mobil_lain_lain,
                sum(barang_bukti_yg_disita_sim) as barang_bukti_yg_disita_sim,
                sum(barang_bukti_yg_disita_stnk) as barang_bukti_yg_disita_stnk,
                sum(barang_bukti_yg_disita_kendaraan) as barang_bukti_yg_disita_kendaraan,
                sum(kendaraan_yang_terlibat_pelanggaran_sepeda_motor) as kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) as kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_bus) as kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                sum(kendaraan_yang_terlibat_pelanggaran_mobil_barang) as kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                sum(kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) as kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,
                sum(profesi_pelaku_pelanggaran_pns) as profesi_pelaku_pelanggaran_pns,
                sum(profesi_pelaku_pelanggaran_karyawan_swasta) as profesi_pelaku_pelanggaran_karyawan_swasta,
                sum(profesi_pelaku_pelanggaran_pelajar_mahasiswa) as profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                sum(profesi_pelaku_pelanggaran_pengemudi_supir) as profesi_pelaku_pelanggaran_pengemudi_supir,
                sum(profesi_pelaku_pelanggaran_tni) as profesi_pelaku_pelanggaran_tni,
                sum(profesi_pelaku_pelanggaran_polri) as profesi_pelaku_pelanggaran_polri,
                sum(profesi_pelaku_pelanggaran_lain_lain) as profesi_pelaku_pelanggaran_lain_lain,
                sum(usia_pelaku_pelanggaran_kurang_dari_15_tahun) as usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                sum(usia_pelaku_pelanggaran_16_20_tahun) as usia_pelaku_pelanggaran_16_20_tahun,
                sum(usia_pelaku_pelanggaran_21_25_tahun) as usia_pelaku_pelanggaran_21_25_tahun,
                sum(usia_pelaku_pelanggaran_26_30_tahun) as usia_pelaku_pelanggaran_26_30_tahun,
                sum(usia_pelaku_pelanggaran_31_35_tahun) as usia_pelaku_pelanggaran_31_35_tahun,
                sum(usia_pelaku_pelanggaran_36_40_tahun) as usia_pelaku_pelanggaran_36_40_tahun,
                sum(usia_pelaku_pelanggaran_41_45_tahun) as usia_pelaku_pelanggaran_41_45_tahun,
                sum(usia_pelaku_pelanggaran_46_50_tahun) as usia_pelaku_pelanggaran_46_50_tahun,
                sum(usia_pelaku_pelanggaran_51_55_tahun) as usia_pelaku_pelanggaran_51_55_tahun,
                sum(usia_pelaku_pelanggaran_56_60_tahun) as usia_pelaku_pelanggaran_56_60_tahun,
                sum(usia_pelaku_pelanggaran_diatas_60_tahun) as usia_pelaku_pelanggaran_diatas_60_tahun,
                sum(sim_pelaku_pelanggaran_sim_a) as sim_pelaku_pelanggaran_sim_a,
                sum(sim_pelaku_pelanggaran_sim_a_umum) as sim_pelaku_pelanggaran_sim_a_umum,
                sum(sim_pelaku_pelanggaran_sim_b1) as sim_pelaku_pelanggaran_sim_b1,
                sum(sim_pelaku_pelanggaran_sim_b1_umum) as sim_pelaku_pelanggaran_sim_b1_umum,
                sum(sim_pelaku_pelanggaran_sim_b2) as sim_pelaku_pelanggaran_sim_b2,
                sum(sim_pelaku_pelanggaran_sim_b2_umum) as sim_pelaku_pelanggaran_sim_b2_umum,
                sum(sim_pelaku_pelanggaran_sim_c) as sim_pelaku_pelanggaran_sim_c,
                sum(sim_pelaku_pelanggaran_sim_d) as sim_pelaku_pelanggaran_sim_d,
                sum(sim_pelaku_pelanggaran_sim_internasional) as sim_pelaku_pelanggaran_sim_internasional,
                sum(sim_pelaku_pelanggaran_tanpa_sim) as sim_pelaku_pelanggaran_tanpa_sim,
                sum(lokasi_pelanggaran_pemukiman) as lokasi_pelanggaran_pemukiman,
                sum(lokasi_pelanggaran_perbelanjaan) as lokasi_pelanggaran_perbelanjaan,
                sum(lokasi_pelanggaran_perkantoran) as lokasi_pelanggaran_perkantoran,
                sum(lokasi_pelanggaran_wisata) as lokasi_pelanggaran_wisata,
                sum(lokasi_pelanggaran_industri) as lokasi_pelanggaran_industri,
                sum(lokasi_pelanggaran_status_jalan_nasional) as lokasi_pelanggaran_status_jalan_nasional,
                sum(lokasi_pelanggaran_status_jalan_propinsi) as lokasi_pelanggaran_status_jalan_propinsi,
                sum(lokasi_pelanggaran_status_jalan_kab_kota) as lokasi_pelanggaran_status_jalan_kab_kota,
                sum(lokasi_pelanggaran_status_jalan_desa_lingkungan) as lokasi_pelanggaran_status_jalan_desa_lingkungan,
                sum(lokasi_pelanggaran_fungsi_jalan_arteri) as lokasi_pelanggaran_fungsi_jalan_arteri,
                sum(lokasi_pelanggaran_fungsi_jalan_kolektor) as lokasi_pelanggaran_fungsi_jalan_kolektor,
                sum(lokasi_pelanggaran_fungsi_jalan_lokal) as lokasi_pelanggaran_fungsi_jalan_lokal,
                sum(lokasi_pelanggaran_fungsi_jalan_lingkungan) as lokasi_pelanggaran_fungsi_jalan_lingkungan,
                sum(kecelakaan_lalin_jumlah_kejadian) as kecelakaan_lalin_jumlah_kejadian,
                sum(kecelakaan_lalin_jumlah_korban_meninggal) as kecelakaan_lalin_jumlah_korban_meninggal,
                sum(kecelakaan_lalin_jumlah_korban_luka_berat) as kecelakaan_lalin_jumlah_korban_luka_berat,
                sum(kecelakaan_lalin_jumlah_korban_luka_ringan) as kecelakaan_lalin_jumlah_korban_luka_ringan,
                sum(kecelakaan_lalin_jumlah_kerugian_materiil) as kecelakaan_lalin_jumlah_kerugian_materiil,
                sum(kecelakaan_barang_bukti_yg_disita_sim) as kecelakaan_barang_bukti_yg_disita_sim,
                sum(kecelakaan_barang_bukti_yg_disita_stnk) as kecelakaan_barang_bukti_yg_disita_stnk,
                sum(kecelakaan_barang_bukti_yg_disita_kendaraan) as kecelakaan_barang_bukti_yg_disita_kendaraan,
                sum(profesi_korban_kecelakaan_lalin_pns) as profesi_korban_kecelakaan_lalin_pns,
                sum(profesi_korban_kecelakaan_lalin_karwayan_swasta) as profesi_korban_kecelakaan_lalin_karwayan_swasta,
                sum(profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) as profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                sum(profesi_korban_kecelakaan_lalin_pengemudi) as profesi_korban_kecelakaan_lalin_pengemudi,
                sum(profesi_korban_kecelakaan_lalin_tni) as profesi_korban_kecelakaan_lalin_tni,
                sum(profesi_korban_kecelakaan_lalin_polri) as profesi_korban_kecelakaan_lalin_polri,
                sum(profesi_korban_kecelakaan_lalin_lain_lain) as profesi_korban_kecelakaan_lalin_lain_lain,
                sum(usia_korban_kecelakaan_kurang_15) as usia_korban_kecelakaan_kurang_15,
                sum(usia_korban_kecelakaan_16_20) as usia_korban_kecelakaan_16_20,
                sum(usia_korban_kecelakaan_21_25) as usia_korban_kecelakaan_21_25,
                sum(usia_korban_kecelakaan_26_30) as usia_korban_kecelakaan_26_30,
                sum(usia_korban_kecelakaan_31_35) as usia_korban_kecelakaan_31_35,
                sum(usia_korban_kecelakaan_36_40) as usia_korban_kecelakaan_36_40,
                sum(usia_korban_kecelakaan_41_45) as usia_korban_kecelakaan_41_45,
                sum(usia_korban_kecelakaan_45_50) as usia_korban_kecelakaan_45_50,
                sum(usia_korban_kecelakaan_51_55) as usia_korban_kecelakaan_51_55,
                sum(usia_korban_kecelakaan_56_60) as usia_korban_kecelakaan_56_60,
                sum(usia_korban_kecelakaan_diatas_60) as usia_korban_kecelakaan_diatas_60,
                sum(sim_korban_kecelakaan_sim_a) as sim_korban_kecelakaan_sim_a,
                sum(sim_korban_kecelakaan_sim_a_umum) as sim_korban_kecelakaan_sim_a_umum,
                sum(sim_korban_kecelakaan_sim_b1) as sim_korban_kecelakaan_sim_b1,
                sum(sim_korban_kecelakaan_sim_b1_umum) as sim_korban_kecelakaan_sim_b1_umum,
                sum(sim_korban_kecelakaan_sim_b2) as sim_korban_kecelakaan_sim_b2,
                sum(sim_korban_kecelakaan_sim_b2_umum) as sim_korban_kecelakaan_sim_b2_umum,
                sum(sim_korban_kecelakaan_sim_c) as sim_korban_kecelakaan_sim_c,
                sum(sim_korban_kecelakaan_sim_d) as sim_korban_kecelakaan_sim_d,
                sum(sim_korban_kecelakaan_sim_internasional) as sim_korban_kecelakaan_sim_internasional,
                sum(sim_korban_kecelakaan_tanpa_sim) as sim_korban_kecelakaan_tanpa_sim,
                sum(kendaraan_yg_terlibat_kecelakaan_sepeda_motor) as kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) as kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_bus) as kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                sum(kendaraan_yg_terlibat_kecelakaan_mobil_barang) as kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) as kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                sum(kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) as kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,
                sum(jenis_kecelakaan_tunggal_ooc) as jenis_kecelakaan_tunggal_ooc,
                sum(jenis_kecelakaan_depan_depan) as jenis_kecelakaan_depan_depan,
                sum(jenis_kecelakaan_depan_belakang) as jenis_kecelakaan_depan_belakang,
                sum(jenis_kecelakaan_depan_samping) as jenis_kecelakaan_depan_samping,
                sum(jenis_kecelakaan_beruntun) as jenis_kecelakaan_beruntun,
                sum(jenis_kecelakaan_pejalan_kaki) as jenis_kecelakaan_pejalan_kaki,
                sum(jenis_kecelakaan_tabrak_lari) as jenis_kecelakaan_tabrak_lari,
                sum(jenis_kecelakaan_tabrak_hewan) as jenis_kecelakaan_tabrak_hewan,
                sum(jenis_kecelakaan_samping_samping) as jenis_kecelakaan_samping_samping,
                sum(jenis_kecelakaan_lainnya) as jenis_kecelakaan_lainnya,
                sum(profesi_pelaku_kecelakaan_lalin_pns) as profesi_pelaku_kecelakaan_lalin_pns,
                sum(profesi_pelaku_kecelakaan_lalin_karyawan_swasta) as profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                sum(profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) as profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,
                sum(profesi_pelaku_kecelakaan_lalin_pengemudi) as profesi_pelaku_kecelakaan_lalin_pengemudi,
                sum(profesi_pelaku_kecelakaan_lalin_tni) as profesi_pelaku_kecelakaan_lalin_tni,
                sum(profesi_pelaku_kecelakaan_lalin_polri) as profesi_pelaku_kecelakaan_lalin_polri,
                sum(profesi_pelaku_kecelakaan_lalin_lain_lain) as profesi_pelaku_kecelakaan_lalin_lain_lain,
                sum(usia_pelaku_kecelakaan_kurang_dari_15_tahun) as usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                sum(usia_pelaku_kecelakaan_16_20_tahun) as usia_pelaku_kecelakaan_16_20_tahun,
                sum(usia_pelaku_kecelakaan_21_25_tahun) as usia_pelaku_kecelakaan_21_25_tahun,
                sum(usia_pelaku_kecelakaan_26_30_tahun) as usia_pelaku_kecelakaan_26_30_tahun,
                sum(usia_pelaku_kecelakaan_31_35_tahun) as usia_pelaku_kecelakaan_31_35_tahun,
                sum(usia_pelaku_kecelakaan_36_40_tahun) as usia_pelaku_kecelakaan_36_40_tahun,
                sum(usia_pelaku_kecelakaan_41_45_tahun) as usia_pelaku_kecelakaan_41_45_tahun,
                sum(usia_pelaku_kecelakaan_46_50_tahun) as usia_pelaku_kecelakaan_46_50_tahun,
                sum(usia_pelaku_kecelakaan_51_55_tahun) as usia_pelaku_kecelakaan_51_55_tahun,
                sum(usia_pelaku_kecelakaan_56_60_tahun) as usia_pelaku_kecelakaan_56_60_tahun,
                sum(usia_pelaku_kecelakaan_diatas_60_tahun) as usia_pelaku_kecelakaan_diatas_60_tahun,
                sum(sim_pelaku_kecelakaan_sim_a) as sim_pelaku_kecelakaan_sim_a,
                sum(sim_pelaku_kecelakaan_sim_a_umum) as sim_pelaku_kecelakaan_sim_a_umum,
                sum(sim_pelaku_kecelakaan_sim_b1) as sim_pelaku_kecelakaan_sim_b1,
                sum(sim_pelaku_kecelakaan_sim_b1_umum) as sim_pelaku_kecelakaan_sim_b1_umum,
                sum(sim_pelaku_kecelakaan_sim_b2) as sim_pelaku_kecelakaan_sim_b2,
                sum(sim_pelaku_kecelakaan_sim_b2_umum) as sim_pelaku_kecelakaan_sim_b2_umum,
                sum(sim_pelaku_kecelakaan_sim_c) as sim_pelaku_kecelakaan_sim_c,
                sum(sim_pelaku_kecelakaan_sim_d) as sim_pelaku_kecelakaan_sim_d,
                sum(sim_pelaku_kecelakaan_sim_internasional) as sim_pelaku_kecelakaan_sim_internasional,
                sum(sim_pelaku_kecelakaan_tanpa_sim) as sim_pelaku_kecelakaan_tanpa_sim,
                sum(lokasi_kecelakaan_lalin_pemukiman) as lokasi_kecelakaan_lalin_pemukiman,
                sum(lokasi_kecelakaan_lalin_perbelanjaan) as lokasi_kecelakaan_lalin_perbelanjaan,
                sum(lokasi_kecelakaan_lalin_perkantoran) as lokasi_kecelakaan_lalin_perkantoran,
                sum(lokasi_kecelakaan_lalin_wisata) as lokasi_kecelakaan_lalin_wisata,
                sum(lokasi_kecelakaan_lalin_industri) as lokasi_kecelakaan_lalin_industri,
                sum(lokasi_kecelakaan_lalin_lain_lain) as lokasi_kecelakaan_lalin_lain_lain,
                sum(lokasi_kecelakaan_status_jalan_nasional) as lokasi_kecelakaan_status_jalan_nasional,
                sum(lokasi_kecelakaan_status_jalan_propinsi) as lokasi_kecelakaan_status_jalan_propinsi,
                sum(lokasi_kecelakaan_status_jalan_kab_kota) as lokasi_kecelakaan_status_jalan_kab_kota,
                sum(lokasi_kecelakaan_status_jalan_desa_lingkungan) as lokasi_kecelakaan_status_jalan_desa_lingkungan,
                sum(lokasi_kecelakaan_fungsi_jalan_arteri) as lokasi_kecelakaan_fungsi_jalan_arteri,
                sum(lokasi_kecelakaan_fungsi_jalan_kolektor) as lokasi_kecelakaan_fungsi_jalan_kolektor,
                sum(lokasi_kecelakaan_fungsi_jalan_lokal) as lokasi_kecelakaan_fungsi_jalan_lokal,
                sum(lokasi_kecelakaan_fungsi_jalan_lingkungan) as lokasi_kecelakaan_fungsi_jalan_lingkungan,
                sum(faktor_penyebab_kecelakaan_manusia) as faktor_penyebab_kecelakaan_manusia,
                sum(faktor_penyebab_kecelakaan_ngantuk_lelah) as faktor_penyebab_kecelakaan_ngantuk_lelah,
                sum(faktor_penyebab_kecelakaan_mabuk_obat) as faktor_penyebab_kecelakaan_mabuk_obat,
                sum(faktor_penyebab_kecelakaan_sakit) as faktor_penyebab_kecelakaan_sakit,
                sum(faktor_penyebab_kecelakaan_handphone_elektronik) as faktor_penyebab_kecelakaan_handphone_elektronik,
                sum(faktor_penyebab_kecelakaan_menerobos_lampu_merah) as faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                sum(faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) as faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                sum(faktor_penyebab_kecelakaan_tidak_menjaga_jarak) as faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                sum(faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) as faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                sum(faktor_penyebab_kecelakaan_berpindah_jalur) as faktor_penyebab_kecelakaan_berpindah_jalur,
                sum(faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) as faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                sum(faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) as faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                sum(faktor_penyebab_kecelakaan_lainnya) as faktor_penyebab_kecelakaan_lainnya,
                sum(faktor_penyebab_kecelakaan_alam) as faktor_penyebab_kecelakaan_alam,
                sum(faktor_penyebab_kecelakaan_kelaikan_kendaraan) as faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                sum(faktor_penyebab_kecelakaan_kondisi_jalan) as faktor_penyebab_kecelakaan_kondisi_jalan,
                sum(faktor_penyebab_kecelakaan_prasarana_jalan) as faktor_penyebab_kecelakaan_prasarana_jalan,
                sum(faktor_penyebab_kecelakaan_rambu) as faktor_penyebab_kecelakaan_rambu,
                sum(faktor_penyebab_kecelakaan_marka) as faktor_penyebab_kecelakaan_marka,
                sum(faktor_penyebab_kecelakaan_apil) as faktor_penyebab_kecelakaan_apil,
                sum(faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) as faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,
                sum(waktu_kejadian_kecelakaan_00_03) as waktu_kejadian_kecelakaan_00_03,
                sum(waktu_kejadian_kecelakaan_03_06) as waktu_kejadian_kecelakaan_03_06,
                sum(waktu_kejadian_kecelakaan_06_09) as waktu_kejadian_kecelakaan_06_09,
                sum(waktu_kejadian_kecelakaan_09_12) as waktu_kejadian_kecelakaan_09_12,
                sum(waktu_kejadian_kecelakaan_12_15) as waktu_kejadian_kecelakaan_12_15,
                sum(waktu_kejadian_kecelakaan_15_18) as waktu_kejadian_kecelakaan_15_18,
                sum(waktu_kejadian_kecelakaan_18_21) as waktu_kejadian_kecelakaan_18_21,
                sum(waktu_kejadian_kecelakaan_21_24) as waktu_kejadian_kecelakaan_21_24,
                sum(kecelakaan_lalin_menonjol_jumlah_kejadian) as kecelakaan_lalin_menonjol_jumlah_kejadian,
                sum(kecelakaan_lalin_menonjol_korban_meninggal) as kecelakaan_lalin_menonjol_korban_meninggal,
                sum(kecelakaan_lalin_menonjol_korban_luka_berat) as kecelakaan_lalin_menonjol_korban_luka_berat,
                sum(kecelakaan_lalin_menonjol_korban_luka_ringan) as kecelakaan_lalin_menonjol_korban_luka_ringan,
                sum(kecelakaan_lalin_menonjol_materiil) as kecelakaan_lalin_menonjol_materiil,
                sum(kecelakaan_lalin_tunggal_jumlah_kejadian) as kecelakaan_lalin_tunggal_jumlah_kejadian,
                sum(kecelakaan_lalin_tunggal_korban_meninggal) as kecelakaan_lalin_tunggal_korban_meninggal,
                sum(kecelakaan_lalin_tunggal_korban_luka_berat) as kecelakaan_lalin_tunggal_korban_luka_berat,
                sum(kecelakaan_lalin_tunggal_korban_luka_ringan) as kecelakaan_lalin_tunggal_korban_luka_ringan,
                sum(kecelakaan_lalin_tunggal_materiil) as kecelakaan_lalin_tunggal_materiil,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) as kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) as kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_pejalan_kaki_materiil) as kecelakaan_lalin_tabrak_pejalan_kaki_materiil,
                sum(kecelakaan_lalin_tabrak_lari_jumlah_kejadian) as kecelakaan_lalin_tabrak_lari_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_lari_korban_meninggal) as kecelakaan_lalin_tabrak_lari_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_lari_korban_luka_berat) as kecelakaan_lalin_tabrak_lari_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_lari_korban_luka_ringan) as kecelakaan_lalin_tabrak_lari_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_lari_materiil) as kecelakaan_lalin_tabrak_lari_materiil,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) as kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) as kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) as kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_sepeda_motor_materiil) as kecelakaan_lalin_tabrak_sepeda_motor_materiil,
                sum(kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) as kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) as kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) as kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_roda_empat_materiil) as kecelakaan_lalin_tabrak_roda_empat_materiil,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) as kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) as kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,
                sum(kecelakaan_lalin_tabrak_tidak_bermotor_materiil) as kecelakaan_lalin_tabrak_tidak_bermotor_materiil,
                sum(kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) as kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,
                sum(kecelakaan_lalin_perlintasan_ka_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_berpalang_pintu,
                sum(kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) as kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,
                sum(kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) as kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,
                sum(kecelakaan_lalin_perlintasan_ka_korban_luka_berat) as kecelakaan_lalin_perlintasan_ka_korban_luka_berat,
                sum(kecelakaan_lalin_perlintasan_ka_korban_meninggal) as kecelakaan_lalin_perlintasan_ka_korban_meninggal,
                sum(kecelakaan_lalin_perlintasan_ka_materiil) as kecelakaan_lalin_perlintasan_ka_materiil,
                sum(kecelakaan_transportasi_kereta_api) as kecelakaan_transportasi_kereta_api,
                sum(kecelakaan_transportasi_laut_perairan) as kecelakaan_transportasi_laut_perairan,
                sum(kecelakaan_transportasi_udara) as kecelakaan_transportasi_udara,
                sum(penlu_melalui_media_cetak) as penlu_melalui_media_cetak,
                sum(penlu_melalui_media_elektronik) as penlu_melalui_media_elektronik,
                sum(penlu_melalui_tempat_keramaian) as penlu_melalui_tempat_keramaian,
                sum(penlu_melalui_tempat_istirahat) as penlu_melalui_tempat_istirahat,
                sum(penlu_melalui_daerah_rawan_laka_dan_langgar) as penlu_melalui_daerah_rawan_laka_dan_langgar,
                sum(penyebaran_pemasangan_spanduk) as penyebaran_pemasangan_spanduk,
                sum(penyebaran_pemasangan_leaflet) as penyebaran_pemasangan_leaflet,
                sum(penyebaran_pemasangan_sticker) as penyebaran_pemasangan_sticker,
                sum(penyebaran_pemasangan_bilboard) as penyebaran_pemasangan_bilboard,
                sum(polisi_sahabat_anak) as polisi_sahabat_anak,
                sum(cara_aman_sekolah) as cara_aman_sekolah,
                sum(patroli_keamanan_sekolah) as patroli_keamanan_sekolah,
                sum(pramuka_bhayangkara_krida_lalu_lintas) as pramuka_bhayangkara_krida_lalu_lintas,
                sum(police_goes_to_campus) as police_goes_to_campus,
                sum(safety_riding_driving) as safety_riding_driving,
                sum(forum_lalu_lintas_angkutan_umum) as forum_lalu_lintas_angkutan_umum,
                sum(kampanye_keselamatan) as kampanye_keselamatan,
                sum(sekolah_mengemudi) as sekolah_mengemudi,
                sum(taman_lalu_lintas) as taman_lalu_lintas,
                sum(global_road_safety_partnership_action) as global_road_safety_partnership_action,
                sum(giat_lantas_pengaturan) as giat_lantas_pengaturan,
                sum(giat_lantas_penjagaan) as giat_lantas_penjagaan,
                sum(giat_lantas_pengawalan) as giat_lantas_pengawalan,
                sum(giat_lantas_patroli) as giat_lantas_patroli')
            ->where('rencana_operasi_id', $rencana_operasi_id)
            ->where('year', $year)
            ->when($polda != 'polda_all', function ($q) use ($polda) {
                return $q->where('polda_id', $polda);
            })
            ->when($operation_date != 'semua_hari', function ($q) use ($operation_date) {
                return $q->where(DB::raw('DATE(created_at)'), $operation_date);
            })
            ->first();
        }

        return [
            'dailyInput' => (empty($dailyInput) || is_null($dailyInput)) ? null : $dailyInput,
            'dailyInputPrev' => (empty($dailyInputPrev) || is_null($dailyInputPrev)) ? null : $dailyInputPrev
        ];
    }

    public function polda_custom_name()
    {
        return view('operation.polda_custom');
    }

    public function getCustomName($uuid)
    {
        $rencana_operasi = RencanaOperasi::whereUuid($uuid)->first();

        if(!empty($rencana_operasi)) {
            $rencanaOpId = $rencana_operasi->id;
            $pCustomName = PoldaCustomOperationName::where('rencana_operasi_id', $rencanaOpId)->where('polda_id', poldaId())->first();

            if(empty($pCustomName)) {
                return [
                    'rencana_op_id' => $rencanaOpId,
                    'output' => null
                ];
            } else {
                return [
                    'rencana_op_id' => $rencanaOpId,
                    'output' => $pCustomName->alias
                ];
            }
        } else {
            abort(404);
        }
    }

    public function storeCustomName()
    {
        $pcon = PoldaCustomOperationName::updateOrCreate(
            ['rencana_operasi_id' => request('operation_id'), 'polda_id' => poldaId()],
            ['alias' => strtoupper(request('alias'))]
        );

        return $pcon;
    }
}
