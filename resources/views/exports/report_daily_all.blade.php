<table>
    <thead>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">KORP LALU LINTAS</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">LAPORAN HARIAN {{ \Illuminate\Support\Str::upper(operationPlans()->name) }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">TANGGAL: {{ operationPlans()->start_date->format("d-m-Y") }} S/D {{ operationPlans()->end_date->format("d-m-Y") }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">KORLANTAS</td>
            <td></td>
            <td></td>
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
    </tbody>
</table>
