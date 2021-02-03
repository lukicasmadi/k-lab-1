<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PHRORequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Field ini harus diisi minimal dengan angka 0',
            'numeric' => 'Field ini harus dalam format numeric'
        ];
    }

    public function rules()
    {
        return [
            'pelanggaran_lalu_lintas_tilang' => 'required|numeric',
            'pelanggaran_lalu_lintas_teguran' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_gun_helm_sni' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_melawan_arus' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_gun_hp_saat_berkendara' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_melebihi_batas_kecepatan' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_berkendara_dibawah_umur' => 'required|numeric',
            // 'pelanggaran_sepeda_motor_lain_lain' => 'required|numeric',
            // 'pelanggaran_mobil_melawan_arus' => 'required|numeric',
            // 'pelanggaran_mobil_gun_hp_saat_berkendara' => 'required|numeric',
            // 'pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol' => 'required|numeric',
            // 'pelanggaran_mobil_melebihi_batas_kecepatan' => 'required|numeric',
            // 'pelanggaran_mobil_berkendara_dibawah_umur' => 'required|numeric',
            // 'pelanggaran_mobil_gun_safety_belt' => 'required|numeric',
            // 'pelanggaran_mobil_lain_lain' => 'required|numeric',
            // 'barang_bukti_yg_disita_sim' => 'required|numeric',
            // 'barang_bukti_yg_disita_stnk' => 'required|numeric',
            // 'barang_bukti_yg_disita_kendaraan' => 'required|numeric',
            // 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor' => 'required|numeric',
            // 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang' => 'required|numeric',
            // 'kendaraan_yang_terlibat_pelanggaran_mobil_bus' => 'required|numeric',
            // 'kendaraan_yang_terlibat_pelanggaran_mobil_barang' => 'required|numeric',
            // 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_pns' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_karyawan_swasta' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_pelajar_mahasiswa' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_pengemudi_supir' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_tni' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_polri' => 'required|numeric',
            // 'profesi_pelaku_pelanggaran_lain_lain' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_kurang_dari_15_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_16_20_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_21_25_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_26_30_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_31_35_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_36_40_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_41_45_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_46_50_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_51_55_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_56_60_tahun' => 'required|numeric',
            // 'usia_pelaku_pelanggaran_diatas_60_tahun' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_a' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_a_umum' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_b1' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_b1_umum' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_b2' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_b2_umum' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_c' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_d' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_sim_internasional' => 'required|numeric',
            // 'sim_pelaku_pelanggaran_tanpa_sim' => 'required|numeric',
            // 'lokasi_pelanggaran_pemukiman' => 'required|numeric',
            // 'lokasi_pelanggaran_perbelanjaan' => 'required|numeric',
            // 'lokasi_pelanggaran_perkantoran' => 'required|numeric',
            // 'lokasi_pelanggaran_wisata' => 'required|numeric',
            // 'lokasi_pelanggaran_industri' => 'required|numeric',
            // 'lokasi_pelanggaran_status_jalan_nasional' => 'required|numeric',
            // 'lokasi_pelanggaran_status_jalan_propinsi' => 'required|numeric',
            // 'lokasi_pelanggaran_status_jalan_kab_kota' => 'required|numeric',
            // 'lokasi_pelanggaran_status_jalan_desa_lingkungan' => 'required|numeric',
            // 'lokasi_pelanggaran_fungsi_jalan_arteri' => 'required|numeric',
            // 'lokasi_pelanggaran_fungsi_jalan_kolektor' => 'required|numeric',
            // 'lokasi_pelanggaran_fungsi_jalan_lokal' => 'required|numeric',
            // 'lokasi_pelanggaran_fungsi_jalan_lingkungan' => 'required|numeric',
            // 'kecelakaan_lalin_jumlah_kejadian' => 'required|numeric',
            // 'kecelakaan_lalin_jumlah_korban_meninggal' => 'required|numeric',
            // 'kecelakaan_lalin_jumlah_korban_luka_berat' => 'required|numeric',
            // 'kecelakaan_lalin_jumlah_korban_luka_ringan' => 'required|numeric',
            // 'kecelakaan_lalin_jumlah_kerugian_materiil' => 'required|numeric',
            // 'kecelakaan_barang_bukti_yg_disita_sim' => 'required|numeric',
            // 'kecelakaan_barang_bukti_yg_disita_stnk' => 'required|numeric',
            // 'kecelakaan_barang_bukti_yg_disita_kendaraan' => 'required|numeric',
        ];
    }
}
