<?php

namespace App\Http\Controllers\Api;
use App\Models\WaterLevelApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaterLevelApiController extends Controller
{
    public function getWaterLevelData(Request $request)
    {
        $state = $request->state;
        $district = $request->district;
        $main_basin = $request->main_basin;
        $sub_basin = $request->sub_basin;
        
        if ($state == 'Johor')
        {
            $waterLevelApi = WaterLevelApi::getWaterLevelJohorData($state, $district, $main_basin, $sub_basin);
            return response()->json($waterLevelApi);
        }
    }

    public function getWaterLevelDistrictList(Request $request)
    {
        $state = $request->state;
        if ($state == 'Johor') {
            $getWaterLevelDistrictList = WaterLevelApi::getWaterLevelJohorDistrictList($state);
            return response()->json([
                'district'=>$getWaterLevelDistrictList
            ]);
        }
    }

    public function getWaterLevelMainBasinList(Request $request)
    {
        $state = $request->state;
        $district = $request->district;

        if ($state == 'Johor') {
            $getWaterLevelMainBasinList = WaterLevelApi::getWaterLevelJohorMainBasinList($state, $district);
            return response()->json([
                'mainbasin'=>$getWaterLevelMainBasinList
            ]);
        }
    }

    public function getWaterLevelSubBasinList(Request $request)
    {
        $state = $request->state;
        $district = $request->district;
        $mainbasin = $request->mainbasin;

        if ($state == 'Johor') {
            $getWaterLevelSubBasinList = WaterLevelApi::getWaterLevelJohorSubBasinList($state, $district, $mainbasin);
            return response()->json([
                'subbasin'=>$getWaterLevelSubBasinList
            ]);
        }
    }
}
