<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleService extends Model
{
    //

    protected $primaryKey = 'id_vehicle_service';
    protected $fillable = [
        'vehicle_id',
        'start_date',
        'end_date',
        'status',
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id','id_vehicle');
    }
}
