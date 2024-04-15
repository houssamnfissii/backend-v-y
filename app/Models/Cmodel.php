<?php

namespace App\Models;

use App\Models\Car;
use App\Models\Cbrand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cmodel extends Model
{
    use HasFactory;

    protected $fillable=['name'];
     
    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function cbrand(){
        return $this->belongsTo(Cbrand::class);
    }
}
