<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Cbrand;
use App\Models\Cmodel;
use App\Models\Offer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        // return CarResource::collection($cars);
        return response()->json(['data'=>$cars]);
    }

    public function car_offers()
    {
        $offers = Offer::whereNotNull('car_id')->with('images')->get();
        $cars = [];
        foreach ($offers as $offer) {
            $car = Car::find($offer->car_id);
            $model = Cmodel::find($car->cmodel_id);
            $brand = Cbrand::find($model->cbrand_id);
            $cars[] = ['car' => $car,'model'=> $model,'brand'=>$brand ,'offer' => $offer];
        }
        return response()->json(['data' => ['cars' => $cars]])->header('Content-Type', 'application/json');
    }

    public function show($id){
        $car = Car::findOrFail($id);
        $model = Cmodel::find($car->cmodel_id);
            $brand = Cbrand::find($model->cbrand_id);
        $offer = Offer::where('car_id',$id)->with('images')->get();
        return response()->json(['car'=>$car,'model'=> $model,'brand'=>$brand ,'offer'=>$offer]);
    }
}
