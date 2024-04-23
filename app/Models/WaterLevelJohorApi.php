<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterLevelJohorApi extends Model
{
    use HasFactory;

    protected $table = 'water_level_last7days_johor';

    public function getDataByDistrict($district)
    {
        $waterleveljohor = WaterLevelJohorApi::where('district', $district)->paginate(10);
        return $waterleveljohor;
    }

    public function getDataByDistrictByMainBasin($district, $main_basin)
    {
        $waterleveljohor = WaterLevelJohorApi::where([
            'district'=> $district,
            'mainbasin'=> $main_basin
        ])->paginate(10);
        return $waterleveljohor;
    }

    public function getDataByDistrictByMainBasinBySubBasin($district, $main_basin, $sub_basin)
    {
        $waterleveljohor = WaterLevelJohorApi::where([
            'district'=> $district,
            'mainbasin'=> $main_basin,
            'subbasin'=> $sub_basin
        ])->paginate(10);
        return $waterleveljohor;
    }

    public function getWaterLevelJohorDistrictList($state)
    {
        $waterleveljohordistrictlist = WaterLevelJohorApi::distinct()->pluck('district');
        return $waterleveljohordistrictlist;
    }

    public function getWaterLevelJohorMainBasinList($state, $district)
    {
        $waterleveljohormainbasinlist = WaterLevelJohorApi::where('district', $district)->distinct()->pluck('mainbasin');
        return $waterleveljohormainbasinlist;
    }

    public function getWaterLevelJohorsubBasinList($state, $district, $mainbasin)
    {
        $waterleveljohorsubbasinlist = WaterLevelJohorApi::where('district', $district)->where('mainbasin', $mainbasin)->distinct()->pluck('subbasin');
        return $waterleveljohorsubbasinlist;
    }
}
