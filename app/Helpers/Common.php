<?php
namespace App\Helpers;
use DB;
use Auth;
use DateTime;
use DateTimeZone;
class Common
{
    public static function InsertDBDateNow() {
        return date('Y-m-d H:i:s');
    }
      
     public static function convertObjectToArray($arrayData) {
        $convertToArray = $arrayData;
        for ($i = 0, $c = count($convertToArray); $i < $c; ++$i) {
            $convertToArray[$i] = (array)$convertToArray[$i];
        }
        return $convertToArray;
    }
    public static function getAllEnumValues($tableName, $enumColumn) {
        $enum_values = array();
        if (!empty($tableName) && !empty($enumColumn)) {
            $enums = DB::select("SHOW COLUMNS FROM $tableName LIKE '%$enumColumn%' ");
            $enums = Common::convertObjectToArray($enums);
            
            $enum_values = $enums[0]['Type'];
            $enum_values = substr($enum_values, strpos($enum_values, "(") + 2, strpos($enum_values, ")") - strpos($enum_values, "(") - 3);
            $enum_values = explode("','", $enum_values);
            $result_set = $enum_values;
            return $result_set;
        }
    }

    public static function convertToUserTimeZone($date, $userTimeZone = 'Asia/Kolkata', $serverTimeZone = 'Asia/Kolkata', $format = 'H:i A m/d/Y')
    {   
        $dateTime = new DateTime($date, new DateTimeZone($serverTimeZone));
        $dateTime->setTimezone(new DateTimeZone($userTimeZone));
        return $dateTime->format($format);
    }
}
