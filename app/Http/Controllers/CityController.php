<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = City::pluck('name');
        return response()->json(['cities'=>$cities]);
    }
}
