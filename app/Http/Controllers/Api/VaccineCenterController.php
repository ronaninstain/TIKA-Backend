<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VaccinationCenter;
use Illuminate\Http\Request;

class VaccineCenterController extends Controller
{
    public function vaccinationCenters(Request $request){

        $centers = VaccinationCenter::where('enabled', 1)->where('upazila_id', $request->upazila_id)->get();
        return response()->json($centers);
    }
}
