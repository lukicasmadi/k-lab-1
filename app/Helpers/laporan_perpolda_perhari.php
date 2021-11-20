<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (! function_exists('lapoanPerpoldaPerhari')) {
    function lapoanPerpoldaPerhari($data, $rencanaOperasi, $dailyRekap=null) {
        $arraylabel = [
            'C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL'
        ];

        $now = now()->format("Y-m-d");

        $filename = "LAPORAN-PERPOLPA-PERHARI";

        $excelPath = public_path('template/excel');
        $excelTemplate = $excelPath."/laporan_perpolda_perhari.xlsx";
        $spreadsheet = IOFactory::load($excelTemplate);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');

        $sheet = $spreadsheet->getActiveSheet();

        foreach($data as $key=>$value) {
            $poldaName  = $value->polda_name;
            $poldaId    = $value->polda_id;

            $sheet->setCellValue($arraylabel[$key].'12', applyZero(optional($value->today)->pelanggaran_lalu_lintas_tilang));
            $sheet->setCellValue($arraylabel[$key].'13', applyZero(optional($value->today)->pelanggaran_lalu_lintas_teguran));

            $sheet->setCellValue($arraylabel[$key].'12', applyZero(optional($value->today)->pelanggaran_lalu_lintas_tilang));
            $sheet->setCellValue($arraylabel[$key].'13', applyZero(optional($value->today)->pelanggaran_lalu_lintas_teguran));
        }

        if(is_null($dailyRekap)) {
            $sheet->setCellValue('AI415', indonesiaDate(date("Y-m-d")));
            $sheet->setCellValue('AI416', $rencanaOperasi->name." - ".date("Y"));
        } else {
            $sheet->setCellValue('AI415', $dailyRekap->kota.", ".indonesiaDate(date("Y-m-d")));
            $sheet->setCellValue('AI416', $dailyRekap->jabatan." ".$rencanaOperasi->name." - ".date("Y"));
            $sheet->setCellValue('AI420', $dailyRekap->atasan);
            $sheet->setCellValue('AI421', $dailyRekap->pangkat_nrp);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}