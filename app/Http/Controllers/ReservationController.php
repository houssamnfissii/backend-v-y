<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    // public function store(Request $request)
    // {
    //     $id = $request->id;
    //     $location = $request->location;
    //     $pickuptime = Carbon::parse($request->pickuptime);
    //     $dropofftime = Carbon::parse($request->dropofftime);

    //     $car_exists = Reservation::where('car_id', $id)
    //         ->where(function ($query) use ($pickuptime, $dropofftime) {
    //             $query->where(function ($q) use ($pickuptime) {
    //                 $q->where('start_date', '<=', $pickuptime)
    //                     ->where('end_date', '>=', $pickuptime);
    //             })->orWhere(function ($q) use ($dropofftime) {
    //                 $q->where('start_date', '<=', $dropofftime)
    //                     ->where('end_date', '>=', $dropofftime);
    //             });
    //         })
    //         ->exists();
    //     if($car_exists){
    //         return response()->json(['message' => 'La voiture est déjà réservée'], Response::HTTP_CONFLICT);
    //     }
    //     $reservation = Reservation::create([
    //         'start_date' => $pickuptime,
    //         'end_date' => $dropofftime,
    //         'car_pick_up_location' => $location,
    //         'car_drop_off_location' => $location,
    //         'car_id' => $id,
    //         'client_id' => 1, //auth()->id()
    //     ]);
    //     return response()->json(['message'=>'Réservation ajoutée','reservation'=>$reservation]);
    // }
    public function store(Request $request)
    {
        $id = $request->id;
        $location = $request->location;
        $pickuptime = Carbon::parse($request->pickuptime);
        $dropofftime = Carbon::parse($request->dropofftime);

        $car_exists = Reservation::where('car_id', $id)
            ->where(function ($query) use ($pickuptime, $dropofftime) {
                $query->where(function ($q) use ($pickuptime) {
                    $q->where('start_date', '<=', $pickuptime)
                        ->where('end_date', '>=', $pickuptime);
                })->orWhere(function ($q) use ($dropofftime) {
                    $q->where('start_date', '<=', $dropofftime)
                        ->where('end_date', '>=', $dropofftime);
                });
            })
            ->exists();
        if($car_exists){
            return response()->json(['message' => 'La voiture est déjà réservée'], Response::HTTP_CONFLICT);
        }

        // Utilisation de la méthode insert pour insérer les données directement dans la table
        $reservationId = Reservation::insertGetId([
            'start_date' => $pickuptime,
            'end_date' => $dropofftime,
            'car_pick_up_location' => $location,
            'car_drop_off_location' => $location,
            'car_id' => $id,
            'client_id' => 1, //auth()->id()
            'created_at' => now(), // Ajoute la date et l'heure actuelles comme valeur par défaut pour le champ created_at
            'updated_at' => now(), // Ajoute la date et l'heure actuelles comme valeur par défaut pour le champ updated_at
        ]);

        // Recherche de la réservation nouvellement insérée
        $reservation = Reservation::find($reservationId);

        return response()->json(['message'=>'Réservation ajoutée','reservation'=>$reservation]);
    }
}
