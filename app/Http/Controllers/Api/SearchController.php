<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\County;
use App\Models\District;

class SearchController extends Controller
{
    // 搜尋 County, District
    public function search()
    {

        $data = [];
        $countries = County::all();
        foreach ($countries as $key => $value) {
            $data_temp = [
                'indexcode' => $value->id,
                'name' => $value->name,
                's' => [],
            ];

            $district = District::where('county_id', $value->id)->get();
            foreach($district as $key2 => $value2){
                $data_temp2 = [
                    'indexcode' => $value2->id,
                    'name' => $value2->name,
                ];
                array_push($data_temp['s'], $data_temp2);
            }

            array_push($data, $data_temp);
        }

        return response()->json($data);
    }
}
