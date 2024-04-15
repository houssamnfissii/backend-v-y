<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\Offer;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['start_date','end_date','nbr_people'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
}
