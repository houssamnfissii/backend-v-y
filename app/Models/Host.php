<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\User;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Host extends Model
{
    use HasFactory;
    protected $fillable = ['CIN','first_name','last_name','address','company_name','telephone','birth_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }
}
