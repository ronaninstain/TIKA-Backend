<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Divission;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function divisions(){
        $divisions = Divission::where('enabled', 1)->get();

        return response()->json($divisions);
    }
}
