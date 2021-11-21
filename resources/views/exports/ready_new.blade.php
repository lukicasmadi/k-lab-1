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
    .centerPage {
        text-align: center;
    }
    .customTextCenter {
        font-family:Arial, sans-serif;font-size:14px;
        font-weight: bold;
        text-align: center;
    }
    .customTextRight {
        font-family:Arial, sans-serif;font-size:14px;
        text-align: right;
    }
    .center {
        text-align: center;
    }
    .right {
        text-align: right;
    }
</style>
@endpush

@section('content')
@php
use App\Models\LoopTotalSummary;
use App\Models\DailyNotice;
use App\Models\DailyNoticeCurrent;
use App\Models\SumLoopEveryday;
@endphp

<table>
    <tr>
        <td colspan="5" class="customTextCenter">MARKAS BESAR</td>
    </tr>
    <tr>
        <td colspan="5" class="customTextCenter">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
    </tr>
    <tr>
        <td colspan="5" class="customTextCenter">KORPS LALU LINTAS</td>
    </tr>
</table>

<br>

<div class="center">
    <span><b>REKAPITULASI LAPORAN PERHARI {{ gedein($rencanaOperasi->name) }} {{ date('Y') }}</b></span>
    <br>
    <span><b>TANGGAL {{ gedein(indonesiaDate($rencanaOperasi->start_date)) }} s.d. {{ gedein(indonesiaDate($rencanaOperasi->end_date)) }}</b></span>
</div>

<table class="tg">

    <thead>
        <tr>
            <th class="tg-2g1l" rowspan="2">NO</th>
            <th class="tg-2g1l" rowspan="2" width="50%">URAIAN</th>

            @foreach ($dailyNoticePrev as $days)
                <td class="tg-2g1l" colspan="2">H{{ numberFormat($loop->index+1) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_lalu_lintas_tilang_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_tilang) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_lalu_lintas_tilang_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_lalu_lintas_tilang')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Teguran</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_lalu_lintas_teguran_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_teguran) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_lalu_lintas_teguran_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_lalu_lintas_teguran')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
            <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_1', 'PREV')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_1', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_kecepatan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_kecepatan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_kecepatan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_kecepatan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2) Helm</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_helm_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_helm) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_helm_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_helm')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3) Boncengan Lebih   Dari 1 (satu) Orang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_bonceng_lebih_dari_satu) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_bonceng_lebih_dari_satu')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4) Marka menerus /   Rambu menyalip</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_marka_menerus_menyalip) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_marka_menerus_menyalip_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_marka_menerus_menyalip')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5) Melawan Arus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melawan_arus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melawan_arus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melawan_arus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melawan_arus')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6) Melanggar Lampu   Lalu Lintas</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melanggar_lampu_lalin) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_lampu_lalin_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_lampu_lalin')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">7) Mengemudikan   kendaraan dengan tidak wajar(psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_mengemudikan_tidak_wajar) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_mengemudikan_tidak_wajar')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">8) Syarat teknis dan   layak jalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_syarat_teknis_layak_jalan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_syarat_teknis_layak_jalan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">9) Tidak menyalakan   lampu utama siang/malam</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">10) Berbelok tanpa   isyarat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_berbelok_tanpa_isyarat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_berbelok_tanpa_isyarat')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">11) Berbalapan di   jalan raya (psl 297)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_berbalapan_di_jalan_raya) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_berbalapan_di_jalan_raya')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">12) Melanggar Rambu   berhenti dan parkir</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">13) Melanggar marka   berhenti</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_melanggar_marka_berhenti) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_marka_berhenti_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_melanggar_marka_berhenti')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">14) tidak mematuhi   perintah petugas Polri(psl 104)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">15) Surat-surat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_surat_surat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_surat_surat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_surat_surat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_surat_surat')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">16) Kelengkapan   Kendaraan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_kelengkapan_kendaraan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_kelengkapan_kendaraan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_kelengkapan_kendaraan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_kelengkapan_kendaraan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">17) Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_sepeda_motor_lain_lain_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_sepeda_motor_lain_lain) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_sepeda_motor_lain_lain_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_sepeda_motor_lain_lain')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_2', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_2', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_kecepatan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_kecepatan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_kecepatan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_kecepatan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2) Safety belt</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_safety_belt_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_safety_belt) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_safety_belt_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_safety_belt')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3) Muatan ( over   loading)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_muatan_overload_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_muatan_overload) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_muatan_overload_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_muatan_overload')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4) Marka menerus /   Rambu menyalip</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_marka_menerus_menyalip_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_marka_menerus_menyalip) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_marka_menerus_menyalip_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_marka_menerus_menyalip')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5) Melawan Arus (psl   105)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_melawan_arus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_melawan_arus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_melawan_arus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melawan_arus')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6)  Melanggar Lampu   Lalu Lintas (psl 287 ayt 2 jo 106 ay 4)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_melanggar_lampu_lalin_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_melanggar_lampu_lalin) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_melanggar_lampu_lalin_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melanggar_lampu_lalin')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">7)  Mengemudikan   kendaraan dengan tidak wajar(psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_mengemudi_tidak_wajar_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_mengemudi_tidak_wajar) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_mengemudi_tidak_wajar_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_mengemudi_tidak_wajar')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">8)  Syarat teknis dan   layak jalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_syarat_teknis_layak_jalan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_syarat_teknis_layak_jalan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_syarat_teknis_layak_jalan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_syarat_teknis_layak_jalan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">9)  Tidak menyalakan   lampu utama mlm hari (psl 293 jo 107)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_tidak_nyala_lampu_malam_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_tidak_nyala_lampu_malam) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_tidak_nyala_lampu_malam_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_tidak_nyala_lampu_malam')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">10)  Berbelok tanpa   isyarat (psl 295)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_berbelok_tanpa_isyarat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_berbelok_tanpa_isyarat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_berbelok_tanpa_isyarat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_berbelok_tanpa_isyarat')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">11)  Berbalapan di   jalan raya (psl 297)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_berbalapan_di_jalan_raya_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_berbalapan_di_jalan_raya) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_berbalapan_di_jalan_raya_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_berbalapan_di_jalan_raya')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">12)  Melanggar Rambu   berhenti dan parkir</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">13) Melanggar marka   berhenti</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_melanggar_marka_berhenti_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_melanggar_marka_berhenti) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_melanggar_marka_berhenti_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_melanggar_marka_berhenti')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>



        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">14)  tidak mematuhi   perintah petugas Polri(psl 104)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_tidak_patuh_perintah_petugas_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_tidak_patuh_perintah_petugas) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_tidak_patuh_perintah_petugas_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_tidak_patuh_perintah_petugas')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">15)  Surat-surat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_surat_surat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_surat_surat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_surat_surat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_surat_surat')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">16)  Kelengkapan   Kendaraan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_kelengkapan_kendaraan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_kelengkapan_kendaraan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_kelengkapan_kendaraan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_kelengkapan_kendaraan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">17)  Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_mobil_lain_lain_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_mobil_lain_lain) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_mobil_lain_lain_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_mobil_lain_lain')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_3', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_3', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_4', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_4', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->barang_bukti_yg_disita_sim_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->barang_bukti_yg_disita_sim) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'barang_bukti_yg_disita_sim_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'barang_bukti_yg_disita_sim')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b) STNK</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->barang_bukti_yg_disita_stnk_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->barang_bukti_yg_disita_stnk) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'barang_bukti_yg_disita_stnk_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'barang_bukti_yg_disita_stnk')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c) KENDARAAN</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->barang_bukti_yg_disita_stnk_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->barang_bukti_yg_disita_stnk) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'barang_bukti_yg_disita_stnk_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'barang_bukti_yg_disita_stnk')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_5', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_5', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_sepeda_motor) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_sepeda_motor')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Mobil Penumpang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_penumpang) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_penumpang')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mobil Bus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_bus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_bus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_bus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_bus')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Mobil Barang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_barang_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_mobil_barang) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_barang_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_mobil_barang')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kendaraan Khusus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_6', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_6', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_pns_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_pns) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_pns_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_pns')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_karyawan_swasta_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_karyawan_swasta) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_karyawan_swasta_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_karyawan_swasta')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Pelajar / Mahasiswa</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_pelajar_mahasiswa_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_pelajar_mahasiswa) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_pelajar_mahasiswa_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_pelajar_mahasiswa')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi (supir)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_pengemudi_supir_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_pengemudi_supir) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_pengemudi_supir_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_pengemudi_supir')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e.TNI</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_tni_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_tni) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_tni_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_tni')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f.Polri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_polri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_polri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_polri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_polri')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

         <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_pelanggaran_lain_lain_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_pelanggaran_lain_lain) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_pelanggaran_lain_lain_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_pelanggaran_lain_lain')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_7', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_7', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_kurang_dari_15_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_kurang_dari_15_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_kurang_dari_15_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_kurang_dari_15_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_16_20_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_16_20_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_16_20_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_16_20_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_21_25_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_21_25_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_21_25_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_21_25_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_26_30_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_26_30_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_26_30_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_26_30_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_31_35_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_31_35_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_31_35_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_31_35_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_36_40_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_36_40_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_36_40_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_36_40_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_41_45_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_41_45_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_41_45_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_41_45_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_46_50_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_46_50_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_46_50_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_46_50_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_51_55_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_51_55_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_51_55_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_51_55_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_56_60_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_56_60_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_56_60_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_56_60_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. > 60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_pelanggaran_diatas_60_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_pelanggaran_diatas_60_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_pelanggaran_diatas_60_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_pelanggaran_diatas_60_tahun')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_8', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_8', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_a_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_a) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_a_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_a')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_a_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_a_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_a_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_a_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b1_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b1) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b1_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b1_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b1_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b2_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b2) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. B II UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_b2_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_b2_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_b2_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. C</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_c_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_c) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_c_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_c')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_d_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_d) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_d_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_d')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. SIM Internasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_sim_internasional_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_sim_internasional) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_sim_internasional_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_sim_internasional')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_pelanggaran_tanpa_sim_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_pelanggaran_tanpa_sim) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_pelanggaran_tanpa_sim_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_pelanggaran_tanpa_sim')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_9', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_9', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_pemukiman_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_pemukiman) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_pemukiman_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_pemukiman')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  2). Kawasan Perbelanjaan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_perbelanjaan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_perbelanjaan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_perbelanjaan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_perbelanjaan')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  3). Perkantoran</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_perkantoran_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_perkantoran) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_perkantoran_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_perkantoran')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  4). Kawasan Wisata</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_wisata_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_wisata) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_wisata_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_wisata')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  5). Kawasan Indutri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_industri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_industri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_industri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_industri')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_10', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_10', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_nasional_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_nasional) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_nasional_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_nasional')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  2). Propinsi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_propinsi_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_propinsi) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_propinsi_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_propinsi')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  3). Kab/Kota</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_kab_kota_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_kab_kota) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_kab_kota_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_kab_kota')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   4). Desa / Lingkungan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_status_jalan_desa_lingkungan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_status_jalan_desa_lingkungan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_status_jalan_desa_lingkungan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_status_jalan_desa_lingkungan')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_11', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_11', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_arteri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_arteri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_arteri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_arteri')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   2). Kolektor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_kolektor_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_kolektor) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_kolektor_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_kolektor')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   3). Lokal</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_lokal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_lokal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lokal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lokal')) }}</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   4). Lingkungan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_pelanggaran_fungsi_jalan_lingkungan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_pelanggaran_fungsi_jalan_lingkungan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lingkungan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_pelanggaran_fungsi_jalan_lingkungan')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_12', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_12', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Kasus</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kerugian Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_jumlah_kerugian_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_jumlah_kerugian_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_jumlah_kerugian_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_jumlah_kerugian_materiil')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_barang_bukti_yg_disita_sim_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_barang_bukti_yg_disita_sim) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_sim_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_sim')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. STNK</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_barang_bukti_yg_disita_stnk_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_barang_bukti_yg_disita_stnk) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_stnk_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_stnk')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. KENDARAAN</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_barang_bukti_yg_disita_kendaraan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_barang_bukti_yg_disita_kendaraan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_kendaraan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_barang_bukti_yg_disita_kendaraan')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_14', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_14', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_pns_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_pns) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_pns_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_pns')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_karwayan_swasta_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_karwayan_swasta) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_karwayan_swasta_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_karwayan_swasta')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mahasiswa / Pelajar</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_pelajar_mahasiswa) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_pelajar_mahasiswa')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_pengemudi_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_pengemudi) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_pengemudi_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_pengemudi')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. TNI</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_tni_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_tni) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_tni_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_tni')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Polri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_polri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_polri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_polri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_polri')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_korban_kecelakaan_lalin_lain_lain_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_korban_kecelakaan_lalin_lain_lain) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_korban_kecelakaan_lalin_lain_lain_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_korban_kecelakaan_lalin_lain_lain')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_15', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_15', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_kurang_15_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_kurang_15) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_kurang_15_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_kurang_15')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_16_20_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_16_20) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_16_20_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_16_20')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_21_25_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_21_25) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_21_25_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_21_25')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_26_30_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_26_30) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_26_30_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_26_30')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_31_35_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_31_35) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_31_35_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_31_35')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_36_40_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_36_40) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_36_40_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_36_40')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_41_45_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_41_45) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_41_45_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_41_45')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_45_50_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_45_50) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_45_50_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_45_50')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_51_55_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_51_55) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_51_55_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_51_55')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_56_60_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_56_60) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_56_60_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_56_60')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. > 60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_korban_kecelakaan_diatas_60_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_korban_kecelakaan_diatas_60) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_korban_kecelakaan_diatas_60_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_korban_kecelakaan_diatas_60')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_16', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_16', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_a_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_a) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_a_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_a')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_a_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_a_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_a_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_a_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b1_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b1) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b1_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b1')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b1_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b1_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b1_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b1_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b2_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b2) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b2_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b2')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. BII UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_b2_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_b2_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_b2_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_b2_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. C</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_c_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_c) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_c_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_c')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_d_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_d) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_d_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_d')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. SIM Internasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_sim_internasional_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_sim_internasional) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_sim_internasional_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_sim_internasional')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_korban_kecelakaan_tanpa_sim_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_korban_kecelakaan_tanpa_sim) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_korban_kecelakaan_tanpa_sim_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_korban_kecelakaan_tanpa_sim')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_17', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_17', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_sepeda_motor) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_sepeda_motor')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Mobil Penumpang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_penumpang) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_penumpang')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mobil Bus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_bus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_bus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_bus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_bus')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Mobil Barang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_barang_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_mobil_barang) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_barang_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_mobil_barang')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kendaraan Khusus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus')) }}</td>
            <td class="tg-4bam">Unit</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Kendaraan Tidak Bermotor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor')) }}</td>
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
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_18', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_18', 'CURRENT')) }}</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_tunggal_ooc_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_tunggal_ooc) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_tunggal_ooc_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_tunggal_ooc')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Depan-Depan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_depan_depan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_depan_depan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_depan_depan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_depan_depan')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Depan-Belakang</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_depan_belakang_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_depan_belakang) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_depan_belakang_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_depan_belakang')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Depan-Samping</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_depan_samping_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_depan_samping) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_depan_samping_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_depan_samping')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Beruntun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_beruntun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_beruntun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_beruntun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_beruntun')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Tabrak Pejalan Kaki</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_pejalan_kaki_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_pejalan_kaki) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_pejalan_kaki_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_pejalan_kaki')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Tabrak Lari</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_tabrak_lari_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_tabrak_lari) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_tabrak_lari_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_tabrak_lari')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. Tabrak Hewan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_tabrak_hewan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_tabrak_hewan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_tabrak_hewan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_tabrak_hewan')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. Samping-Samping</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_samping_samping_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_samping_samping) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_samping_samping_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_samping_samping')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Lainnya</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->jenis_kecelakaan_lainnya_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->jenis_kecelakaan_lainnya) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'jenis_kecelakaan_lainnya_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'jenis_kecelakaan_lainnya')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah ≥ (9a)</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_19', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_19', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_19', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_19', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7">16</td>
            <td class="tg-o5n3">PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_pns_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_pns) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_pns_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_pns')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_karyawan_swasta) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_karyawan_swasta')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mahasiswa /   Pelajar</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_pengemudi_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_pengemudi) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_pengemudi_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_pengemudi')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. TNI</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_tni_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_tni) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_tni_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_tni')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Polri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_polri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_polri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_polri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_polri')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->profesi_pelaku_kecelakaan_lalin_lain_lain_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->profesi_pelaku_kecelakaan_lalin_lain_lain) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_lain_lain_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'profesi_pelaku_kecelakaan_lalin_lain_lain')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_20', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_20', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_20', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_20', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7">17</td>
            <td class="tg-o5n3">USIA PELAKU KECELAKAAN LALU LINTAS</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_kurang_dari_15_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_kurang_dari_15_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_kurang_dari_15_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_kurang_dari_15_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_16_20_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_16_20_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_16_20_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_16_20_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_21_25_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_21_25_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_21_25_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_21_25_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_26_30_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_26_30_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_26_30_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_26_30_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_31_35_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_31_35_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_31_35_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_31_35_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_36_40_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_36_40_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_36_40_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_36_40_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_41_45_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_41_45_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_41_45_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_41_45_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_46_50_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_46_50_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_46_50_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_46_50_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_51_55_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_51_55_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_51_55_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_51_55_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_56_60_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_56_60_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_56_60_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_56_60_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. > 60 Tahun</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->usia_pelaku_kecelakaan_diatas_60_tahun_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->usia_pelaku_kecelakaan_diatas_60_tahun) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'usia_pelaku_kecelakaan_diatas_60_tahun_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'usia_pelaku_kecelakaan_diatas_60_tahun')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_21', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_21', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_21', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_21', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Orang</td>
        </tr>

        <tr>
            <td class="tg-n1r7">18</td>
            <td class="tg-o5n3">SIM PELAKU KECELAKAAN LALU LINTAS </td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_a_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_a) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_a_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_a')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_a_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_a_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_a_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_a_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_b1_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_b1) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_b1_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_b1')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_b1_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_b1_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_b1_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_b1_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_b2_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_b2) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_b2_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_b2')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. B II UMUM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_b2_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_b2_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_b2_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_b2_umum')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. C</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_c_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_c) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_c_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_c')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_d_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_d) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_d_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_d')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. Sim Internasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_sim_internasional_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_sim_internasional) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_sim_internasional_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_sim_internasional')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sim_pelaku_kecelakaan_tanpa_sim_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sim_pelaku_kecelakaan_tanpa_sim) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sim_pelaku_kecelakaan_tanpa_sim_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sim_pelaku_kecelakaan_tanpa_sim')) }}</td>
            <td class="tg-4bam">Buah</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_22', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_22', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_22', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_22', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Buah</td>
        </tr>

        <tr>
            <td class="tg-n1r7">19</td>
            <td class="tg-o5n3">LOKASI KECELAKAAN LALU LINTAS</td>
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
            <td class="tg-o5n3">a. Berdasarkan Kawasan</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_lalin_pemukiman_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_lalin_pemukiman) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_lalin_pemukiman_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_lalin_pemukiman')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 2). Kawasan Perbelanjaan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_lalin_perbelanjaan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_lalin_perbelanjaan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_lalin_perbelanjaan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_lalin_perbelanjaan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 3). Perkantoran</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_lalin_perkantoran_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_lalin_perkantoran) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_lalin_perkantoran_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_lalin_perkantoran')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 4). Kawasan Wisata</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_lalin_wisata_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_lalin_wisata) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_lalin_wisata_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_lalin_wisata')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 5). Kawasan Indutri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_lalin_industri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_lalin_industri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_lalin_industri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_lalin_industri')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 6). Lain - lain</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_lalin_lain_lain_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_lalin_lain_lain) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_lalin_lain_lain_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_lalin_lain_lain')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_23', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_23', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_23', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_23', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Perkara</td>
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
            <td class="tg-kcps"> 1). Nasional</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_status_jalan_nasional_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_status_jalan_nasional) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_status_jalan_nasional_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_status_jalan_nasional')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 2). Propinsi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_status_jalan_propinsi_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_status_jalan_propinsi) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_status_jalan_propinsi_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_status_jalan_propinsi')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 3). Kab/Kota</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_status_jalan_kab_kota_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_status_jalan_kab_kota) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_status_jalan_kab_kota_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_status_jalan_kab_kota')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> 4). Desa / Lingkungan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_status_jalan_desa_lingkungan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_status_jalan_desa_lingkungan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_status_jalan_desa_lingkungan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_status_jalan_desa_lingkungan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_24', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_24', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_24', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_24', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">c. Berdasarkan Fungsi Jalan</td>
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
            <td class="tg-kcps">1). Arteri</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_fungsi_jalan_arteri_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_fungsi_jalan_arteri) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_arteri_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_arteri')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2). Kolektor</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_fungsi_jalan_kolektor_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_fungsi_jalan_kolektor) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_kolektor_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_kolektor')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3). Lokal</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_fungsi_jalan_lokal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_fungsi_jalan_lokal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_lokal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_lokal')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4). Lingkungan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->lokasi_kecelakaan_fungsi_jalan_lingkungan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->lokasi_kecelakaan_fungsi_jalan_lingkungan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_lingkungan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'lokasi_kecelakaan_fungsi_jalan_lingkungan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_25', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_25', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_25', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_25', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">20</td>
            <td class="tg-o5n3">FAKTOR PENYEBAB KECELAKAAN</td>
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
            <td class="tg-kcps"> 1). Manusia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_manusia_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_manusia) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_manusia_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_manusia')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> a. Ngantuk/Lelah (Psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_ngantuk_lelah_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_ngantuk_lelah) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_ngantuk_lelah_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_ngantuk_lelah')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> b. Mabuk /pengaruh alkohol dan   obat (Psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_mabuk_obat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_mabuk_obat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_mabuk_obat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_mabuk_obat')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps"> c. Sakit (Psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_sakit_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_sakit) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_sakit_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_sakit')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  d. Hand Phone/ Alat elektronik   lain (Psl 283)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_handphone_elektronik_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_handphone_elektronik) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_handphone_elektronik_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_handphone_elektronik')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  e. Menerobos lampu merah(psl 287   ay 2)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_menerobos_lampu_merah_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_menerobos_lampu_merah) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_menerobos_lampu_merah_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_menerobos_lampu_merah')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  f. Melanggar Batas Kecepatan (psl   287 ay 7)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_melanggar_batas_kecepatan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_melanggar_batas_kecepatan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  g. Tidak menjaga Jarak</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_tidak_menjaga_jarak) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_tidak_menjaga_jarak')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  h. Mendahului/Berbelok/Berpindah   Jalur (psl 294)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">  i. Berpindah lajur ( psl 295)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_berpindah_jalur_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_berpindah_jalur) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_berpindah_jalur_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_berpindah_jalur')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">    j. Tidak memberikan lampu isyarat   berhenti/berbelok   /berubah arah</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">      k. Tidak mengutamakan pejalan kaki   (psl 284 jo 106 ay 2)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">      l. Lainnya</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_lainnya_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_lainnya) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_lainnya_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_lainnya')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2). Alam</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_alam_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_alam) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_alam_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_alam')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3). Kelaikan Kendaraan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_kelaikan_kendaraan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_kelaikan_kendaraan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_kelaikan_kendaraan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_kelaikan_kendaraan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4). Jalan (kondisi jalan)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_kondisi_jalan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_kondisi_jalan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_kondisi_jalan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_kondisi_jalan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5).Prasarana Jalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_prasarana_jalan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_prasarana_jalan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_prasarana_jalan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_prasarana_jalan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   a) Rambu</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_rambu_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_rambu) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_rambu_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_rambu')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   b) Marka</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_marka_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_marka) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_marka_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_marka')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   c) APIL</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_apil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_apil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_apil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_apil')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">   d) Perlintasan KA tanpa palang   pintu</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_26', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_26', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_26', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_26', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">21</td>
            <td class="tg-o5n3">WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
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
            <td class="tg-kcps">a. 00.00 - 03.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_00_03_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_00_03) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_00_03_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_00_03')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 03.00 - 06.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_03_06_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_03_06) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_03_06_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_03_06')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 06.00- 09.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_06_09_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_06_09) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_06_09_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_06_09')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 09.00 - 12.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_09_12_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_09_12) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_09_12_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_09_12')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 12.00 - 15.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_12_15_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_12_15) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_12_15_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_12_15')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 15.00 - 18.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_15_18_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_15_18) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_15_18_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_15_18')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 18.00 - 21.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_18_21_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_18_21) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_18_21_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_18_21')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 21.00 - 24.00</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->waktu_kejadian_kecelakaan_21_24_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->waktu_kejadian_kecelakaan_21_24) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'waktu_kejadian_kecelakaan_21_24_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'waktu_kejadian_kecelakaan_21_24')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_27', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_27', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_27', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_27', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">22</td>
            <td class="tg-o5n3">KECELAKAAN LALU LINTAS MENONJOL</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_menonjol_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_menonjol_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_menonjol_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_menonjol_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_menonjol_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_menonjol_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_menonjol_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_menonjol_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_menonjol_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_menonjol_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_menonjol_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_menonjol_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_menonjol_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_menonjol_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_menonjol_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_menonjol_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_menonjol_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_menonjol_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_menonjol_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_menonjol_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">23</td>
            <td class="tg-o5n3">KECELAKAAN LALU LINTAS TUNGGAL / OUT OF CONTROL</td>
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
            <td class="tg-kcps">a. Jumlah   Kejadian                            =  (14.a)</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tunggal_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tunggal_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tunggal_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tunggal_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tunggal_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tunggal_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tunggal_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tunggal_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tunggal_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tunggal_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tunggal_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tunggal_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tunggal_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tunggal_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tunggal_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tunggal_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tunggal_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tunggal_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tunggal_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tunggal_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">24</td>
            <td class="tg-o5n3">TABRAK PEJALAN   KAKI                 =  (14.f)</td>
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
            <td class="tg-kcps">a. Jumlah   Kejadian</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_pejalan_kaki_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_pejalan_kaki_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">25</td>
            <td class="tg-o5n3">TABRAK LARI                                  =  (14.g)</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_lari_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_lari_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_lari_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_lari_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_lari_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_lari_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_lari_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_lari_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_lari_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_lari_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_lari_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_lari_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_lari_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_lari_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_lari_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_lari_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">26</td>
            <td class="tg-o5n3">TABRAK SEPEDA MOTOR (   R2 )</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_sepeda_motor_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_sepeda_motor_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_sepeda_motor_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">27</td>
            <td class="tg-o5n3">TABRAK RANMOR RODA   EMPAT ( R4 )</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_roda_empat_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_roda_empat_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_roda_empat_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_roda_empat_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">28</td>
            <td class="tg-o5n3">TABRAK KENDARAAN TIDAK   BERMOTOR (Sepeda,Becak dayung, Delman, dokar dll)             = (13.f)	</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_tabrak_tidak_bermotor_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_tabrak_tidak_bermotor_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">29</td>
            <td class="tg-o5n3">KECELAKAAN DI   PERLINTASAN KA</td>
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
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_jumlah_kejadian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_jumlah_kejadian')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Berpalang Pintu</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_berpalang_pintu) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_berpalang_pintu')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Tidak Berpalang   Pintu</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_korban_luka_ringan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_korban_luka_ringan')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Korban Luka Berat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_korban_luka_berat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_korban_luka_berat')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>


        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Korban Meninggal   Dunia</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_korban_meninggal_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_korban_meninggal) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_korban_meninggal_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_korban_meninggal')) }}</td>
            <td class="tg-4bam">Orang</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Materiil</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_lalin_perlintasan_ka_materiil_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_lalin_perlintasan_ka_materiil) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_materiil_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_lalin_perlintasan_ka_materiil')) }}</td>
            <td class="tg-4bam">Rp</td>
        </tr>

        <tr>
            <td class="tg-n1r7">30</td>
            <td class="tg-o5n3">KECELAKAAN TRANSPORTASI</td>
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
            <td class="tg-kcps">a. Kecelakaan Kereta   Api</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_transportasi_kereta_api_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_transportasi_kereta_api) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_transportasi_kereta_api_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_transportasi_kereta_api')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Kecelakaan Laut /   Perairan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_transportasi_laut_perairan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_transportasi_laut_perairan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_transportasi_laut_perairan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_transportasi_laut_perairan')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Kecelakaan Udara</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kecelakaan_transportasi_udara_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kecelakaan_transportasi_udara) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kecelakaan_transportasi_udara_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kecelakaan_transportasi_udara')) }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_36', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_36', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_36', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_36', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7">III</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH   DIKMAS LALU LINTAS</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>

        <tr>
            <td class="tg-n1r7">31</td>
            <td class="tg-o5n3">DIKMAS   LANTAS</td>
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
            <td class="tg-o5n3">a.   Penluh</td>
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
            <td class="tg-kcps">1).   Melalui Media Cetak</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penlu_melalui_media_cetak_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penlu_melalui_media_cetak) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penlu_melalui_media_cetak_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penlu_melalui_media_cetak')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2).   Melalui Media Elektronik</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penlu_melalui_media_elektronik_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penlu_melalui_media_elektronik) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penlu_melalui_media_elektronik_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penlu_melalui_media_elektronik')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3).   Media Sosial</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penlu_melalui_media_sosial_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penlu_melalui_media_sosial) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penlu_melalui_media_sosial_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penlu_melalui_media_sosial')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4). Tempat Keramaian</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penlu_melalui_tempat_keramaian_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penlu_melalui_tempat_keramaian) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penlu_melalui_tempat_keramaian_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penlu_melalui_tempat_keramaian')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5).   Tempat Istirahat</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penlu_melalui_tempat_istirahat_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penlu_melalui_tempat_istirahat) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penlu_melalui_tempat_istirahat_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penlu_melalui_tempat_istirahat')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6).   Tempat Rawan Laka Langgar</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penlu_melalui_daerah_rawan_laka_dan_langgar_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penlu_melalui_daerah_rawan_laka_dan_langgar) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penlu_melalui_daerah_rawan_laka_dan_langgar_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penlu_melalui_daerah_rawan_laka_dan_langgar')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_37', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_37', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_37', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_37', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">b.   Penyebaran/ Pemasangan</td>
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
            <td class="tg-kcps">1).   Spanduk</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penyebaran_pemasangan_spanduk_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penyebaran_pemasangan_spanduk) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penyebaran_pemasangan_spanduk_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penyebaran_pemasangan_spanduk')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2).   Leaflet</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penyebaran_pemasangan_leaflet_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penyebaran_pemasangan_leaflet) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penyebaran_pemasangan_leaflet_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penyebaran_pemasangan_leaflet')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3).   Sticker</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penyebaran_pemasangan_sticker_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penyebaran_pemasangan_sticker) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penyebaran_pemasangan_sticker_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penyebaran_pemasangan_sticker')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4).   Billboard</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->penyebaran_pemasangan_bilboard_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->penyebaran_pemasangan_bilboard) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'penyebaran_pemasangan_bilboard_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'penyebaran_pemasangan_bilboard')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_38', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_38', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_38', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_38', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">c. Program Nasional Keamanan Lalu Lintas</td>
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
            <td class="tg-kcps">1).   Polisi Sahabat Anak</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->polisi_sahabat_anak_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->polisi_sahabat_anak) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'polisi_sahabat_anak_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'polisi_sahabat_anak')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2).   Cara Aman Sekolah</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->cara_aman_sekolah_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->cara_aman_sekolah) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'cara_aman_sekolah_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'cara_aman_sekolah')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3).   Patroli Keamanan Sekolah</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->patroli_keamanan_sekolah_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->patroli_keamanan_sekolah) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'patroli_keamanan_sekolah_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'patroli_keamanan_sekolah')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4).   Pramuka Saka Bhayangkara Krida Lalu Lintas</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->pramuka_bhayangkara_krida_lalu_lintas_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->pramuka_bhayangkara_krida_lalu_lintas) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'pramuka_bhayangkara_krida_lalu_lintas_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'pramuka_bhayangkara_krida_lalu_lintas')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_39', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_39', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_39', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_39', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">d.   Program Nasional Keselamatan Lalu Lintas</td>
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
            <td class="tg-kcps">1).   Police Goes To Campus</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->police_goes_to_campus_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->police_goes_to_campus) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'police_goes_to_campus_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'police_goes_to_campus')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2).   Safety Riding dan Driving</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->safety_riding_driving_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->safety_riding_driving) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'safety_riding_driving_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'safety_riding_driving')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">3). Forum Lalu Lintas   dan Angkutan Jalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->forum_lalu_lintas_angkutan_umum_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->forum_lalu_lintas_angkutan_umum) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'forum_lalu_lintas_angkutan_umum_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'forum_lalu_lintas_angkutan_umum')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4).   Kampanye Keselamatan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->kampanye_keselamatan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->kampanye_keselamatan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'kampanye_keselamatan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'kampanye_keselamatan')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5).   Sekolah Mengemudi</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->sekolah_mengemudi_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->sekolah_mengemudi) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'sekolah_mengemudi_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'sekolah_mengemudi')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6).   Taman Lalu Lintas</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->taman_lalu_lintas_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->taman_lalu_lintas) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'taman_lalu_lintas_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'taman_lalu_lintas')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">7).   Global Road Safety Partnership Action</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->global_road_safety_partnership_action_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->global_road_safety_partnership_action) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'global_road_safety_partnership_action_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'global_road_safety_partnership_action')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_40', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_40', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_40', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_40', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7">IV</td>
            <td class="tg-o5n3">DATA   GIAT KEPOLISIAN</td>
                @foreach ($dailyNoticePrev as $prev)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
        </tr>


        <tr>
            <td class="tg-n1r7">32</td>
            <td class="tg-o5n3">GIAT LANTAS</td>
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
            <td class="tg-kcps">a.   Pengaturan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->giat_lantas_pengaturan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->giat_lantas_pengaturan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'giat_lantas_pengaturan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'giat_lantas_pengaturan')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b.   Penjagaan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->giat_lantas_penjagaan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->giat_lantas_penjagaan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'giat_lantas_penjagaan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'giat_lantas_penjagaan')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c.   Pengawalan</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->giat_lantas_pengawalan_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->giat_lantas_pengawalan) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'giat_lantas_pengawalan_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'giat_lantas_pengawalan')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d.   Patroli</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ numberFormat($dailyNoticePrev[$i]->giat_lantas_patroli_p) }}</td>
                <td class="tg-n1r7">{{ numberFormat($dailyNoticeCurrent[$i]->giat_lantas_patroli) }}</td>
            @endfor
            <td class="tg-o5n3">{{ numberFormat(DailyNotice::summary($operationId, 'giat_lantas_patroli_p')) }}</td>
            <td class="tg-o5n3">{{ numberFormat(DailyNoticeCurrent::summary($operationId, 'giat_lantas_patroli')) }}</td>
            <td class="tg-4bam">Kali</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @php
                    $prev = SumLoopEveryday::group('GROUP_41', 'PREV')->get();
                    $current = SumLoopEveryday::group('GROUP_41', 'CURRENT')->get();
                @endphp
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ numberFormat($prev[$i]->summary) }}</td>
                    <td class="tg-n1r7">{{ numberFormat($current[$i]->summary) }}</td>
                @endfor
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_41', 'PREV')) }}</td>
                <td class="tg-o5n3">{{ numberFormat(SumLoopEveryday::summary('GROUP_41', 'CURRENT')) }}</td>
            <td class="tg-n1r7">Kali</td>
        </tr>
    </tbody>
</table>

<br>

<div class="right">
    @if (empty($dr))
        <span>Jakarta, {{ indonesiaDate(date('Y-m-d')) }}</span><br>
        <span><b>{{ gedein($rencanaOperasi->name) }} - {{ date('Y') }}</b></span>
    @else
        <span>{{ firstUpper(optional($dr)->kota) }}, {{ indonesiaDate(date('Y-m-d')) }}</span><br>
        <span><b>{{ gedein(optional($dr)->jabatan) }} {{ gedein($rencanaOperasi->name) }} - {{ date('Y') }}</b></span>
    @endif
</div>

<br><br><br><br>

<div class="right">
    <span><b>{{ optional($dr)->atasan }}</b></span><br>
    <span><b>{{ optional($dr)->pangkat_nrp }}</b></span>
</div>
@endsection