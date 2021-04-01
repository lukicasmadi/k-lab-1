<table>
    <thead>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="4">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="4">KORP LALU LINTAS</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="4">LAPORAN HARIAN {{ upperCase($operation->name) }} AKUMULASI SELURUH POLDA</td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="4">TANGGAL: {{ dateOnly($operation->start_date) }} S/D {{ dateOnly($operation->end_date) }}</td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="4">KORLANTAS</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th>NO</th>
            <th>URAIAN</th>
            <th>REKAP HARIAN</th>
            <th>KET</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="background-color: #c6efcd;">I</td>
            <td style="background-color: #c6efcd;">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">1</td>
            <td style="background-color: #c6efcd;">PELANGGARAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. TILANG</td>
            <td>{{ $data->pelanggaran_lalu_lintas_tilang }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. TEGURAN</td>
            <td>{{ $data->pelanggaran_lalu_lintas_teguran }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->pelanggaran_lalu_lintas_teguran,
                $data->pelanggaran_lalu_lintas_teguran
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">2</td>
            <td style="background-color: #c6efcd;">JENIS PELANGGARAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. SEPEDA MOTOR</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) GUN HELM SNI</td>
            <td>{{ $data->pelanggaran_sepeda_motor_gun_helm_sni }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) MELAWAN ARUS</td>
            <td>{{ $data->pelanggaran_sepeda_motor_melawan_arus }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) GUN HP SAAT BERKENDARA</td>
            <td>{{ $data->pelanggaran_sepeda_motor_gun_hp_saat_berkendara }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) BERKENDARA DI BAWAH PENGARUH ALKOHOL</td>
            <td>{{ $data->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) MELEBIHI BATAS KECEPATAN</td>
            <td>{{ $data->pelanggaran_sepeda_motor_melebihi_batas_kecepatan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>6) BERKENDARA DI BAWAH UMUR</td>
            <td>{{ $data->pelanggaran_sepeda_motor_berkendara_dibawah_umur }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>7) LAIN - LAIN</td>
            <td>{{ $data->pelanggaran_sepeda_motor_lain_lain }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->pelanggaran_sepeda_motor_gun_helm_sni,
                $data->pelanggaran_sepeda_motor_melawan_arus,
                $data->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $data->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $data->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $data->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $data->pelanggaran_sepeda_motor_lain_lain
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">b. MOBIL DAN KENDARAAN KHUSUS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) MELAWAN ARUS</td>
            <td>{{ $data->pelanggaran_mobil_melawan_arus }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) GUN HP SAAT BERKENDARA</td>
            <td>{{ $data->pelanggaran_mobil_gun_hp_saat_berkendara }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) BERKENDARA DI BAWAH PENGARUH ALKOHOL</td>
            <td>{{ $data->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) MELEBIHI BATAS KECEPATAN</td>
            <td>{{ $data->pelanggaran_mobil_melebihi_batas_kecepatan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) BERKENDARA DI BAWAH UMUR</td>
            <td>{{ $data->pelanggaran_mobil_berkendara_dibawah_umur }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>6) GUN SAFETY BELT</td>
            <td>{{ $data->pelanggaran_mobil_gun_safety_belt }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>7) LAIN - LAIN</td>
            <td>{{ $data->pelanggaran_mobil_lain_lain }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->pelanggaran_mobil_melawan_arus,
                $data->pelanggaran_mobil_gun_hp_saat_berkendara,
                $data->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $data->pelanggaran_mobil_melebihi_batas_kecepatan,
                $data->pelanggaran_mobil_berkendara_dibawah_umur,
                $data->pelanggaran_mobil_gun_safety_belt,
                $data->pelanggaran_mobil_lain_lain
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">3</td>
            <td style="background-color: #c6efcd;">BARANGBUKTI YANG DISITA</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SIM</td>
            <td>{{ $data->barang_bukti_yg_disita_sim }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. STNK</td>
            <td>{{ $data->barang_bukti_yg_disita_stnk }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KENDARAAN</td>
            <td>{{ $data->barang_bukti_yg_disita_kendaraan }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->barang_bukti_yg_disita_sim,
                $data->barang_bukti_yg_disita_stnk,
                $data->barang_bukti_yg_disita_kendaraan
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">4</td>
            <td style="background-color: #c6efcd;">KENDARAAN YANG TERLIBAT PELANGGARAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SEPEDA MOTOR</td>
            <td>{{ $data->kendaraan_yang_terlibat_pelanggaran_sepeda_motor }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MOBIL PENUMPANG</td>
            <td>{{ $data->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MOBIL BUS</td>
            <td>{{ $data->kendaraan_yang_terlibat_pelanggaran_mobil_bus }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>d. MOBIL BARANG</td>
            <td>{{ $data->kendaraan_yang_terlibat_pelanggaran_mobil_barang }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KENDARAAN KHUSUS</td>
            <td>{{ $data->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                $data->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                $data->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                $data->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                $data->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">5</td>
            <td style="background-color: #c6efcd;">PROFESI PELAKU PELANGGARAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PEGAWAI NEGERI SIPIL</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_pns }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KARYAWAN / SWASTA</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_karyawan_swasta }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. PELAJAR / MAHASISWA</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_pelajar_mahasiswa }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PENGEMUDI (SUPIR)</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_pengemudi_supir }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>e. TNI</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_tni }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>f. POLRI</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_polri }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>g LAIN-LAIN</td>
            <td>{{ $data->profesi_pelaku_pelanggaran_lain_lain }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->profesi_pelaku_pelanggaran_pns,
                $data->profesi_pelaku_pelanggaran_karyawan_swasta,
                $data->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $data->profesi_pelaku_pelanggaran_pengemudi_supir,
                $data->profesi_pelaku_pelanggaran_tni,
                $data->profesi_pelaku_pelanggaran_polri,
                $data->profesi_pelaku_pelanggaran_lain_lain
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">6</td>
            <td style="background-color: #c6efcd;">USIA PELAKU PELANGGARAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. &lt; 15 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_kurang_dari_15_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 16 - 20 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_16_20_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 21 - 25 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_21_25_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 26 - 30 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_26_30_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 31 - 35 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_31_35_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 36 - 40 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_36_40_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 41 - 45 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_41_45_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 46 - 50 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_46_50_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>I. 51 - 55 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_51_55_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>j. 56 - 60 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_56_60_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>k. > 60 TAHUN</td>
            <td>{{ $data->usia_pelaku_pelanggaran_diatas_60_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $data->usia_pelaku_pelanggaran_16_20_tahun,
                $data->usia_pelaku_pelanggaran_21_25_tahun,
                $data->usia_pelaku_pelanggaran_26_30_tahun,
                $data->usia_pelaku_pelanggaran_31_35_tahun,
                $data->usia_pelaku_pelanggaran_36_40_tahun,
                $data->usia_pelaku_pelanggaran_41_45_tahun,
                $data->usia_pelaku_pelanggaran_46_50_tahun,
                $data->usia_pelaku_pelanggaran_51_55_tahun,
                $data->usia_pelaku_pelanggaran_56_60_tahun,
                $data->usia_pelaku_pelanggaran_diatas_60_tahun
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">7</td>
            <td style="background-color: #c6efcd;">SIM PELAKU PELANGGARAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. A</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_a }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>b. A UMUM</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_a_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>c. B1</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_b1 }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>d. B1 UMUM</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_b1_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BII</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_b2 }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>f. B II UMUM</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_b2_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>g. C</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_c }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>h. D</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_d }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SIM INTERNASIONAL</td>
            <td>{{ $data->sim_pelaku_pelanggaran_sim_internasional }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TANPA SIM</td>
            <td>{{ $data->sim_pelaku_pelanggaran_tanpa_sim }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                    $data->sim_pelaku_pelanggaran_sim_a,
                    $data->sim_pelaku_pelanggaran_sim_a_umum,
                    $data->sim_pelaku_pelanggaran_sim_b1,
                    $data->sim_pelaku_pelanggaran_sim_b1_umum,
                    $data->sim_pelaku_pelanggaran_sim_b2,
                    $data->sim_pelaku_pelanggaran_sim_b2_umum,
                    $data->sim_pelaku_pelanggaran_sim_c,
                    $data->sim_pelaku_pelanggaran_sim_d,
                    $data->sim_pelaku_pelanggaran_sim_internasional,
                    $data->sim_pelaku_pelanggaran_tanpa_sim
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">8</td>
            <td style="background-color: #c6efcd;">LOKASI PELANGGARAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. BERDASARKAN KAWASAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) KAWASAN PEMUKIMAN</td>
            <td>{{ $data->lokasi_pelanggaran_pemukiman }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KAWASAN PERBELANJAAN</td>
            <td>{{ $data->lokasi_pelanggaran_perbelanjaan }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>3) PERKANTORAN</td>
            <td>{{ $data->lokasi_pelanggaran_perkantoran }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>4) KAWASAN WISATA</td>
            <td>{{ $data->lokasi_pelanggaran_wisata }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>5) KAWASAN INDUTRI</td>
            <td>{{ $data->lokasi_pelanggaran_industri }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->lokasi_pelanggaran_pemukiman,
                $data->lokasi_pelanggaran_perbelanjaan,
                $data->lokasi_pelanggaran_perkantoran,
                $data->lokasi_pelanggaran_wisata,
                $data->lokasi_pelanggaran_industri
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">b. STATUS JALAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) NASIONAL</td>
            <td>{{ $data->lokasi_pelanggaran_status_jalan_nasional }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>2) PROPINSI</td>
            <td>{{ $data->lokasi_pelanggaran_status_jalan_propinsi }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>3) KAB/KOTA</td>
            <td>{{ $data->lokasi_pelanggaran_status_jalan_kab_kota }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>4) DESA / LINGKUNGAN</td>
            <td>{{ $data->lokasi_pelanggaran_status_jalan_desa_lingkungan }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->lokasi_pelanggaran_status_jalan_nasional,
                $data->lokasi_pelanggaran_status_jalan_propinsi,
                $data->lokasi_pelanggaran_status_jalan_kab_kota,
                $data->lokasi_pelanggaran_status_jalan_desa_lingkungan
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">c. BERDASARKAN FUNGSI JALAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) ARTERI</td>
            <td>{{ $data->lokasi_pelanggaran_fungsi_jalan_arteri }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KOLEKTOR</td>
            <td>{{ $data->lokasi_pelanggaran_fungsi_jalan_kolektor }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>3) LOKAL</td>
            <td>{{ $data->lokasi_pelanggaran_fungsi_jalan_lokal }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>4) LINGKUNGAN</td>
            <td>{{ $data->lokasi_pelanggaran_fungsi_jalan_lingkungan }}</td>
            <td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->lokasi_pelanggaran_fungsi_jalan_arteri,
                $data->lokasi_pelanggaran_fungsi_jalan_kolektor,
                $data->lokasi_pelanggaran_fungsi_jalan_lokal,
                $data->lokasi_pelanggaran_fungsi_jalan_lingkungan
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">II</td>
            <td style="background-color: #c6efcd;">DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">9</td>
            <td style="background-color: #c6efcd;">KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_jumlah_kejadian }}</td>
            <td>Kasus</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_jumlah_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_jumlah_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_jumlah_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KERUGIAN MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_jumlah_kerugian_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">10</td>
            <td style="background-color: #c6efcd;">BARANGBUKTI YANG DISITA</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SIM</td>
            <td>{{ $data->kecelakaan_barang_bukti_yg_disita_sim }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. STNK</td>
            <td>{{ $data->kecelakaan_barang_bukti_yg_disita_stnk }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KENDARAAN</td>
            <td>{{ $data->kecelakaan_barang_bukti_yg_disita_kendaraan }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->kecelakaan_lalin_jumlah_kejadian,
                $data->kecelakaan_lalin_jumlah_korban_meninggal,
                $data->kecelakaan_lalin_jumlah_korban_luka_berat,
                $data->kecelakaan_lalin_jumlah_korban_luka_ringan,
                $data->kecelakaan_lalin_jumlah_kerugian_materiil,
                $data->kecelakaan_barang_bukti_yg_disita_sim,
                $data->kecelakaan_barang_bukti_yg_disita_stnk,
                $data->kecelakaan_barang_bukti_yg_disita_kendaraan
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">11</td>
            <td style="background-color: #c6efcd;">PROFESI KORBAN KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PEGAWAI NEGERI SIPIL</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_pns }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KARYAWAN / SWASTA</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_karwayan_swasta }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MAHASISWA / PELAJAR</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PENGEMUDI</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_pengemudi }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. TNI</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_tni }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. POLRI</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_polri }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. LAIN-LAIN</td>
            <td>{{ $data->profesi_korban_kecelakaan_lalin_lain_lain }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->profesi_korban_kecelakaan_lalin_pns,
                $data->profesi_korban_kecelakaan_lalin_karwayan_swasta,
                $data->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                $data->profesi_korban_kecelakaan_lalin_pengemudi,
                $data->profesi_korban_kecelakaan_lalin_tni,
                $data->profesi_korban_kecelakaan_lalin_polri,
                $data->profesi_korban_kecelakaan_lalin_lain_lain
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">12</td>
            <td style="background-color: #c6efcd;">USIA KORBAN KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. &lt; 15 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_kurang_15 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 16 - 20 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_16_20 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 21 - 25 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_21_25 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 26 - 30 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_26_30 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 31 - 35 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_31_35 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 36 - 40 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_36_40 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 41 - 45 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_41_45 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 46 - 50 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_45_50 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>I. 51 - 55 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_51_55 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>j. 56 - 60 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_56_60 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>k. > 60 TAHUN</td>
            <td>{{ $data->usia_korban_kecelakaan_diatas_60 }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->usia_korban_kecelakaan_kurang_15,
                $data->usia_korban_kecelakaan_16_20,
                $data->usia_korban_kecelakaan_21_25,
                $data->usia_korban_kecelakaan_26_30,
                $data->usia_korban_kecelakaan_31_35,
                $data->usia_korban_kecelakaan_36_40,
                $data->usia_korban_kecelakaan_41_45,
                $data->usia_korban_kecelakaan_45_50,
                $data->usia_korban_kecelakaan_51_55,
                $data->usia_korban_kecelakaan_56_60,
                $data->usia_korban_kecelakaan_diatas_60
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">13</td>
            <td style="background-color: #c6efcd;">SIM KORBAN KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. A</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_a }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>b. A UMUM</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_a_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>c. B1</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_b1 }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>d. B1 UMUM</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_b1_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BII</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_b2 }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>f. BII UMUM</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_b2_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>g. C</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_c }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>h. D</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_d }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SIM INTERNASIONAL</td>
            <td>{{ $data->sim_korban_kecelakaan_sim_internasional }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TANPA SIM</td>
            <td>{{ $data->sim_korban_kecelakaan_tanpa_sim }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->sim_korban_kecelakaan_sim_a,
                $data->sim_korban_kecelakaan_sim_a_umum,
                $data->sim_korban_kecelakaan_sim_b1,
                $data->sim_korban_kecelakaan_sim_b1_umum,
                $data->sim_korban_kecelakaan_sim_b2,
                $data->sim_korban_kecelakaan_sim_b2_umum,
                $data->sim_korban_kecelakaan_sim_c,
                $data->sim_korban_kecelakaan_sim_d,
                $data->sim_korban_kecelakaan_sim_internasional,
                $data->sim_korban_kecelakaan_tanpa_sim
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">14</td>
            <td style="background-color: #c6efcd;">KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SEPEDA MOTOR</td>
            <td>{{ $data->kendaraan_yg_terlibat_kecelakaan_sepeda_motor }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MOBIL PENUMPANG</td>
            <td>{{ $data->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MOBIL BUS</td>
            <td>{{ $data->kendaraan_yg_terlibat_kecelakaan_mobil_bus }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>d. MOBIL BARANG</td>
            <td>{{ $data->kendaraan_yg_terlibat_kecelakaan_mobil_barang }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KENDARAAN KHUSUS</td>
            <td>{{ $data->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>f. KENDARAAN TIDAK BERMOTOR</td>
            <td>{{ $data->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor }}</td>
            <td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                $data->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                $data->kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                $data->kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                $data->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                $data->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">15</td>
            <td style="background-color: #c6efcd;">JENIS KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. TUNGGAL / OUT OF CONTROL</td>
            <td>{{ $data->jenis_kecelakaan_tunggal_ooc }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>b. DEPAN-DEPAN</td>
            <td>{{ $data->jenis_kecelakaan_depan_depan }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>c. DEPAN-BELAKANG</td>
            <td>{{ $data->jenis_kecelakaan_depan_belakang }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>d. DEPAN-SAMPING</td>
            <td>{{ $data->jenis_kecelakaan_depan_samping }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BERUNTUN</td>
            <td>{{ $data->jenis_kecelakaan_beruntun }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>f. TABRAK PEJALAN KAKI</td>
            <td>{{ $data->jenis_kecelakaan_pejalan_kaki }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>g. TABRAK LARI</td>
            <td>{{ $data->jenis_kecelakaan_tabrak_lari }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>h. TABRAK HEWAN</td>
            <td>{{ $data->jenis_kecelakaan_tabrak_hewan }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SAMPING-SAMPING</td>
            <td>{{ $data->jenis_kecelakaan_samping_samping }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>j. LAINNYA</td>
            <td>{{ $data->jenis_kecelakaan_lainnya }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->jenis_kecelakaan_tunggal_ooc,
                $data->jenis_kecelakaan_depan_depan,
                $data->jenis_kecelakaan_depan_belakang,
                $data->jenis_kecelakaan_depan_samping,
                $data->jenis_kecelakaan_beruntun,
                $data->jenis_kecelakaan_pejalan_kaki,
                $data->jenis_kecelakaan_tabrak_lari,
                $data->jenis_kecelakaan_tabrak_hewan,
                $data->jenis_kecelakaan_samping_samping,
                $data->jenis_kecelakaan_lainnya
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">16</td>
            <td style="background-color: #c6efcd;">PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PEGAWAI NEGERI SIPIL</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_pns }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KARYAWAN / SWASTA</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_karyawan_swasta }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MAHASISWA / PELAJAR</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PENGEMUDI</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_pengemudi }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. TNI</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_tni }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. POLRI</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_polri }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. LAIN-LAIN</td>
            <td>{{ $data->profesi_pelaku_kecelakaan_lalin_lain_lain }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->profesi_pelaku_kecelakaan_lalin_pns,
                $data->profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                $data->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelaja,
                $data->profesi_pelaku_kecelakaan_lalin_pengemudi,
                $data->profesi_pelaku_kecelakaan_lalin_tni,
                $data->profesi_pelaku_kecelakaan_lalin_polri,
                $data->profesi_pelaku_kecelakaan_lalin_lain_lain
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">17</td>
            <td style="background-color: #c6efcd;">USIA PELAKU KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. &lt; 15 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_kurang_dari_15_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 16 - 20 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_16_20_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 21 - 25 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_21_25_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 26 - 30 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_26_30_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 31 - 35 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_31_35_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 36 - 40 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_36_40_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 41 - 45 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_41_45_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 46 - 50 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_46_50_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>I. 51 - 55 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_51_55_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>j. 56 - 60 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_56_60_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>k. > 60 TAHUN</td>
            <td>{{ $data->usia_pelaku_kecelakaan_diatas_60_tahun }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                $data->usia_pelaku_kecelakaan_16_20_tahun,
                $data->usia_pelaku_kecelakaan_21_25_tahun,
                $data->usia_pelaku_kecelakaan_26_30_tahun,
                $data->usia_pelaku_kecelakaan_31_35_tahun,
                $data->usia_pelaku_kecelakaan_36_40_tahun,
                $data->usia_pelaku_kecelakaan_41_45_tahun,
                $data->usia_pelaku_kecelakaan_46_50_tahun,
                $data->usia_pelaku_kecelakaan_51_55_tahun,
                $data->usia_pelaku_kecelakaan_56_60_tahun,
                $data->usia_pelaku_kecelakaan_diatas_60_tahun
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">18</td>
            <td style="background-color: #c6efcd;">SIM PELAKU KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. A</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_a }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>b. A UMUM</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_a_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>c. B1</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_b1 }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>d. B1 UMUM</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_b1_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BII</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_b2 }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>f. B II UMUM</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_b2_umum }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>g. C</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_c }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>h. D</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_d }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SIM INTERNASIONAL</td>
            <td>{{ $data->sim_pelaku_kecelakaan_sim_internasional }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TANPA SIM</td>
            <td>{{ $data->sim_pelaku_kecelakaan_tanpa_sim }}</td>
            <td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->sim_pelaku_kecelakaan_sim_a,
                $data->sim_pelaku_kecelakaan_sim_a_umum,
                $data->sim_pelaku_kecelakaan_sim_b1,
                $data->sim_pelaku_kecelakaan_sim_b1_umum,
                $data->sim_pelaku_kecelakaan_sim_b2,
                $data->sim_pelaku_kecelakaan_sim_b2_umum,
                $data->sim_pelaku_kecelakaan_sim_c,
                $data->sim_pelaku_kecelakaan_sim_d,
                $data->sim_pelaku_kecelakaan_sim_internasional,
                $data->sim_pelaku_kecelakaan_tanpa_sim
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">19</td>
            <td style="background-color: #c6efcd;">LOKASI KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. BERDASARKAN KAWASAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) KAWASAN PEMUKIMAN</td>
            <td>{{ $data->lokasi_kecelakaan_lalin_pemukiman }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KAWASAN PERBELANJAAN</td>
            <td>{{ $data->lokasi_kecelakaan_lalin_perbelanjaan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) PERKANTORAN</td>
            <td>{{ $data->lokasi_kecelakaan_lalin_perkantoran }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) KAWASAN WISATA</td>
            <td>{{ $data->lokasi_kecelakaan_lalin_wisata }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) KAWASAN INDUTRI</td>
            <td>{{ $data->lokasi_kecelakaan_lalin_industri }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>6) LAIN - LAIN</td>
            <td>{{ $data->lokasi_kecelakaan_lalin_lain_lain }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->lokasi_kecelakaan_lalin_pemukiman,
                $data->lokasi_kecelakaan_lalin_perbelanjaan,
                $data->lokasi_kecelakaan_lalin_perkantoran,
                $data->lokasi_kecelakaan_lalin_wisata,
                $data->lokasi_kecelakaan_lalin_industri,
                $data->lokasi_kecelakaan_lalin_lain_lain
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">b. BERDASARKAN STATUS JALAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) NASIONAL</td>
            <td>{{ $data->lokasi_kecelakaan_status_jalan_nasional }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) PROPINSI</td>
            <td>{{ $data->lokasi_kecelakaan_status_jalan_propinsi }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) KAB/KOTA</td>
            <td>{{ $data->lokasi_kecelakaan_status_jalan_kab_kota }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) DESA / LINGKUNGAN</td>
            <td>{{ $data->lokasi_kecelakaan_status_jalan_desa_lingkungan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">
                {{ calculation([
                $data->lokasi_kecelakaan_status_jalan_nasional,
                $data->lokasi_kecelakaan_status_jalan_propinsi,
                $data->lokasi_kecelakaan_status_jalan_kab_kota,
                $data->lokasi_kecelakaan_status_jalan_desa_lingkungan
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>



        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">c. BERDASARKAN FUNGSI JALAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) ARTERI</td>
            <td>{{ $data->lokasi_kecelakaan_fungsi_jalan_arteri }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KOLEKTOR</td>
            <td>{{ $data->lokasi_kecelakaan_fungsi_jalan_kolektor }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) LOKAL</td>
            <td>{{ $data->lokasi_kecelakaan_fungsi_jalan_lokal }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) LINGKUNGAN</td>
            <td>{{ $data->lokasi_kecelakaan_fungsi_jalan_lingkungan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->lokasi_kecelakaan_fungsi_jalan_arteri,
                $data->lokasi_kecelakaan_fungsi_jalan_kolektor,
                $data->lokasi_kecelakaan_fungsi_jalan_lokal,
                $data->lokasi_kecelakaan_fungsi_jalan_lingkungan
            ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>


        <tr>
            <td style="background-color: #c6efcd;">20</td>
            <td style="background-color: #c6efcd;">FAKTOR PENYEBAB KECELAKAAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) MANUSIA</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_manusia }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>a. NGANTUK/LELAH (PSL 283)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_ngantuk_lelah }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MABUK /PENGARUH ALKOHOL DAN OBAT (PSL 283)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_mabuk_obat }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. SAKIT (PSL 283)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_sakit }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. HAND PHONE/ ALAT ELEKTRONIK LAIN (PSL 283)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_handphone_elektronik }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MENEROBOS LAMPU MERAH(PSL 287 AY 2)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_menerobos_lampu_merah }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>f. MELANGGAR BATAS KECEPATAN (PSL 287 AY 7)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>g. TIDAK MENJAGA JARAK</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_tidak_menjaga_jarak }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>h. MENDAHULUI/BERBELOK/BERPINDAH JALUR (PSL 294)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>I. BERPINDAH LAJUR ( PSL 295)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_berpindah_jalur }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TIDAK MEMBERIKAN LAMPU ISYARAT BERHENTI/BERBELOK   /BERUBAH ARAH</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>k. TIDAK MENGUTAMAKAN PEJALAN KAKI (PSL 284 JO 106 AY 2)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>l. LAINNYA</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_lainnya }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) ALAM</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_alam }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) KELAIKAN KENDARAAN</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_kelaikan_kendaraan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) JALAN (KONDISI JALAN)</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_kondisi_jalan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) PRASARANA JALAN</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_prasarana_jalan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>a. RAMBU</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_rambu }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MARKA</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_marka }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. APIL</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_apil }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PERLINTASAN KA TANPA PALANG PINTU</td>
            <td>{{ $data->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->faktor_penyebab_kecelakaan_ngantuk_lelah,
                $data->faktor_penyebab_kecelakaan_mabuk_obat,
                $data->faktor_penyebab_kecelakaan_sakit,
                $data->faktor_penyebab_kecelakaan_handphone_elektronik,
                $data->faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                $data->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                $data->faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                $data->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                $data->faktor_penyebab_kecelakaan_berpindah_jalur,
                $data->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                $data->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                $data->faktor_penyebab_kecelakaan_lainnya,
                $data->faktor_penyebab_kecelakaan_alam,
                $data->faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                $data->faktor_penyebab_kecelakaan_kondisi_jalan,
                $data->faktor_penyebab_kecelakaan_rambu,
                $data->faktor_penyebab_kecelakaan_marka,
                $data->faktor_penyebab_kecelakaan_apil,
                $data->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">21</td>
            <td style="background-color: #c6efcd;">WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. 00.00 - 03.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_00_03 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 03.00 - 06.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_03_06 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 06.00- 09.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_06_09 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 09.00 - 12.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_09_12 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 12.00 - 15.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_12_15 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 15.00 - 18.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_15_18 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 18.00 - 21.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_18_21 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 21.00 - 24.00</td>
            <td>{{ $data->waktu_kejadian_kecelakaan_21_24 }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->waktu_kejadian_kecelakaan_00_03,
                $data->waktu_kejadian_kecelakaan_03_06,
                $data->waktu_kejadian_kecelakaan_06_09,
                $data->waktu_kejadian_kecelakaan_09_12,
                $data->waktu_kejadian_kecelakaan_12_15,
                $data->waktu_kejadian_kecelakaan_15_18,
                $data->waktu_kejadian_kecelakaan_18_21,
                $data->waktu_kejadian_kecelakaan_21_24
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">22</td>
            <td style="background-color: #c6efcd;">KECELAKAAN LALU LINTAS MENONJOL</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_menonjol_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_menonjol_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_menonjol_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_menonjol_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_menonjol_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">23</td>
            <td style="background-color: #c6efcd;">KECELAKAAN LALU LINTAS TUNGGAL / OUT OF CONTROL</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_tunggal_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_tunggal_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_tunggal_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_tunggal_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_tunggal_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">24</td>
            <td style="background-color: #c6efcd;">TABRAK PEJALAN KAKI</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_pejalan_kaki_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">25</td>
            <td style="background-color: #c6efcd;">TABRAK LARI</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_lari_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_lari_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_lari_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_lari_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_lari_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">26</td>
            <td style="background-color: #c6efcd;">TABRAK SEPEDA MOTOR ( R2 )</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_sepeda_motor_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">27</td>
            <td style="background-color: #c6efcd;">TABRAK RANMOR RODA EMPAT ( R4 )</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_roda_empat_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">28</td>
            <td style="background-color: #c6efcd;">TABRAK KENDARAAN TIDAK BERMOTOR (SEPEDA,BECAK DAYUNG, DELMAN, DOKAR DLL)</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_tabrak_tidak_bermotor_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">29</td>
            <td style="background-color: #c6efcd;">KECELAKAAN DI PERLINTASAN KA</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. BERPALANG PINTU</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_berpalang_pintu }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. TIDAK BERPALANG PINTU</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KORBAN LUKA BERAT</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_korban_luka_berat }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_korban_meninggal }}</td>
            <td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. MATERIIL</td>
            <td>{{ $data->kecelakaan_lalin_perlintasan_ka_materiil }}</td>
            <td>Rp</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">30</td>
            <td style="background-color: #c6efcd;">KECELAKAAN TRANSPORTASI</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. KECELAKAAN KERETA API</td>
            <td>{{ $data->kecelakaan_transportasi_kereta_api }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KECELAKAAN LAUT / PERAIRAN</td>
            <td>{{ $data->kecelakaan_transportasi_laut_perairan }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KECELAKAAN UDARA</td>
            <td>{{ $data->kecelakaan_transportasi_udara }}</td>
            <td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->kecelakaan_transportasi_kereta_api,
                $data->kecelakaan_transportasi_laut_perairan,
                $data->kecelakaan_transportasi_udara
                ]) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">III</td>
            <td style="background-color: #c6efcd;">DATA TERKAIT DIKMAS LANTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">31</td>
            <td style="background-color: #c6efcd;">DIKMAS LANTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. PENLUH</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) MELALUI MEDIA CETAK</td>
            <td>{{ $data->penlu_melalui_media_cetak }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) MELALUI MEDIA ELEKTRONIK</td>
            <td>{{ $data->penlu_melalui_media_elektronik }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) TEMPAT KERAMAIAN</td>
            <td>{{ $data->penlu_melalui_tempat_keramaian }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) TEMPAT ISTIRAHAT</td>
            <td>{{ $data->penlu_melalui_tempat_istirahat }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>5) DAERAH RAWAN LAKA &amp; LANGGAR</td>
            <td>{{ $data->penlu_melalui_daerah_rawan_laka_dan_langgar }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td>{{ calculation([
                $data->penlu_melalui_media_cetak,
                $data->penlu_melalui_media_elektronik,
                $data->penlu_melalui_tempat_keramaian,
                $data->penlu_melalui_tempat_istirahat,
                $data->penlu_melalui_daerah_rawan_laka_dan_langgar
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">b. PENYEBARAN / PEMASANGAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) SPANDUK</td>
            <td>{{ $data->penyebaran_pemasangan_spanduk }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) LEAFLET</td>
            <td>{{ $data->penyebaran_pemasangan_leaflet }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) STICKER</td>
            <td>{{ $data->penyebaran_pemasangan_sticker }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) BILBOARD</td>
            <td>{{ $data->penyebaran_pemasangan_bilboard }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                    $data->penyebaran_pemasangan_spanduk,
                    $data->penyebaran_pemasangan_leaflet,
                    $data->penyebaran_pemasangan_sticker,
                    $data->penyebaran_pemasangan_bilboard
                ]) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">c. PROGRAM NASIONAL KEAMANAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) POLISI SAHABAT ANAK</td>
            <td>{{ $data->polisi_sahabat_anak }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) CARA AMAN SEKOLAH</td>
            <td>{{ $data->cara_aman_sekolah }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) PATROLI KEAMANAN SEKOLAH</td>
            <td>{{ $data->patroli_keamanan_sekolah }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) PRAMUKA SAKA BHAYANGKARA KRIDA LALU LINTAS</td>
            <td>{{ $data->pramuka_bhayangkara_krida_lalu_lintas }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->polisi_sahabat_anak,
                $data->cara_aman_sekolah,
                $data->patroli_keamanan_sekolah,
                $data->pramuka_bhayangkara_krida_lalu_lintas
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">d. PROGRAM NASIONAL KESELAMATAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) POLICE GOES TO CAMPUS</td>
            <td>{{ $data->police_goes_to_campus }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) SAFETY RIDING &amp; DRIVING</td>
            <td>{{ $data->safety_riding_driving }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) FORUM LALU LINTAS &amp; ANGKUTAN JALAN</td>
            <td>{{ $data->forum_lalu_lintas_angkutan_umum }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) KAMPANYE KESELAMATAN</td>
            <td>{{ $data->kampanye_keselamatan }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>5) SEKOLAH MENGEMUDI</td>
            <td>{{ $data->sekolah_mengemudi }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>6) TAMAN LALU LINTAS</td>
            <td>{{ $data->taman_lalu_lintas }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>7) GLOBAL ROAD SAFETY PARTNERSHIP ACTION</td>
            <td>{{ $data->global_road_safety_partnership_action }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $data->police_goes_to_campus,
                $data->safety_riding_driving,
                $data->forum_lalu_lintas_angkutan_umum,
                $data->kampanye_keselamatan,
                $data->sekolah_mengemudi,
                $data->taman_lalu_lintas,
                $data->global_road_safety_partnership_action
                ]) }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">32</td>
            <td style="background-color: #c6efcd;">DATA TERKAIT GIAT KEPOLISIAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">GIAT LANTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PENGATURAN</td>
            <td>{{ $data->giat_lantas_pengaturan }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>b. PENJAGAAN</td>
            <td>{{ $data->giat_lantas_penjagaan }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>c. PENGAWALAN</td>
            <td>{{ $data->giat_lantas_pengawalan }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PATROLI</td>
            <td>{{ $data->giat_lantas_patroli }}</td>
            <td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
               $data->giat_lantas_pengaturan,
               $data->giat_lantas_penjagaan,
               $data->giat_lantas_pengawalan,
               $data->giat_lantas_patroli
                ]) }}</td>
            <td></td>
        </tr>
    </tbody>
</table>
