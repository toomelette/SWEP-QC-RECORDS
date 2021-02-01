<?php

namespace App\Swep\Helpers;

use App\Swep\Helpers\__static;
use Carbon\Carbon;


class __dataType{




    public static function string_to_boolean($value){

       if($value == 'true'){ return true; }
       elseif($value == 'false'){ return false; }

    }
    





    public static function boolean_to_string($value){

       if($value == true){ return 'true'; }
       elseif($value == false){ return 'false'; }

    }






    public static function date_parse($value, $format = 'Y-m-d'){

        $date = null;

        if($value != null || $value != ''){
          $date = Carbon::parse($value)->format($format);
        }

        return $date;

    }






    public static function time_parse($value, $format = 'H:i:s'){

      $time = null;

      if($value != null || $value != ''){
        $time = date($format, strtotime($value));
      }

      return $time;

    }






    public static function string_to_num($value){

      $num = null;

      if($value != null || $value != ''){
        $num = str_replace(',', '', $value);
      }

      return $num;

    }






    public static function construct_time_HM($hrs, $mins){

        while ($mins >= 60) {
          
          $hrs = $hrs + 1;
          $mins = $mins - 60;

        }    

        return sprintf("%02d", $hrs) .':'. sprintf("%02d", $mins);

    }






    public static function date_scope($from, $to){

      $date_scope = "";

      if (!empty($from) && !empty($to)) {
          
        $f = self::date_parse($from, 'F d, Y');
        $mf = self::date_parse($from, 'F');
        $df = self::date_parse($from, 'd');
        $yf = self::date_parse($from, 'Y');
        $mdf = self::date_parse($from, 'F d');
        $t = self::date_parse($to, 'F d, Y');
        $mt = self::date_parse($to, 'F');
        $dt = self::date_parse($to, 'd');
        $yt = self::date_parse($to, 'Y');
        $mdt = self::date_parse($to, 'M d');

        if($mf == $mt && $yf == $yt){
          if($mdf == $mdt){
            $date_scope =  $mf .' '. $df .', '. $yf;
          }else{
            $date_scope = $mf .' '. $df .' - '. $dt .', '. $yt;
          }
        }else{
          $date_scope = $f .' - '. $t;
        }

      }

      return $date_scope;

    }




    public static function convert_bytes($bytes, $unit = "", $decimals = 2){

      $units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4, 
      'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);

      $value = 0;

      if ($bytes > 0) {

       if (!array_key_exists($unit, $units)) {

           $pow = floor(log($bytes)/log(1024));
           $unit = array_search($pow, $units);
       }

       $value = ($bytes/pow(1024,floor($units[$unit])));

      }

      if (!is_numeric($decimals) || $decimals < 0) {
        $decimals = 2;
      }

      return sprintf('%.' . $decimals . 'f '.$unit, $value);

    }






}