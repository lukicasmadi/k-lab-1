<table>
    <thead>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="7">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="7">KORP LALU LINTAS</td>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="7">LAPORAN PERBANDINGAN {{ \Illuminate\Support\Str::upper($operation->name) }} SELURUH POLDA</td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="7">TANGGAL: {{ $operation->start_date->format("Y-m-d") }} S/D {{ $operation->end_date->format("Y-m-d") }}</td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="7">KORLANTAS</td>
        </tr>
        <tr>
            <td colspan="7"></td>
        </tr>
        <tr>
            <th style="background-color: #eeeeee; text-align: center;" rowspan="3">NO</th>
            <th style="background-color: #eeeeee; text-align: center;" rowspan="3">URAIAN</th>
            <th style="background-color: #eeeeee; text-align: center;" colspan="4">REKAP HARIAN</th>
            <th style="background-color: #eeeeee; text-align: center;" rowspan="3">KET</th>
        </tr>
        <tr>
            <th style="background-color: #eeeeee; text-align: center;" colspan="2">TAHUN</th>
            <th style="background-color: #eeeeee; text-align: center;" colspan="2">TREND</th>
        </tr>
        <tr>
            <th style="background-color: #eeeeee; text-align: center;">2020</th>
            <th style="background-color: #eeeeee; text-align: center;">2021</th>
            <th style="background-color: #eeeeee; text-align: center;">ANGKA</th>
            <th style="background-color: #eeeeee; text-align: center;">%</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="background-color: #c6efcd;">I</td>
            <td style="background-color: #c6efcd;">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">1</td>
            <td style="background-color: #c6efcd;">PELANGGARAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. TILANG</td>
            <td>{{ $tahunPertama->pelanggaran_lalu_lintas_tilang }}</td>
            <td>{{ $tahunKedua->pelanggaran_lalu_lintas_tilang }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_lalu_lintas_tilang, $tahunPertama->pelanggaran_lalu_lintas_tilang) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_lalu_lintas_tilang, $tahunPertama->pelanggaran_lalu_lintas_tilang) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. TEGURAN</td>
            <td>{{ $tahunPertama->pelanggaran_lalu_lintas_teguran }}</td>
            <td>{{ $tahunKedua->pelanggaran_lalu_lintas_teguran }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_lalu_lintas_teguran, $tahunPertama->pelanggaran_lalu_lintas_teguran) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_lalu_lintas_teguran, $tahunPertama->pelanggaran_lalu_lintas_teguran) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->pelanggaran_lalu_lintas_tilang,
                $tahunPertama->pelanggaran_lalu_lintas_teguran
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->pelanggaran_lalu_lintas_tilang,
                $tahunKedua->pelanggaran_lalu_lintas_teguran
            ]) }}</td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->pelanggaran_lalu_lintas_tilang,
                $tahunKedua->pelanggaran_lalu_lintas_teguran
            ]), calculation([
                $tahunPertama->pelanggaran_lalu_lintas_tilang,
                $tahunPertama->pelanggaran_lalu_lintas_teguran
            ])) }}
            </td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->pelanggaran_lalu_lintas_tilang,
                $tahunKedua->pelanggaran_lalu_lintas_teguran
            ]), calculation([
                $tahunPertama->pelanggaran_lalu_lintas_tilang,
                $tahunPertama->pelanggaran_lalu_lintas_teguran
            ])) }}</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. SEPEDA MOTOR</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) GUN HELM SNI</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_gun_helm_sni }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_gun_helm_sni }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_gun_helm_sni, $tahunPertama->pelanggaran_sepeda_motor_gun_helm_sni) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_gun_helm_sni, $tahunPertama->pelanggaran_sepeda_motor_gun_helm_sni) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) MELAWAN ARUS</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_melawan_arus }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_melawan_arus }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_melawan_arus, $tahunPertama->pelanggaran_sepeda_motor_melawan_arus) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_melawan_arus, $tahunPertama->pelanggaran_sepeda_motor_melawan_arus) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) GUN HP SAAT BERKENDARA</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_gun_hp_saat_berkendara }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_gun_hp_saat_berkendara }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_gun_hp_saat_berkendara, $tahunPertama->pelanggaran_sepeda_motor_gun_hp_saat_berkendara) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_gun_hp_saat_berkendara, $tahunPertama->pelanggaran_sepeda_motor_gun_hp_saat_berkendara) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) BERKENDARA DI BAWAH PENGARUH ALKOHOL</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol, $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol, $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) MELEBIHI BATAS KECEPATAN</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_melebihi_batas_kecepatan }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_melebihi_batas_kecepatan }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_melebihi_batas_kecepatan, $tahunPertama->pelanggaran_sepeda_motor_melebihi_batas_kecepatan) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_melebihi_batas_kecepatan, $tahunPertama->pelanggaran_sepeda_motor_melebihi_batas_kecepatan) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>6) BERKENDARA DI BAWAH UMUR</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_umur }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_umur }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_umur, $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_umur) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_umur, $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_umur) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>7) LAIN - LAIN</td>
            <td>{{ $tahunPertama->pelanggaran_sepeda_motor_lain_lain }}</td>
            <td>{{ $tahunKedua->pelanggaran_sepeda_motor_lain_lain }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_sepeda_motor_lain_lain, $tahunPertama->pelanggaran_sepeda_motor_lain_lain) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_sepeda_motor_lain_lain, $tahunPertama->pelanggaran_sepeda_motor_lain_lain) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->pelanggaran_sepeda_motor_gun_helm_sni,
                $tahunPertama->pelanggaran_sepeda_motor_melawan_arus,
                $tahunPertama->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $tahunPertama->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $tahunPertama->pelanggaran_sepeda_motor_lain_lain
            ]) }}
            </td>
             <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->pelanggaran_sepeda_motor_gun_helm_sni,
                $tahunKedua->pelanggaran_sepeda_motor_melawan_arus,
                $tahunKedua->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $tahunKedua->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $tahunKedua->pelanggaran_sepeda_motor_lain_lain
            ]) }}
            </td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->pelanggaran_sepeda_motor_gun_helm_sni,
                $tahunKedua->pelanggaran_sepeda_motor_melawan_arus,
                $tahunKedua->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $tahunKedua->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $tahunKedua->pelanggaran_sepeda_motor_lain_lain
            ]), calculation([
                $tahunPertama->pelanggaran_sepeda_motor_gun_helm_sni,
                $tahunPertama->pelanggaran_sepeda_motor_melawan_arus,
                $tahunPertama->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $tahunPertama->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $tahunPertama->pelanggaran_sepeda_motor_lain_lain
            ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->pelanggaran_sepeda_motor_gun_helm_sni,
                $tahunKedua->pelanggaran_sepeda_motor_melawan_arus,
                $tahunKedua->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $tahunKedua->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $tahunKedua->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $tahunKedua->pelanggaran_sepeda_motor_lain_lain
            ]), calculation([
                $tahunPertama->pelanggaran_sepeda_motor_gun_helm_sni,
                $tahunPertama->pelanggaran_sepeda_motor_melawan_arus,
                $tahunPertama->pelanggaran_sepeda_motor_gun_hp_saat_berkendara,
                $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_pengaruh_alkohol,
                $tahunPertama->pelanggaran_sepeda_motor_melebihi_batas_kecepatan,
                $tahunPertama->pelanggaran_sepeda_motor_berkendara_dibawah_umur,
                $tahunPertama->pelanggaran_sepeda_motor_lain_lain
            ])) }}</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) MELAWAN ARUS</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_melawan_arus }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_melawan_arus }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_melawan_arus, $tahunPertama->pelanggaran_mobil_melawan_arus) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_melawan_arus, $tahunPertama->pelanggaran_mobil_melawan_arus) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) GUN HP SAAT BERKENDARA</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_gun_hp_saat_berkendara }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_gun_hp_saat_berkendara }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_gun_hp_saat_berkendara, $tahunPertama->pelanggaran_mobil_gun_hp_saat_berkendara) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_gun_hp_saat_berkendara, $tahunPertama->pelanggaran_mobil_gun_hp_saat_berkendara) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) BERKENDARA DI BAWAH PENGARUH ALKOHOL</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol, $tahunPertama->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol, $tahunPertama->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) MELEBIHI BATAS KECEPATAN</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_melebihi_batas_kecepatan }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_melebihi_batas_kecepatan }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_melebihi_batas_kecepatan, $tahunPertama->pelanggaran_mobil_melebihi_batas_kecepatan) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_melebihi_batas_kecepatan, $tahunPertama->pelanggaran_mobil_melebihi_batas_kecepatan) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) BERKENDARA DI BAWAH UMUR</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_berkendara_dibawah_umur }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_berkendara_dibawah_umur }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_berkendara_dibawah_umur, $tahunPertama->pelanggaran_mobil_berkendara_dibawah_umur) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_berkendara_dibawah_umur, $tahunPertama->pelanggaran_mobil_berkendara_dibawah_umur) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>6) GUN SAFETY BELT</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_gun_safety_belt }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_gun_safety_belt }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_gun_safety_belt, $tahunPertama->pelanggaran_mobil_gun_safety_belt) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_gun_safety_belt, $tahunPertama->pelanggaran_mobil_gun_safety_belt) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>7) LAIN - LAIN</td>
            <td>{{ $tahunPertama->pelanggaran_mobil_lain_lain }}</td>
            <td>{{ $tahunKedua->pelanggaran_mobil_lain_lain }}</td>
			<td>{{ percentageStatus($tahunKedua->pelanggaran_mobil_lain_lain, $tahunPertama->pelanggaran_mobil_lain_lain) }}</td>
			<td>{{ percentageValue($tahunKedua->pelanggaran_mobil_lain_lain, $tahunPertama->pelanggaran_mobil_lain_lain) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->pelanggaran_mobil_melawan_arus,
                $tahunPertama->pelanggaran_mobil_gun_hp_saat_berkendara,
                $tahunPertama->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $tahunPertama->pelanggaran_mobil_melebihi_batas_kecepatan,
                $tahunPertama->pelanggaran_mobil_berkendara_dibawah_umur,
                $tahunPertama->pelanggaran_mobil_gun_safety_belt,
                $tahunPertama->pelanggaran_mobil_lain_lain
            ]) }}
            </td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->pelanggaran_mobil_melawan_arus,
                $tahunKedua->pelanggaran_mobil_gun_hp_saat_berkendara,
                $tahunKedua->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $tahunKedua->pelanggaran_mobil_melebihi_batas_kecepatan,
                $tahunKedua->pelanggaran_mobil_berkendara_dibawah_umur,
                $tahunKedua->pelanggaran_mobil_gun_safety_belt,
                $tahunKedua->pelanggaran_mobil_lain_lain
            ]) }}
            </td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->pelanggaran_mobil_melawan_arus,
                $tahunKedua->pelanggaran_mobil_gun_hp_saat_berkendara,
                $tahunKedua->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $tahunKedua->pelanggaran_mobil_melebihi_batas_kecepatan,
                $tahunKedua->pelanggaran_mobil_berkendara_dibawah_umur,
                $tahunKedua->pelanggaran_mobil_gun_safety_belt,
                $tahunKedua->pelanggaran_mobil_lain_lain
            ]), calculation([
                $tahunPertama->pelanggaran_mobil_melawan_arus,
                $tahunPertama->pelanggaran_mobil_gun_hp_saat_berkendara,
                $tahunPertama->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $tahunPertama->pelanggaran_mobil_melebihi_batas_kecepatan,
                $tahunPertama->pelanggaran_mobil_berkendara_dibawah_umur,
                $tahunPertama->pelanggaran_mobil_gun_safety_belt,
                $tahunPertama->pelanggaran_mobil_lain_lain
            ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->pelanggaran_mobil_melawan_arus,
                $tahunKedua->pelanggaran_mobil_gun_hp_saat_berkendara,
                $tahunKedua->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $tahunKedua->pelanggaran_mobil_melebihi_batas_kecepatan,
                $tahunKedua->pelanggaran_mobil_berkendara_dibawah_umur,
                $tahunKedua->pelanggaran_mobil_gun_safety_belt,
                $tahunKedua->pelanggaran_mobil_lain_lain
            ]), calculation([
                $tahunPertama->pelanggaran_mobil_melawan_arus,
                $tahunPertama->pelanggaran_mobil_gun_hp_saat_berkendara,
                $tahunPertama->pelanggaran_mobil_berkendara_dibawah_pengaruh_alkohol,
                $tahunPertama->pelanggaran_mobil_melebihi_batas_kecepatan,
                $tahunPertama->pelanggaran_mobil_berkendara_dibawah_umur,
                $tahunPertama->pelanggaran_mobil_gun_safety_belt,
                $tahunPertama->pelanggaran_mobil_lain_lain
            ])) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">3</td>
            <td style="background-color: #c6efcd;">BARANG BUKTI YANG DISITA</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SIM</td>
            <td>{{ $tahunPertama->barang_bukti_yg_disita_sim }}</td>
            <td>{{ $tahunKedua->barang_bukti_yg_disita_sim }}</td>
			<td>{{ percentageStatus($tahunKedua->barang_bukti_yg_disita_sim, $tahunPertama->barang_bukti_yg_disita_sim) }}</td>
			<td>{{ percentageValue($tahunKedua->barang_bukti_yg_disita_sim, $tahunPertama->barang_bukti_yg_disita_sim) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. STNK</td>
            <td>{{ $tahunPertama->barang_bukti_yg_disita_stnk }}</td>
            <td>{{ $tahunKedua->barang_bukti_yg_disita_stnk }}</td>
			<td>{{ percentageStatus($tahunKedua->barang_bukti_yg_disita_stnk, $tahunPertama->barang_bukti_yg_disita_stnk) }}</td>
			<td>{{ percentageValue($tahunKedua->barang_bukti_yg_disita_stnk, $tahunPertama->barang_bukti_yg_disita_stnk) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KENDARAAN</td>
            <td>{{ $tahunPertama->barang_bukti_yg_disita_kendaraan }}</td>
            <td>{{ $tahunKedua->barang_bukti_yg_disita_kendaraan }}</td>
			<td>{{ percentageStatus($tahunKedua->barang_bukti_yg_disita_kendaraan, $tahunPertama->barang_bukti_yg_disita_kendaraan) }}</td>
			<td>{{ percentageValue($tahunKedua->barang_bukti_yg_disita_kendaraan, $tahunPertama->barang_bukti_yg_disita_kendaraan) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->barang_bukti_yg_disita_sim,
                $tahunPertama->barang_bukti_yg_disita_stnk,
                $tahunPertama->barang_bukti_yg_disita_kendaraan
            ]) }}
            </td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->barang_bukti_yg_disita_sim,
                $tahunKedua->barang_bukti_yg_disita_stnk,
                $tahunKedua->barang_bukti_yg_disita_kendaraan
            ]) }}
            </td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->barang_bukti_yg_disita_sim,
                $tahunKedua->barang_bukti_yg_disita_stnk,
                $tahunKedua->barang_bukti_yg_disita_kendaraan
            ]), calculation([
                $tahunPertama->barang_bukti_yg_disita_sim,
                $tahunPertama->barang_bukti_yg_disita_stnk,
                $tahunPertama->barang_bukti_yg_disita_kendaraan
            ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->barang_bukti_yg_disita_sim,
                $tahunKedua->barang_bukti_yg_disita_stnk,
                $tahunKedua->barang_bukti_yg_disita_kendaraan
            ]), calculation([
                $tahunPertama->barang_bukti_yg_disita_sim,
                $tahunPertama->barang_bukti_yg_disita_stnk,
                $tahunPertama->barang_bukti_yg_disita_kendaraan
            ])) }}</td>
			<td>Unit</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SEPEDA MOTOR</td>
            <td>{{ $tahunPertama->kendaraan_yang_terlibat_pelanggaran_sepeda_motor }}</td>
            <td>{{ $tahunKedua->kendaraan_yang_terlibat_pelanggaran_sepeda_motor }}</td>
			<td>{{ percentageStatus($tahunKedua->kendaraan_yang_terlibat_pelanggaran_sepeda_motor, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_sepeda_motor) }}</td>
			<td>{{ percentageValue($tahunKedua->kendaraan_yang_terlibat_pelanggaran_sepeda_motor, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_sepeda_motor) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MOBIL PENUMPANG</td>
            <td>{{ $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang }}</td>
            <td>{{ $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang }}</td>
			<td>{{ percentageStatus($tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) }}</td>
			<td>{{ percentageValue($tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MOBIL BUS</td>
            <td>{{ $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_bus }}</td>
            <td>{{ $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_bus }}</td>
			<td>{{ percentageStatus($tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_bus, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_bus) }}</td>
			<td>{{ percentageValue($tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_bus, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_bus) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>d. MOBIL BARANG</td>
            <td>{{ $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_barang }}</td>
            <td>{{ $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_barang }}</td>
			<td>{{ percentageStatus($tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_barang, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_barang) }}</td>
			<td>{{ percentageValue($tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_barang, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_barang) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KENDARAAN KHUSUS</td>
            <td>{{ $tahunPertama->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus }}</td>
            <td>{{ $tahunKedua->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus }}</td>
			<td>{{ percentageStatus($tahunKedua->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) }}</td>
			<td>{{ percentageValue($tahunKedua->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus, $tahunPertama->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) }}</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
            ]) }}
            </td>
           <td style="font-weight: bold;">{{ calculation([
            $tahunKedua->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
            $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
            $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
            $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
            $tahunKedua->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
        ]) }}
        </td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
            ]), calculation([
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
            ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                $tahunKedua->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
            ]), calculation([
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_sepeda_motor,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_bus,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_mobil_barang,
                $tahunPertama->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus
            ])) }}</td>
			<td>Unit</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PEGAWAI NEGERI SIPIL</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_pns }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_pns }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_pns, $tahunPertama->profesi_pelaku_pelanggaran_pns) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_pns, $tahunPertama->profesi_pelaku_pelanggaran_pns) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KARYAWAN / SWASTA</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_karyawan_swasta }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_karyawan_swasta }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_karyawan_swasta, $tahunPertama->profesi_pelaku_pelanggaran_karyawan_swasta) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_karyawan_swasta, $tahunPertama->profesi_pelaku_pelanggaran_karyawan_swasta) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. PELAJAR / MAHASISWA</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_pelajar_mahasiswa }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_pelajar_mahasiswa }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_pelajar_mahasiswa, $tahunPertama->profesi_pelaku_pelanggaran_pelajar_mahasiswa) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_pelajar_mahasiswa, $tahunPertama->profesi_pelaku_pelanggaran_pelajar_mahasiswa) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PENGEMUDI (SUPIR)</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_pengemudi_supir }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_pengemudi_supir }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_pengemudi_supir, $tahunPertama->profesi_pelaku_pelanggaran_pengemudi_supir) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_pengemudi_supir, $tahunPertama->profesi_pelaku_pelanggaran_pengemudi_supir) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>e. TNI</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_tni }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_tni }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_tni, $tahunPertama->profesi_pelaku_pelanggaran_tni) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_tni, $tahunPertama->profesi_pelaku_pelanggaran_tni) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>f. POLRI</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_polri }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_polri }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_polri, $tahunPertama->profesi_pelaku_pelanggaran_polri) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_polri, $tahunPertama->profesi_pelaku_pelanggaran_polri) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>g LAIN-LAIN</td>
            <td>{{ $tahunPertama->profesi_pelaku_pelanggaran_lain_lain }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_pelanggaran_lain_lain }}</td>
			<td>{{ percentageStatus($tahunKedua->profesi_pelaku_pelanggaran_lain_lain, $tahunPertama->profesi_pelaku_pelanggaran_lain_lain) }}</td>
			<td>{{ percentageValue($tahunKedua->profesi_pelaku_pelanggaran_lain_lain, $tahunPertama->profesi_pelaku_pelanggaran_lain_lain) }}</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->profesi_pelaku_pelanggaran_pns,
                $tahunPertama->profesi_pelaku_pelanggaran_karyawan_swasta,
                $tahunPertama->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $tahunPertama->profesi_pelaku_pelanggaran_pengemudi_supir,
                $tahunPertama->profesi_pelaku_pelanggaran_tni,
                $tahunPertama->profesi_pelaku_pelanggaran_polri,
                $tahunPertama->profesi_pelaku_pelanggaran_lain_lain
            ]) }}</td>
             <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->profesi_pelaku_pelanggaran_pns,
                $tahunKedua->profesi_pelaku_pelanggaran_karyawan_swasta,
                $tahunKedua->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $tahunKedua->profesi_pelaku_pelanggaran_pengemudi_supir,
                $tahunKedua->profesi_pelaku_pelanggaran_tni,
                $tahunKedua->profesi_pelaku_pelanggaran_polri,
                $tahunKedua->profesi_pelaku_pelanggaran_lain_lain
            ]) }}</td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->profesi_pelaku_pelanggaran_pns,
                $tahunKedua->profesi_pelaku_pelanggaran_karyawan_swasta,
                $tahunKedua->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $tahunKedua->profesi_pelaku_pelanggaran_pengemudi_supir,
                $tahunKedua->profesi_pelaku_pelanggaran_tni,
                $tahunKedua->profesi_pelaku_pelanggaran_polri,
                $tahunKedua->profesi_pelaku_pelanggaran_lain_lain
            ]), calculation([
                $tahunPertama->profesi_pelaku_pelanggaran_pns,
                $tahunPertama->profesi_pelaku_pelanggaran_karyawan_swasta,
                $tahunPertama->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $tahunPertama->profesi_pelaku_pelanggaran_pengemudi_supir,
                $tahunPertama->profesi_pelaku_pelanggaran_tni,
                $tahunPertama->profesi_pelaku_pelanggaran_polri,
                $tahunPertama->profesi_pelaku_pelanggaran_lain_lain
            ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->profesi_pelaku_pelanggaran_pns,
                $tahunKedua->profesi_pelaku_pelanggaran_karyawan_swasta,
                $tahunKedua->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $tahunKedua->profesi_pelaku_pelanggaran_pengemudi_supir,
                $tahunKedua->profesi_pelaku_pelanggaran_tni,
                $tahunKedua->profesi_pelaku_pelanggaran_polri,
                $tahunKedua->profesi_pelaku_pelanggaran_lain_lain
            ]), calculation([
                $tahunPertama->profesi_pelaku_pelanggaran_pns,
                $tahunPertama->profesi_pelaku_pelanggaran_karyawan_swasta,
                $tahunPertama->profesi_pelaku_pelanggaran_pelajar_mahasiswa,
                $tahunPertama->profesi_pelaku_pelanggaran_pengemudi_supir,
                $tahunPertama->profesi_pelaku_pelanggaran_tni,
                $tahunPertama->profesi_pelaku_pelanggaran_polri,
                $tahunPertama->profesi_pelaku_pelanggaran_lain_lain
            ])) }}</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. &lt; 15 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_kurang_dari_15_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_kurang_dari_15_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_kurang_dari_15_tahun, $tahunPertama->usia_pelaku_pelanggaran_kurang_dari_15_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_kurang_dari_15_tahun, $tahunPertama->usia_pelaku_pelanggaran_kurang_dari_15_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 16 - 20 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_16_20_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_16_20_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_16_20_tahun, $tahunPertama->usia_pelaku_pelanggaran_16_20_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_16_20_tahun, $tahunPertama->usia_pelaku_pelanggaran_16_20_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 21 - 25 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_21_25_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_21_25_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_21_25_tahun, $tahunPertama->usia_pelaku_pelanggaran_21_25_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_21_25_tahun, $tahunPertama->usia_pelaku_pelanggaran_21_25_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 26 - 30 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_26_30_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_26_30_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_26_30_tahun, $tahunPertama->usia_pelaku_pelanggaran_26_30_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_26_30_tahun, $tahunPertama->usia_pelaku_pelanggaran_26_30_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 31 - 35 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_31_35_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_31_35_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_31_35_tahun, $tahunPertama->usia_pelaku_pelanggaran_31_35_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_31_35_tahun, $tahunPertama->usia_pelaku_pelanggaran_31_35_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 36 - 40 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_36_40_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_36_40_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_36_40_tahun, $tahunPertama->usia_pelaku_pelanggaran_36_40_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_36_40_tahun, $tahunPertama->usia_pelaku_pelanggaran_36_40_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 41 - 45 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_41_45_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_41_45_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_41_45_tahun, $tahunPertama->usia_pelaku_pelanggaran_41_45_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_41_45_tahun, $tahunPertama->usia_pelaku_pelanggaran_41_45_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 46 - 50 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_46_50_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_46_50_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_46_50_tahun, $tahunPertama->usia_pelaku_pelanggaran_46_50_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_46_50_tahun, $tahunPertama->usia_pelaku_pelanggaran_46_50_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>I. 51 - 55 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_51_55_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_51_55_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_51_55_tahun, $tahunPertama->usia_pelaku_pelanggaran_51_55_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_51_55_tahun, $tahunPertama->usia_pelaku_pelanggaran_51_55_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>j. 56 - 60 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_56_60_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_56_60_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_56_60_tahun, $tahunPertama->usia_pelaku_pelanggaran_56_60_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_56_60_tahun, $tahunPertama->usia_pelaku_pelanggaran_56_60_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>k. > 60 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_pelanggaran_diatas_60_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_pelanggaran_diatas_60_tahun }}</td>
			<td>{{ percentageStatus($tahunKedua->usia_pelaku_pelanggaran_diatas_60_tahun, $tahunPertama->usia_pelaku_pelanggaran_diatas_60_tahun) }}</td>
			<td>{{ percentageValue($tahunKedua->usia_pelaku_pelanggaran_diatas_60_tahun, $tahunPertama->usia_pelaku_pelanggaran_diatas_60_tahun) }}</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_16_20_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_21_25_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_26_30_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_31_35_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_36_40_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_41_45_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_46_50_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_51_55_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_56_60_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_diatas_60_tahun
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_16_20_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_21_25_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_26_30_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_31_35_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_36_40_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_41_45_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_46_50_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_51_55_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_56_60_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_diatas_60_tahun
            ]) }}</td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_16_20_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_21_25_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_26_30_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_31_35_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_36_40_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_41_45_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_46_50_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_51_55_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_56_60_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_diatas_60_tahun
            ]), calculation([
                $tahunPertama->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_16_20_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_21_25_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_26_30_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_31_35_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_36_40_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_41_45_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_46_50_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_51_55_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_56_60_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_diatas_60_tahun
            ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_16_20_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_21_25_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_26_30_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_31_35_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_36_40_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_41_45_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_46_50_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_51_55_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_56_60_tahun,
                $tahunKedua->usia_pelaku_pelanggaran_diatas_60_tahun
            ]), calculation([
                $tahunPertama->usia_pelaku_pelanggaran_kurang_dari_15_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_16_20_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_21_25_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_26_30_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_31_35_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_36_40_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_41_45_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_46_50_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_51_55_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_56_60_tahun,
                $tahunPertama->usia_pelaku_pelanggaran_diatas_60_tahun
            ])) }}</td>
			<td>Orang</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. A</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_a }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_a }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_a, $tahunPertama->sim_pelaku_pelanggaran_sim_a) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_a, $tahunPertama->sim_pelaku_pelanggaran_sim_a) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>b. A UMUM</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_a_umum }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_a_umum }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_a_umum, $tahunPertama->sim_pelaku_pelanggaran_sim_a_umum) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_a_umum, $tahunPertama->sim_pelaku_pelanggaran_sim_a_umum) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>c. B1</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_b1 }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_b1 }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_b1, $tahunPertama->sim_pelaku_pelanggaran_sim_b1) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_b1, $tahunPertama->sim_pelaku_pelanggaran_sim_b1) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>d. B1 UMUM</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_b1_umum }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_b1_umum }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_b1_umum, $tahunPertama->sim_pelaku_pelanggaran_sim_b1_umum) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_b1_umum, $tahunPertama->sim_pelaku_pelanggaran_sim_b1_umum) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BII</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_b2 }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_b2 }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_b2, $tahunPertama->sim_pelaku_pelanggaran_sim_b2) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_b2, $tahunPertama->sim_pelaku_pelanggaran_sim_b2) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>f. B II UMUM</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_b2_umum }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_b2_umum }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_b2_umum, $tahunPertama->sim_pelaku_pelanggaran_sim_b2_umum) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_b2_umum, $tahunPertama->sim_pelaku_pelanggaran_sim_b2_umum) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>g. C</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_c }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_c }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_c, $tahunPertama->sim_pelaku_pelanggaran_sim_c) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_c, $tahunPertama->sim_pelaku_pelanggaran_sim_c) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>h. D</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_d }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_d }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_d, $tahunPertama->sim_pelaku_pelanggaran_sim_d) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_d, $tahunPertama->sim_pelaku_pelanggaran_sim_d) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SIM INTERNASIONAL</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_sim_internasional }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_sim_internasional }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_sim_internasional, $tahunPertama->sim_pelaku_pelanggaran_sim_internasional) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_sim_internasional, $tahunPertama->sim_pelaku_pelanggaran_sim_internasional) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TANPA SIM</td>
            <td>{{ $tahunPertama->sim_pelaku_pelanggaran_tanpa_sim }}</td>
            <td>{{ $tahunKedua->sim_pelaku_pelanggaran_tanpa_sim }}</td>
			<td>{{ percentageStatus($tahunKedua->sim_pelaku_pelanggaran_tanpa_sim, $tahunPertama->sim_pelaku_pelanggaran_tanpa_sim) }}</td>
			<td>{{ percentageValue($tahunKedua->sim_pelaku_pelanggaran_tanpa_sim, $tahunPertama->sim_pelaku_pelanggaran_tanpa_sim) }}</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                    $tahunPertama->sim_pelaku_pelanggaran_sim_a,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_a_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b1,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b1_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b2,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b2_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_c,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_d,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_internasional,
                    $tahunPertama->sim_pelaku_pelanggaran_tanpa_sim
                ]) }}</td>
             <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->sim_pelaku_pelanggaran_sim_a,
                $tahunKedua->sim_pelaku_pelanggaran_sim_a_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b1,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b1_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b2,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b2_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_c,
                $tahunKedua->sim_pelaku_pelanggaran_sim_d,
                $tahunKedua->sim_pelaku_pelanggaran_sim_internasional,
                $tahunKedua->sim_pelaku_pelanggaran_tanpa_sim
            ]) }}</td>
			<td>{{ percentageStatus(calculation([
                $tahunKedua->sim_pelaku_pelanggaran_sim_a,
                $tahunKedua->sim_pelaku_pelanggaran_sim_a_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b1,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b1_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b2,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b2_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_c,
                $tahunKedua->sim_pelaku_pelanggaran_sim_d,
                $tahunKedua->sim_pelaku_pelanggaran_sim_internasional,
                $tahunKedua->sim_pelaku_pelanggaran_tanpa_sim
            ]), calculation([
                    $tahunPertama->sim_pelaku_pelanggaran_sim_a,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_a_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b1,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b1_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b2,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b2_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_c,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_d,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_internasional,
                    $tahunPertama->sim_pelaku_pelanggaran_tanpa_sim
                ])) }}</td>
			<td>{{ percentageValue(calculation([
                $tahunKedua->sim_pelaku_pelanggaran_sim_a,
                $tahunKedua->sim_pelaku_pelanggaran_sim_a_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b1,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b1_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b2,
                $tahunKedua->sim_pelaku_pelanggaran_sim_b2_umum,
                $tahunKedua->sim_pelaku_pelanggaran_sim_c,
                $tahunKedua->sim_pelaku_pelanggaran_sim_d,
                $tahunKedua->sim_pelaku_pelanggaran_sim_internasional,
                $tahunKedua->sim_pelaku_pelanggaran_tanpa_sim
            ]), calculation([
                    $tahunPertama->sim_pelaku_pelanggaran_sim_a,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_a_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b1,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b1_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b2,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_b2_umum,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_c,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_d,
                    $tahunPertama->sim_pelaku_pelanggaran_sim_internasional,
                    $tahunPertama->sim_pelaku_pelanggaran_tanpa_sim
                ])) }}</td>
			<td>Buah</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. BERDASARKAN KAWASAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) KAWASAN PEMUKIMAN</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_pemukiman }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_pemukiman }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KAWASAN PERBELANJAAN</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_perbelanjaan }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_perbelanjaan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>3) PERKANTORAN</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_perkantoran }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_perkantoran }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>4) KAWASAN WISATA</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_wisata }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_wisata }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>5) KAWASAN INDUTRI</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_industri }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_industri }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->lokasi_pelanggaran_pemukiman,
                $tahunPertama->lokasi_pelanggaran_perbelanjaan,
                $tahunPertama->lokasi_pelanggaran_perkantoran,
                $tahunPertama->lokasi_pelanggaran_wisata,
                $tahunPertama->lokasi_pelanggaran_industri
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->lokasi_pelanggaran_pemukiman,
                $tahunKedua->lokasi_pelanggaran_perbelanjaan,
                $tahunKedua->lokasi_pelanggaran_perkantoran,
                $tahunKedua->lokasi_pelanggaran_wisata,
                $tahunKedua->lokasi_pelanggaran_industri
            ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) NASIONAL</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_status_jalan_nasional }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_status_jalan_nasional }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>2) PROPINSI</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_status_jalan_propinsi }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_status_jalan_propinsi }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>3) KAB/KOTA</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_status_jalan_kab_kota }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_status_jalan_kab_kota }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>4) DESA / LINGKUNGAN</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_status_jalan_desa_lingkungan }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_status_jalan_desa_lingkungan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->lokasi_pelanggaran_status_jalan_nasional,
                $tahunPertama->lokasi_pelanggaran_status_jalan_propinsi,
                $tahunPertama->lokasi_pelanggaran_status_jalan_kab_kota,
                $tahunPertama->lokasi_pelanggaran_status_jalan_desa_lingkungan
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->lokasi_pelanggaran_status_jalan_nasional,
                $tahunKedua->lokasi_pelanggaran_status_jalan_propinsi,
                $tahunKedua->lokasi_pelanggaran_status_jalan_kab_kota,
                $tahunKedua->lokasi_pelanggaran_status_jalan_desa_lingkungan
            ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) ARTERI</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_fungsi_jalan_arteri }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_fungsi_jalan_arteri }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KOLEKTOR</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_fungsi_jalan_kolektor }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_fungsi_jalan_kolektor }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>3) LOKAL</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_fungsi_jalan_lokal }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_fungsi_jalan_lokal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td>4) LINGKUNGAN</td>
            <td>{{ $tahunPertama->lokasi_pelanggaran_fungsi_jalan_lingkungan }}</td>
            <td>{{ $tahunKedua->lokasi_pelanggaran_fungsi_jalan_lingkungan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->lokasi_pelanggaran_fungsi_jalan_arteri,
                $tahunPertama->lokasi_pelanggaran_fungsi_jalan_kolektor,
                $tahunPertama->lokasi_pelanggaran_fungsi_jalan_lokal,
                $tahunPertama->lokasi_pelanggaran_fungsi_jalan_lingkungan
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->lokasi_pelanggaran_fungsi_jalan_arteri,
                $tahunKedua->lokasi_pelanggaran_fungsi_jalan_kolektor,
                $tahunKedua->lokasi_pelanggaran_fungsi_jalan_lokal,
                $tahunKedua->lokasi_pelanggaran_fungsi_jalan_lingkungan
            ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Lokasi</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">9</td>
            <td style="background-color: #c6efcd;">KECELAKAAN LALU LINTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_jumlah_kejadian }}</td>
            <td>Kasus</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_jumlah_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_jumlah_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_jumlah_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_jumlah_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_jumlah_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_jumlah_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KERUGIAN MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_jumlah_kerugian_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_jumlah_kerugian_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SIM</td>
            <td>{{ $tahunPertama->kecelakaan_barang_bukti_yg_disita_sim }}</td>
            <td>{{ $tahunKedua->kecelakaan_barang_bukti_yg_disita_sim }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. STNK</td>
            <td>{{ $tahunPertama->kecelakaan_barang_bukti_yg_disita_stnk }}</td>
            <td>{{ $tahunKedua->kecelakaan_barang_bukti_yg_disita_stnk }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KENDARAAN</td>
            <td>{{ $tahunPertama->kecelakaan_barang_bukti_yg_disita_kendaraan }}</td>
            <td>{{ $tahunKedua->kecelakaan_barang_bukti_yg_disita_kendaraan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->kecelakaan_lalin_jumlah_kejadian,
                $tahunPertama->kecelakaan_lalin_jumlah_korban_meninggal,
                $tahunPertama->kecelakaan_lalin_jumlah_korban_luka_berat,
                $tahunPertama->kecelakaan_lalin_jumlah_korban_luka_ringan,
                $tahunPertama->kecelakaan_lalin_jumlah_kerugian_materiil,
                $tahunPertama->kecelakaan_barang_bukti_yg_disita_sim,
                $tahunPertama->kecelakaan_barang_bukti_yg_disita_stnk,
                $tahunPertama->kecelakaan_barang_bukti_yg_disita_kendaraan
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->kecelakaan_lalin_jumlah_kejadian,
                $tahunKedua->kecelakaan_lalin_jumlah_korban_meninggal,
                $tahunKedua->kecelakaan_lalin_jumlah_korban_luka_berat,
                $tahunKedua->kecelakaan_lalin_jumlah_korban_luka_ringan,
                $tahunKedua->kecelakaan_lalin_jumlah_kerugian_materiil,
                $tahunKedua->kecelakaan_barang_bukti_yg_disita_sim,
                $tahunKedua->kecelakaan_barang_bukti_yg_disita_stnk,
                $tahunKedua->kecelakaan_barang_bukti_yg_disita_kendaraan
            ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PEGAWAI NEGERI SIPIL</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_pns }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_pns }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KARYAWAN / SWASTA</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_karwayan_swasta }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_karwayan_swasta }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MAHASISWA / PELAJAR</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PENGEMUDI</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_pengemudi }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_pengemudi }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. TNI</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_tni }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_tni }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. POLRI</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_polri }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_polri }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. LAIN-LAIN</td>
            <td>{{ $tahunPertama->profesi_korban_kecelakaan_lalin_lain_lain }}</td>
            <td>{{ $tahunKedua->profesi_korban_kecelakaan_lalin_lain_lain }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->profesi_korban_kecelakaan_lalin_pns,
                $tahunPertama->profesi_korban_kecelakaan_lalin_karwayan_swasta,
                $tahunPertama->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                $tahunPertama->profesi_korban_kecelakaan_lalin_pengemudi,
                $tahunPertama->profesi_korban_kecelakaan_lalin_tni,
                $tahunPertama->profesi_korban_kecelakaan_lalin_polri,
                $tahunPertama->profesi_korban_kecelakaan_lalin_lain_lain
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->profesi_korban_kecelakaan_lalin_pns,
                $tahunKedua->profesi_korban_kecelakaan_lalin_karwayan_swasta,
                $tahunKedua->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,
                $tahunKedua->profesi_korban_kecelakaan_lalin_pengemudi,
                $tahunKedua->profesi_korban_kecelakaan_lalin_tni,
                $tahunKedua->profesi_korban_kecelakaan_lalin_polri,
                $tahunKedua->profesi_korban_kecelakaan_lalin_lain_lain
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. &lt; 15 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_kurang_15 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_kurang_15 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 16 - 20 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_16_20 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_16_20 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 21 - 25 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_21_25 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_21_25 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 26 - 30 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_26_30 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_26_30 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 31 - 35 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_31_35 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_31_35 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 36 - 40 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_36_40 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_36_40 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 41 - 45 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_41_45 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_41_45 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 46 - 50 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_45_50 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_45_50 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>I. 51 - 55 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_51_55 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_51_55 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>j. 56 - 60 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_56_60 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_56_60 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>k. > 60 TAHUN</td>
            <td>{{ $tahunPertama->usia_korban_kecelakaan_diatas_60 }}</td>
            <td>{{ $tahunKedua->usia_korban_kecelakaan_diatas_60 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->usia_korban_kecelakaan_kurang_15,
                $tahunPertama->usia_korban_kecelakaan_16_20,
                $tahunPertama->usia_korban_kecelakaan_21_25,
                $tahunPertama->usia_korban_kecelakaan_26_30,
                $tahunPertama->usia_korban_kecelakaan_31_35,
                $tahunPertama->usia_korban_kecelakaan_36_40,
                $tahunPertama->usia_korban_kecelakaan_41_45,
                $tahunPertama->usia_korban_kecelakaan_45_50,
                $tahunPertama->usia_korban_kecelakaan_51_55,
                $tahunPertama->usia_korban_kecelakaan_56_60,
                $tahunPertama->usia_korban_kecelakaan_diatas_60
                ]) }}</td>
             <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->usia_korban_kecelakaan_kurang_15,
                $tahunKedua->usia_korban_kecelakaan_16_20,
                $tahunKedua->usia_korban_kecelakaan_21_25,
                $tahunKedua->usia_korban_kecelakaan_26_30,
                $tahunKedua->usia_korban_kecelakaan_31_35,
                $tahunKedua->usia_korban_kecelakaan_36_40,
                $tahunKedua->usia_korban_kecelakaan_41_45,
                $tahunKedua->usia_korban_kecelakaan_45_50,
                $tahunKedua->usia_korban_kecelakaan_51_55,
                $tahunKedua->usia_korban_kecelakaan_56_60,
                $tahunKedua->usia_korban_kecelakaan_diatas_60
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. A</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_a }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_a }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>b. A UMUM</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_a_umum }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_a_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>c. B1</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_b1 }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_b1 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>d. B1 UMUM</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_b1_umum }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_b1_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BII</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_b2 }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_b2 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>f. BII UMUM</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_b2_umum }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_b2_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>g. C</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_c }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_c }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>h. D</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_d }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_d }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SIM INTERNASIONAL</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_sim_internasional }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_sim_internasional }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TANPA SIM</td>
            <td>{{ $tahunPertama->sim_korban_kecelakaan_tanpa_sim }}</td>
            <td>{{ $tahunKedua->sim_korban_kecelakaan_tanpa_sim }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->sim_korban_kecelakaan_sim_a,
                $tahunPertama->sim_korban_kecelakaan_sim_a_umum,
                $tahunPertama->sim_korban_kecelakaan_sim_b1,
                $tahunPertama->sim_korban_kecelakaan_sim_b1_umum,
                $tahunPertama->sim_korban_kecelakaan_sim_b2,
                $tahunPertama->sim_korban_kecelakaan_sim_b2_umum,
                $tahunPertama->sim_korban_kecelakaan_sim_c,
                $tahunPertama->sim_korban_kecelakaan_sim_d,
                $tahunPertama->sim_korban_kecelakaan_sim_internasional,
                $tahunPertama->sim_korban_kecelakaan_tanpa_sim
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->sim_korban_kecelakaan_sim_a,
                $tahunKedua->sim_korban_kecelakaan_sim_a_umum,
                $tahunKedua->sim_korban_kecelakaan_sim_b1,
                $tahunKedua->sim_korban_kecelakaan_sim_b1_umum,
                $tahunKedua->sim_korban_kecelakaan_sim_b2,
                $tahunKedua->sim_korban_kecelakaan_sim_b2_umum,
                $tahunKedua->sim_korban_kecelakaan_sim_c,
                $tahunKedua->sim_korban_kecelakaan_sim_d,
                $tahunKedua->sim_korban_kecelakaan_sim_internasional,
                $tahunKedua->sim_korban_kecelakaan_tanpa_sim
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. SEPEDA MOTOR</td>
            <td>{{ $tahunPertama->kendaraan_yg_terlibat_kecelakaan_sepeda_motor }}</td>
            <td>{{ $tahunKedua->kendaraan_yg_terlibat_kecelakaan_sepeda_motor }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MOBIL PENUMPANG</td>
            <td>{{ $tahunPertama->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang }}</td>
            <td>{{ $tahunKedua->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MOBIL BUS</td>
            <td>{{ $tahunPertama->kendaraan_yg_terlibat_kecelakaan_mobil_bus }}</td>
            <td>{{ $tahunKedua->kendaraan_yg_terlibat_kecelakaan_mobil_bus }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>d. MOBIL BARANG</td>
            <td>{{ $tahunPertama->kendaraan_yg_terlibat_kecelakaan_mobil_barang }}</td>
            <td>{{ $tahunKedua->kendaraan_yg_terlibat_kecelakaan_mobil_barang }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KENDARAAN KHUSUS</td>
            <td>{{ $tahunPertama->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus }}</td>
            <td>{{ $tahunKedua->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td>f. KENDARAAN TIDAK BERMOTOR</td>
            <td>{{ $tahunPertama->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor }}</td>
            <td>{{ $tahunKedua->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                $tahunPertama->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                $tahunPertama->kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                $tahunPertama->kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                $tahunPertama->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                $tahunPertama->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->kendaraan_yg_terlibat_kecelakaan_sepeda_motor,
                $tahunKedua->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,
                $tahunKedua->kendaraan_yg_terlibat_kecelakaan_mobil_bus,
                $tahunKedua->kendaraan_yg_terlibat_kecelakaan_mobil_barang,
                $tahunKedua->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,
                $tahunKedua->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Unit</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. TUNGGAL / OUT OF CONTROL</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_tunggal_ooc }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_tunggal_ooc }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>b. DEPAN-DEPAN</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_depan_depan }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_depan_depan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>c. DEPAN-BELAKANG</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_depan_belakang }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_depan_belakang }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>d. DEPAN-SAMPING</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_depan_samping }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_depan_samping }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BERUNTUN</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_beruntun }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_beruntun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>f. TABRAK PEJALAN KAKI</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_pejalan_kaki }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_pejalan_kaki }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>g. TABRAK LARI</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_tabrak_lari }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_tabrak_lari }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>h. TABRAK HEWAN</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_tabrak_hewan }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_tabrak_hewan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SAMPING-SAMPING</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_samping_samping }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_samping_samping }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>j. LAINNYA</td>
            <td>{{ $tahunPertama->jenis_kecelakaan_lainnya }}</td>
            <td>{{ $tahunKedua->jenis_kecelakaan_lainnya }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->jenis_kecelakaan_tunggal_ooc,
                $tahunPertama->jenis_kecelakaan_depan_depan,
                $tahunPertama->jenis_kecelakaan_depan_belakang,
                $tahunPertama->jenis_kecelakaan_depan_samping,
                $tahunPertama->jenis_kecelakaan_beruntun,
                $tahunPertama->jenis_kecelakaan_pejalan_kaki,
                $tahunPertama->jenis_kecelakaan_tabrak_lari,
                $tahunPertama->jenis_kecelakaan_tabrak_hewan,
                $tahunPertama->jenis_kecelakaan_samping_samping,
                $tahunPertama->jenis_kecelakaan_lainnya
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->jenis_kecelakaan_tunggal_ooc,
                $tahunKedua->jenis_kecelakaan_depan_depan,
                $tahunKedua->jenis_kecelakaan_depan_belakang,
                $tahunKedua->jenis_kecelakaan_depan_samping,
                $tahunKedua->jenis_kecelakaan_beruntun,
                $tahunKedua->jenis_kecelakaan_pejalan_kaki,
                $tahunKedua->jenis_kecelakaan_tabrak_lari,
                $tahunKedua->jenis_kecelakaan_tabrak_hewan,
                $tahunKedua->jenis_kecelakaan_samping_samping,
                $tahunKedua->jenis_kecelakaan_lainnya
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PEGAWAI NEGERI SIPIL</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_pns }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_pns }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KARYAWAN / SWASTA</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_karyawan_swasta }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_karyawan_swasta }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. MAHASISWA / PELAJAR</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PENGEMUDI</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_pengemudi }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_pengemudi }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. TNI</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_tni }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_tni }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. POLRI</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_polri }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_polri }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. LAIN-LAIN</td>
            <td>{{ $tahunPertama->profesi_pelaku_kecelakaan_lalin_lain_lain }}</td>
            <td>{{ $tahunKedua->profesi_pelaku_kecelakaan_lalin_lain_lain }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_pns,
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelaja,
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_pengemudi,
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_tni,
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_polri,
                $tahunPertama->profesi_pelaku_kecelakaan_lalin_lain_lain
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_pns,
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_karyawan_swasta,
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelaja,
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_pengemudi,
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_tni,
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_polri,
                $tahunKedua->profesi_pelaku_kecelakaan_lalin_lain_lain
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. &lt; 15 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_kurang_dari_15_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_kurang_dari_15_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 16 - 20 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_16_20_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_16_20_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 21 - 25 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_21_25_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_21_25_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 26 - 30 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_26_30_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_26_30_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 31 - 35 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_31_35_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_31_35_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 36 - 40 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_36_40_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_36_40_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 41 - 45 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_41_45_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_41_45_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 46 - 50 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_46_50_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_46_50_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>I. 51 - 55 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_51_55_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_51_55_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>j. 56 - 60 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_56_60_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_56_60_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>k. > 60 TAHUN</td>
            <td>{{ $tahunPertama->usia_pelaku_kecelakaan_diatas_60_tahun }}</td>
            <td>{{ $tahunKedua->usia_pelaku_kecelakaan_diatas_60_tahun }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_16_20_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_21_25_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_26_30_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_31_35_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_36_40_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_41_45_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_46_50_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_51_55_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_56_60_tahun,
                $tahunPertama->usia_pelaku_kecelakaan_diatas_60_tahun
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->usia_pelaku_kecelakaan_kurang_dari_15_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_16_20_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_21_25_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_26_30_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_31_35_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_36_40_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_41_45_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_46_50_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_51_55_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_56_60_tahun,
                $tahunKedua->usia_pelaku_kecelakaan_diatas_60_tahun
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. A</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_a }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_a }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>b. A UMUM</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_a_umum }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_a_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>c. B1</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_b1 }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_b1 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>d. B1 UMUM</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_b1_umum }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_b1_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>e. BII</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_b2 }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_b2 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>f. B II UMUM</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_b2_umum }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_b2_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>g. C</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_c }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_c }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>h. D</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_d }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_d }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>I. SIM INTERNASIONAL</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_sim_internasional }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_sim_internasional }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TANPA SIM</td>
            <td>{{ $tahunPertama->sim_pelaku_kecelakaan_tanpa_sim }}</td>
            <td>{{ $tahunKedua->sim_pelaku_kecelakaan_tanpa_sim }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->sim_pelaku_kecelakaan_sim_a,
                $tahunPertama->sim_pelaku_kecelakaan_sim_a_umum,
                $tahunPertama->sim_pelaku_kecelakaan_sim_b1,
                $tahunPertama->sim_pelaku_kecelakaan_sim_b1_umum,
                $tahunPertama->sim_pelaku_kecelakaan_sim_b2,
                $tahunPertama->sim_pelaku_kecelakaan_sim_b2_umum,
                $tahunPertama->sim_pelaku_kecelakaan_sim_c,
                $tahunPertama->sim_pelaku_kecelakaan_sim_d,
                $tahunPertama->sim_pelaku_kecelakaan_sim_internasional,
                $tahunPertama->sim_pelaku_kecelakaan_tanpa_sim
                ]) }}</td>
             <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->sim_pelaku_kecelakaan_sim_a,
                $tahunKedua->sim_pelaku_kecelakaan_sim_a_umum,
                $tahunKedua->sim_pelaku_kecelakaan_sim_b1,
                $tahunKedua->sim_pelaku_kecelakaan_sim_b1_umum,
                $tahunKedua->sim_pelaku_kecelakaan_sim_b2,
                $tahunKedua->sim_pelaku_kecelakaan_sim_b2_umum,
                $tahunKedua->sim_pelaku_kecelakaan_sim_c,
                $tahunKedua->sim_pelaku_kecelakaan_sim_d,
                $tahunKedua->sim_pelaku_kecelakaan_sim_internasional,
                $tahunKedua->sim_pelaku_kecelakaan_tanpa_sim
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Buah</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. BERDASARKAN KAWASAN</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) KAWASAN PEMUKIMAN</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_lalin_pemukiman }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_lalin_pemukiman }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KAWASAN PERBELANJAAN</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_lalin_perbelanjaan }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_lalin_perbelanjaan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) PERKANTORAN</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_lalin_perkantoran }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_lalin_perkantoran }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) KAWASAN WISATA</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_lalin_wisata }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_lalin_wisata }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) KAWASAN INDUTRI</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_lalin_industri }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_lalin_industri }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>6) LAIN - LAIN</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_lalin_lain_lain }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_lalin_lain_lain }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->lokasi_kecelakaan_lalin_pemukiman,
                $tahunPertama->lokasi_kecelakaan_lalin_perbelanjaan,
                $tahunPertama->lokasi_kecelakaan_lalin_perkantoran,
                $tahunPertama->lokasi_kecelakaan_lalin_wisata,
                $tahunPertama->lokasi_kecelakaan_lalin_industri,
                $tahunPertama->lokasi_kecelakaan_lalin_lain_lain
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->lokasi_kecelakaan_lalin_pemukiman,
                $tahunKedua->lokasi_kecelakaan_lalin_perbelanjaan,
                $tahunKedua->lokasi_kecelakaan_lalin_perkantoran,
                $tahunKedua->lokasi_kecelakaan_lalin_wisata,
                $tahunKedua->lokasi_kecelakaan_lalin_industri,
                $tahunKedua->lokasi_kecelakaan_lalin_lain_lain
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) NASIONAL</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_status_jalan_nasional }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_status_jalan_nasional }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) PROPINSI</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_status_jalan_propinsi }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_status_jalan_propinsi }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) KAB/KOTA</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_status_jalan_kab_kota }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_status_jalan_kab_kota }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) DESA / LINGKUNGAN</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_status_jalan_desa_lingkungan }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_status_jalan_desa_lingkungan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">
                {{ calculation([
                $tahunPertama->lokasi_kecelakaan_status_jalan_nasional,
                $tahunPertama->lokasi_kecelakaan_status_jalan_propinsi,
                $tahunPertama->lokasi_kecelakaan_status_jalan_kab_kota,
                $tahunPertama->lokasi_kecelakaan_status_jalan_desa_lingkungan
                ]) }}</td>
            <td style="font-weight: bold;">
                {{ calculation([
                $tahunKedua->lokasi_kecelakaan_status_jalan_nasional,
                $tahunKedua->lokasi_kecelakaan_status_jalan_propinsi,
                $tahunKedua->lokasi_kecelakaan_status_jalan_kab_kota,
                $tahunKedua->lokasi_kecelakaan_status_jalan_desa_lingkungan
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) ARTERI</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_fungsi_jalan_arteri }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_fungsi_jalan_arteri }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) KOLEKTOR</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_fungsi_jalan_kolektor }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_fungsi_jalan_kolektor }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) LOKAL</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_fungsi_jalan_lokal }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_fungsi_jalan_lokal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) LINGKUNGAN</td>
            <td>{{ $tahunPertama->lokasi_kecelakaan_fungsi_jalan_lingkungan }}</td>
            <td>{{ $tahunKedua->lokasi_kecelakaan_fungsi_jalan_lingkungan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->lokasi_kecelakaan_fungsi_jalan_arteri,
                $tahunPertama->lokasi_kecelakaan_fungsi_jalan_kolektor,
                $tahunPertama->lokasi_kecelakaan_fungsi_jalan_lokal,
                $tahunPertama->lokasi_kecelakaan_fungsi_jalan_lingkungan
            ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->lokasi_kecelakaan_fungsi_jalan_arteri,
                $tahunKedua->lokasi_kecelakaan_fungsi_jalan_kolektor,
                $tahunKedua->lokasi_kecelakaan_fungsi_jalan_lokal,
                $tahunKedua->lokasi_kecelakaan_fungsi_jalan_lingkungan
            ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) MANUSIA</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_manusia }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_manusia }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>a. NGANTUK/LELAH (PSL 283)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_ngantuk_lelah }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_ngantuk_lelah }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MABUK /PENGARUH ALKOHOL DAN OBAT (PSL 283)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_mabuk_obat }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_mabuk_obat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. SAKIT (PSL 283)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_sakit }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_sakit }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. HAND PHONE/ ALAT ELEKTRONIK LAIN (PSL 283)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_handphone_elektronik }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_handphone_elektronik }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MENEROBOS LAMPU MERAH(PSL 287 AY 2)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_menerobos_lampu_merah }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_menerobos_lampu_merah }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>f. MELANGGAR BATAS KECEPATAN (PSL 287 AY 7)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>g. TIDAK MENJAGA JARAK</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_tidak_menjaga_jarak }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_tidak_menjaga_jarak }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>h. MENDAHULUI/BERBELOK/BERPINDAH JALUR (PSL 294)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>I. BERPINDAH LAJUR ( PSL 295)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_berpindah_jalur }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_berpindah_jalur }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>j. TIDAK MEMBERIKAN LAMPU ISYARAT BERHENTI/BERBELOK   /BERUBAH ARAH</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>k. TIDAK MENGUTAMAKAN PEJALAN KAKI (PSL 284 JO 106 AY 2)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>l. LAINNYA</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_lainnya }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_lainnya }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>2) ALAM</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_alam }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_alam }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>3) KELAIKAN KENDARAAN</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_kelaikan_kendaraan }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_kelaikan_kendaraan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>4) JALAN (KONDISI JALAN)</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_kondisi_jalan }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_kondisi_jalan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>5) PRASARANA JALAN</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_prasarana_jalan }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_prasarana_jalan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>a. RAMBU</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_rambu }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_rambu }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. MARKA</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_marka }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_marka }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. APIL</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_apil }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_apil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PERLINTASAN KA TANPA PALANG PINTU</td>
            <td>{{ $tahunPertama->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu }}</td>
            <td>{{ $tahunKedua->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->faktor_penyebab_kecelakaan_ngantuk_lelah,
                $tahunPertama->faktor_penyebab_kecelakaan_mabuk_obat,
                $tahunPertama->faktor_penyebab_kecelakaan_sakit,
                $tahunPertama->faktor_penyebab_kecelakaan_handphone_elektronik,
                $tahunPertama->faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                $tahunPertama->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                $tahunPertama->faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                $tahunPertama->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                $tahunPertama->faktor_penyebab_kecelakaan_berpindah_jalur,
                $tahunPertama->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                $tahunPertama->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                $tahunPertama->faktor_penyebab_kecelakaan_lainnya,
                $tahunPertama->faktor_penyebab_kecelakaan_alam,
                $tahunPertama->faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                $tahunPertama->faktor_penyebab_kecelakaan_kondisi_jalan,
                $tahunPertama->faktor_penyebab_kecelakaan_rambu,
                $tahunPertama->faktor_penyebab_kecelakaan_marka,
                $tahunPertama->faktor_penyebab_kecelakaan_apil,
                $tahunPertama->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->faktor_penyebab_kecelakaan_ngantuk_lelah,
                $tahunKedua->faktor_penyebab_kecelakaan_mabuk_obat,
                $tahunKedua->faktor_penyebab_kecelakaan_sakit,
                $tahunKedua->faktor_penyebab_kecelakaan_handphone_elektronik,
                $tahunKedua->faktor_penyebab_kecelakaan_menerobos_lampu_merah,
                $tahunKedua->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,
                $tahunKedua->faktor_penyebab_kecelakaan_tidak_menjaga_jarak,
                $tahunKedua->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,
                $tahunKedua->faktor_penyebab_kecelakaan_berpindah_jalur,
                $tahunKedua->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,
                $tahunKedua->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,
                $tahunKedua->faktor_penyebab_kecelakaan_lainnya,
                $tahunKedua->faktor_penyebab_kecelakaan_alam,
                $tahunKedua->faktor_penyebab_kecelakaan_kelaikan_kendaraan,
                $tahunKedua->faktor_penyebab_kecelakaan_kondisi_jalan,
                $tahunKedua->faktor_penyebab_kecelakaan_rambu,
                $tahunKedua->faktor_penyebab_kecelakaan_marka,
                $tahunKedua->faktor_penyebab_kecelakaan_apil,
                $tahunKedua->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. 00.00 - 03.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_00_03 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_00_03 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. 03.00 - 06.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_03_06 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_03_06 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. 06.00- 09.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_06_09 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_06_09 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. 09.00 - 12.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_09_12 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_09_12 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>e. 12.00 - 15.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_12_15 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_12_15 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>f. 15.00 - 18.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_15_18 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_15_18 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>g. 18.00 - 21.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_18_21 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_18_21 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>h. 21.00 - 24.00</td>
            <td>{{ $tahunPertama->waktu_kejadian_kecelakaan_21_24 }}</td>
            <td>{{ $tahunKedua->waktu_kejadian_kecelakaan_21_24 }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->waktu_kejadian_kecelakaan_00_03,
                $tahunPertama->waktu_kejadian_kecelakaan_03_06,
                $tahunPertama->waktu_kejadian_kecelakaan_06_09,
                $tahunPertama->waktu_kejadian_kecelakaan_09_12,
                $tahunPertama->waktu_kejadian_kecelakaan_12_15,
                $tahunPertama->waktu_kejadian_kecelakaan_15_18,
                $tahunPertama->waktu_kejadian_kecelakaan_18_21,
                $tahunPertama->waktu_kejadian_kecelakaan_21_24
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->waktu_kejadian_kecelakaan_00_03,
                $tahunKedua->waktu_kejadian_kecelakaan_03_06,
                $tahunKedua->waktu_kejadian_kecelakaan_06_09,
                $tahunKedua->waktu_kejadian_kecelakaan_09_12,
                $tahunKedua->waktu_kejadian_kecelakaan_12_15,
                $tahunKedua->waktu_kejadian_kecelakaan_15_18,
                $tahunKedua->waktu_kejadian_kecelakaan_18_21,
                $tahunKedua->waktu_kejadian_kecelakaan_21_24
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_menonjol_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_menonjol_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_menonjol_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_menonjol_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_menonjol_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_menonjol_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_menonjol_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_menonjol_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_menonjol_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_menonjol_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tunggal_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tunggal_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tunggal_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tunggal_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tunggal_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tunggal_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tunggal_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tunggal_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tunggal_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tunggal_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_pejalan_kaki_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_pejalan_kaki_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_lari_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_lari_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_lari_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_lari_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_lari_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_lari_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_lari_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_lari_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_lari_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_lari_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_sepeda_motor_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_sepeda_motor_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_roda_empat_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_roda_empat_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_tabrak_tidak_bermotor_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_tabrak_tidak_bermotor_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. JUMLAH KEJADIAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. BERPALANG PINTU</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_berpalang_pintu }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_berpalang_pintu }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. TIDAK BERPALANG PINTU</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>d. KORBAN LUKA RINGAN</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>e. KORBAN LUKA BERAT</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_korban_luka_berat }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_korban_luka_berat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>f. KORBAN MENINGGAL DUNIA</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_korban_meninggal }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_korban_meninggal }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Orang</td>
        </tr>
        <tr>
            <td></td>
            <td>g. MATERIIL</td>
            <td>{{ $tahunPertama->kecelakaan_lalin_perlintasan_ka_materiil }}</td>
            <td>{{ $tahunKedua->kecelakaan_lalin_perlintasan_ka_materiil }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. KECELAKAAN KERETA API</td>
            <td>{{ $tahunPertama->kecelakaan_transportasi_kereta_api }}</td>
            <td>{{ $tahunKedua->kecelakaan_transportasi_kereta_api }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>b. KECELAKAAN LAUT / PERAIRAN</td>
            <td>{{ $tahunPertama->kecelakaan_transportasi_laut_perairan }}</td>
            <td>{{ $tahunKedua->kecelakaan_transportasi_laut_perairan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td>c. KECELAKAAN UDARA</td>
            <td>{{ $tahunPertama->kecelakaan_transportasi_udara }}</td>
            <td>{{ $tahunKedua->kecelakaan_transportasi_udara }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Perkara</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->kecelakaan_transportasi_kereta_api,
                $tahunPertama->kecelakaan_transportasi_laut_perairan,
                $tahunPertama->kecelakaan_transportasi_udara
                ]) }}
            </td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->kecelakaan_transportasi_kereta_api,
                $tahunKedua->kecelakaan_transportasi_laut_perairan,
                $tahunKedua->kecelakaan_transportasi_udara
                ]) }}
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;">31</td>
            <td style="background-color: #c6efcd;">DIKMAS LANTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">a. PENLUH</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) MELALUI MEDIA CETAK</td>
            <td>{{ $tahunPertama->penlu_melalui_media_cetak }}</td>
            <td>{{ $tahunKedua->penlu_melalui_media_cetak }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) MELALUI MEDIA ELEKTRONIK</td>
            <td>{{ $tahunPertama->penlu_melalui_media_elektronik }}</td>
            <td>{{ $tahunKedua->penlu_melalui_media_elektronik }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) TEMPAT KERAMAIAN</td>
            <td>{{ $tahunPertama->penlu_melalui_tempat_keramaian }}</td>
            <td>{{ $tahunKedua->penlu_melalui_tempat_keramaian }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) TEMPAT ISTIRAHAT</td>
            <td>{{ $tahunPertama->penlu_melalui_tempat_istirahat }}</td>
            <td>{{ $tahunKedua->penlu_melalui_tempat_istirahat }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>5) DAERAH RAWAN LAKA &amp; LANGGAR</td>
            <td>{{ $tahunPertama->penlu_melalui_daerah_rawan_laka_dan_langgar }}</td>
            <td>{{ $tahunKedua->penlu_melalui_daerah_rawan_laka_dan_langgar }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td>{{ calculation([
                $tahunPertama->penlu_melalui_media_cetak,
                $tahunPertama->penlu_melalui_media_elektronik,
                $tahunPertama->penlu_melalui_tempat_keramaian,
                $tahunPertama->penlu_melalui_tempat_istirahat,
                $tahunPertama->penlu_melalui_daerah_rawan_laka_dan_langgar
                ]) }}</td>
              <td>{{ calculation([
                $tahunKedua->penlu_melalui_media_cetak,
                $tahunKedua->penlu_melalui_media_elektronik,
                $tahunKedua->penlu_melalui_tempat_keramaian,
                $tahunKedua->penlu_melalui_tempat_istirahat,
                $tahunKedua->penlu_melalui_daerah_rawan_laka_dan_langgar
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) SPANDUK</td>
            <td>{{ $tahunPertama->penyebaran_pemasangan_spanduk }}</td>
            <td>{{ $tahunKedua->penyebaran_pemasangan_spanduk }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) LEAFLET</td>
            <td>{{ $tahunPertama->penyebaran_pemasangan_leaflet }}</td>
            <td>{{ $tahunKedua->penyebaran_pemasangan_leaflet }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) STICKER</td>
            <td>{{ $tahunPertama->penyebaran_pemasangan_sticker }}</td>
            <td>{{ $tahunKedua->penyebaran_pemasangan_sticker }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) BILBOARD</td>
            <td>{{ $tahunPertama->penyebaran_pemasangan_bilboard }}</td>
            <td>{{ $tahunKedua->penyebaran_pemasangan_bilboard }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                    $tahunPertama->penyebaran_pemasangan_spanduk,
                    $tahunPertama->penyebaran_pemasangan_leaflet,
                    $tahunPertama->penyebaran_pemasangan_sticker,
                    $tahunPertama->penyebaran_pemasangan_bilboard
                ]) }}
            </td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->penyebaran_pemasangan_spanduk,
                $tahunKedua->penyebaran_pemasangan_leaflet,
                $tahunKedua->penyebaran_pemasangan_sticker,
                $tahunKedua->penyebaran_pemasangan_bilboard
            ]) }}
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>1) POLISI SAHABAT ANAK</td>
            <td>{{ $tahunPertama->polisi_sahabat_anak }}</td>
            <td>{{ $tahunKedua->polisi_sahabat_anak }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) CARA AMAN SEKOLAH</td>
            <td>{{ $tahunPertama->cara_aman_sekolah }}</td>
            <td>{{ $tahunKedua->cara_aman_sekolah }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) PATROLI KEAMANAN SEKOLAH</td>
            <td>{{ $tahunPertama->patroli_keamanan_sekolah }}</td>
            <td>{{ $tahunKedua->patroli_keamanan_sekolah }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) PRAMUKA SAKA BHAYANGKARA KRIDA LALU LINTAS</td>
            <td>{{ $tahunPertama->pramuka_bhayangkara_krida_lalu_lintas }}</td>
            <td>{{ $tahunKedua->pramuka_bhayangkara_krida_lalu_lintas }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->polisi_sahabat_anak,
                $tahunPertama->cara_aman_sekolah,
                $tahunPertama->patroli_keamanan_sekolah,
                $tahunPertama->pramuka_bhayangkara_krida_lalu_lintas
                ]) }}</td>
               <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->polisi_sahabat_anak,
                $tahunKedua->cara_aman_sekolah,
                $tahunKedua->patroli_keamanan_sekolah,
                $tahunKedua->pramuka_bhayangkara_krida_lalu_lintas
                ]) }}
            </td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>




        <tr>
            <td></td>
            <td>1) POLICE GOES TO CAMPUS</td>
            <td>{{ $tahunPertama->police_goes_to_campus }}</td>
            <td>{{ $tahunKedua->police_goes_to_campus }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>2) SAFETY RIDING &amp; DRIVING</td>
            <td>{{ $tahunPertama->safety_riding_driving }}</td>
            <td>{{ $tahunKedua->safety_riding_driving }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>3) FORUM LALU LINTAS &amp; ANGKUTAN JALAN</td>
            <td>{{ $tahunPertama->forum_lalu_lintas_angkutan_umum }}</td>
            <td>{{ $tahunKedua->forum_lalu_lintas_angkutan_umum }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>4) KAMPANYE KESELAMATAN</td>
            <td>{{ $tahunPertama->kampanye_keselamatan }}</td>
            <td>{{ $tahunKedua->kampanye_keselamatan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>5) SEKOLAH MENGEMUDI</td>
            <td>{{ $tahunPertama->sekolah_mengemudi }}</td>
            <td>{{ $tahunKedua->sekolah_mengemudi }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>6) TAMAN LALU LINTAS</td>
            <td>{{ $tahunPertama->taman_lalu_lintas }}</td>
            <td>{{ $tahunKedua->taman_lalu_lintas }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>7) GLOBAL ROAD SAFETY PARTNERSHIP ACTION</td>
            <td>{{ $tahunPertama->global_road_safety_partnership_action }}</td>
            <td>{{ $tahunKedua->global_road_safety_partnership_action }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunPertama->police_goes_to_campus,
                $tahunPertama->safety_riding_driving,
                $tahunPertama->forum_lalu_lintas_angkutan_umum,
                $tahunPertama->kampanye_keselamatan,
                $tahunPertama->sekolah_mengemudi,
                $tahunPertama->taman_lalu_lintas,
                $tahunPertama->global_road_safety_partnership_action
                ]) }}</td>
             <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->police_goes_to_campus,
                $tahunKedua->safety_riding_driving,
                $tahunKedua->forum_lalu_lintas_angkutan_umum,
                $tahunKedua->kampanye_keselamatan,
                $tahunKedua->sekolah_mengemudi,
                $tahunKedua->taman_lalu_lintas,
                $tahunKedua->global_road_safety_partnership_action
                ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
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
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;">GIAT LANTAS</td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
            <td style="background-color: #c6efcd;"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. PENGATURAN</td>
            <td>{{ $tahunPertama->giat_lantas_pengaturan }}</td>
            <td>{{ $tahunKedua->giat_lantas_pengaturan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>b. PENJAGAAN</td>
            <td>{{ $tahunPertama->giat_lantas_penjagaan }}</td>
            <td>{{ $tahunKedua->giat_lantas_penjagaan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>c. PENGAWALAN</td>
            <td>{{ $tahunPertama->giat_lantas_pengawalan }}</td>
            <td>{{ $tahunKedua->giat_lantas_pengawalan }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td>d. PATROLI</td>
            <td>{{ $tahunPertama->giat_lantas_patroli }}</td>
            <td>{{ $tahunKedua->giat_lantas_patroli }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center; font-weight: bold;">JUMLAH</td>
            <td style="font-weight: bold;">{{ calculation([
               $tahunPertama->giat_lantas_pengaturan,
               $tahunPertama->giat_lantas_penjagaan,
               $tahunPertama->giat_lantas_pengawalan,
               $tahunPertama->giat_lantas_patroli
                ]) }}</td>
            <td style="font-weight: bold;">{{ calculation([
                $tahunKedua->giat_lantas_pengaturan,
                $tahunKedua->giat_lantas_penjagaan,
                $tahunKedua->giat_lantas_pengawalan,
                $tahunKedua->giat_lantas_patroli
                 ]) }}</td>
			<td>xxxxxxxxx</td>
			<td>xxxxxxxxx</td>
			<td>Kali</td>
        </tr>
    </tbody>
</table>
