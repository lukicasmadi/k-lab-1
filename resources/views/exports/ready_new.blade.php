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
@php
use App\Models\LoopTotalSummary;
use App\Models\DailyNotice;
use App\Models\DailyNoticeCurrent;
use App\Models\SumLoopEveryday;
@endphp

<table class="tg">

    <thead>
        <tr>
            <th class="tg-2g1l" rowspan="2">NO</th>
            <th class="tg-2g1l" rowspan="2" width="50%">URAIAN</th>

            @foreach ($dailyNoticePrev as $days)
                <td class="tg-2g1l" colspan="2">H{{ $loop->index+1 }}</td>
            @endforeach

            <th class="tg-2g1l" colspan="2">Jumlah</th>
            <th class="tg-2g1l" rowspan="2">KET</th>
        </tr>
        <tr>
            @php
                for ($i = 0; $i <= $totalLoopDays; $i++) {
                    echo '<th class="tg-2g1l">'.$prevYear.'</th>';
                    echo '<th class="tg-2g1l">'.$currentYear.'</th>';
                }
            @endphp
        </tr>
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
    </thead>
    <tbody>

        <tr>
            <td class="tg-n1r7">I</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7">1</td>
            <td class="tg-o5n3">PELANGGARAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Tilang = (2a+2b+2c)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_tilang_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_tilang }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_lalu_lintas_tilang_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_lalu_lintas_tilang') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Teguran</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_teguran_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_teguran }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_lalu_lintas_teguran_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_lalu_lintas_teguran') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_1', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_1', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
            <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_1', 'PREV') }}</td>
            <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_1', 'CURRENT') }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">2</td>
            <td class="tg-o5n3">JENIS PELANGGARAN   LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">a. Sepeda Motor (psl   47)</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">1) Kecepatan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_kecepatan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_kecepatan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_kecepatan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_kecepatan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2) Helm</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_helm_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_helm }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_helm_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_helm') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3) Boncengan Lebih   Dari 1 (satu) Orang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4) Marka menerus /   Rambu menyalip</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_marka_menerus_menyalip_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_marka_menerus_menyalip') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5) Melawan Arus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melawan_arus_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melawan_arus }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melawan_arus_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melawan_arus') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6) Melanggar Lampu   Lalu Lintas</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_lampu_lalin_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_lampu_lalin') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">7) Mengemudikan   kendaraan dengan tidak wajar(psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">8) Syarat teknis dan   layak jalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">9) Tidak menyalakan   lampu utama siang/malam</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">10) Berbelok tanpa   isyarat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">11) Berbalapan di   jalan raya (psl 297)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">12) Melanggar Rambu   berhenti dan parkir</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">13) Melanggar marka   berhenti</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_marka_berhenti_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_marka_berhenti') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">14) tidak mematuhi   perintah petugas Polri(psl 104)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">15) Surat-surat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_surat_surat_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_surat_surat }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_surat_surat_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_surat_surat') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">16) Kelengkapan   Kendaraan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_kelengkapan_kendaraan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_kelengkapan_kendaraan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_kelengkapan_kendaraan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_kelengkapan_kendaraan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">17) Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_sepeda_motor_lain_lain_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_lain_lain }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_lain_lain_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_lain_lain') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">(2.a)   Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_2', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_2', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_2', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_2', 'CURRENT') }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">b.Mobil dan Kendaraan   Khusus (psl 47)</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">1) Kecepatan ( psl   287 ay 5 jo 106  ay 4)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_kecepatan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_kecepatan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_kecepatan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_kecepatan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2) Safety belt</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_safety_belt_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_safety_belt }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_safety_belt_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_safety_belt') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3) Muatan ( over   loading)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_muatan_overload_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_muatan_overload }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_muatan_overload_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_muatan_overload') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4) Marka menerus /   Rambu menyalip</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_marka_menerus_menyalip_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_marka_menerus_menyalip }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_marka_menerus_menyalip_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_marka_menerus_menyalip') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5) Melawan Arus (psl   105)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_melawan_arus_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_melawan_arus }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_melawan_arus_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melawan_arus') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6)  Melanggar Lampu   Lalu Lintas (psl 287 ayt 2 jo 106 ay 4)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_melanggar_lampu_lalin_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_melanggar_lampu_lalin }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_melanggar_lampu_lalin_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melanggar_lampu_lalin') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">7)  Mengemudikan   kendaraan dengan tidak wajar(psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_mengemudi_tidak_wajar_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_mengemudi_tidak_wajar }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_mengemudi_tidak_wajar_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_mengemudi_tidak_wajar') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">8)  Syarat teknis dan   layak jalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_syarat_teknis_layak_jalan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_syarat_teknis_layak_jalan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_syarat_teknis_layak_jalan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_syarat_teknis_layak_jalan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">9)  Tidak menyalakan   lampu utama mlm hari (psl 293 jo 107)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_tidak_nyala_lampu_malam_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_tidak_nyala_lampu_malam }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_tidak_nyala_lampu_malam_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_tidak_nyala_lampu_malam') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">10)  Berbelok tanpa   isyarat (psl 295)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_berbelok_tanpa_isyarat_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_berbelok_tanpa_isyarat }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_berbelok_tanpa_isyarat_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_berbelok_tanpa_isyarat') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">11)  Berbalapan di   jalan raya (psl 297)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_berbalapan_di_jalan_raya_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_berbalapan_di_jalan_raya }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_berbalapan_di_jalan_raya_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_berbalapan_di_jalan_raya') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">12)  Melanggar Rambu   berhenti dan parkir</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">13) Melanggar marka   berhenti</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_melanggar_marka_berhenti_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_melanggar_marka_berhenti }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_melanggar_marka_berhenti_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melanggar_marka_berhenti') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>



        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">14)  tidak mematuhi   perintah petugas Polri(psl 104)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_tidak_patuh_perintah_petugas_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_tidak_patuh_perintah_petugas }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_tidak_patuh_perintah_petugas_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_tidak_patuh_perintah_petugas') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">15)  Surat-surat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_surat_surat_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_surat_surat }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_surat_surat_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_surat_surat') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">16)  Kelengkapan   Kendaraan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_kelengkapan_kendaraan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_kelengkapan_kendaraan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_kelengkapan_kendaraan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_kelengkapan_kendaraan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">17)  Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_mobil_lain_lain_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_mobil_lain_lain }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_mobil_lain_lain_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_lain_lain') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">(2.b) Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_3', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_3', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_3', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_3', 'CURRENT') }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">2</td>
            <td class="tg-o5n3">c. Kendaraan Tidak Bermotor dan   Pejalan Kaki</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">1) Menyebrang tidak   pada tempatnya</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">(2.c) Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_4', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_4', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_4', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_4', 'CURRENT') }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">3</td>
            <td class="tg-o5n3">BARANGBUKTI YANG   DISITA</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a) SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->barang_bukti_yg_disita_sim_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->barang_bukti_yg_disita_sim}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'barang_bukti_yg_disita_sim_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'barang_bukti_yg_disita_sim') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b) STNK</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->barang_bukti_yg_disita_stnk_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->barang_bukti_yg_disita_stnk}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'barang_bukti_yg_disita_stnk_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'barang_bukti_yg_disita_stnk') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c) KENDARAAN</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->barang_bukti_yg_disita_stnk_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->barang_bukti_yg_disita_stnk}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'barang_bukti_yg_disita_stnk_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'barang_bukti_yg_disita_stnk') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">(2.c) Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_5', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_5', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_5', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_5', 'CURRENT') }}</td>
            <td class="tg-n1r7">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7">4</td>
            <td class="tg-o5n3">KENDARAAN YANG TERLIBAT PELANGGARAN</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Sepeda Motor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_sepeda_motor}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Mobil Penumpang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mobil Bus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_bus_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_bus}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_bus_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_bus') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Mobil Barang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_barang_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_barang}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_barang_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_barang') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kendaraan Khusus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (1.a) - (2.c)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_6', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_6', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_6', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_6', 'CURRENT') }}</td>
            <td class="tg-n1r7">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7">5</td>
            <td class="tg-o5n3">PROFESI PELAKU PELANGGARAN</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Pegawai Negeri Sipil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_pns_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_pns}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_pns_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_pns') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_karyawan_swasta_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_karyawan_swasta}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_karyawan_swasta_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_karyawan_swasta') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Pelajar / Mahasiswa</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_pelajar_mahasiswa_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_pelajar_mahasiswa}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_pelajar_mahasiswa_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_pelajar_mahasiswa') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi (supir)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_pengemudi_supir_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_pengemudi_supir}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_pengemudi_supir_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_pengemudi_supir') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e.TNI</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_tni_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_tni}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_tni_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_tni') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f.Polri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_polri_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_polri}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_polri_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_polri') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

         <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_lain_lain_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_lain_lain}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_lain_lain_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_lain_lain') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (1.a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_7', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_7', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_7', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_7', 'CURRENT') }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">6</td>
            <td class="tg-o5n3">USIA PELAKU PELANGGARAN</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. 0 - 15 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_kurang_dari_15_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_kurang_dari_15_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_kurang_dari_15_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_kurang_dari_15_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_16_20_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_16_20_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_16_20_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_16_20_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_21_25_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_21_25_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_21_25_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_21_25_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_26_30_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_26_30_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_26_30_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_26_30_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_31_35_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_31_35_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_31_35_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_31_35_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_36_40_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_36_40_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_36_40_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_36_40_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_41_45_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_41_45_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_41_45_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_41_45_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_46_50_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_46_50_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_46_50_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_46_50_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_51_55_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_51_55_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_51_55_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_51_55_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_56_60_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_56_60_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_56_60_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_56_60_tahun') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. > 60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_pelaku_pelanggaran_diatas_60_tahun_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_diatas_60_tahun}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_diatas_60_tahun_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_diatas_60_tahun') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (1.a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_8', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_8', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_8', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_8', 'CURRENT') }}</td>
            <td class="tg-n1r7">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7">7</td>
            <td class="tg-o5n3">SIM PELAKU PELANGGARAN</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. A</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_a_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_a}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_a_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_a') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_a_umum_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_a_umum}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_a_umum_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_a_umum') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b1_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b1}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b1_umum_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b1_umum}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1_umum_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1_umum') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b2_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b2}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. B II UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b2_umum_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b2_umum}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2_umum_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2_umum') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. C</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_c_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_c}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_c_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_c') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_d_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_d}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_d_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_d') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. SIM Internasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_internasional_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_internasional}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_internasional_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_internasional') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_pelaku_pelanggaran_tanpa_sim_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_tanpa_sim}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_tanpa_sim_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_tanpa_sim') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (1.a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_9', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_9', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_9', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_9', 'CURRENT') }}</td>
            <td class="tg-n1r7">Buah</td>
        </tr>

        <tr>
            <td class="tg-n1r7">8</td>
            <td class="tg-o5n3">LOKASI PELANGGARAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">a. Berdasarkan   Kawasan</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 1). Kawasan Pemukiman</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_pemukiman_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_pemukiman}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_pemukiman_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_pemukiman') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  2). Kawasan Perbelanjaan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_perbelanjaan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_perbelanjaan}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_perbelanjaan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_perbelanjaan') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  3). Perkantoran</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_perkantoran_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_perkantoran}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_perkantoran_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_perkantoran') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  4). Kawasan Wisata</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_wisata_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_wisata}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_wisata_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_wisata') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  5). Kawasan Indutri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_industri_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_industri}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_industri_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_industri') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (9.a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_10', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_10', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_10', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_10', 'CURRENT') }}</td>
            <td class="tg-n1r7">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">b. Berdasarkan Status   Jalan</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  1). Nasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_nasional_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_nasional}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_nasional_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_nasional') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  2). Propinsi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_propinsi_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_propinsi}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_propinsi_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_propinsi') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  3). Kab/Kota</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_kab_kota_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_kab_kota}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_kab_kota_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_kab_kota') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   4). Desa / Lingkungan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_desa_lingkungan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_desa_lingkungan}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_desa_lingkungan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_desa_lingkungan') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (1.a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_11', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_11', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_11', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_11', 'CURRENT') }}</td>
            <td class="tg-n1r7">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">c. Berdasarkan Fungsi   Jalan</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   1). Arteri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_arteri_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_arteri}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_arteri_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_arteri') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   2). Kolektor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_kolektor_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_kolektor}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_kolektor_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_kolektor') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   3). Lokal</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_lokal_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_lokal}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lokal_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lokal') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   4). Lingkungan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_lingkungan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_lingkungan}}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lingkungan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lingkungan') }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (1.a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_12', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_12', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_12', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_12', 'CURRENT') }}</td>
            <td class="tg-n1r7">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-n1r7">II</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7">9</td>
            <td class="tg-o5n3">KECELAKAAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_kejadian_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_kejadian }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_kejadian_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_kejadian') }}</td>
            <td class="tg-4bam">Kasus</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_korban_meninggal_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_korban_meninggal }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_korban_meninggal_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_korban_meninggal') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_korban_luka_berat_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_korban_luka_berat }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_berat_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_berat') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_korban_luka_ringan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_korban_luka_ringan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_ringan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_ringan') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kerugian Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_kerugian_materiil_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_kerugian_materiil }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_kerugian_materiil_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_kerugian_materiil') }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">10</td>
            <td class="tg-o5n3">BARANGBUKTI YANG DISITA</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_barang_bukti_yg_disita_sim_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_barang_bukti_yg_disita_sim }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_sim_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_sim') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. STNK</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_barang_bukti_yg_disita_stnk_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_barang_bukti_yg_disita_stnk }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_stnk_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_stnk') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. KENDARAAN</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kecelakaan_barang_bukti_yg_disita_kendaraan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kecelakaan_barang_bukti_yg_disita_kendaraan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_kendaraan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_kendaraan') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">d. Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_14', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_14', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_14', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_14', 'CURRENT') }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">11</td>
            <td class="tg-o5n3">PROFESI KORBAN KECELAKAAN LALU LINTAS  </td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Pegawai Negeri Sipil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_pns_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_pns }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_pns_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_pns') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_karwayan_swasta_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_karwayan_swasta }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_karwayan_swasta_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_karwayan_swasta') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mahasiswa / Pelajar</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_pengemudi_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_pengemudi }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_pengemudi_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_pengemudi') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. TNI</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_tni_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_tni }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_tni_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_tni') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Polri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_polri_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_polri }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_polri_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_polri') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_lain_lain_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_lain_lain }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_lain_lain_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_lain_lain') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (9b + 9c + 9d)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_15', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_15', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_15', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_15', 'CURRENT') }}</td>
            <td class="tg-n1r7">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7">12</td>
            <td class="tg-o5n3">USIA KORBAN KECELAKAAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. 0 - 15 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_kurang_15_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_kurang_15 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_kurang_15_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_kurang_15') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_16_20_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_16_20 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_16_20_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_16_20') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_21_25_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_21_25 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_21_25_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_21_25') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_26_30_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_26_30 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_26_30_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_26_30') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_31_35_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_31_35 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_31_35_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_31_35') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_36_40_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_36_40 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_36_40_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_36_40') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_41_45_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_41_45 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_41_45_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_41_45') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_45_50_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_45_50 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_45_50_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_45_50') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_51_55_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_51_55 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_51_55_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_51_55') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_56_60_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_56_60 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_56_60_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_56_60') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. > 60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->usia_korban_kecelakaan_diatas_60_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->usia_korban_kecelakaan_diatas_60 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'usia_korban_kecelakaan_diatas_60_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_diatas_60') }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">d. Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_16', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_16', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_16', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_16', 'CURRENT') }}</td>
            <td class="tg-n1r7">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7">13</td>
            <td class="tg-o5n3">SIM KORBAN KECELAKAAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. A</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_a_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_a }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_a_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_a') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_a_umum_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_a_umum }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_a_umum_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_a_umum') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b1_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b1 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b1_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b1') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b1_umum_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b1_umum }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b1_umum_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b1_umum') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b2_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b2 }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b2_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b2') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. BII UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b2_umum_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b2_umum }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b2_umum_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b2_umum') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. C</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_c_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_c }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_c_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_c') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_d_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_d }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_d_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_d') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. SIM Internasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_internasional_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_internasional }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_internasional_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_internasional') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->sim_korban_kecelakaan_tanpa_sim_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->sim_korban_kecelakaan_tanpa_sim }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'sim_korban_kecelakaan_tanpa_sim_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_tanpa_sim') }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah = (9b + 9c + 9d)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_17', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_17', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_17', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_17', 'CURRENT') }}</td>
            <td class="tg-n1r7">Buah</td>
        </tr>

        <tr>
            <td class="tg-n1r7">14</td>
            <td class="tg-o5n3">KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Sepeda Motor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_sepeda_motor }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Mobil Penumpang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mobil Bus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_bus_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_bus }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_bus_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_bus') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Mobil Barang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_barang_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_barang }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_barang_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_barang') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kendaraan Khusus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Kendaraan Tidak Bermotor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor') }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah ≥ (9a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_18', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_18', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ $prev[$i]->summary }}</td>
                    <td class="tg-n1r7">{{ $current[$i]->summary }}</td>
                @endfor
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_18', 'PREV') }}</td>
                <td class="tg-o5n3">{{ SumLoopEveryday::summary('GROUP_18', 'CURRENT') }}</td>
            <td class="tg-n1r7">Unit</td>
        </tr>

        <tr>
            <td class="tg-n1r7">15</td>
            <td class="tg-o5n3">JENIS KECELAKAAN LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Tunggal / Out of   control</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->jenis_kecelakaan_tunggal_ooc_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->jenis_kecelakaan_tunggal_ooc }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'jenis_kecelakaan_tunggal_ooc_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_tunggal_ooc') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Depan-Depan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->jenis_kecelakaan_depan_depan_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->jenis_kecelakaan_depan_depan }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'jenis_kecelakaan_depan_depan_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_depan_depan') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Depan-Belakang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->jenis_kecelakaan_depan_belakang_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->jenis_kecelakaan_depan_belakang }}</td>
            @endfor
            <td class="tg-o5n3">{{ DailyNotice::summary($operationId, 'jenis_kecelakaan_depan_belakang_p') }}</td>
            <td class="tg-o5n3">{{ DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_depan_belakang') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

    </tbody>
</table>
@endsection