@extends('layouts.empty')
@push('page_css')
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-o5n3{background-color:#FFF;font-weight:bold;text-align:left;vertical-align:bottom}
    .tg .tg-8rcp{background-color:#FFF;font-weight:bold;text-align:left;vertical-align:middle}
    .tg .tg-4bam{background-color:#FFF;text-align:center;vertical-align:bottom}
    .tg .tg-2mzs{background-color:#FFF;font-weight:bold;text-align:right;vertical-align:bottom}
    .tg .tg-2g1l{background-color:#FFF;font-weight:bold;text-align:center;vertical-align:middle}
    .tg .tg-n1r7{background-color:#FFF;font-weight:bold;text-align:center;vertical-align:bottom}
    .tg .tg-ktyi{background-color:#FFF;text-align:left;vertical-align:top}
    .tg .tg-kcps{background-color:#FFF;text-align:left;vertical-align:bottom}
    .tg .tg-dgl5{background-color:#FFF;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-9hzb{background-color:#FFF;font-weight:bold;text-align:center;vertical-align:top}
    .tg .tg-7yig{background-color:#FFF;text-align:center;vertical-align:top}
    .tg .tg-661g{background-color:#FFF;font-style:italic;font-weight:bold;text-align:center;vertical-align:bottom}
</style>
@endpush

@section('content')
<table class="tg">

    <thead>
        <tr>
            <th class="tg-2g1l" rowspan="2">NO</th>
            <th class="tg-2g1l" rowspan="2">URAIAN</th>

            @foreach ($rencanaOperasi->dailyInputCurrent as $current)
                <td class="tg-2g1l" colspan="2">H{{ $loop->index+1 }}</td>
            @endforeach

            <th class="tg-2g1l" colspan="2">Jumlah</th>
            <th class="tg-2g1l" rowspan="2">KET</th>
        </tr>
        <tr>
            @php
                for ($i = 0; $i <= $total; $i++) {
                    echo '<th class="tg-2g1l">'.$prevYear.'</th>';
                    echo '<th class="tg-2g1l">'.$currentYear.'</th>';
                }
            @endphp
        </tr>
    </thead>
    <tbody>

        <tr>
            <td class="tg-n1r7">1</td>
            <td class="tg-n1r7">2</td>
            @php
                for ($i = 3; $i <= $labelNumber; $i++) {
                    echo '<td class="tg-n1r7">'.$i.'</td>';
                }
                echo '<td class="tg-n1r7">'.$i.'</td>';
            @endphp
        </tr>

        <tr>
            <td class="tg-n1r7">I</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
            @php
                for ($i = 3; $i <= $labelNumber; $i++) {
                    echo '<td class="tg-n1r7"></td>';
                }
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-o5n3">1</td>
            <td class="tg-o5n3">PELANGGARAN LALU LINTAS</td>
            @php
                for ($i = 3; $i <= $labelNumber; $i++) {
                    echo '<td class="tg-n1r7"></td>';
                }
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Tilang = (2a+2b+2c)</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_lalu_lintas_tilang_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_tilang.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_lalu_lintas_tilang_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_tilang);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Teguran</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_lalu_lintas_teguran_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_teguran.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_lalu_lintas_teguran_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_teguran);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah</td>
            @php
                for ($i = 0; $i < $total; $i++) {
                    // $id = $rencanaOperasi->dailyInputPrev[$i]->id;
                    // $created = Carbon::parse($rencanaOperasi->dailyInputPrev[$i]->created_at)->format('Y-m-d');
                    // echo '<td class="tg-4bam">'.DB::table('daily_input_prev')->whereDate('created_at', $created)->sum('pelanggaran_lalu_lintas_tilang_p').'</td>';
                    // echo '<td class="tg-4bam">'.DB::table('daily_inputs')->sum('pelanggaran_lalu_lintas_tilang').'</td>';
                    echo '<td class="tg-4bam">0</td>';
                    echo '<td class="tg-4bam">0</td>';
                }
                echo '<td class="tg-4bam">0</td>';
                echo '<td class="tg-4bam">0</td>';
            @endphp
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">2</td>
            <td class="tg-o5n3">JENIS PELANGGARAN LALU LINTAS</td>
            @php
                for ($i = 3; $i <= $labelNumber; $i++) {
                    echo '<td class="tg-n1r7"></td>';
                }
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">a. Sepeda Motor (psl 47)</td>
            @php
                for ($i = 3; $i <= $labelNumber; $i++) {
                    echo '<td class="tg-n1r7"></td>';
                }
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">1) Kecepatan</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_kecepatan_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_kecepatan.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_kecepatan_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_kecepatan);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">2) Helm</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_helm_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_helm.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_helm_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_helm);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">3) Boncengan Lebih Dari 1 (satu) Orang</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">4) Marka menerus / Rambu menyalip</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">5) Melawan Arus</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melawan_arus_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melawan_arus.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melawan_arus_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melawan_arus);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">6) Melanggar Lampu Lalu Lintas</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">7) Mengemudikan kendaraan dengan tidak wajar(psl 283)</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">8) Syarat teknis dan layak jalan</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">9) Tidak menyalakan lampu utama siang/malam</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">10) Berbelok tanpa isyarat</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">11) Berbalapan di jalan raya (psl 297)</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">12) Melanggar Rambu berhenti dan parkir</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">13) Melanggar marka berhenti</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">14) tidak mematuhi perintah petugas Polri(psl 104)</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-kcps">15) Surat-surat</td>
            @php
                $currentSum = [];
                $prevSum = [];

                for ($i = 0; $i < $total; $i++) {
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_surat_surat_p.'</td>';
                    echo '<td class="tg-4bam">'.$rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_surat_surat.'</td>';

                    array_push($prevSum, $rencanaOperasi->dailyInputPrev[$i]->pelanggaran_sepeda_motor_surat_surat_p);
                    array_push($currentSum, $rencanaOperasi->dailyInputCurrent[$i]->pelanggaran_sepeda_motor_surat_surat);
                }

                echo '<td class="tg-4bam">'.array_sum($prevSum).'</td>';
                echo '<td class="tg-4bam">'.array_sum($currentSum).'</td>';
            @endphp
            <td class="tg-o5n3"></td>
        </tr>

    </tbody>
</table>
@endsection