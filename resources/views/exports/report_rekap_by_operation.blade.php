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
            <th class="tg-2g1l" colspan="2">H1</th>
            <th class="tg-2g1l" colspan="2">H2</th>
            <th class="tg-2g1l" colspan="2">Jumlah</th>
            <th class="tg-2g1l" rowspan="2">KET</th>
        </tr>
        <tr>
            <th class="tg-2g1l">2019</th>
            <th class="tg-2g1l">2020</th>
            <th class="tg-2g1l">2019</th>
            <th class="tg-2g1l">2020</th>
            <th class="tg-2g1l">2019</th>
            <th class="tg-2g1l">2020</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="tg-n1r7">1</td>
            <td class="tg-n1r7">2</td>
            <td class="tg-n1r7">3</td>
            <td class="tg-n1r7">4</td>
            <td class="tg-n1r7">5</td>
            <td class="tg-n1r7">6</td>
            <td class="tg-n1r7">7</td>
            <td class="tg-n1r7">8</td>
            <td class="tg-n1r7">9</td>
        </tr>
        <tr>
            <td class="tg-n1r7">I</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH PELANGGARAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3">1</td>
            <td class="tg-o5n3">PELANGGARAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Tilang = (2a+2b+2c)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Teguran</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3">2</td>
            <td class="tg-o5n3">JENIS PELANGGARAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-o5n3">a. Sepeda Motor (psl 47)</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-7yig"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">1) Kecepatan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">2) Helm</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">3) Boncengan Lebih Dari 1 (satu) Orang</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">4) Marka menerus / Rambu menyalip</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">5) Melawan Arus</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">6) Melanggar Lampu Lalu Lintas</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">7) Mengemudikan kendaraan dengan tidak wajar(psl 283)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">8) Syarat teknis dan layak jalan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">9) Tidak menyalakan lampu utama siang/malam</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">10) Berbelok tanpa isyarat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">11) Berbalapan di jalan raya (psl 297)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">12) Melanggar Rambu berhenti dan parkir</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">13) Melanggar marka berhenti</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">14) tidak mematuhi perintah petugas Polri(psl 104)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">15) Surat-surat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">16) Kelengkapan Kendaraan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">17) Lain-Lain</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">(2.a)   Jumlah      </td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">b.Mobil dan Kendaraan Khusus (psl 47)</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">1) Kecepatan ( psl 287 ay 5 jo 106  ay 4)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">2) Safety belt</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">3) Muatan ( over loading)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">4) Marka menerus / Rambu menyalip</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">5) Melawan Arus (psl 105)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">6) Melanggar Lampu Lalu Lintas (psl 287 ayt 2 jo 106 ay 4)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">7) Mengemudikan kendaraan dengan tidak wajar(psl 283)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">8) Syarat teknis dan layak jalan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">9) Tidak menyalakan lampu utama mlm hari (psl 293 jo 107)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">10) Berbelok tanpa isyarat (psl 295)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">11) Berbalapan di jalan raya (psl 297)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">12) Melanggar Rambu berhenti dan parkir</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">13) Melanggar marka berhenti</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">14) tidak mematuhi perintah petugas Polri(psl 104)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">15) Surat-surat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">16) Kelengkapan Kendaraan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">17) Lain-Lain</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-dgl5"> (2.b) Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">c. Kendaraan Tidak Bermotor dan Pejalan Kaki</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">1) Menyebrang tidak pada tempatnya</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-dgl5"> (2.c)   Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-2mzs">3</td>
            <td class="tg-o5n3">BARANGBUKTI YANG DISITA</td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-661g"></td>
            <td class="tg-kcps">a. SIM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-661g"></td>
            <td class="tg-kcps">b. STNK</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-661g"></td>
            <td class="tg-kcps">c. KENDARAAN</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-661g"></td>
            <td class="tg-o5n3">d. Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Unit</td>
        </tr>
        <tr>
            <td class="tg-o5n3">4</td>
            <td class="tg-o5n3">KENDARAAN YANG TERLIBAT PELANGGARAN</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Sepeda Motor</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Mobil Penumpang</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mobil Bus</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Mobil Barang</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kendaraan Khusus</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah = (1.a) - (2.c)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Unit</td>
        </tr>
        <tr>
            <td class="tg-o5n3">5</td>
            <td class="tg-o5n3">PROFESI PELAKU PELANGGARAN</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Pegawai Negeri Sipil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Pelajar / Mahasiswa</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi (supir)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. TNI</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Polri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah = (1.a) </td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3">6</td>
            <td class="tg-o5n3">USIA PELAKU PELANGGARAN</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">a. 0 - 15 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">k. &gt; 60 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah = (1.a) </td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3">7</td>
            <td class="tg-o5n3">SIM PELAKU PELANGGARAN</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. A</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. B II UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">g. C</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. SIM Internasional</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah = (1.a) </td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Buah</td>
        </tr>
        <tr>
            <td class="tg-o5n3">8</td>
            <td class="tg-o5n3">LOKASI PELANGGARAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">a. Berdasarkan Kawasan</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    1). Kawasan Pemukiman</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    2). Kawasan Perbelanjaan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    3). Perkantoran</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    4). Kawasan Wisata</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    5). Kawasan Indutri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">Jumlah = (9.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">b. Berdasarkan Status Jalan</td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    1). Nasional</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    2). Propinsi</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    3). Kab/Kota</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    4). Desa / Lingkungan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">Jumlah = (1.a) </td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">c. Berdasarkan Fungsi Jalan</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    1). Arteri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    2). Kolektor</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    3). Lokal</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-ktyi">    4). Lingkungan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-o5n3">Jumlah = (1.a) </td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Lokasi</td>
        </tr>
        <tr>
            <td class="tg-2g1l">II</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3">9</td>
            <td class="tg-o5n3">KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kasus</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kerugian Materiil</td>
            <td class="tg-7yig">                   - </td>
            <td class="tg-7yig">                   - </td>
            <td class="tg-7yig">                   - </td>
            <td class="tg-7yig">                   - </td>
            <td class="tg-7yig">                    - </td>
            <td class="tg-7yig">                    - </td>
            <td class="tg-4bam">Rp </td>
        </tr>
        <tr>
            <td class="tg-o5n3">10</td>
            <td class="tg-o5n3">BARANGBUKTI YANG DISITA</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">a. SIM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">b. STNK</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">c. KENDARAAN</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-o5n3">d. Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Unit</td>
        </tr>
        <tr>
            <td class="tg-o5n3">11</td>
            <td class="tg-o5n3">PROFESI KORBAN KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Pegawai Negeri Sipil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mahasiswa / Pelajar</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. TNI</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Polri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                 = (9b + 9c + 9d)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3">12</td>
            <td class="tg-o5n3" colspan="2">USIA KORBAN KECELAKAAN LALU LINTAS</td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">a. 0 - 15 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. &gt; 60 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                  = (9b + 9c + 9d)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3">13</td>
            <td class="tg-o5n3">SIM KORBAN KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. A</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. BII UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">g. C</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. D</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">i. SIM Internasional</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                 = (9b + 9c + 9d)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Buah</td>
        </tr>
        <tr>
            <td class="tg-o5n3">14</td>
            <td class="tg-o5n3">KENDARAAN YANG TERLIBAT KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Sepeda Motor</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Mobil Penumpang</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mobil Bus</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Mobil Barang</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Kendaraan Khusus</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Kendaraan Tidak Bermotor</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Unit</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                                                    ≥ (9a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Unit</td>
        </tr>
        <tr>
            <td class="tg-o5n3">15</td>
            <td class="tg-o5n3">JENIS KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Tunggal / Out of control</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Depan-Depan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Depan-Belakang</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">d. Depan-Samping</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Beruntun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Tabrak Pejalan Kaki</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Tabrak Lari</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. Tabrak Hewan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">i. Samping-Samping</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Lainnya</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                                                       ≥ (9a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Kali</td>
        </tr>
        <tr>
            <td class="tg-o5n3">16</td>
            <td class="tg-o5n3">PROFESI PELAKU KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Pegawai Negeri Sipil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Karyawan / Swasta</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Mahasiswa / Pelajar</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Pengemudi</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. TNI</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Polri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. Lain-Lain</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                                                    ≥ (9a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3">17</td>
            <td class="tg-o5n3">USIA PELAKU KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">a. 0 - 15 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">b. 16-20 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">c. 21-25 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">d. 26-30 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">e. 31-35 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">f. 36-40 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">g. 41-45 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">h. 46-50 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. 51-55 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. 56-60 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">k. &gt; 60 Tahun</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah            = Jumlah (15)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Orang</td>
        </tr>
        <tr>
            <td class="tg-o5n3">18</td>
            <td class="tg-o5n3">SIM PELAKU KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. A</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. A UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. B1</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. B1 UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. BII</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. B II UMUM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">g. C</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">h. D</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">i. Sim Internasional</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">j. Tanpa SIM</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Buah</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah           = Jumlah (15)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Buah</td>
        </tr>
        <tr>
            <td class="tg-o5n3">19</td>
            <td class="tg-o5n3">LOKASI KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-o5n3">a. Berdasarkan Kawasan</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    1). Kawasan Pemukiman</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    2). Kawasan Perbelanjaan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    3). Perkantoran</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    4). Kawasan Wisata</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">    5). Kawasan Indutri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    6). Lain - lain</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah             = (9.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">b. Berdasarkan Status Jalan</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    1). Nasional</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    2). Propinsi</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    3). Kab/Kota</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    4). Desa / Lingkungan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah               = (9.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">c. Berdasarkan Fungsi Jalan</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    1). Arteri</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    2). Kolektor</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    3). Lokal</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">    4). Lingkungan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-dgl5"></td>
            <td class="tg-o5n3">Jumlah                 = (9.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3">20</td>
            <td class="tg-o5n3">FAKTOR PENYEBAB KECELAKAAN</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">     1). Manusia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-7yig">                   - </td>
            <td class="tg-4bam">0</td>
            <td class="tg-7yig">                   - </td>
            <td class="tg-4bam">0</td>
            <td class="tg-7yig">                    - </td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">           a. Ngantuk/Lelah (Psl 283)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">           b. Mabuk /pengaruh alkohol dan obat (Psl 283)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">           c. Sakit (Psl 283)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           d. Hand Phone/ Alat elektronik lain (Psl 283)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           e. Menerobos lampu merah(psl 287 ay 2)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           f. Melanggar Batas Kecepatan (psl 287 ay 7)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           g. Tidak menjaga Jarak</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           h. Mendahului/Berbelok/Berpindah Jalur (psl 294)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           i. Berpindah lajur ( psl 295)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           j. Tidak memberikan lampu isyarat berhenti/berbelok   /berubah arah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">           k. Tidak mengutamakan pejalan kaki (psl 284 jo 106 ay 2)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">           l. Lainnya</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">     2). Alam</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">     3). Kelaikan Kendaraan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-ktyi">     4).  Jalan  (kondisi jalan)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">     5).  Prasarana Jalan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">             a) Rambu</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">             b) Marka</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">             c) APIL</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">             d) Perlintasan KA tanpa palang pintu</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-o5n3">Jumlah                                         ≥  (9.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3">21</td>
            <td class="tg-o5n3">WAKTU KEJADIAN KECELAKAAN LALU LINTAS</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. 00.00 - 03.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. 03.00 - 06.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. 06.00- 09.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. 09.00 - 12.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. 12.00 - 15.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. 15.00 - 18.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">g. 18.00 - 21.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">h. 21.00 - 24.00</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-o5n3">Jumlah        =  (9.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Perkara</td>
        </tr>
        <tr>
            <td class="tg-o5n3">22</td>
            <td class="tg-o5n3">KECELAKAAN LALU LINTAS MENONJOL</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">23</td>
            <td class="tg-o5n3">KECELAKAAN LALU LINTAS TUNGGAL   / OUT OF CONTROL</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Jumlah Kejadian        =  (14.a)</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-661g"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">24</td>
            <td class="tg-o5n3">TABRAK PEJALAN KAKI =  (14.f)</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">25</td>
            <td class="tg-o5n3">TABRAK LARI =  (14.g)</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">26</td>
            <td class="tg-o5n3">TABRAK SEPEDA MOTOR ( R2 )</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">27</td>
            <td class="tg-o5n3">TABRAK RANMOR RODA EMPAT ( R4 )</td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">28</td>
            <td class="tg-o5n3" colspan="2">TABRAK KENDARAAN TIDAK BERMOTOR (Sepeda,Becak dayung, Delman, dokar dll)             ≥ (13.f)</td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
            <td class="tg-4bam"></td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">b. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">c. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">e. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">29</td>
            <td class="tg-o5n3">KECELAKAAN DI PERLINTASAN KA</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7"></td>
        </tr>
        <tr>
            <td class="tg-o5n3"></td>
            <td class="tg-kcps">a. Jumlah Kejadian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">b. Berpalang Pintu</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">c. Tidak Berpalang Pintu</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">d. Korban Luka Ringan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">e. Korban Luka Berat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-ktyi"></td>
            <td class="tg-kcps">f. Korban Meninggal Dunia</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Orang</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">g. Materiil</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Rp</td>
        </tr>
        <tr>
            <td class="tg-o5n3">30</td>
            <td class="tg-o5n3">KECELAKAAN TRANSPORTASI</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">a. Kecelakaan Kereta Api</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">b. Kecelakaan Laut / Perairan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">c. Kecelakaan Udara</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-kcps">Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Perkara</td>
        </tr>
        <tr>
            <td class="tg-2g1l">III</td>
            <td class="tg-o5n3">DATA TERKAIT MASALAH DIKMAS LALU LINTAS</td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-o5n3">31</td>
            <td class="tg-dgl5">DIKMAS LANTAS</td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-dgl5">a. Penluh</td>
            <td class="tg-9hzb">0</td>
            <td class="tg-7yig">                 65 </td>
            <td class="tg-9hzb">0</td>
            <td class="tg-7yig">                 65 </td>
            <td class="tg-9hzb">0</td>
            <td class="tg-7yig">                 65 </td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">1). Melalui Media Cetak</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">2). Melalui Media Elektronik</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">191</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">191</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">191</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">3). Media Sosial</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">244</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">244</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">244</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">4). Tempat Keramaian</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">5). Tempat Istirahat</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">6). Tempat Rawan Laka Langgar</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi"> Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">435</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">435</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">435</td>
            <td class="tg-n1r7">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-dgl5">b. Penyebaran/ Pemasangan</td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">1). Spanduk</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">214</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">214</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">214</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">2). Leaflet</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1019</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1019</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1019</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">3). Sticker</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">563</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">563</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">563</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">4). Billboard</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">4</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">4</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">4</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi"> Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1800</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1800</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1800</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-dgl5">c. Program Nasional Keamanan Lalu Lintas</td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">1). Polisi Sahabat Anak</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">2). Cara Aman Sekolah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">3). Patroli Keamanan Sekolah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">4). Pramuka Saka Bhayangkara Krida Lalu Lintas</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-dgl5">Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-dgl5">d. Program Nasional Keselamatan Lalu Lintas</td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">1). Police Goes To Campus</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">2). Safety Riding dan Driving</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-661g"></td>
            <td class="tg-kcps">3). Forum Lalu Lintas dan Angkutan Jalan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">4). Kampanye Keselamatan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">5). Sekolah Mengemudi</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">6). Taman Lalu Lintas</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-ktyi">7). Global Road Safety Partnership Action</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-kcps"></td>
            <td class="tg-dgl5">Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">0</td>
            <td class="tg-n1r7">Kali</td>
        </tr>
        <tr>
            <td class="tg-n1r7">IV</td>
            <td class="tg-dgl5">DATA GIAT KEPOLISIAN</td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
        </tr>
        <tr>
            <td class="tg-8rcp">32</td>
            <td class="tg-dgl5">GIAT LANTAS</td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-9hzb"></td>
            <td class="tg-4bam"></td>
            <td class="tg-4bam"></td>
        </tr>
        <tr>
            <td class="tg-8rcp"></td>
            <td class="tg-ktyi">a. Pengaturan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1897</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1897</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1897</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-8rcp"></td>
            <td class="tg-ktyi">b. Penjagaan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1295</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1295</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">1295</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-8rcp"></td>
            <td class="tg-ktyi">c. Pengawalan</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">35</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">35</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">35</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-8rcp"></td>
            <td class="tg-ktyi">d. Patroli</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">908</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">908</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">908</td>
            <td class="tg-4bam">Kali</td>
        </tr>
        <tr>
            <td class="tg-8rcp"></td>
            <td class="tg-dgl5">Jumlah</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">4135</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">4135</td>
            <td class="tg-4bam">0</td>
            <td class="tg-4bam">4135</td>
            <td class="tg-n1r7">Kali</td>
        </tr>
    </tbody>
</table>
@endsection