<?php

use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonPeriod;
use App\Models\CountDown;
use App\Models\DailyNotice;
use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use App\Models\PoldaSubmited;
use App\Models\RencanaOperasi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\SortablePoldaReport;
use Illuminate\Database\Eloquent\Builder;

if (! function_exists('moveItemToLast')) {
    function moveItemToLast($collection, $fieldName, $item) {

        $collectionData = $collection->reject(function($value) use ($fieldName, $item) {
            return $value[$fieldName] == $item;
        })
        ->merge($collection->filter(function($value) use ($fieldName, $item) {
                return $value[$fieldName] == $item;
            })
        );

        return $collectionData;
    }
}

if (! function_exists('moveItemToFirst')) {
    function moveItemToFirst($collection, $key, $value) {
        $item_to_first = null;

        // Search element to top
        foreach ($collection as $item) {
            if ($item->$key == $value){
                $item_to_first = $item;
                break;
            }
        }
        // If element not found, return original collection
        if (!$item_to_first){
            return $collection;
        }


        // Element to top, first remove of collection, then insert to top
        return $collection->reject(function ($value) use ($item_to_first){
            return $value == $item_to_first;
        })->prepend($item_to_first);
    }
}

if (! function_exists('datePassed')) {
    function datePassed($targetDate) {
        if(Carbon::now()->lessThan($targetDate)) {
            return "belum_lewat";
        } else {
            return "sudah_lewat";
        }
    }
}

if (! function_exists('avoidNull')) {
    function avoidNull($value) {
        return (is_null($value)) ? 0 : $value;
    }
}

if (! function_exists('applyZero')) {
    function applyZero($value) {
        return (empty($value) || is_null($value)) ? 0 : $value;
    }
}

if (! function_exists('nowYear')) {
    function nowYear() {
        return now()->format("Y");
    }
}

if (! function_exists('nowYearMinusOne')) {
    function nowYearMinusOne() {
        return now()->format("Y") - 1;
    }
}

if (! function_exists('nowToday')) {
    function nowToday() {
        return now()->format("Y-m-d");
    }
}

if (! function_exists('nowTodayIndonesia')) {
    function nowTodayIndonesia() {
        return now()->format("d-m-Y");
    }
}

if (! function_exists('extractDateRange')) {
    function extractDateRange($start, $end) {
        return CarbonPeriod::create($start, $end);
    }
}

if (! function_exists('limitText')) {
    function limitText($string, $textLenght) {
        return Str::limit($string, $textLenght);
    }
}

if (! function_exists('slugTitle')) {
    function slugTitle($string) {
        return Str::slug($string, '-');
    }
}

if (! function_exists('upperCase')) {
    function upperCase($string) {
        return Str::upper($string);
    }
}

if (! function_exists('humanDateRead')) {
    function humanDateRead($date) {
        return Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
    }
}

if (! function_exists('operationShowStartEnd')) {
    function operationShowStartEnd() {
        $now = now()->format('Y-m-d');

        if(empty(session('filter_operation'))) {
            $checkOperasi = RencanaOperasi::where("start_date", "<=", $now)->where("end_date", ">=", $now)->first();
        } else {
            $checkOperasi = RencanaOperasi::where("slug_name", session('filter_operation'))->first();
        }

        if(empty($checkOperasi)) {
            return null;
        } else {
            return [
                indonesiaShortDayAndDate($checkOperasi->start_date),
                indonesiaShortDayAndDate($checkOperasi->end_date)
            ];
        }
    }
}

if (! function_exists('dayNameIndonesia')) {
    function dayNameIndonesia($timestamp) {
        return Carbon::parse($timestamp)->isoFormat('dddd');
    }
}

if (! function_exists('indonesianDate')) {
    function indonesianDate($timestamp) {
        return Carbon::parse($timestamp)->format('d M Y');
    }
}

if (! function_exists('indonesianFullDayAndDate')) {
    function indonesianFullDayAndDate($timestamp) {
        // return Carbon::parse($timestamp)->isoFormat('dddd').", ".Carbon::parse($timestamp)->format('d M Y');
        return Carbon::parse($timestamp)->isoFormat('dddd, D MMMM Y')." ".Carbon::parse($timestamp)->format('g:i:s A');
    }
}

if (! function_exists('indonesiaDayAndDate')) {
    function indonesiaDayAndDate($timestamp) {
        return Carbon::parse($timestamp)->isoFormat('dddd, D MMMM Y'); //Sabtu, 30 Oktober 2021
    }
}

if (! function_exists('indonesiaDate')) {
    function indonesiaDate($timestamp) {
        return Carbon::parse($timestamp)->isoFormat('D MMMM Y'); //30 Oktober 2021
    }
}

if (! function_exists('indonesiaShortDayAndDate')) {
    function indonesiaShortDayAndDate($timestamp) {
        return Carbon::parse($timestamp)->isoFormat('D MMM Y');
    }
}

if (! function_exists('indonesianDateTime')) {
    function indonesianDateTime($timestamp) {
        return Carbon::parse($timestamp)->format('d M Y h:i:s A');
    }
}

if (! function_exists('dateOnly')) {
    function dateOnly($timestamp) {
        return Carbon::parse($timestamp)->format('Y-m-d');
    }
}

if (! function_exists('yearOnly')) {
    function yearOnly($timestamp) {
        return Carbon::parse($timestamp)->format('Y');
    }
}

if (! function_exists('yearMinusOneOnly')) {
    function yearMinusOneOnly($timestamp) {
        $out = Carbon::parse($timestamp)->format('Y');
        return $out - 1;
    }
}


if (! function_exists('monthOnly')) {
    function monthOnly($timestamp) {
        return Carbon::parse($timestamp)->format('m');
    }
}

if (! function_exists('dayOnly')) {
    function dayOnly($timestamp) {
        return Carbon::parse($timestamp)->format('d');
    }
}

if (! function_exists('timeOnly')) {
    function timeOnly($timestamp) {
        return Carbon::parse($timestamp)->format('h:i:s A');
    }
}

if (! function_exists('incrementDays')) {
    function incrementDays($timestamp, $days) {
        return Carbon::parse($timestamp)->addDays($days);
    }
}

if (! function_exists('indonesianStandart')) {
    function indonesianStandart($timestamp) {
        return Carbon::parse($timestamp)->format('d-m-Y');
    }
}

if (! function_exists('countDays')) {
    function countDays($start, $end) {
        return Carbon::parse($end)->diffInDays($start) + 1;
    }
}

if (! function_exists('toStrip')) {
    function toStrip($string) {
        return ($string == '' || is_null($string) || empty($string)) ? '-' : $string;
    }
}

if (! function_exists('genUuid')) {
    function genUuid() {
        return Str::uuid();
    }
}

if (! function_exists('userGetRandom')) {
    function userGetRandom() {
        return User::all()->random()->id;
    }
}

if (! function_exists('myUserId')) {
    function myUserId() {
        if(empty(auth()->user())) {
            return null;
        } else {
            return auth()->user()->id;
        }
    }
}

if (! function_exists('myName')) {
    function myName() {
        return auth()->user()->name;
    }
}

if (! function_exists('authUser')) {
    function authUser() {
        return auth()->user();
    }
}

if (! function_exists('operationPlans')) {
    function operationPlans() {
        $now = now()->format('Y-m-d');
        $checkOperasi = RencanaOperasi::where("start_date", "<=", $now)->where("end_date", ">=", $now)->first();
        if(empty($checkOperasi)) {
            return null;
        } else {
            return $checkOperasi;
        }
    }
}

if (! function_exists('isMonitoring')) {
    function isMonitoring() {
        $user = auth()->user();
        if($user->hasRole('access_dashboard')) {
            return true;
        }
        return false;
    }
}

if (! function_exists('isAdmin')) {
    function isAdmin() {
        $user = auth()->user();
        if($user->hasRole('administrator')) {
            return true;
        }
        return false;
    }
}

if (! function_exists('isPusat')) {
    function isPusat() {
        $user = auth()->user();
        if($user->hasRole('access_pusat')) {
            return true;
        }
        return false;
    }
}

if (! function_exists('isPolda')) {
    function isPolda() {
        $user = auth()->user();
        if($user->hasRole('access_daerah')) {
            return true;
        }
        return false;
    }
}

if (! function_exists('checkUserHasAssign')) {
    function checkUserHasAssign() {
        if(empty(auth()->user()->polda()->first())) {
            return "belum";
        } else {
            return "sudah";
        }
    }
}

if (! function_exists('poldaId')) {
    function poldaId() {
        return auth()->user()->polda()->first()->polda_id;
    }
}

if (! function_exists('poldaName')) {
    function poldaName() {
        return auth()->user()->polda()->first()->polda->name;
    }
}

if (! function_exists('poldaShortName')) {
    function poldaShortName() {
        return auth()->user()->polda()->first()->polda->short_name;
    }
}

if (! function_exists('poldaImage')) {
    function poldaImage() {
        return UserHasPolda::with('polda')->where("polda_id", poldaId())->first();
    }
}

if (! function_exists('poldaAlreadyInputToday')) {
    function poldaAlreadyInputToday() {
        if(isPolda()) {
            $now = now()->format('Y-m-d');
            $submited = PoldaSubmited::where("submited_date", $now)->where('polda_id', poldaId())->first();
            if(empty($submited)) {
                return false;
            } else {
                return true;
            }
        }
    }
}

if (! function_exists('poldaAlreadyInputTodayById')) {
    function poldaAlreadyInputTodayById($polda_id) {
        $now = now()->format('Y-m-d');
        $submited = PoldaSubmited::where("submited_date", $now)->where('polda_id', $polda_id)->first();
        if(empty($submited)) {
            return false;
        } else {
            return true;
        }
    }
}

if (! function_exists('hariIni')) {
    function hariIni() {
        return now()->format("d-m-Y");
    }
}

if (! function_exists('calculation')) {
    function calculation($arrayData) {
        $array = array(
            'first' => '',
            'second' => ''
         );

         $array2 = array_map(function($value) {
            return $value === NULL ? 0 : $value;
         }, $arrayData);

        return array_sum($array2);
    }
}

if (! function_exists('removeUnusedString')) {
    function removeUnusedString($data) {
        $removeComma = str_replace(",", "", $data);
        $removeDot = str_replace(".", "", $removeComma);
        $removeSpace = str_replace(" ", "", $removeDot);

        return $removeSpace;
    }
}

if (! function_exists('percentageValue')) {
    function percentageValue($tahunKedua, $tahunPertama) {

        if(is_null($tahunKedua)) {
            return 0;
        }

        if(is_null($tahunPertama)) {
            return 0;
        }

        if(($tahunKedua < $tahunPertama) && $tahunKedua == 0) {
            return 0;
        }

        if($tahunKedua == 0 && $tahunPertama == 0) {
            return 0;
        } else {
            if($tahunPertama == 0 && $tahunKedua != 0) {
                return "-";
            } else {
                $output1 = $tahunKedua - $tahunPertama;
                $output2 = $output1 / $tahunPertama;
                $output3 = $output2 * 100;
                $output4 = round($output3, 2);

                return $output4;
            }
        }
    }
}

if (! function_exists('percentageStatus')) {
    function percentageStatus($tahunKedua, $tahunPertama) {

        if($tahunKedua > $tahunPertama) {
            $tanda = "NAIK";
        } else if($tahunKedua < $tahunPertama) {
            $tanda = "TURUN";
        } else if($tahunKedua == $tahunPertama) {
            $tanda = "SAMA";
        } else {
            $tanda = "";
        }

        return $tanda;
    }
}

if (! function_exists('year')) {
    function year() {
        return date("Y");
    }
}

if (! function_exists('yearMinus')) {
    function yearMinus() {
        return date("Y") - 1;
    }
}

if (! function_exists('poldaFlag')) {
    function poldaFlag($poldaName) {

        if($poldaName == 'PAPUA') {
            $alpha = ['C', 'D'];
        }

        else if($poldaName == 'PAPBAR') {
            $alpha = ['E', 'F'];
        }

        else if($poldaName == 'MALUT') {
            $alpha = ['G', 'H'];
        }

        else if($poldaName == 'MALUKU') {
            $alpha = ['I', 'J'];
        }

        else if($poldaName == 'SULBAR') {
            $alpha = ['K', 'L'];
        }

        else if($poldaName == 'SULSEL') {
            $alpha = ['M', 'N'];
        }

        else if($poldaName == 'SULTRA') {
            $alpha = ['O', 'P'];
        }

        else if($poldaName == 'SULTENG') {
            $alpha = ['Q', 'R'];
        }

        else if($poldaName == 'GORONTALO') {
            $alpha = ['S', 'T'];
        }

        else if($poldaName == 'SULUT') {
            $alpha = ['U', 'V'];
        }

        else if($poldaName == 'KALSEL') {
            $alpha = ['W', 'X'];
        }

        else if($poldaName == 'KALTARA') {
            $alpha = ['Y', 'Z'];
        }

        else if($poldaName == 'KALTIM') {
            $alpha = ['AA', 'AB'];
        }

        else if($poldaName == 'KALTENG') {
            $alpha = ['AC', 'AD'];
        }

        else if($poldaName == 'KALBAR') {
            $alpha = ['AE', 'AF'];
        }

        else if($poldaName == 'NTT') {
            $alpha = ['AG', 'AH'];
        }

        else if($poldaName == 'NTB') {
            $alpha = ['AI', 'AJ'];
        }

        else if($poldaName == 'BALI') {
            $alpha = ['AK', 'AL'];
        }

        else if($poldaName == 'JATIM') {
            $alpha = ['AM', 'AN'];
        }

        else if($poldaName == 'D.I.Y') {
            $alpha = ['AO', 'AP'];
        }

        else if($poldaName == 'JATENG') {
            $alpha = ['AQ', 'AR'];
        }

        else if($poldaName == 'BANTEN') {
            $alpha = ['AS', 'AT'];
        }

        else if($poldaName == 'JABAR') {
            $alpha = ['AU', 'AV'];
        }

        else if($poldaName == 'METRO') {
            $alpha = ['AW', 'AX'];
        }

        else if($poldaName == 'LAMPUNG') {
            $alpha = ['AY', 'AZ'];
        }

        else if($poldaName == 'BENGKULU') {
            $alpha = ['BA', 'BB'];
        }

        else if($poldaName == 'SUMSEL') {
            $alpha = ['BC', 'BD'];
        }

        else if($poldaName == 'BABEL') {
            $alpha = ['BE', 'BF'];
        }

        else if($poldaName == 'KEPRI') {
            $alpha = ['BG', 'BH'];
        }

        else if($poldaName == 'RIAU') {
            $alpha = ['BI', 'BJ'];
        }

        else if($poldaName == 'JAMBI') {
            $alpha = ['BK', 'BL'];
        }

        else if($poldaName == 'SUMBAR') {
            $alpha = ['BM', 'BN'];
        }

        else if($poldaName == 'SUMUT') {
            $alpha = ['BO', 'BP'];
        }

        else if($poldaName == 'ACEH') {
            $alpha = ['BQ', 'BR'];
        }

        return $alpha;
    }
}

if (! function_exists('prevDailyInputWithSum')) {
    function prevDailyInputWithSum($operationId, $prev_year, $start_date, $end_date) {
        return SortablePoldaReport::withSum(['prev:pelanggaran_lalu_lintas_tilang_p,pelanggaran_lalu_lintas_teguran_p,pelanggaran_sepeda_motor_kecepatan_p,pelanggaran_sepeda_motor_helm_p,pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p,pelanggaran_sepeda_motor_marka_menerus_menyalip_p,pelanggaran_sepeda_motor_melawan_arus_p,pelanggaran_sepeda_motor_melanggar_lampu_lalin_p,pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p,pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p,pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p,pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p,pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p,pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p,pelanggaran_sepeda_motor_melanggar_marka_berhenti_p,pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p,pelanggaran_sepeda_motor_surat_surat_p,pelanggaran_sepeda_motor_kelengkapan_kendaraan_p,pelanggaran_sepeda_motor_lain_lain_p,pelanggaran_mobil_kecepatan_p,pelanggaran_mobil_safety_belt_p,pelanggaran_mobil_muatan_overload_p,pelanggaran_mobil_marka_menerus_menyalip_p,pelanggaran_mobil_melawan_arus_p,pelanggaran_mobil_melanggar_lampu_lalin_p,pelanggaran_mobil_mengemudi_tidak_wajar_p,pelanggaran_mobil_syarat_teknis_layak_jalan_p,pelanggaran_mobil_tidak_nyala_lampu_malam_p,pelanggaran_mobil_berbelok_tanpa_isyarat_p,pelanggaran_mobil_berbalapan_di_jalan_raya_p,pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p,pelanggaran_mobil_melanggar_marka_berhenti_p,pelanggaran_mobil_tidak_patuh_perintah_petugas_p,pelanggaran_mobil_surat_surat_p,pelanggaran_mobil_kelengkapan_kendaraan_p,pelanggaran_mobil_lain_lain_p,pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p,barang_bukti_yg_disita_sim_p,barang_bukti_yg_disita_stnk_p,barang_bukti_yg_disita_kendaraan_p,kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p,kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p,kendaraan_yang_terlibat_pelanggaran_mobil_bus_p,kendaraan_yang_terlibat_pelanggaran_mobil_barang_p,kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p,profesi_pelaku_pelanggaran_pns_p,profesi_pelaku_pelanggaran_karyawan_swasta_p,profesi_pelaku_pelanggaran_pelajar_mahasiswa_p,profesi_pelaku_pelanggaran_pengemudi_supir_p,profesi_pelaku_pelanggaran_tni_p,profesi_pelaku_pelanggaran_polri_p,profesi_pelaku_pelanggaran_lain_lain_p,usia_pelaku_pelanggaran_kurang_dari_15_tahun_p,usia_pelaku_pelanggaran_16_20_tahun_p,usia_pelaku_pelanggaran_21_25_tahun_p,usia_pelaku_pelanggaran_26_30_tahun_p,usia_pelaku_pelanggaran_31_35_tahun_p,usia_pelaku_pelanggaran_36_40_tahun_p,usia_pelaku_pelanggaran_41_45_tahun_p,usia_pelaku_pelanggaran_46_50_tahun_p,usia_pelaku_pelanggaran_51_55_tahun_p,usia_pelaku_pelanggaran_56_60_tahun_p,usia_pelaku_pelanggaran_diatas_60_tahun_p,sim_pelaku_pelanggaran_sim_a_p,sim_pelaku_pelanggaran_sim_a_umum_p,sim_pelaku_pelanggaran_sim_b1_p,sim_pelaku_pelanggaran_sim_b1_umum_p,sim_pelaku_pelanggaran_sim_b2_p,sim_pelaku_pelanggaran_sim_b2_umum_p,sim_pelaku_pelanggaran_sim_c_p,sim_pelaku_pelanggaran_sim_d_p,sim_pelaku_pelanggaran_sim_internasional_p,sim_pelaku_pelanggaran_tanpa_sim_p,lokasi_pelanggaran_pemukiman_p,lokasi_pelanggaran_perbelanjaan_p,lokasi_pelanggaran_perkantoran_p,lokasi_pelanggaran_wisata_p,lokasi_pelanggaran_industri_p,lokasi_pelanggaran_status_jalan_nasional_p,lokasi_pelanggaran_status_jalan_propinsi_p,lokasi_pelanggaran_status_jalan_kab_kota_p,lokasi_pelanggaran_status_jalan_desa_lingkungan_p,lokasi_pelanggaran_fungsi_jalan_arteri_p,lokasi_pelanggaran_fungsi_jalan_kolektor_p,lokasi_pelanggaran_fungsi_jalan_lokal_p,lokasi_pelanggaran_fungsi_jalan_lingkungan_p,kecelakaan_lalin_jumlah_kejadian_p,kecelakaan_lalin_jumlah_korban_meninggal_p,kecelakaan_lalin_jumlah_korban_luka_berat_p,kecelakaan_lalin_jumlah_korban_luka_ringan_p,kecelakaan_lalin_jumlah_kerugian_materiil_p,kecelakaan_barang_bukti_yg_disita_sim_p,kecelakaan_barang_bukti_yg_disita_stnk_p,kecelakaan_barang_bukti_yg_disita_kendaraan_p,profesi_korban_kecelakaan_lalin_pns_p,profesi_korban_kecelakaan_lalin_karwayan_swasta_p,profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p,profesi_korban_kecelakaan_lalin_pengemudi_p,profesi_korban_kecelakaan_lalin_tni_p,profesi_korban_kecelakaan_lalin_polri_p,profesi_korban_kecelakaan_lalin_lain_lain_p,usia_korban_kecelakaan_kurang_15_p,usia_korban_kecelakaan_16_20_p,usia_korban_kecelakaan_21_25_p,usia_korban_kecelakaan_26_30_p,usia_korban_kecelakaan_31_35_p,usia_korban_kecelakaan_36_40_p,usia_korban_kecelakaan_41_45_p,usia_korban_kecelakaan_45_50_p,usia_korban_kecelakaan_51_55_p,usia_korban_kecelakaan_56_60_p,usia_korban_kecelakaan_diatas_60_p,sim_korban_kecelakaan_sim_a_p,sim_korban_kecelakaan_sim_a_umum_p,sim_korban_kecelakaan_sim_b1_p,sim_korban_kecelakaan_sim_b1_umum_p,sim_korban_kecelakaan_sim_b2_p,sim_korban_kecelakaan_sim_b2_umum_p,sim_korban_kecelakaan_sim_c_p,sim_korban_kecelakaan_sim_d_p,sim_korban_kecelakaan_sim_internasional_p,sim_korban_kecelakaan_tanpa_sim_p,kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p,kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p,kendaraan_yg_terlibat_kecelakaan_mobil_bus_p,kendaraan_yg_terlibat_kecelakaan_mobil_barang_p,kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p,kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p,jenis_kecelakaan_tunggal_ooc_p,jenis_kecelakaan_depan_depan_p,jenis_kecelakaan_depan_belakang_p,jenis_kecelakaan_depan_samping_p,jenis_kecelakaan_beruntun_p,jenis_kecelakaan_pejalan_kaki_p,jenis_kecelakaan_tabrak_lari_p,jenis_kecelakaan_tabrak_hewan_p,jenis_kecelakaan_samping_samping_p,jenis_kecelakaan_lainnya_p,profesi_pelaku_kecelakaan_lalin_pns_p,profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p,profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p,profesi_pelaku_kecelakaan_lalin_pengemudi_p,profesi_pelaku_kecelakaan_lalin_tni_p,profesi_pelaku_kecelakaan_lalin_polri_p,profesi_pelaku_kecelakaan_lalin_lain_lain_p,usia_pelaku_kecelakaan_kurang_dari_15_tahun_p,usia_pelaku_kecelakaan_16_20_tahun_p,usia_pelaku_kecelakaan_21_25_tahun_p,usia_pelaku_kecelakaan_26_30_tahun_p,usia_pelaku_kecelakaan_31_35_tahun_p,usia_pelaku_kecelakaan_36_40_tahun_p,usia_pelaku_kecelakaan_41_45_tahun_p,usia_pelaku_kecelakaan_46_50_tahun_p,usia_pelaku_kecelakaan_51_55_tahun_p,usia_pelaku_kecelakaan_56_60_tahun_p,usia_pelaku_kecelakaan_diatas_60_tahun_p,sim_pelaku_kecelakaan_sim_a_p,sim_pelaku_kecelakaan_sim_a_umum_p,sim_pelaku_kecelakaan_sim_b1_p,sim_pelaku_kecelakaan_sim_b1_umum_p,sim_pelaku_kecelakaan_sim_b2_p,sim_pelaku_kecelakaan_sim_b2_umum_p,sim_pelaku_kecelakaan_sim_c_p,sim_pelaku_kecelakaan_sim_d_p,sim_pelaku_kecelakaan_sim_internasional_p,sim_pelaku_kecelakaan_tanpa_sim_p,lokasi_kecelakaan_lalin_pemukiman_p,lokasi_kecelakaan_lalin_perbelanjaan_p,lokasi_kecelakaan_lalin_perkantoran_p,lokasi_kecelakaan_lalin_wisata_p,lokasi_kecelakaan_lalin_industri_p,lokasi_kecelakaan_lalin_lain_lain_p,lokasi_kecelakaan_status_jalan_nasional_p,lokasi_kecelakaan_status_jalan_propinsi_p,lokasi_kecelakaan_status_jalan_kab_kota_p,lokasi_kecelakaan_status_jalan_desa_lingkungan_p,lokasi_kecelakaan_fungsi_jalan_arteri_p,lokasi_kecelakaan_fungsi_jalan_kolektor_p,lokasi_kecelakaan_fungsi_jalan_lokal_p,lokasi_kecelakaan_fungsi_jalan_lingkungan_p,faktor_penyebab_kecelakaan_manusia_p,faktor_penyebab_kecelakaan_ngantuk_lelah_p,faktor_penyebab_kecelakaan_mabuk_obat_p,faktor_penyebab_kecelakaan_sakit_p,faktor_penyebab_kecelakaan_handphone_elektronik_p,faktor_penyebab_kecelakaan_menerobos_lampu_merah_p,faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p,faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p,faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p,faktor_penyebab_kecelakaan_berpindah_jalur_p,faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p,faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p,faktor_penyebab_kecelakaan_lainnya_p,faktor_penyebab_kecelakaan_alam_p,faktor_penyebab_kecelakaan_kelaikan_kendaraan_p,faktor_penyebab_kecelakaan_kondisi_jalan_p,faktor_penyebab_kecelakaan_prasarana_jalan_p,faktor_penyebab_kecelakaan_rambu_p,faktor_penyebab_kecelakaan_marka_p,faktor_penyebab_kecelakaan_apil_p,faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p,waktu_kejadian_kecelakaan_00_03_p,waktu_kejadian_kecelakaan_03_06_p,waktu_kejadian_kecelakaan_06_09_p,waktu_kejadian_kecelakaan_09_12_p,waktu_kejadian_kecelakaan_12_15_p,waktu_kejadian_kecelakaan_15_18_p,waktu_kejadian_kecelakaan_18_21_p,waktu_kejadian_kecelakaan_21_24_p,kecelakaan_lalin_menonjol_jumlah_kejadian_p,kecelakaan_lalin_menonjol_korban_meninggal_p,kecelakaan_lalin_menonjol_korban_luka_berat_p,kecelakaan_lalin_menonjol_korban_luka_ringan_p,kecelakaan_lalin_menonjol_materiil_p,kecelakaan_lalin_tunggal_jumlah_kejadian_p,kecelakaan_lalin_tunggal_korban_meninggal_p,kecelakaan_lalin_tunggal_korban_luka_berat_p,kecelakaan_lalin_tunggal_korban_luka_ringan_p,kecelakaan_lalin_tunggal_materiil_p,kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p,kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p,kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p,kecelakaan_lalin_tabrak_lari_korban_meninggal_p,kecelakaan_lalin_tabrak_lari_korban_luka_berat_p,kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p,kecelakaan_lalin_tabrak_lari_materiil_p,kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p,kecelakaan_lalin_tabrak_sepeda_motor_materiil_p,kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p,kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p,kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p,kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p,kecelakaan_lalin_tabrak_roda_empat_materiil_p,kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p,kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p,kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p,kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p,kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p,kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p,kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p,kecelakaan_lalin_perlintasan_ka_korban_meninggal_p,kecelakaan_lalin_perlintasan_ka_materiil_p,kecelakaan_transportasi_kereta_api_p,kecelakaan_transportasi_laut_perairan_p,kecelakaan_transportasi_udara_p,penlu_melalui_media_cetak_p,penlu_melalui_media_elektronik_p,penlu_melalui_media_sosial_p,penlu_melalui_tempat_keramaian_p,penlu_melalui_tempat_istirahat_p,penlu_melalui_daerah_rawan_laka_dan_langgar_p,penyebaran_pemasangan_spanduk_p,penyebaran_pemasangan_leaflet_p,penyebaran_pemasangan_sticker_p,penyebaran_pemasangan_bilboard_p,polisi_sahabat_anak_p,cara_aman_sekolah_p,patroli_keamanan_sekolah_p,pramuka_bhayangkara_krida_lalu_lintas_p,police_goes_to_campus_p,safety_riding_driving_p,forum_lalu_lintas_angkutan_umum_p,kampanye_keselamatan_p,sekolah_mengemudi_p,taman_lalu_lintas_p,global_road_safety_partnership_action_p,giat_lantas_pengaturan_p,giat_lantas_penjagaan_p,giat_lantas_pengawalan_p,giat_lantas_patroli_p,arus_mudik_jumlah_bus_keberangkatan_p,arus_mudik_jumlah_penumpang_keberangkatan_p,arus_mudik_jumlah_bus_kedatangan_p,arus_mudik_jumlah_penumpang_kedatangan_p,arus_mudik_total_terminal_p,arus_mudik_total_bus_keberangkatan_p,arus_mudik_penumpang_keberangkatan_p,arus_mudik_total_bus_kedatangan_p,arus_mudik_penumpang_kedatangan_p,arus_mudik_kereta_api_total_stasiun_p,arus_mudik_kereta_api_total_penumpang_keberangkatan_p,arus_mudik_kereta_api_total_penumpang_kedatangan_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p,arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p,arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p,arus_mudik_total_pelabuhan_p,arus_mudik_pelabuhan_kendaraan_keberangkatan_p,arus_mudik_pelabuhan_kendaraan_kedatangan_p,arus_mudik_pelabuhan_total_penumpang_keberangkatan_p,arus_mudik_pelabuhan_total_penumpang_kedatangan_p,arus_mudik_bandara_jumlah_penumpang_keberangkatan_p,arus_mudik_bandara_jumlah_penumpang_kedatangan_p,arus_mudik_total_bandara_p,arus_mudik_bandara_total_penumpang_keberangkatan_p,arus_mudik_bandara_total_penumpang_kedatangan_p,prokes_covid_teguran_gar_prokes_p,prokes_covid_pembagian_masker_p,prokes_covid_sosialisasi_tentang_prokes_p,prokes_covid_giat_baksos_p,penyekatan_motor_p,penyekatan_mobil_penumpang_p,penyekatan_mobil_bus_p,penyekatan_mobil_barang_p,penyekatan_kendaraan_khusus_p,rapid_test_antigen_positif_p,rapid_test_antigen_negatif_p' => function (Builder $query) use ($operationId, $prev_year, $start_date, $end_date) {
            $query->where('rencana_operasi_id', $operationId)
            ->where('year', $prev_year)
            ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date]);
        }])->get();
    }
}

if (! function_exists('currentDailyInputWithSum')) {
    function currentDailyInputWithSum($operationId, $current_year, $start_date, $end_date) {
        return SortablePoldaReport::withSum(['current:pelanggaran_lalu_lintas_tilang,pelanggaran_lalu_lintas_teguran,pelanggaran_sepeda_motor_kecepatan,pelanggaran_sepeda_motor_helm,pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,pelanggaran_sepeda_motor_marka_menerus_menyalip,pelanggaran_sepeda_motor_melawan_arus,pelanggaran_sepeda_motor_melanggar_lampu_lalin,pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,pelanggaran_sepeda_motor_melanggar_marka_berhenti,pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,pelanggaran_sepeda_motor_surat_surat,pelanggaran_sepeda_motor_kelengkapan_kendaraan,pelanggaran_sepeda_motor_lain_lain,pelanggaran_mobil_kecepatan,pelanggaran_mobil_safety_belt,pelanggaran_mobil_muatan_overload,pelanggaran_mobil_marka_menerus_menyalip,pelanggaran_mobil_melawan_arus,pelanggaran_mobil_melanggar_lampu_lalin,pelanggaran_mobil_mengemudi_tidak_wajar,pelanggaran_mobil_syarat_teknis_layak_jalan,pelanggaran_mobil_tidak_nyala_lampu_malam,pelanggaran_mobil_berbelok_tanpa_isyarat,pelanggaran_mobil_berbalapan_di_jalan_raya,pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,pelanggaran_mobil_melanggar_marka_berhenti,pelanggaran_mobil_tidak_patuh_perintah_petugas,pelanggaran_mobil_surat_surat,pelanggaran_mobil_kelengkapan_kendaraan,pelanggaran_mobil_lain_lain,pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,barang_bukti_yg_disita_sim,barang_bukti_yg_disita_stnk,barang_bukti_yg_disita_kendaraan,kendaraan_yang_terlibat_pelanggaran_sepeda_motor,kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,kendaraan_yang_terlibat_pelanggaran_mobil_bus,kendaraan_yang_terlibat_pelanggaran_mobil_barang,kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,profesi_pelaku_pelanggaran_pns,profesi_pelaku_pelanggaran_karyawan_swasta,profesi_pelaku_pelanggaran_pelajar_mahasiswa,profesi_pelaku_pelanggaran_pengemudi_supir,profesi_pelaku_pelanggaran_tni,profesi_pelaku_pelanggaran_polri,profesi_pelaku_pelanggaran_lain_lain,usia_pelaku_pelanggaran_kurang_dari_15_tahun,usia_pelaku_pelanggaran_16_20_tahun,usia_pelaku_pelanggaran_21_25_tahun,usia_pelaku_pelanggaran_26_30_tahun,usia_pelaku_pelanggaran_31_35_tahun,usia_pelaku_pelanggaran_36_40_tahun,usia_pelaku_pelanggaran_41_45_tahun,usia_pelaku_pelanggaran_46_50_tahun,usia_pelaku_pelanggaran_51_55_tahun,usia_pelaku_pelanggaran_56_60_tahun,usia_pelaku_pelanggaran_diatas_60_tahun,sim_pelaku_pelanggaran_sim_a,sim_pelaku_pelanggaran_sim_a_umum,sim_pelaku_pelanggaran_sim_b1,sim_pelaku_pelanggaran_sim_b1_umum,sim_pelaku_pelanggaran_sim_b2,sim_pelaku_pelanggaran_sim_b2_umum,sim_pelaku_pelanggaran_sim_c,sim_pelaku_pelanggaran_sim_d,sim_pelaku_pelanggaran_sim_internasional,sim_pelaku_pelanggaran_tanpa_sim,lokasi_pelanggaran_pemukiman,lokasi_pelanggaran_perbelanjaan,lokasi_pelanggaran_perkantoran,lokasi_pelanggaran_wisata,lokasi_pelanggaran_industri,lokasi_pelanggaran_status_jalan_nasional,lokasi_pelanggaran_status_jalan_propinsi,lokasi_pelanggaran_status_jalan_kab_kota,lokasi_pelanggaran_status_jalan_desa_lingkungan,lokasi_pelanggaran_fungsi_jalan_arteri,lokasi_pelanggaran_fungsi_jalan_kolektor,lokasi_pelanggaran_fungsi_jalan_lokal,lokasi_pelanggaran_fungsi_jalan_lingkungan,kecelakaan_lalin_jumlah_kejadian,kecelakaan_lalin_jumlah_korban_meninggal,kecelakaan_lalin_jumlah_korban_luka_berat,kecelakaan_lalin_jumlah_korban_luka_ringan,kecelakaan_lalin_jumlah_kerugian_materiil,kecelakaan_barang_bukti_yg_disita_sim,kecelakaan_barang_bukti_yg_disita_stnk,kecelakaan_barang_bukti_yg_disita_kendaraan,profesi_korban_kecelakaan_lalin_pns,profesi_korban_kecelakaan_lalin_karwayan_swasta,profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,profesi_korban_kecelakaan_lalin_pengemudi,profesi_korban_kecelakaan_lalin_tni,profesi_korban_kecelakaan_lalin_polri,profesi_korban_kecelakaan_lalin_lain_lain,usia_korban_kecelakaan_kurang_15,usia_korban_kecelakaan_16_20,usia_korban_kecelakaan_21_25,usia_korban_kecelakaan_26_30,usia_korban_kecelakaan_31_35,usia_korban_kecelakaan_36_40,usia_korban_kecelakaan_41_45,usia_korban_kecelakaan_45_50,usia_korban_kecelakaan_51_55,usia_korban_kecelakaan_56_60,usia_korban_kecelakaan_diatas_60,sim_korban_kecelakaan_sim_a,sim_korban_kecelakaan_sim_a_umum,sim_korban_kecelakaan_sim_b1,sim_korban_kecelakaan_sim_b1_umum,sim_korban_kecelakaan_sim_b2,sim_korban_kecelakaan_sim_b2_umum,sim_korban_kecelakaan_sim_c,sim_korban_kecelakaan_sim_d,sim_korban_kecelakaan_sim_internasional,sim_korban_kecelakaan_tanpa_sim,kendaraan_yg_terlibat_kecelakaan_sepeda_motor,kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,kendaraan_yg_terlibat_kecelakaan_mobil_bus,kendaraan_yg_terlibat_kecelakaan_mobil_barang,kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,jenis_kecelakaan_tunggal_ooc,jenis_kecelakaan_depan_depan,jenis_kecelakaan_depan_belakang,jenis_kecelakaan_depan_samping,jenis_kecelakaan_beruntun,jenis_kecelakaan_pejalan_kaki,jenis_kecelakaan_tabrak_lari,jenis_kecelakaan_tabrak_hewan,jenis_kecelakaan_samping_samping,jenis_kecelakaan_lainnya,profesi_pelaku_kecelakaan_lalin_pns,profesi_pelaku_kecelakaan_lalin_karyawan_swasta,profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,profesi_pelaku_kecelakaan_lalin_pengemudi,profesi_pelaku_kecelakaan_lalin_tni,profesi_pelaku_kecelakaan_lalin_polri,profesi_pelaku_kecelakaan_lalin_lain_lain,usia_pelaku_kecelakaan_kurang_dari_15_tahun,usia_pelaku_kecelakaan_16_20_tahun,usia_pelaku_kecelakaan_21_25_tahun,usia_pelaku_kecelakaan_26_30_tahun,usia_pelaku_kecelakaan_31_35_tahun,usia_pelaku_kecelakaan_36_40_tahun,usia_pelaku_kecelakaan_41_45_tahun,usia_pelaku_kecelakaan_46_50_tahun,usia_pelaku_kecelakaan_51_55_tahun,usia_pelaku_kecelakaan_56_60_tahun,usia_pelaku_kecelakaan_diatas_60_tahun,sim_pelaku_kecelakaan_sim_a,sim_pelaku_kecelakaan_sim_a_umum,sim_pelaku_kecelakaan_sim_b1,sim_pelaku_kecelakaan_sim_b1_umum,sim_pelaku_kecelakaan_sim_b2,sim_pelaku_kecelakaan_sim_b2_umum,sim_pelaku_kecelakaan_sim_c,sim_pelaku_kecelakaan_sim_d,sim_pelaku_kecelakaan_sim_internasional,sim_pelaku_kecelakaan_tanpa_sim,lokasi_kecelakaan_lalin_pemukiman,lokasi_kecelakaan_lalin_perbelanjaan,lokasi_kecelakaan_lalin_perkantoran,lokasi_kecelakaan_lalin_wisata,lokasi_kecelakaan_lalin_industri,lokasi_kecelakaan_lalin_lain_lain,lokasi_kecelakaan_status_jalan_nasional,lokasi_kecelakaan_status_jalan_propinsi,lokasi_kecelakaan_status_jalan_kab_kota,lokasi_kecelakaan_status_jalan_desa_lingkungan,lokasi_kecelakaan_fungsi_jalan_arteri,lokasi_kecelakaan_fungsi_jalan_kolektor,lokasi_kecelakaan_fungsi_jalan_lokal,lokasi_kecelakaan_fungsi_jalan_lingkungan,faktor_penyebab_kecelakaan_manusia,faktor_penyebab_kecelakaan_ngantuk_lelah,faktor_penyebab_kecelakaan_mabuk_obat,faktor_penyebab_kecelakaan_sakit,faktor_penyebab_kecelakaan_handphone_elektronik,faktor_penyebab_kecelakaan_menerobos_lampu_merah,faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,faktor_penyebab_kecelakaan_tidak_menjaga_jarak,faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,faktor_penyebab_kecelakaan_berpindah_jalur,faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,faktor_penyebab_kecelakaan_lainnya,faktor_penyebab_kecelakaan_alam,faktor_penyebab_kecelakaan_kelaikan_kendaraan,faktor_penyebab_kecelakaan_kondisi_jalan,faktor_penyebab_kecelakaan_prasarana_jalan,faktor_penyebab_kecelakaan_rambu,faktor_penyebab_kecelakaan_marka,faktor_penyebab_kecelakaan_apil,faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,waktu_kejadian_kecelakaan_00_03,waktu_kejadian_kecelakaan_03_06,waktu_kejadian_kecelakaan_06_09,waktu_kejadian_kecelakaan_09_12,waktu_kejadian_kecelakaan_12_15,waktu_kejadian_kecelakaan_15_18,waktu_kejadian_kecelakaan_18_21,waktu_kejadian_kecelakaan_21_24,kecelakaan_lalin_menonjol_jumlah_kejadian,kecelakaan_lalin_menonjol_korban_meninggal,kecelakaan_lalin_menonjol_korban_luka_berat,kecelakaan_lalin_menonjol_korban_luka_ringan,kecelakaan_lalin_menonjol_materiil,kecelakaan_lalin_tunggal_jumlah_kejadian,kecelakaan_lalin_tunggal_korban_meninggal,kecelakaan_lalin_tunggal_korban_luka_berat,kecelakaan_lalin_tunggal_korban_luka_ringan,kecelakaan_lalin_tunggal_materiil,kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,kecelakaan_lalin_tabrak_pejalan_kaki_materiil,kecelakaan_lalin_tabrak_lari_jumlah_kejadian,kecelakaan_lalin_tabrak_lari_korban_meninggal,kecelakaan_lalin_tabrak_lari_korban_luka_berat,kecelakaan_lalin_tabrak_lari_korban_luka_ringan,kecelakaan_lalin_tabrak_lari_materiil,kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,kecelakaan_lalin_tabrak_sepeda_motor_materiil,kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,kecelakaan_lalin_tabrak_roda_empat_materiil,kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,kecelakaan_lalin_tabrak_tidak_bermotor_materiil,kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,kecelakaan_lalin_perlintasan_ka_berpalang_pintu,kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,kecelakaan_lalin_perlintasan_ka_korban_luka_berat,kecelakaan_lalin_perlintasan_ka_korban_meninggal,kecelakaan_lalin_perlintasan_ka_materiil,kecelakaan_transportasi_kereta_api,kecelakaan_transportasi_laut_perairan,kecelakaan_transportasi_udara,penlu_melalui_media_cetak,penlu_melalui_media_elektronik,penlu_melalui_media_sosial,penlu_melalui_tempat_keramaian,penlu_melalui_tempat_istirahat,penlu_melalui_daerah_rawan_laka_dan_langgar,penyebaran_pemasangan_spanduk,penyebaran_pemasangan_leaflet,penyebaran_pemasangan_sticker,penyebaran_pemasangan_bilboard,polisi_sahabat_anak,cara_aman_sekolah,patroli_keamanan_sekolah,pramuka_bhayangkara_krida_lalu_lintas,police_goes_to_campus,safety_riding_driving,forum_lalu_lintas_angkutan_umum,kampanye_keselamatan,sekolah_mengemudi,taman_lalu_lintas,global_road_safety_partnership_action,giat_lantas_pengaturan,giat_lantas_penjagaan,giat_lantas_pengawalan,giat_lantas_patroli,arus_mudik_jumlah_bus_keberangkatan,arus_mudik_jumlah_penumpang_keberangkatan,arus_mudik_jumlah_bus_kedatangan,arus_mudik_jumlah_penumpang_kedatangan,arus_mudik_total_terminal,arus_mudik_total_bus_keberangkatan,arus_mudik_penumpang_keberangkatan,arus_mudik_total_bus_kedatangan,arus_mudik_penumpang_kedatangan,arus_mudik_kereta_api_total_stasiun,arus_mudik_kereta_api_total_penumpang_keberangkatan,arus_mudik_kereta_api_total_penumpang_kedatangan,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,arus_mudik_total_pelabuhan,arus_mudik_pelabuhan_kendaraan_keberangkatan,arus_mudik_pelabuhan_kendaraan_kedatangan,arus_mudik_pelabuhan_total_penumpang_keberangkatan,arus_mudik_pelabuhan_total_penumpang_kedatangan,arus_mudik_bandara_jumlah_penumpang_keberangkatan,arus_mudik_bandara_jumlah_penumpang_kedatangan,arus_mudik_total_bandara,arus_mudik_bandara_total_penumpang_keberangkatan,arus_mudik_bandara_total_penumpang_kedatangan,prokes_covid_teguran_gar_prokes,prokes_covid_pembagian_masker,prokes_covid_sosialisasi_tentang_prokes,prokes_covid_giat_baksos,penyekatan_motor,penyekatan_mobil_penumpang,penyekatan_mobil_bus,penyekatan_mobil_barang,penyekatan_kendaraan_khusus,rapid_test_antigen_positif,rapid_test_antigen_negatif' => function (Builder $query) use ($operationId, $current_year, $start_date, $end_date) {
            $query->where('rencana_operasi_id', $operationId)
            ->where('year', $current_year)
            ->whereRaw("DATE(created_at) >= ? and DATE(created_at) <= ?", [$start_date, $end_date]);
        }])->get();

    }
}

if (! function_exists('prevReport')) {
    function prevReport($date) {
        return SortablePoldaReport::withSum(['prev:pelanggaran_lalu_lintas_tilang_p,pelanggaran_lalu_lintas_teguran_p,pelanggaran_sepeda_motor_kecepatan_p,pelanggaran_sepeda_motor_helm_p,pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p,pelanggaran_sepeda_motor_marka_menerus_menyalip_p,pelanggaran_sepeda_motor_melawan_arus_p,pelanggaran_sepeda_motor_melanggar_lampu_lalin_p,pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p,pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p,pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p,pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p,pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p,pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p,pelanggaran_sepeda_motor_melanggar_marka_berhenti_p,pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p,pelanggaran_sepeda_motor_surat_surat_p,pelanggaran_sepeda_motor_kelengkapan_kendaraan_p,pelanggaran_sepeda_motor_lain_lain_p,pelanggaran_mobil_kecepatan_p,pelanggaran_mobil_safety_belt_p,pelanggaran_mobil_muatan_overload_p,pelanggaran_mobil_marka_menerus_menyalip_p,pelanggaran_mobil_melawan_arus_p,pelanggaran_mobil_melanggar_lampu_lalin_p,pelanggaran_mobil_mengemudi_tidak_wajar_p,pelanggaran_mobil_syarat_teknis_layak_jalan_p,pelanggaran_mobil_tidak_nyala_lampu_malam_p,pelanggaran_mobil_berbelok_tanpa_isyarat_p,pelanggaran_mobil_berbalapan_di_jalan_raya_p,pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p,pelanggaran_mobil_melanggar_marka_berhenti_p,pelanggaran_mobil_tidak_patuh_perintah_petugas_p,pelanggaran_mobil_surat_surat_p,pelanggaran_mobil_kelengkapan_kendaraan_p,pelanggaran_mobil_lain_lain_p,pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p,barang_bukti_yg_disita_sim_p,barang_bukti_yg_disita_stnk_p,barang_bukti_yg_disita_kendaraan_p,kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p,kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p,kendaraan_yang_terlibat_pelanggaran_mobil_bus_p,kendaraan_yang_terlibat_pelanggaran_mobil_barang_p,kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p,profesi_pelaku_pelanggaran_pns_p,profesi_pelaku_pelanggaran_karyawan_swasta_p,profesi_pelaku_pelanggaran_pelajar_mahasiswa_p,profesi_pelaku_pelanggaran_pengemudi_supir_p,profesi_pelaku_pelanggaran_tni_p,profesi_pelaku_pelanggaran_polri_p,profesi_pelaku_pelanggaran_lain_lain_p,usia_pelaku_pelanggaran_kurang_dari_15_tahun_p,usia_pelaku_pelanggaran_16_20_tahun_p,usia_pelaku_pelanggaran_21_25_tahun_p,usia_pelaku_pelanggaran_26_30_tahun_p,usia_pelaku_pelanggaran_31_35_tahun_p,usia_pelaku_pelanggaran_36_40_tahun_p,usia_pelaku_pelanggaran_41_45_tahun_p,usia_pelaku_pelanggaran_46_50_tahun_p,usia_pelaku_pelanggaran_51_55_tahun_p,usia_pelaku_pelanggaran_56_60_tahun_p,usia_pelaku_pelanggaran_diatas_60_tahun_p,sim_pelaku_pelanggaran_sim_a_p,sim_pelaku_pelanggaran_sim_a_umum_p,sim_pelaku_pelanggaran_sim_b1_p,sim_pelaku_pelanggaran_sim_b1_umum_p,sim_pelaku_pelanggaran_sim_b2_p,sim_pelaku_pelanggaran_sim_b2_umum_p,sim_pelaku_pelanggaran_sim_c_p,sim_pelaku_pelanggaran_sim_d_p,sim_pelaku_pelanggaran_sim_internasional_p,sim_pelaku_pelanggaran_tanpa_sim_p,lokasi_pelanggaran_pemukiman_p,lokasi_pelanggaran_perbelanjaan_p,lokasi_pelanggaran_perkantoran_p,lokasi_pelanggaran_wisata_p,lokasi_pelanggaran_industri_p,lokasi_pelanggaran_status_jalan_nasional_p,lokasi_pelanggaran_status_jalan_propinsi_p,lokasi_pelanggaran_status_jalan_kab_kota_p,lokasi_pelanggaran_status_jalan_desa_lingkungan_p,lokasi_pelanggaran_fungsi_jalan_arteri_p,lokasi_pelanggaran_fungsi_jalan_kolektor_p,lokasi_pelanggaran_fungsi_jalan_lokal_p,lokasi_pelanggaran_fungsi_jalan_lingkungan_p,kecelakaan_lalin_jumlah_kejadian_p,kecelakaan_lalin_jumlah_korban_meninggal_p,kecelakaan_lalin_jumlah_korban_luka_berat_p,kecelakaan_lalin_jumlah_korban_luka_ringan_p,kecelakaan_lalin_jumlah_kerugian_materiil_p,kecelakaan_barang_bukti_yg_disita_sim_p,kecelakaan_barang_bukti_yg_disita_stnk_p,kecelakaan_barang_bukti_yg_disita_kendaraan_p,profesi_korban_kecelakaan_lalin_pns_p,profesi_korban_kecelakaan_lalin_karwayan_swasta_p,profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p,profesi_korban_kecelakaan_lalin_pengemudi_p,profesi_korban_kecelakaan_lalin_tni_p,profesi_korban_kecelakaan_lalin_polri_p,profesi_korban_kecelakaan_lalin_lain_lain_p,usia_korban_kecelakaan_kurang_15_p,usia_korban_kecelakaan_16_20_p,usia_korban_kecelakaan_21_25_p,usia_korban_kecelakaan_26_30_p,usia_korban_kecelakaan_31_35_p,usia_korban_kecelakaan_36_40_p,usia_korban_kecelakaan_41_45_p,usia_korban_kecelakaan_45_50_p,usia_korban_kecelakaan_51_55_p,usia_korban_kecelakaan_56_60_p,usia_korban_kecelakaan_diatas_60_p,sim_korban_kecelakaan_sim_a_p,sim_korban_kecelakaan_sim_a_umum_p,sim_korban_kecelakaan_sim_b1_p,sim_korban_kecelakaan_sim_b1_umum_p,sim_korban_kecelakaan_sim_b2_p,sim_korban_kecelakaan_sim_b2_umum_p,sim_korban_kecelakaan_sim_c_p,sim_korban_kecelakaan_sim_d_p,sim_korban_kecelakaan_sim_internasional_p,sim_korban_kecelakaan_tanpa_sim_p,kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p,kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p,kendaraan_yg_terlibat_kecelakaan_mobil_bus_p,kendaraan_yg_terlibat_kecelakaan_mobil_barang_p,kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p,kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p,jenis_kecelakaan_tunggal_ooc_p,jenis_kecelakaan_depan_depan_p,jenis_kecelakaan_depan_belakang_p,jenis_kecelakaan_depan_samping_p,jenis_kecelakaan_beruntun_p,jenis_kecelakaan_pejalan_kaki_p,jenis_kecelakaan_tabrak_lari_p,jenis_kecelakaan_tabrak_hewan_p,jenis_kecelakaan_samping_samping_p,jenis_kecelakaan_lainnya_p,profesi_pelaku_kecelakaan_lalin_pns_p,profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p,profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p,profesi_pelaku_kecelakaan_lalin_pengemudi_p,profesi_pelaku_kecelakaan_lalin_tni_p,profesi_pelaku_kecelakaan_lalin_polri_p,profesi_pelaku_kecelakaan_lalin_lain_lain_p,usia_pelaku_kecelakaan_kurang_dari_15_tahun_p,usia_pelaku_kecelakaan_16_20_tahun_p,usia_pelaku_kecelakaan_21_25_tahun_p,usia_pelaku_kecelakaan_26_30_tahun_p,usia_pelaku_kecelakaan_31_35_tahun_p,usia_pelaku_kecelakaan_36_40_tahun_p,usia_pelaku_kecelakaan_41_45_tahun_p,usia_pelaku_kecelakaan_46_50_tahun_p,usia_pelaku_kecelakaan_51_55_tahun_p,usia_pelaku_kecelakaan_56_60_tahun_p,usia_pelaku_kecelakaan_diatas_60_tahun_p,sim_pelaku_kecelakaan_sim_a_p,sim_pelaku_kecelakaan_sim_a_umum_p,sim_pelaku_kecelakaan_sim_b1_p,sim_pelaku_kecelakaan_sim_b1_umum_p,sim_pelaku_kecelakaan_sim_b2_p,sim_pelaku_kecelakaan_sim_b2_umum_p,sim_pelaku_kecelakaan_sim_c_p,sim_pelaku_kecelakaan_sim_d_p,sim_pelaku_kecelakaan_sim_internasional_p,sim_pelaku_kecelakaan_tanpa_sim_p,lokasi_kecelakaan_lalin_pemukiman_p,lokasi_kecelakaan_lalin_perbelanjaan_p,lokasi_kecelakaan_lalin_perkantoran_p,lokasi_kecelakaan_lalin_wisata_p,lokasi_kecelakaan_lalin_industri_p,lokasi_kecelakaan_lalin_lain_lain_p,lokasi_kecelakaan_status_jalan_nasional_p,lokasi_kecelakaan_status_jalan_propinsi_p,lokasi_kecelakaan_status_jalan_kab_kota_p,lokasi_kecelakaan_status_jalan_desa_lingkungan_p,lokasi_kecelakaan_fungsi_jalan_arteri_p,lokasi_kecelakaan_fungsi_jalan_kolektor_p,lokasi_kecelakaan_fungsi_jalan_lokal_p,lokasi_kecelakaan_fungsi_jalan_lingkungan_p,faktor_penyebab_kecelakaan_manusia_p,faktor_penyebab_kecelakaan_ngantuk_lelah_p,faktor_penyebab_kecelakaan_mabuk_obat_p,faktor_penyebab_kecelakaan_sakit_p,faktor_penyebab_kecelakaan_handphone_elektronik_p,faktor_penyebab_kecelakaan_menerobos_lampu_merah_p,faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p,faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p,faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p,faktor_penyebab_kecelakaan_berpindah_jalur_p,faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p,faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p,faktor_penyebab_kecelakaan_lainnya_p,faktor_penyebab_kecelakaan_alam_p,faktor_penyebab_kecelakaan_kelaikan_kendaraan_p,faktor_penyebab_kecelakaan_kondisi_jalan_p,faktor_penyebab_kecelakaan_prasarana_jalan_p,faktor_penyebab_kecelakaan_rambu_p,faktor_penyebab_kecelakaan_marka_p,faktor_penyebab_kecelakaan_apil_p,faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p,waktu_kejadian_kecelakaan_00_03_p,waktu_kejadian_kecelakaan_03_06_p,waktu_kejadian_kecelakaan_06_09_p,waktu_kejadian_kecelakaan_09_12_p,waktu_kejadian_kecelakaan_12_15_p,waktu_kejadian_kecelakaan_15_18_p,waktu_kejadian_kecelakaan_18_21_p,waktu_kejadian_kecelakaan_21_24_p,kecelakaan_lalin_menonjol_jumlah_kejadian_p,kecelakaan_lalin_menonjol_korban_meninggal_p,kecelakaan_lalin_menonjol_korban_luka_berat_p,kecelakaan_lalin_menonjol_korban_luka_ringan_p,kecelakaan_lalin_menonjol_materiil_p,kecelakaan_lalin_tunggal_jumlah_kejadian_p,kecelakaan_lalin_tunggal_korban_meninggal_p,kecelakaan_lalin_tunggal_korban_luka_berat_p,kecelakaan_lalin_tunggal_korban_luka_ringan_p,kecelakaan_lalin_tunggal_materiil_p,kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p,kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p,kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p,kecelakaan_lalin_tabrak_lari_korban_meninggal_p,kecelakaan_lalin_tabrak_lari_korban_luka_berat_p,kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p,kecelakaan_lalin_tabrak_lari_materiil_p,kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p,kecelakaan_lalin_tabrak_sepeda_motor_materiil_p,kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p,kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p,kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p,kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p,kecelakaan_lalin_tabrak_roda_empat_materiil_p,kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p,kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p,kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p,kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p,kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p,kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p,kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p,kecelakaan_lalin_perlintasan_ka_korban_meninggal_p,kecelakaan_lalin_perlintasan_ka_materiil_p,kecelakaan_transportasi_kereta_api_p,kecelakaan_transportasi_laut_perairan_p,kecelakaan_transportasi_udara_p,penlu_melalui_media_cetak_p,penlu_melalui_media_elektronik_p,penlu_melalui_media_sosial_p,penlu_melalui_tempat_keramaian_p,penlu_melalui_tempat_istirahat_p,penlu_melalui_daerah_rawan_laka_dan_langgar_p,penyebaran_pemasangan_spanduk_p,penyebaran_pemasangan_leaflet_p,penyebaran_pemasangan_sticker_p,penyebaran_pemasangan_bilboard_p,polisi_sahabat_anak_p,cara_aman_sekolah_p,patroli_keamanan_sekolah_p,pramuka_bhayangkara_krida_lalu_lintas_p,police_goes_to_campus_p,safety_riding_driving_p,forum_lalu_lintas_angkutan_umum_p,kampanye_keselamatan_p,sekolah_mengemudi_p,taman_lalu_lintas_p,global_road_safety_partnership_action_p,giat_lantas_pengaturan_p,giat_lantas_penjagaan_p,giat_lantas_pengawalan_p,giat_lantas_patroli_p,arus_mudik_jumlah_bus_keberangkatan_p,arus_mudik_jumlah_penumpang_keberangkatan_p,arus_mudik_jumlah_bus_kedatangan_p,arus_mudik_jumlah_penumpang_kedatangan_p,arus_mudik_total_terminal_p,arus_mudik_total_bus_keberangkatan_p,arus_mudik_penumpang_keberangkatan_p,arus_mudik_total_bus_kedatangan_p,arus_mudik_penumpang_kedatangan_p,arus_mudik_kereta_api_total_stasiun_p,arus_mudik_kereta_api_total_penumpang_keberangkatan_p,arus_mudik_kereta_api_total_penumpang_kedatangan_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p,arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p,arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p,arus_mudik_total_pelabuhan_p,arus_mudik_pelabuhan_kendaraan_keberangkatan_p,arus_mudik_pelabuhan_kendaraan_kedatangan_p,arus_mudik_pelabuhan_total_penumpang_keberangkatan_p,arus_mudik_pelabuhan_total_penumpang_kedatangan_p,arus_mudik_bandara_jumlah_penumpang_keberangkatan_p,arus_mudik_bandara_jumlah_penumpang_kedatangan_p,arus_mudik_total_bandara_p,arus_mudik_bandara_total_penumpang_keberangkatan_p,arus_mudik_bandara_total_penumpang_kedatangan_p,prokes_covid_teguran_gar_prokes_p,prokes_covid_pembagian_masker_p,prokes_covid_sosialisasi_tentang_prokes_p,prokes_covid_giat_baksos_p,penyekatan_motor_p,penyekatan_mobil_penumpang_p,penyekatan_mobil_bus_p,penyekatan_mobil_barang_p,penyekatan_kendaraan_khusus_p,rapid_test_antigen_positif_p,rapid_test_antigen_negatif_p' => function (Builder $query) use ($date) {
            $query->whereRaw("DATE(created_at) = ?", $date);
        }])->get();
    }
}

if (! function_exists('sumPrevCollection')) {
    function sumPrevCollection($date) {
        $sumDailyPrev = DB::table('daily_input_prev')->sum('pelanggaran_lalu_lintas_tilang_p','pelanggaran_lalu_lintas_teguran_p','pelanggaran_sepeda_motor_kecepatan_p','pelanggaran_sepeda_motor_helm_p','pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p','pelanggaran_sepeda_motor_marka_menerus_menyalip_p','pelanggaran_sepeda_motor_melawan_arus_p','pelanggaran_sepeda_motor_melanggar_lampu_lalin_p','pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p','pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p','pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p','pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p','pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p','pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p','pelanggaran_sepeda_motor_melanggar_marka_berhenti_p','pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p','pelanggaran_sepeda_motor_surat_surat_p','pelanggaran_sepeda_motor_kelengkapan_kendaraan_p','pelanggaran_sepeda_motor_lain_lain_p','pelanggaran_mobil_kecepatan_p','pelanggaran_mobil_safety_belt_p','pelanggaran_mobil_muatan_overload_p','pelanggaran_mobil_marka_menerus_menyalip_p','pelanggaran_mobil_melawan_arus_p','pelanggaran_mobil_melanggar_lampu_lalin_p','pelanggaran_mobil_mengemudi_tidak_wajar_p','pelanggaran_mobil_syarat_teknis_layak_jalan_p','pelanggaran_mobil_tidak_nyala_lampu_malam_p','pelanggaran_mobil_berbelok_tanpa_isyarat_p','pelanggaran_mobil_berbalapan_di_jalan_raya_p','pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p','pelanggaran_mobil_melanggar_marka_berhenti_p','pelanggaran_mobil_tidak_patuh_perintah_petugas_p','pelanggaran_mobil_surat_surat_p','pelanggaran_mobil_kelengkapan_kendaraan_p','pelanggaran_mobil_lain_lain_p','pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p','barang_bukti_yg_disita_sim_p','barang_bukti_yg_disita_stnk_p','barang_bukti_yg_disita_kendaraan_p','kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p','kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p','kendaraan_yang_terlibat_pelanggaran_mobil_bus_p','kendaraan_yang_terlibat_pelanggaran_mobil_barang_p','kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p','profesi_pelaku_pelanggaran_pns_p','profesi_pelaku_pelanggaran_karyawan_swasta_p','profesi_pelaku_pelanggaran_pelajar_mahasiswa_p','profesi_pelaku_pelanggaran_pengemudi_supir_p','profesi_pelaku_pelanggaran_tni_p','profesi_pelaku_pelanggaran_polri_p','profesi_pelaku_pelanggaran_lain_lain_p','usia_pelaku_pelanggaran_kurang_dari_15_tahun_p','usia_pelaku_pelanggaran_16_20_tahun_p','usia_pelaku_pelanggaran_21_25_tahun_p','usia_pelaku_pelanggaran_26_30_tahun_p','usia_pelaku_pelanggaran_31_35_tahun_p','usia_pelaku_pelanggaran_36_40_tahun_p','usia_pelaku_pelanggaran_41_45_tahun_p','usia_pelaku_pelanggaran_46_50_tahun_p','usia_pelaku_pelanggaran_51_55_tahun_p','usia_pelaku_pelanggaran_56_60_tahun_p','usia_pelaku_pelanggaran_diatas_60_tahun_p','sim_pelaku_pelanggaran_sim_a_p','sim_pelaku_pelanggaran_sim_a_umum_p','sim_pelaku_pelanggaran_sim_b1_p','sim_pelaku_pelanggaran_sim_b1_umum_p','sim_pelaku_pelanggaran_sim_b2_p','sim_pelaku_pelanggaran_sim_b2_umum_p','sim_pelaku_pelanggaran_sim_c_p','sim_pelaku_pelanggaran_sim_d_p','sim_pelaku_pelanggaran_sim_internasional_p','sim_pelaku_pelanggaran_tanpa_sim_p','lokasi_pelanggaran_pemukiman_p','lokasi_pelanggaran_perbelanjaan_p','lokasi_pelanggaran_perkantoran_p','lokasi_pelanggaran_wisata_p','lokasi_pelanggaran_industri_p','lokasi_pelanggaran_status_jalan_nasional_p','lokasi_pelanggaran_status_jalan_propinsi_p','lokasi_pelanggaran_status_jalan_kab_kota_p','lokasi_pelanggaran_status_jalan_desa_lingkungan_p','lokasi_pelanggaran_fungsi_jalan_arteri_p','lokasi_pelanggaran_fungsi_jalan_kolektor_p','lokasi_pelanggaran_fungsi_jalan_lokal_p','lokasi_pelanggaran_fungsi_jalan_lingkungan_p','kecelakaan_lalin_jumlah_kejadian_p','kecelakaan_lalin_jumlah_korban_meninggal_p','kecelakaan_lalin_jumlah_korban_luka_berat_p','kecelakaan_lalin_jumlah_korban_luka_ringan_p','kecelakaan_lalin_jumlah_kerugian_materiil_p','kecelakaan_barang_bukti_yg_disita_sim_p','kecelakaan_barang_bukti_yg_disita_stnk_p','kecelakaan_barang_bukti_yg_disita_kendaraan_p','profesi_korban_kecelakaan_lalin_pns_p','profesi_korban_kecelakaan_lalin_karwayan_swasta_p','profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p','profesi_korban_kecelakaan_lalin_pengemudi_p','profesi_korban_kecelakaan_lalin_tni_p','profesi_korban_kecelakaan_lalin_polri_p','profesi_korban_kecelakaan_lalin_lain_lain_p','usia_korban_kecelakaan_kurang_15_p','usia_korban_kecelakaan_16_20_p','usia_korban_kecelakaan_21_25_p','usia_korban_kecelakaan_26_30_p','usia_korban_kecelakaan_31_35_p','usia_korban_kecelakaan_36_40_p','usia_korban_kecelakaan_41_45_p','usia_korban_kecelakaan_45_50_p','usia_korban_kecelakaan_51_55_p','usia_korban_kecelakaan_56_60_p','usia_korban_kecelakaan_diatas_60_p','sim_korban_kecelakaan_sim_a_p','sim_korban_kecelakaan_sim_a_umum_p','sim_korban_kecelakaan_sim_b1_p','sim_korban_kecelakaan_sim_b1_umum_p','sim_korban_kecelakaan_sim_b2_p','sim_korban_kecelakaan_sim_b2_umum_p','sim_korban_kecelakaan_sim_c_p','sim_korban_kecelakaan_sim_d_p','sim_korban_kecelakaan_sim_internasional_p','sim_korban_kecelakaan_tanpa_sim_p','kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p','kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p','kendaraan_yg_terlibat_kecelakaan_mobil_bus_p','kendaraan_yg_terlibat_kecelakaan_mobil_barang_p','kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p','kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p','jenis_kecelakaan_tunggal_ooc_p','jenis_kecelakaan_depan_depan_p','jenis_kecelakaan_depan_belakang_p','jenis_kecelakaan_depan_samping_p','jenis_kecelakaan_beruntun_p','jenis_kecelakaan_pejalan_kaki_p','jenis_kecelakaan_tabrak_lari_p','jenis_kecelakaan_tabrak_hewan_p','jenis_kecelakaan_samping_samping_p','jenis_kecelakaan_lainnya_p','profesi_pelaku_kecelakaan_lalin_pns_p','profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p','profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p','profesi_pelaku_kecelakaan_lalin_pengemudi_p','profesi_pelaku_kecelakaan_lalin_tni_p','profesi_pelaku_kecelakaan_lalin_polri_p','profesi_pelaku_kecelakaan_lalin_lain_lain_p','usia_pelaku_kecelakaan_kurang_dari_15_tahun_p','usia_pelaku_kecelakaan_16_20_tahun_p','usia_pelaku_kecelakaan_21_25_tahun_p','usia_pelaku_kecelakaan_26_30_tahun_p','usia_pelaku_kecelakaan_31_35_tahun_p','usia_pelaku_kecelakaan_36_40_tahun_p','usia_pelaku_kecelakaan_41_45_tahun_p','usia_pelaku_kecelakaan_46_50_tahun_p','usia_pelaku_kecelakaan_51_55_tahun_p','usia_pelaku_kecelakaan_56_60_tahun_p','usia_pelaku_kecelakaan_diatas_60_tahun_p','sim_pelaku_kecelakaan_sim_a_p','sim_pelaku_kecelakaan_sim_a_umum_p','sim_pelaku_kecelakaan_sim_b1_p','sim_pelaku_kecelakaan_sim_b1_umum_p','sim_pelaku_kecelakaan_sim_b2_p','sim_pelaku_kecelakaan_sim_b2_umum_p','sim_pelaku_kecelakaan_sim_c_p','sim_pelaku_kecelakaan_sim_d_p','sim_pelaku_kecelakaan_sim_internasional_p','sim_pelaku_kecelakaan_tanpa_sim_p','lokasi_kecelakaan_lalin_pemukiman_p','lokasi_kecelakaan_lalin_perbelanjaan_p','lokasi_kecelakaan_lalin_perkantoran_p','lokasi_kecelakaan_lalin_wisata_p','lokasi_kecelakaan_lalin_industri_p','lokasi_kecelakaan_lalin_lain_lain_p','lokasi_kecelakaan_status_jalan_nasional_p','lokasi_kecelakaan_status_jalan_propinsi_p','lokasi_kecelakaan_status_jalan_kab_kota_p','lokasi_kecelakaan_status_jalan_desa_lingkungan_p','lokasi_kecelakaan_fungsi_jalan_arteri_p','lokasi_kecelakaan_fungsi_jalan_kolektor_p','lokasi_kecelakaan_fungsi_jalan_lokal_p','lokasi_kecelakaan_fungsi_jalan_lingkungan_p','faktor_penyebab_kecelakaan_manusia_p','faktor_penyebab_kecelakaan_ngantuk_lelah_p','faktor_penyebab_kecelakaan_mabuk_obat_p','faktor_penyebab_kecelakaan_sakit_p','faktor_penyebab_kecelakaan_handphone_elektronik_p','faktor_penyebab_kecelakaan_menerobos_lampu_merah_p','faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p','faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p','faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p','faktor_penyebab_kecelakaan_berpindah_jalur_p','faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p','faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p','faktor_penyebab_kecelakaan_lainnya_p','faktor_penyebab_kecelakaan_alam_p','faktor_penyebab_kecelakaan_kelaikan_kendaraan_p','faktor_penyebab_kecelakaan_kondisi_jalan_p','faktor_penyebab_kecelakaan_prasarana_jalan_p','faktor_penyebab_kecelakaan_rambu_p','faktor_penyebab_kecelakaan_marka_p','faktor_penyebab_kecelakaan_apil_p','faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p','waktu_kejadian_kecelakaan_00_03_p','waktu_kejadian_kecelakaan_03_06_p','waktu_kejadian_kecelakaan_06_09_p','waktu_kejadian_kecelakaan_09_12_p','waktu_kejadian_kecelakaan_12_15_p','waktu_kejadian_kecelakaan_15_18_p','waktu_kejadian_kecelakaan_18_21_p','waktu_kejadian_kecelakaan_21_24_p','kecelakaan_lalin_menonjol_jumlah_kejadian_p','kecelakaan_lalin_menonjol_korban_meninggal_p','kecelakaan_lalin_menonjol_korban_luka_berat_p','kecelakaan_lalin_menonjol_korban_luka_ringan_p','kecelakaan_lalin_menonjol_materiil_p','kecelakaan_lalin_tunggal_jumlah_kejadian_p','kecelakaan_lalin_tunggal_korban_meninggal_p','kecelakaan_lalin_tunggal_korban_luka_berat_p','kecelakaan_lalin_tunggal_korban_luka_ringan_p','kecelakaan_lalin_tunggal_materiil_p','kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p','kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p','kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p','kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p','kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p','kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p','kecelakaan_lalin_tabrak_lari_korban_meninggal_p','kecelakaan_lalin_tabrak_lari_korban_luka_berat_p','kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p','kecelakaan_lalin_tabrak_lari_materiil_p','kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p','kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p','kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p','kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p','kecelakaan_lalin_tabrak_sepeda_motor_materiil_p','kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p','kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p','kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p','kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p','kecelakaan_lalin_tabrak_roda_empat_materiil_p','kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p','kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p','kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p','kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p','kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p','kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p','kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p','kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p','kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p','kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p','kecelakaan_lalin_perlintasan_ka_korban_meninggal_p','kecelakaan_lalin_perlintasan_ka_materiil_p','kecelakaan_transportasi_kereta_api_p','kecelakaan_transportasi_laut_perairan_p','kecelakaan_transportasi_udara_p','penlu_melalui_media_cetak_p','penlu_melalui_media_elektronik_p','penlu_melalui_media_sosial_p','penlu_melalui_tempat_keramaian_p','penlu_melalui_tempat_istirahat_p','penlu_melalui_daerah_rawan_laka_dan_langgar_p','penyebaran_pemasangan_spanduk_p','penyebaran_pemasangan_leaflet_p','penyebaran_pemasangan_sticker_p','penyebaran_pemasangan_bilboard_p','polisi_sahabat_anak_p','cara_aman_sekolah_p','patroli_keamanan_sekolah_p','pramuka_bhayangkara_krida_lalu_lintas_p','police_goes_to_campus_p','safety_riding_driving_p','forum_lalu_lintas_angkutan_umum_p','kampanye_keselamatan_p','sekolah_mengemudi_p','taman_lalu_lintas_p','global_road_safety_partnership_action_p','giat_lantas_pengaturan_p','giat_lantas_penjagaan_p','giat_lantas_pengawalan_p','giat_lantas_patroli_p','arus_mudik_jumlah_bus_keberangkatan_p','arus_mudik_jumlah_penumpang_keberangkatan_p','arus_mudik_jumlah_bus_kedatangan_p','arus_mudik_jumlah_penumpang_kedatangan_p','arus_mudik_total_terminal_p','arus_mudik_total_bus_keberangkatan_p','arus_mudik_penumpang_keberangkatan_p','arus_mudik_total_bus_kedatangan_p','arus_mudik_penumpang_kedatangan_p','arus_mudik_kereta_api_total_stasiun_p','arus_mudik_kereta_api_total_penumpang_keberangkatan_p','arus_mudik_kereta_api_total_penumpang_kedatangan_p','arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p','arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p','arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p','arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p','arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p','arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p','arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p','arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p','arus_mudik_total_pelabuhan_p','arus_mudik_pelabuhan_kendaraan_keberangkatan_p','arus_mudik_pelabuhan_kendaraan_kedatangan_p','arus_mudik_pelabuhan_total_penumpang_keberangkatan_p','arus_mudik_pelabuhan_total_penumpang_kedatangan_p','arus_mudik_bandara_jumlah_penumpang_keberangkatan_p','arus_mudik_bandara_jumlah_penumpang_kedatangan_p','arus_mudik_total_bandara_p','arus_mudik_bandara_total_penumpang_keberangkatan_p','arus_mudik_bandara_total_penumpang_kedatangan_p','prokes_covid_teguran_gar_prokes_p','prokes_covid_pembagian_masker_p','prokes_covid_sosialisasi_tentang_prokes_p','prokes_covid_giat_baksos_p','penyekatan_motor_p','penyekatan_mobil_penumpang_p','penyekatan_mobil_bus_p','penyekatan_mobil_barang_p','penyekatan_kendaraan_khusus_p','rapid_test_antigen_positif_p','rapid_test_antigen_negatif_p')->whereRaw("DATE(created_at) = ?", $date);
        return $sumDailyPrev;
    }
}

if (! function_exists('prevDaily')) {
    function prevDaily($operationId, $tanggal) {
        return CountDown::withSum(['prev:pelanggaran_lalu_lintas_tilang_p,pelanggaran_lalu_lintas_teguran_p,pelanggaran_sepeda_motor_kecepatan_p,pelanggaran_sepeda_motor_helm_p,pelanggaran_sepeda_motor_bonceng_lebih_dari_satu_p,pelanggaran_sepeda_motor_marka_menerus_menyalip_p,pelanggaran_sepeda_motor_melawan_arus_p,pelanggaran_sepeda_motor_melanggar_lampu_lalin_p,pelanggaran_sepeda_motor_mengemudikan_tidak_wajar_p,pelanggaran_sepeda_motor_syarat_teknis_layak_jalan_p,pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam_p,pelanggaran_sepeda_motor_berbelok_tanpa_isyarat_p,pelanggaran_sepeda_motor_berbalapan_di_jalan_raya_p,pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir_p,pelanggaran_sepeda_motor_melanggar_marka_berhenti_p,pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas_p,pelanggaran_sepeda_motor_surat_surat_p,pelanggaran_sepeda_motor_kelengkapan_kendaraan_p,pelanggaran_sepeda_motor_lain_lain_p,pelanggaran_mobil_kecepatan_p,pelanggaran_mobil_safety_belt_p,pelanggaran_mobil_muatan_overload_p,pelanggaran_mobil_marka_menerus_menyalip_p,pelanggaran_mobil_melawan_arus_p,pelanggaran_mobil_melanggar_lampu_lalin_p,pelanggaran_mobil_mengemudi_tidak_wajar_p,pelanggaran_mobil_syarat_teknis_layak_jalan_p,pelanggaran_mobil_tidak_nyala_lampu_malam_p,pelanggaran_mobil_berbelok_tanpa_isyarat_p,pelanggaran_mobil_berbalapan_di_jalan_raya_p,pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir_p,pelanggaran_mobil_melanggar_marka_berhenti_p,pelanggaran_mobil_tidak_patuh_perintah_petugas_p,pelanggaran_mobil_surat_surat_p,pelanggaran_mobil_kelengkapan_kendaraan_p,pelanggaran_mobil_lain_lain_p,pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat_p,barang_bukti_yg_disita_sim_p,barang_bukti_yg_disita_stnk_p,barang_bukti_yg_disita_kendaraan_p,kendaraan_yang_terlibat_pelanggaran_sepeda_motor_p,kendaraan_yang_terlibat_pelanggaran_mobil_penumpang_p,kendaraan_yang_terlibat_pelanggaran_mobil_bus_p,kendaraan_yang_terlibat_pelanggaran_mobil_barang_p,kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus_p,profesi_pelaku_pelanggaran_pns_p,profesi_pelaku_pelanggaran_karyawan_swasta_p,profesi_pelaku_pelanggaran_pelajar_mahasiswa_p,profesi_pelaku_pelanggaran_pengemudi_supir_p,profesi_pelaku_pelanggaran_tni_p,profesi_pelaku_pelanggaran_polri_p,profesi_pelaku_pelanggaran_lain_lain_p,usia_pelaku_pelanggaran_kurang_dari_15_tahun_p,usia_pelaku_pelanggaran_16_20_tahun_p,usia_pelaku_pelanggaran_21_25_tahun_p,usia_pelaku_pelanggaran_26_30_tahun_p,usia_pelaku_pelanggaran_31_35_tahun_p,usia_pelaku_pelanggaran_36_40_tahun_p,usia_pelaku_pelanggaran_41_45_tahun_p,usia_pelaku_pelanggaran_46_50_tahun_p,usia_pelaku_pelanggaran_51_55_tahun_p,usia_pelaku_pelanggaran_56_60_tahun_p,usia_pelaku_pelanggaran_diatas_60_tahun_p,sim_pelaku_pelanggaran_sim_a_p,sim_pelaku_pelanggaran_sim_a_umum_p,sim_pelaku_pelanggaran_sim_b1_p,sim_pelaku_pelanggaran_sim_b1_umum_p,sim_pelaku_pelanggaran_sim_b2_p,sim_pelaku_pelanggaran_sim_b2_umum_p,sim_pelaku_pelanggaran_sim_c_p,sim_pelaku_pelanggaran_sim_d_p,sim_pelaku_pelanggaran_sim_internasional_p,sim_pelaku_pelanggaran_tanpa_sim_p,lokasi_pelanggaran_pemukiman_p,lokasi_pelanggaran_perbelanjaan_p,lokasi_pelanggaran_perkantoran_p,lokasi_pelanggaran_wisata_p,lokasi_pelanggaran_industri_p,lokasi_pelanggaran_status_jalan_nasional_p,lokasi_pelanggaran_status_jalan_propinsi_p,lokasi_pelanggaran_status_jalan_kab_kota_p,lokasi_pelanggaran_status_jalan_desa_lingkungan_p,lokasi_pelanggaran_fungsi_jalan_arteri_p,lokasi_pelanggaran_fungsi_jalan_kolektor_p,lokasi_pelanggaran_fungsi_jalan_lokal_p,lokasi_pelanggaran_fungsi_jalan_lingkungan_p,kecelakaan_lalin_jumlah_kejadian_p,kecelakaan_lalin_jumlah_korban_meninggal_p,kecelakaan_lalin_jumlah_korban_luka_berat_p,kecelakaan_lalin_jumlah_korban_luka_ringan_p,kecelakaan_lalin_jumlah_kerugian_materiil_p,kecelakaan_barang_bukti_yg_disita_sim_p,kecelakaan_barang_bukti_yg_disita_stnk_p,kecelakaan_barang_bukti_yg_disita_kendaraan_p,profesi_korban_kecelakaan_lalin_pns_p,profesi_korban_kecelakaan_lalin_karwayan_swasta_p,profesi_korban_kecelakaan_lalin_pelajar_mahasiswa_p,profesi_korban_kecelakaan_lalin_pengemudi_p,profesi_korban_kecelakaan_lalin_tni_p,profesi_korban_kecelakaan_lalin_polri_p,profesi_korban_kecelakaan_lalin_lain_lain_p,usia_korban_kecelakaan_kurang_15_p,usia_korban_kecelakaan_16_20_p,usia_korban_kecelakaan_21_25_p,usia_korban_kecelakaan_26_30_p,usia_korban_kecelakaan_31_35_p,usia_korban_kecelakaan_36_40_p,usia_korban_kecelakaan_41_45_p,usia_korban_kecelakaan_45_50_p,usia_korban_kecelakaan_51_55_p,usia_korban_kecelakaan_56_60_p,usia_korban_kecelakaan_diatas_60_p,sim_korban_kecelakaan_sim_a_p,sim_korban_kecelakaan_sim_a_umum_p,sim_korban_kecelakaan_sim_b1_p,sim_korban_kecelakaan_sim_b1_umum_p,sim_korban_kecelakaan_sim_b2_p,sim_korban_kecelakaan_sim_b2_umum_p,sim_korban_kecelakaan_sim_c_p,sim_korban_kecelakaan_sim_d_p,sim_korban_kecelakaan_sim_internasional_p,sim_korban_kecelakaan_tanpa_sim_p,kendaraan_yg_terlibat_kecelakaan_sepeda_motor_p,kendaraan_yg_terlibat_kecelakaan_mobil_penumpang_p,kendaraan_yg_terlibat_kecelakaan_mobil_bus_p,kendaraan_yg_terlibat_kecelakaan_mobil_barang_p,kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus_p,kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor_p,jenis_kecelakaan_tunggal_ooc_p,jenis_kecelakaan_depan_depan_p,jenis_kecelakaan_depan_belakang_p,jenis_kecelakaan_depan_samping_p,jenis_kecelakaan_beruntun_p,jenis_kecelakaan_pejalan_kaki_p,jenis_kecelakaan_tabrak_lari_p,jenis_kecelakaan_tabrak_hewan_p,jenis_kecelakaan_samping_samping_p,jenis_kecelakaan_lainnya_p,profesi_pelaku_kecelakaan_lalin_pns_p,profesi_pelaku_kecelakaan_lalin_karyawan_swasta_p,profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar_p,profesi_pelaku_kecelakaan_lalin_pengemudi_p,profesi_pelaku_kecelakaan_lalin_tni_p,profesi_pelaku_kecelakaan_lalin_polri_p,profesi_pelaku_kecelakaan_lalin_lain_lain_p,usia_pelaku_kecelakaan_kurang_dari_15_tahun_p,usia_pelaku_kecelakaan_16_20_tahun_p,usia_pelaku_kecelakaan_21_25_tahun_p,usia_pelaku_kecelakaan_26_30_tahun_p,usia_pelaku_kecelakaan_31_35_tahun_p,usia_pelaku_kecelakaan_36_40_tahun_p,usia_pelaku_kecelakaan_41_45_tahun_p,usia_pelaku_kecelakaan_46_50_tahun_p,usia_pelaku_kecelakaan_51_55_tahun_p,usia_pelaku_kecelakaan_56_60_tahun_p,usia_pelaku_kecelakaan_diatas_60_tahun_p,sim_pelaku_kecelakaan_sim_a_p,sim_pelaku_kecelakaan_sim_a_umum_p,sim_pelaku_kecelakaan_sim_b1_p,sim_pelaku_kecelakaan_sim_b1_umum_p,sim_pelaku_kecelakaan_sim_b2_p,sim_pelaku_kecelakaan_sim_b2_umum_p,sim_pelaku_kecelakaan_sim_c_p,sim_pelaku_kecelakaan_sim_d_p,sim_pelaku_kecelakaan_sim_internasional_p,sim_pelaku_kecelakaan_tanpa_sim_p,lokasi_kecelakaan_lalin_pemukiman_p,lokasi_kecelakaan_lalin_perbelanjaan_p,lokasi_kecelakaan_lalin_perkantoran_p,lokasi_kecelakaan_lalin_wisata_p,lokasi_kecelakaan_lalin_industri_p,lokasi_kecelakaan_lalin_lain_lain_p,lokasi_kecelakaan_status_jalan_nasional_p,lokasi_kecelakaan_status_jalan_propinsi_p,lokasi_kecelakaan_status_jalan_kab_kota_p,lokasi_kecelakaan_status_jalan_desa_lingkungan_p,lokasi_kecelakaan_fungsi_jalan_arteri_p,lokasi_kecelakaan_fungsi_jalan_kolektor_p,lokasi_kecelakaan_fungsi_jalan_lokal_p,lokasi_kecelakaan_fungsi_jalan_lingkungan_p,faktor_penyebab_kecelakaan_manusia_p,faktor_penyebab_kecelakaan_ngantuk_lelah_p,faktor_penyebab_kecelakaan_mabuk_obat_p,faktor_penyebab_kecelakaan_sakit_p,faktor_penyebab_kecelakaan_handphone_elektronik_p,faktor_penyebab_kecelakaan_menerobos_lampu_merah_p,faktor_penyebab_kecelakaan_melanggar_batas_kecepatan_p,faktor_penyebab_kecelakaan_tidak_menjaga_jarak_p,faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur_p,faktor_penyebab_kecelakaan_berpindah_jalur_p,faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat_p,faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki_p,faktor_penyebab_kecelakaan_lainnya_p,faktor_penyebab_kecelakaan_alam_p,faktor_penyebab_kecelakaan_kelaikan_kendaraan_p,faktor_penyebab_kecelakaan_kondisi_jalan_p,faktor_penyebab_kecelakaan_prasarana_jalan_p,faktor_penyebab_kecelakaan_rambu_p,faktor_penyebab_kecelakaan_marka_p,faktor_penyebab_kecelakaan_apil_p,faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu_p,waktu_kejadian_kecelakaan_00_03_p,waktu_kejadian_kecelakaan_03_06_p,waktu_kejadian_kecelakaan_06_09_p,waktu_kejadian_kecelakaan_09_12_p,waktu_kejadian_kecelakaan_12_15_p,waktu_kejadian_kecelakaan_15_18_p,waktu_kejadian_kecelakaan_18_21_p,waktu_kejadian_kecelakaan_21_24_p,kecelakaan_lalin_menonjol_jumlah_kejadian_p,kecelakaan_lalin_menonjol_korban_meninggal_p,kecelakaan_lalin_menonjol_korban_luka_berat_p,kecelakaan_lalin_menonjol_korban_luka_ringan_p,kecelakaan_lalin_menonjol_materiil_p,kecelakaan_lalin_tunggal_jumlah_kejadian_p,kecelakaan_lalin_tunggal_korban_meninggal_p,kecelakaan_lalin_tunggal_korban_luka_berat_p,kecelakaan_lalin_tunggal_korban_luka_ringan_p,kecelakaan_lalin_tunggal_materiil_p,kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat_p,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan_p,kecelakaan_lalin_tabrak_pejalan_kaki_materiil_p,kecelakaan_lalin_tabrak_lari_jumlah_kejadian_p,kecelakaan_lalin_tabrak_lari_korban_meninggal_p,kecelakaan_lalin_tabrak_lari_korban_luka_berat_p,kecelakaan_lalin_tabrak_lari_korban_luka_ringan_p,kecelakaan_lalin_tabrak_lari_materiil_p,kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat_p,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan_p,kecelakaan_lalin_tabrak_sepeda_motor_materiil_p,kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian_p,kecelakaan_lalin_tabrak_roda_empat_korban_meninggal_p,kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat_p,kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan_p,kecelakaan_lalin_tabrak_roda_empat_materiil_p,kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat_p,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan_p,kecelakaan_lalin_tabrak_tidak_bermotor_materiil_p,kecelakaan_lalin_perlintasan_ka_jumlah_kejadian_p,kecelakaan_lalin_perlintasan_ka_berpalang_pintu_p,kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu_p,kecelakaan_lalin_perlintasan_ka_korban_luka_ringan_p,kecelakaan_lalin_perlintasan_ka_korban_luka_berat_p,kecelakaan_lalin_perlintasan_ka_korban_meninggal_p,kecelakaan_lalin_perlintasan_ka_materiil_p,kecelakaan_transportasi_kereta_api_p,kecelakaan_transportasi_laut_perairan_p,kecelakaan_transportasi_udara_p,penlu_melalui_media_cetak_p,penlu_melalui_media_elektronik_p,penlu_melalui_media_sosial_p,penlu_melalui_tempat_keramaian_p,penlu_melalui_tempat_istirahat_p,penlu_melalui_daerah_rawan_laka_dan_langgar_p,penyebaran_pemasangan_spanduk_p,penyebaran_pemasangan_leaflet_p,penyebaran_pemasangan_sticker_p,penyebaran_pemasangan_bilboard_p,polisi_sahabat_anak_p,cara_aman_sekolah_p,patroli_keamanan_sekolah_p,pramuka_bhayangkara_krida_lalu_lintas_p,police_goes_to_campus_p,safety_riding_driving_p,forum_lalu_lintas_angkutan_umum_p,kampanye_keselamatan_p,sekolah_mengemudi_p,taman_lalu_lintas_p,global_road_safety_partnership_action_p,giat_lantas_pengaturan_p,giat_lantas_penjagaan_p,giat_lantas_pengawalan_p,giat_lantas_patroli_p,arus_mudik_jumlah_bus_keberangkatan_p,arus_mudik_jumlah_penumpang_keberangkatan_p,arus_mudik_jumlah_bus_kedatangan_p,arus_mudik_jumlah_penumpang_kedatangan_p,arus_mudik_total_terminal_p,arus_mudik_total_bus_keberangkatan_p,arus_mudik_penumpang_keberangkatan_p,arus_mudik_total_bus_kedatangan_p,arus_mudik_penumpang_kedatangan_p,arus_mudik_kereta_api_total_stasiun_p,arus_mudik_kereta_api_total_penumpang_keberangkatan_p,arus_mudik_kereta_api_total_penumpang_kedatangan_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4_p,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2_p,arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4_p,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2_p,arus_mudik_pelabuhan_jumlah_penumpang_kedatangan_p,arus_mudik_total_pelabuhan_p,arus_mudik_pelabuhan_kendaraan_keberangkatan_p,arus_mudik_pelabuhan_kendaraan_kedatangan_p,arus_mudik_pelabuhan_total_penumpang_keberangkatan_p,arus_mudik_pelabuhan_total_penumpang_kedatangan_p,arus_mudik_bandara_jumlah_penumpang_keberangkatan_p,arus_mudik_bandara_jumlah_penumpang_kedatangan_p,arus_mudik_total_bandara_p,arus_mudik_bandara_total_penumpang_keberangkatan_p,arus_mudik_bandara_total_penumpang_kedatangan_p,prokes_covid_teguran_gar_prokes_p,prokes_covid_pembagian_masker_p,prokes_covid_sosialisasi_tentang_prokes_p,prokes_covid_giat_baksos_p,penyekatan_motor_p,penyekatan_mobil_penumpang_p,penyekatan_mobil_bus_p,penyekatan_mobil_barang_p,penyekatan_kendaraan_khusus_p,rapid_test_antigen_positif_p,rapid_test_antigen_negatif_p' => function (Builder $query) use ($tanggal) {
            $query->whereRaw("DATE(created_at) = ?", [$tanggal]);
        }])
        ->where('rencana_operasi_id', $operationId)
        ->where('tanggal', $tanggal)
        ->get();
    }
}

if (! function_exists('currentDaily')) {
    function currentDaily($operationId, $tanggal) {
        return CountDown::withSum(['current:pelanggaran_lalu_lintas_tilang,pelanggaran_lalu_lintas_teguran,pelanggaran_sepeda_motor_kecepatan,pelanggaran_sepeda_motor_helm,pelanggaran_sepeda_motor_bonceng_lebih_dari_satu,pelanggaran_sepeda_motor_marka_menerus_menyalip,pelanggaran_sepeda_motor_melawan_arus,pelanggaran_sepeda_motor_melanggar_lampu_lalin,pelanggaran_sepeda_motor_mengemudikan_tidak_wajar,pelanggaran_sepeda_motor_syarat_teknis_layak_jalan,pelanggaran_sepeda_motor_tidak_nyala_lampu_siang_malam,pelanggaran_sepeda_motor_berbelok_tanpa_isyarat,pelanggaran_sepeda_motor_berbalapan_di_jalan_raya,pelanggaran_sepeda_motor_melanggar_rambu_berhenti_dan_parkir,pelanggaran_sepeda_motor_melanggar_marka_berhenti,pelanggaran_sepeda_motor_tidak_patuh_perintah_petugas,pelanggaran_sepeda_motor_surat_surat,pelanggaran_sepeda_motor_kelengkapan_kendaraan,pelanggaran_sepeda_motor_lain_lain,pelanggaran_mobil_kecepatan,pelanggaran_mobil_safety_belt,pelanggaran_mobil_muatan_overload,pelanggaran_mobil_marka_menerus_menyalip,pelanggaran_mobil_melawan_arus,pelanggaran_mobil_melanggar_lampu_lalin,pelanggaran_mobil_mengemudi_tidak_wajar,pelanggaran_mobil_syarat_teknis_layak_jalan,pelanggaran_mobil_tidak_nyala_lampu_malam,pelanggaran_mobil_berbelok_tanpa_isyarat,pelanggaran_mobil_berbalapan_di_jalan_raya,pelanggaran_mobil_melanggar_rambu_berhenti_dan_parkir,pelanggaran_mobil_melanggar_marka_berhenti,pelanggaran_mobil_tidak_patuh_perintah_petugas,pelanggaran_mobil_surat_surat,pelanggaran_mobil_kelengkapan_kendaraan,pelanggaran_mobil_lain_lain,pelanggaran_pejalan_kaki_menyeberang_tidak_pada_tempat,barang_bukti_yg_disita_sim,barang_bukti_yg_disita_stnk,barang_bukti_yg_disita_kendaraan,kendaraan_yang_terlibat_pelanggaran_sepeda_motor,kendaraan_yang_terlibat_pelanggaran_mobil_penumpang,kendaraan_yang_terlibat_pelanggaran_mobil_bus,kendaraan_yang_terlibat_pelanggaran_mobil_barang,kendaraan_yang_terlibat_pelanggaran_kendaraan_khusus,profesi_pelaku_pelanggaran_pns,profesi_pelaku_pelanggaran_karyawan_swasta,profesi_pelaku_pelanggaran_pelajar_mahasiswa,profesi_pelaku_pelanggaran_pengemudi_supir,profesi_pelaku_pelanggaran_tni,profesi_pelaku_pelanggaran_polri,profesi_pelaku_pelanggaran_lain_lain,usia_pelaku_pelanggaran_kurang_dari_15_tahun,usia_pelaku_pelanggaran_16_20_tahun,usia_pelaku_pelanggaran_21_25_tahun,usia_pelaku_pelanggaran_26_30_tahun,usia_pelaku_pelanggaran_31_35_tahun,usia_pelaku_pelanggaran_36_40_tahun,usia_pelaku_pelanggaran_41_45_tahun,usia_pelaku_pelanggaran_46_50_tahun,usia_pelaku_pelanggaran_51_55_tahun,usia_pelaku_pelanggaran_56_60_tahun,usia_pelaku_pelanggaran_diatas_60_tahun,sim_pelaku_pelanggaran_sim_a,sim_pelaku_pelanggaran_sim_a_umum,sim_pelaku_pelanggaran_sim_b1,sim_pelaku_pelanggaran_sim_b1_umum,sim_pelaku_pelanggaran_sim_b2,sim_pelaku_pelanggaran_sim_b2_umum,sim_pelaku_pelanggaran_sim_c,sim_pelaku_pelanggaran_sim_d,sim_pelaku_pelanggaran_sim_internasional,sim_pelaku_pelanggaran_tanpa_sim,lokasi_pelanggaran_pemukiman,lokasi_pelanggaran_perbelanjaan,lokasi_pelanggaran_perkantoran,lokasi_pelanggaran_wisata,lokasi_pelanggaran_industri,lokasi_pelanggaran_status_jalan_nasional,lokasi_pelanggaran_status_jalan_propinsi,lokasi_pelanggaran_status_jalan_kab_kota,lokasi_pelanggaran_status_jalan_desa_lingkungan,lokasi_pelanggaran_fungsi_jalan_arteri,lokasi_pelanggaran_fungsi_jalan_kolektor,lokasi_pelanggaran_fungsi_jalan_lokal,lokasi_pelanggaran_fungsi_jalan_lingkungan,kecelakaan_lalin_jumlah_kejadian,kecelakaan_lalin_jumlah_korban_meninggal,kecelakaan_lalin_jumlah_korban_luka_berat,kecelakaan_lalin_jumlah_korban_luka_ringan,kecelakaan_lalin_jumlah_kerugian_materiil,kecelakaan_barang_bukti_yg_disita_sim,kecelakaan_barang_bukti_yg_disita_stnk,kecelakaan_barang_bukti_yg_disita_kendaraan,profesi_korban_kecelakaan_lalin_pns,profesi_korban_kecelakaan_lalin_karwayan_swasta,profesi_korban_kecelakaan_lalin_pelajar_mahasiswa,profesi_korban_kecelakaan_lalin_pengemudi,profesi_korban_kecelakaan_lalin_tni,profesi_korban_kecelakaan_lalin_polri,profesi_korban_kecelakaan_lalin_lain_lain,usia_korban_kecelakaan_kurang_15,usia_korban_kecelakaan_16_20,usia_korban_kecelakaan_21_25,usia_korban_kecelakaan_26_30,usia_korban_kecelakaan_31_35,usia_korban_kecelakaan_36_40,usia_korban_kecelakaan_41_45,usia_korban_kecelakaan_45_50,usia_korban_kecelakaan_51_55,usia_korban_kecelakaan_56_60,usia_korban_kecelakaan_diatas_60,sim_korban_kecelakaan_sim_a,sim_korban_kecelakaan_sim_a_umum,sim_korban_kecelakaan_sim_b1,sim_korban_kecelakaan_sim_b1_umum,sim_korban_kecelakaan_sim_b2,sim_korban_kecelakaan_sim_b2_umum,sim_korban_kecelakaan_sim_c,sim_korban_kecelakaan_sim_d,sim_korban_kecelakaan_sim_internasional,sim_korban_kecelakaan_tanpa_sim,kendaraan_yg_terlibat_kecelakaan_sepeda_motor,kendaraan_yg_terlibat_kecelakaan_mobil_penumpang,kendaraan_yg_terlibat_kecelakaan_mobil_bus,kendaraan_yg_terlibat_kecelakaan_mobil_barang,kendaraan_yg_terlibat_kecelakaan_kendaraan_khusus,kendaraan_yg_terlibat_kecelakaan_kendaraan_tidak_bermotor,jenis_kecelakaan_tunggal_ooc,jenis_kecelakaan_depan_depan,jenis_kecelakaan_depan_belakang,jenis_kecelakaan_depan_samping,jenis_kecelakaan_beruntun,jenis_kecelakaan_pejalan_kaki,jenis_kecelakaan_tabrak_lari,jenis_kecelakaan_tabrak_hewan,jenis_kecelakaan_samping_samping,jenis_kecelakaan_lainnya,profesi_pelaku_kecelakaan_lalin_pns,profesi_pelaku_kecelakaan_lalin_karyawan_swasta,profesi_pelaku_kecelakaan_lalin_mahasiswa_pelajar,profesi_pelaku_kecelakaan_lalin_pengemudi,profesi_pelaku_kecelakaan_lalin_tni,profesi_pelaku_kecelakaan_lalin_polri,profesi_pelaku_kecelakaan_lalin_lain_lain,usia_pelaku_kecelakaan_kurang_dari_15_tahun,usia_pelaku_kecelakaan_16_20_tahun,usia_pelaku_kecelakaan_21_25_tahun,usia_pelaku_kecelakaan_26_30_tahun,usia_pelaku_kecelakaan_31_35_tahun,usia_pelaku_kecelakaan_36_40_tahun,usia_pelaku_kecelakaan_41_45_tahun,usia_pelaku_kecelakaan_46_50_tahun,usia_pelaku_kecelakaan_51_55_tahun,usia_pelaku_kecelakaan_56_60_tahun,usia_pelaku_kecelakaan_diatas_60_tahun,sim_pelaku_kecelakaan_sim_a,sim_pelaku_kecelakaan_sim_a_umum,sim_pelaku_kecelakaan_sim_b1,sim_pelaku_kecelakaan_sim_b1_umum,sim_pelaku_kecelakaan_sim_b2,sim_pelaku_kecelakaan_sim_b2_umum,sim_pelaku_kecelakaan_sim_c,sim_pelaku_kecelakaan_sim_d,sim_pelaku_kecelakaan_sim_internasional,sim_pelaku_kecelakaan_tanpa_sim,lokasi_kecelakaan_lalin_pemukiman,lokasi_kecelakaan_lalin_perbelanjaan,lokasi_kecelakaan_lalin_perkantoran,lokasi_kecelakaan_lalin_wisata,lokasi_kecelakaan_lalin_industri,lokasi_kecelakaan_lalin_lain_lain,lokasi_kecelakaan_status_jalan_nasional,lokasi_kecelakaan_status_jalan_propinsi,lokasi_kecelakaan_status_jalan_kab_kota,lokasi_kecelakaan_status_jalan_desa_lingkungan,lokasi_kecelakaan_fungsi_jalan_arteri,lokasi_kecelakaan_fungsi_jalan_kolektor,lokasi_kecelakaan_fungsi_jalan_lokal,lokasi_kecelakaan_fungsi_jalan_lingkungan,faktor_penyebab_kecelakaan_manusia,faktor_penyebab_kecelakaan_ngantuk_lelah,faktor_penyebab_kecelakaan_mabuk_obat,faktor_penyebab_kecelakaan_sakit,faktor_penyebab_kecelakaan_handphone_elektronik,faktor_penyebab_kecelakaan_menerobos_lampu_merah,faktor_penyebab_kecelakaan_melanggar_batas_kecepatan,faktor_penyebab_kecelakaan_tidak_menjaga_jarak,faktor_penyebab_kecelakaan_mendahului_berbelok_pindah_jalur,faktor_penyebab_kecelakaan_berpindah_jalur,faktor_penyebab_kecelakaan_tidak_memberikan_lampu_isyarat,faktor_penyebab_kecelakaan_tidak_mengutamakan_pejalan_kaki,faktor_penyebab_kecelakaan_lainnya,faktor_penyebab_kecelakaan_alam,faktor_penyebab_kecelakaan_kelaikan_kendaraan,faktor_penyebab_kecelakaan_kondisi_jalan,faktor_penyebab_kecelakaan_prasarana_jalan,faktor_penyebab_kecelakaan_rambu,faktor_penyebab_kecelakaan_marka,faktor_penyebab_kecelakaan_apil,faktor_penyebab_kecelakaan_perlintasan_ka_palang_pintu,waktu_kejadian_kecelakaan_00_03,waktu_kejadian_kecelakaan_03_06,waktu_kejadian_kecelakaan_06_09,waktu_kejadian_kecelakaan_09_12,waktu_kejadian_kecelakaan_12_15,waktu_kejadian_kecelakaan_15_18,waktu_kejadian_kecelakaan_18_21,waktu_kejadian_kecelakaan_21_24,kecelakaan_lalin_menonjol_jumlah_kejadian,kecelakaan_lalin_menonjol_korban_meninggal,kecelakaan_lalin_menonjol_korban_luka_berat,kecelakaan_lalin_menonjol_korban_luka_ringan,kecelakaan_lalin_menonjol_materiil,kecelakaan_lalin_tunggal_jumlah_kejadian,kecelakaan_lalin_tunggal_korban_meninggal,kecelakaan_lalin_tunggal_korban_luka_berat,kecelakaan_lalin_tunggal_korban_luka_ringan,kecelakaan_lalin_tunggal_materiil,kecelakaan_lalin_tabrak_pejalan_kaki_jumlah_kejadian,kecelakaan_lalin_tabrak_pejalan_kaki_korban_meninggal,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_berat,kecelakaan_lalin_tabrak_pejalan_kaki_korban_luka_ringan,kecelakaan_lalin_tabrak_pejalan_kaki_materiil,kecelakaan_lalin_tabrak_lari_jumlah_kejadian,kecelakaan_lalin_tabrak_lari_korban_meninggal,kecelakaan_lalin_tabrak_lari_korban_luka_berat,kecelakaan_lalin_tabrak_lari_korban_luka_ringan,kecelakaan_lalin_tabrak_lari_materiil,kecelakaan_lalin_tabrak_sepeda_motor_jumlah_kejadian,kecelakaan_lalin_tabrak_sepeda_motor_korban_meninggal,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_berat,kecelakaan_lalin_tabrak_sepeda_motor_korban_luka_ringan,kecelakaan_lalin_tabrak_sepeda_motor_materiil,kecelakaan_lalin_tabrak_roda_empat_jumlah_kejadian,kecelakaan_lalin_tabrak_roda_empat_korban_meninggal,kecelakaan_lalin_tabrak_roda_empat_korban_luka_berat,kecelakaan_lalin_tabrak_roda_empat_korban_luka_ringan,kecelakaan_lalin_tabrak_roda_empat_materiil,kecelakaan_lalin_tabrak_tidak_bermotor_jumlah_kejadian,kecelakaan_lalin_tabrak_tidak_bermotor_korban_meninggal,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_berat,kecelakaan_lalin_tabrak_tidak_bermotor_korban_luka_ringan,kecelakaan_lalin_tabrak_tidak_bermotor_materiil,kecelakaan_lalin_perlintasan_ka_jumlah_kejadian,kecelakaan_lalin_perlintasan_ka_berpalang_pintu,kecelakaan_lalin_perlintasan_ka_tidak_berpalang_pintu,kecelakaan_lalin_perlintasan_ka_korban_luka_ringan,kecelakaan_lalin_perlintasan_ka_korban_luka_berat,kecelakaan_lalin_perlintasan_ka_korban_meninggal,kecelakaan_lalin_perlintasan_ka_materiil,kecelakaan_transportasi_kereta_api,kecelakaan_transportasi_laut_perairan,kecelakaan_transportasi_udara,penlu_melalui_media_cetak,penlu_melalui_media_elektronik,penlu_melalui_media_sosial,penlu_melalui_tempat_keramaian,penlu_melalui_tempat_istirahat,penlu_melalui_daerah_rawan_laka_dan_langgar,penyebaran_pemasangan_spanduk,penyebaran_pemasangan_leaflet,penyebaran_pemasangan_sticker,penyebaran_pemasangan_bilboard,polisi_sahabat_anak,cara_aman_sekolah,patroli_keamanan_sekolah,pramuka_bhayangkara_krida_lalu_lintas,police_goes_to_campus,safety_riding_driving,forum_lalu_lintas_angkutan_umum,kampanye_keselamatan,sekolah_mengemudi,taman_lalu_lintas,global_road_safety_partnership_action,giat_lantas_pengaturan,giat_lantas_penjagaan,giat_lantas_pengawalan,giat_lantas_patroli,arus_mudik_jumlah_bus_keberangkatan,arus_mudik_jumlah_penumpang_keberangkatan,arus_mudik_jumlah_bus_kedatangan,arus_mudik_jumlah_penumpang_kedatangan,arus_mudik_total_terminal,arus_mudik_total_bus_keberangkatan,arus_mudik_penumpang_keberangkatan,arus_mudik_total_bus_kedatangan,arus_mudik_penumpang_kedatangan,arus_mudik_kereta_api_total_stasiun,arus_mudik_kereta_api_total_penumpang_keberangkatan,arus_mudik_kereta_api_total_penumpang_kedatangan,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r4,arus_mudik_pelabuhan_jumlah_kendaraan_keberangkatan_r2,arus_mudik_pelabuhan_jumlah_penumpang_keberangkatan,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r4,arus_mudik_pelabuhan_jumlah_kendaraan_kedatangan_r2,arus_mudik_pelabuhan_jumlah_penumpang_kedatangan,arus_mudik_total_pelabuhan,arus_mudik_pelabuhan_kendaraan_keberangkatan,arus_mudik_pelabuhan_kendaraan_kedatangan,arus_mudik_pelabuhan_total_penumpang_keberangkatan,arus_mudik_pelabuhan_total_penumpang_kedatangan,arus_mudik_bandara_jumlah_penumpang_keberangkatan,arus_mudik_bandara_jumlah_penumpang_kedatangan,arus_mudik_total_bandara,arus_mudik_bandara_total_penumpang_keberangkatan,arus_mudik_bandara_total_penumpang_kedatangan,prokes_covid_teguran_gar_prokes,prokes_covid_pembagian_masker,prokes_covid_sosialisasi_tentang_prokes,prokes_covid_giat_baksos,penyekatan_motor,penyekatan_mobil_penumpang,penyekatan_mobil_bus,penyekatan_mobil_barang,penyekatan_kendaraan_khusus,rapid_test_antigen_positif,rapid_test_antigen_negatif' => function (Builder $query) use ($tanggal) {
            $query->whereRaw("DATE(created_at) = ?", [$tanggal]);
        }])
        ->where('rencana_operasi_id', $operationId)
        ->where('tanggal', $tanggal)
        ->get();
    }
}

if (! function_exists('zeroIfNull')) {
    function zeroIfNull($data) {
        if(empty($data) || is_null($data)) {
            return 0;
        } else {
            return $data;
        }
    }
}

if (! function_exists('summary')) {
    function summary($data) {
        return array_sum($data);
    }
}

if (! function_exists('summaryTotalPrev')) {
    function summaryTotalPrev($key, $val) {
        // if(empty(session('group_satu'))) {
        //     $bulkData = [];
        //     array_push($bulkData, $data);
        //     session(['group_satu' => $bulkData]);
        //     logger("KOSONG DAN ISI : ".$data);
        // } else {
        //     $existingSession = session('group_satu');
        //     array_push($existingSession, $data);
        //     logger("ADA DAN ISI : ".$data);
        // }
        // session('group_satu', $data);
    }
}

if (! function_exists('summaryTotalCurrent')) {
    function summaryTotalCurrent($data) {
        $empty = [];
        array_push($empty, $data);
    }
}