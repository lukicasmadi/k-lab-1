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

            @foreach ($ro->dailyInputCurrent as $current)
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
                @foreach ($ro->dailyInputCurrent as $current)
                    <td class="tg-n1r7"></td>
                    <td class="tg-n1r7"></td>
                @endforeach
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3"></td>
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
                    echo '<td class="tg-4bam">'.$ro->dailyInputPrev[$i]->pelanggaran_lalu_lintas_tilang_p.'</td>';
                    echo '<td class="tg-4bam">'.$ro->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_tilang.'</td>';

                    array_push($prevSum, $ro->dailyInputPrev[$i]->pelanggaran_lalu_lintas_tilang_p);
                    array_push($currentSum, $ro->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_tilang);
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
                    echo '<td class="tg-4bam">'.$ro->dailyInputPrev[$i]->pelanggaran_lalu_lintas_teguran_p.'</td>';
                    echo '<td class="tg-4bam">'.$ro->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_teguran.'</td>';

                    array_push($prevSum, $ro->dailyInputPrev[$i]->pelanggaran_lalu_lintas_teguran_p);
                    array_push($currentSum, $ro->dailyInputCurrent[$i]->pelanggaran_lalu_lintas_teguran);
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
                    echo '<td class="tg-4bam">'.pelanggaranLalinPrev($i).'</td>';
                    echo '<td class="tg-4bam">'.pelanggaranLalinCurrent($i).'</td>';
                }
                echo '<td class="tg-4bam">0</td>';
                echo '<td class="tg-4bam">0</td>';
            @endphp
            <td class="tg-n1r7">Perkara</td>
        </tr>


    </tbody>
</table>
@endsection