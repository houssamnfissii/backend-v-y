<?php

namespace App\Models;

use App\Models\City;
use App\Models\Cuisine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable=['name','description','nbr_places','latitude','longitude'];

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function cuisine(){
        return $this->belongsTo(Cuisine::class);
    }
}
