<?php

namespace App\Models;

use App\Models\Offer;
use App\Models\Cmodel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['price_per_day','production_date','fuel','nbr_places','description'];

    public function cmodel() {
        return $this->belongsTo(Cmodel::class);
    }

    public function offers(){
        return $this->hasMany(Offer::class);
    }
}
