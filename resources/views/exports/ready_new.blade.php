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
                {{-- @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">{{ summary([$dailyNoticePrev[$i]->pelanggaran_lalu_lintas_tilang_p, $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_teguran_p]) }}</td>
                    <td class="tg-n1r7">{{ summary([$dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_tilang, $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_teguran]) }}</td>
                @endfor --}}
                @for ($i = 0; $i < $totalLoopDays; $i++)
                    <td class="tg-n1r7">XXX</td>
                    <td class="tg-n1r7">ZZZ</td>
                @endfor
            <td class="tg-o5n3">{{ LoopTotalSummary::summary('pelanggaran_lalu_lintas_tilang_p') }}</td>
            <td class="tg-o5n3">{{ LoopTotalSummary::summary('pelanggaran_lalu_lintas_tilang') }}</td>
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
            <td class="tg-o5n3">(2.a)   Jumlah </td>
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
            <td class="tg-o5n3">Jumlah</td>
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
            <td class="tg-o5n3">(2.c)     Jumlah</td>
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
            <td class="tg-4bam">Perkara</td>
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
            <td class="tg-4bam">Perkara</td>
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
            <td class="tg-4bam">Perkara</td>
        </tr>

    </tbody>
</table>
@endsection