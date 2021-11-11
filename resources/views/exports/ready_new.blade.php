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
            <td class="tg-o5n3">{{ App\Models\DailyNotice::where('operation_id', $operationId)->sum('pelanggaran_lalu_lintas_tilang_p') }}</td>
            <td class="tg-o5n3">{{ App\Models\DailyNoticeCurrent::where('operation_id', $operationId)->sum('pelanggaran_lalu_lintas_tilang') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Teguran</td>
            @for ($i = 0; $i < $totalLoopDays; $i++)
                <td class="tg-n1r7">{{ $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_teguran_p }}</td>
                <td class="tg-n1r7">{{ $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_teguran }}</td>
            @endfor
            <td class="tg-o5n3">{{ App\Models\DailyNotice::where('operation_id', $operationId)->sum('pelanggaran_lalu_lintas_teguran_p') }}</td>
            <td class="tg-o5n3">{{ App\Models\DailyNoticeCurrent::where('operation_id', $operationId)->sum('pelanggaran_lalu_lintas_teguran') }}</td>
            <td class="tg-4bam">Perkara</td>
        </tr>

        <tr>
            <td class="tg-n1r7"></td>
            <td class="tg-o5n3">Jumlah</td>
                @for ($i = 0; $i < $totalLoopDays; $i++)

                    @php
                        App\Models\LoopTotalSummary::create([
                            'type' => 'pelanggaran_lalu_lintas_tilang_p',
                            'val' => summary([
                                $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_tilang_p,
                                $dailyNoticePrev[$i]->pelanggaran_lalu_lintas_teguran_p
                            ]),
                        ]);

                        App\Models\LoopTotalSummary::create([
                            'type' => 'pelanggaran_lalu_lintas_tilang',
                            'val' => summary([
                                $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_tilang,
                                $dailyNoticeCurrent[$i]->pelanggaran_lalu_lintas_teguran
                            ]),
                        ]);
                    @endphp

                    <td class="tg-n1r7">-</td>
                    <td class="tg-n1r7">-</td>

                @endfor
            <td class="tg-o5n3">{{ App\Models\LoopTotalSummary::where('type', 'pelanggaran_lalu_lintas_tilang_p')->sum('val'); }}</td>
            <td class="tg-o5n3">{{ App\Models\LoopTotalSummary::where('type', 'pelanggaran_lalu_lintas_tilang')->sum('val'); }}</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>

    </tbody>
</table>
@endsection