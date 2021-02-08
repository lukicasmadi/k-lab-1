<table>
    <thead>
        <tr><th colspan="4" style="text-align: center">KEPOLISIAN NEGARA REPUBLIK INDONESIA</th></tr>
        <tr><th colspan="4" style="text-align: center">KORP LALU LINTAS</th></tr>
        <tr><th colspan="4" style="text-align: center">LAPORAN HARIAN {{ strtoupper(operationPlans()->name) }}</th></tr>
        <tr><th colspan="4" style="text-align: center">TANGGAL: {{ strtoupper(operationPlans()->start_date->format("d-m-Y")) }} S/D {{ strtoupper(operationPlans()->end_date->format("d-m-Y")) }}</th></tr>
        <tr><th colspan="4" style="text-align: center">KORLANTAS</th></tr>
        <tr><th colspan="4" style="text-align: center"></th></tr>
    </thead>

    <tbody>
        <tr>
            <th style="border: 1px solid black;">NO.</th>
            <th style="border: 1px solid black;">URAIAN</th>
            <th style="border: 1px solid black;">ANGKA</th>
            <th style="border: 1px solid black;">KET</th>
        </tr>

        <tr>
            <th style="border: 1px solid black; background-color: #c4ebcc;">I</th>
            <th style="border: 1px solid black; background-color: #c4ebcc;">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</th>
            <th style="border: 1px solid black; background-color: #c4ebcc;"></th>
            <th style="border: 1px solid black; background-color: #c4ebcc;"></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; text-align: left; background-color: #c4ebcc;">1</th>
            <th style="border: 1px solid black; background-color: #c4ebcc;">PELANGGARAN LALU LINTAS</th>
            <th style="border: 1px solid black; background-color: #c4ebcc;"></th>
            <th style="border: 1px solid black; background-color: #c4ebcc;"></th>
        </tr>
        <tr>
            <th style="border: 1px solid black;"></th>
            <th style="border: 1px solid black;">a. TILANG</th>
            <th style="border: 1px solid black;">{{ $data->dailyInput->pelanggaran_lalu_lintas_tilang }}</th>
            <th style="border: 1px solid black;">Perkara</th>
        </tr>
        <tr>
            <th style="border: 1px solid black;"></th>
            <th style="border: 1px solid black;">b. TEGURAN</th>
            <th style="border: 1px solid black;">{{ $data->dailyInput->pelanggaran_lalu_lintas_teguran }}</th>
            <th style="border: 1px solid black;">Perkara</th>
        </tr>
        <tr>
            <th style="border: 1px solid black;"></th>
            <th style="border: 1px solid black; font-weight: bold; text-align: center;">JUMLAH</th>
            <th style="border: 1px solid black;">{{ $data->dailyInput->pelanggaran_lalu_lintas_tilang + $data->dailyInput->pelanggaran_lalu_lintas_teguran }}</th>
            <th style="border: 1px solid black;"></th>
        </tr>

    </tbody>

</table>
