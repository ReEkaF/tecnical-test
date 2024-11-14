<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryVehicle extends Model
{
    //
    protected $primaryKey = 'id_history_vehicle';
    protected $fillable = [
        'booking_id',
        'fuel_used',
        'distance',
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id','id_booking');
    }

}
