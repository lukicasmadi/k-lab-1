<?php

use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use App\Models\PoldaSubmited;
use App\Models\RencanaOperasi;

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
        return Carbon::parse($timestamp)->isoFormat('dddd, D MMMM Y');
    }
}

if (! function_exists('indonesiaShortDayAndDate')) {
    function indonesiaShortDayAndDate($timestamp) {
        return Carbon::parse($timestamp)->isoFormat('D MMM Y');
    }
}

if (! function_exists('IdFullDateOnly')) {
    function IdFullDateOnly($timestamp) {
        return Carbon::parse($timestamp)->isoFormat('dddd, D MMMM Y');
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

        if($poldaName == 'Papua') {   // Array ke 0
            $alpha = ['C', 'D'];
        }

        if($poldaName == 'Papua Barat') {   // Array ke 1
            $alpha = ['E', 'F'];
        }

        if($poldaName == 'Maluku Utara') {   // Array ke 2
            $alpha = ['G', 'H'];
        }

        if($poldaName == 'Maluku') {   // Array ke 3
            $alpha = ['I', 'J'];
        }

        if($poldaName == 'Sulawesi Barat') {   // Array ke 4
            $alpha = ['K', 'L'];
        }

        if($poldaName == 'Sulawesi Selatan') {   // Array ke 5
            $alpha = ['M', 'N'];
        }

        if($poldaName == 'Sulawesi Tenggara') {   // Array ke 6
            $alpha = ['O', 'P'];
        }

        if($poldaName == 'Sulawesi Tengah') {  // Array ke 7
            $alpha = ['Q', 'R'];
        }

        if($poldaName == 'Gorontalo') {   // Array ke 8
            $alpha = ['S', 'T'];
        }

        if($poldaName == 'Sulawesi Utara') {   // Array ke 9
            $alpha = ['U', 'V'];
        }

        if($poldaName == 'Kalimantan Selatan') {   // Array ke 10
            $alpha = ['W', 'X'];
        }

        if($poldaName == 'Kalimantan Utara') {   // Array ke 11
            $alpha = ['Y', 'Z'];
        }

        if($poldaName == 'Kalimantan Timur') {   // Array ke 12
            $alpha = ['AA', 'AB'];
        }

        if($poldaName == 'Kalimantan Tengah') {   // Array ke 13
            $alpha = ['AC', 'AD'];
        }

        if($poldaName == 'Kalimantan Barat') {   // Array ke 14
            $alpha = ['AE', 'AF'];
        }

        if($poldaName == 'Nusa Tenggara Timur') {   // Array ke 15
            $alpha = ['AG', 'AH'];
        }

        if($poldaName == 'Nusa Tenggara Barat') {   // Array ke 16
            $alpha = ['AI', 'AJ'];
        }

        if($poldaName == 'Bali') {   // Array ke 17
            $alpha = ['AK', 'AL'];
        }

        if($poldaName == 'Jawa Timur') {   // Array ke 18
            $alpha = ['AM', 'AN'];
        }

        if($poldaName == 'Daerah Istimewa Yogyakarta') {   // Array ke 19
            $alpha = ['AO', 'AP'];
        }

        if($poldaName == 'Jawa Tengah') {   // Array ke 20
            $alpha = ['AQ', 'AR'];
        }

        if($poldaName == 'Banten') {   // Array ke 21
            $alpha = ['AS', 'AT'];
        }

        if($poldaName == 'Jawa Barat') {   // Array ke 22
            $alpha = ['AU', 'AV'];
        }

        if($poldaName == 'Metropolitan Jakarta Raya') {   // Array ke 23
            $alpha = ['AW', 'AX'];
        }

        if($poldaName == 'Lampung') {   // Array ke 24
            $alpha = ['AY', 'AZ'];
        }

        if($poldaName == 'Bengkulu') {   // Array ke 25
            $alpha = ['BA', 'BB'];
        }

        if($poldaName == 'Sumatera Selatan') {   // Array ke 26
            $alpha = ['BC', 'BD'];
        }

        if($poldaName == 'Kepulauan Bangka Belitung') {   // Array ke 27
            $alpha = ['BE', 'BF'];
        }

        if($poldaName == 'Kepulauan Riau') {   // Array ke 28
            $alpha = ['BG', 'BH'];
        }

        if($poldaName == 'Riau') {   // Array ke 29
            $alpha = ['BI', 'BJ'];
        }

        if($poldaName == 'Jambi') {   // Array ke 30
            $alpha = ['BK', 'BL'];
        }

        if($poldaName == 'Sumatera Barat') {   // Array ke 31
            $alpha = ['BM', 'BN'];
        }

        if($poldaName == 'Sumatera Utara') {   // Array ke 32
            $alpha = ['BO', 'BP'];
        }

        if($poldaName == 'Aceh') {   // Array ke 33
            $alpha = ['BQ', 'BR'];
        }

        return $alpha;
    }
}