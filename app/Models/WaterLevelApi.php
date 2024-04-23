<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WaterLevelJohorApi;

class WaterLevelApi extends Model
{
    use HasFactory;

    public static function getWaterLevelJohorData($state, $district, $main_basin, $sub_basin)
    {
        $waterLevelJohorApi = new WaterLevelJohorApi();
        if (isset($state) && isset($district) && isset($main_basin) && isset($sub_basin))
        {
            $waterleveljohor = $waterLevelJohorApi->getDataByDistrictByMainBasinBySubBasin($district, $main_basin, $sub_basin);
            return $waterleveljohor;
        }
        if (isset($state) && isset($district) && isset($main_basin))
        {
            $waterleveljohor = $waterLevelJohorApi->getDataByDistrictByMainBasin($district, $main_basin);
            return $waterleveljohor;
        }
        if (isset($state) && isset($district))
        {
            $waterleveljohor = $waterLevelJohorApi->getDataByDistrict($district);
            return $waterleveljohor;
        }
        // In Experiment
        // if (isset($state)) {
        //     $waterleveljohor = WaterLevelJohorApi::get();
        //     return $waterleveljohor;
        // }
    }
    
    public static function getWaterLevelJohorDistrictList($state)
    {
        $waterLevelJohorApi = new WaterLevelJohorApi();
        $waterleveljohordistrictlist = $waterLevelJohorApi->getWaterLevelJohorDistrictList($state);
        return $waterleveljohordistrictlist;
    }

    public static function getWaterLevelJohorMainBasinList($state, $district)
    {
        $waterLevelJohorApi = new WaterLevelJohorApi();
        $waterleveljohormainbasinlist = $waterLevelJohorApi->getWaterLevelJohorMainBasinList($state, $district);
        return $waterleveljohormainbasinlist;
    }

    public static function getWaterLevelJohorSubBasinList($state, $district, $mainbasin)
    {
        $waterLevelJohorApi = new WaterLevelJohorApi();
        $waterleveljohorsubbasinlist = $waterLevelJohorApi->getWaterLevelJohorsubBasinList($state, $district, $mainbasin);
        return $waterleveljohorsubbasinlist;
    }
}
