<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Booking extends Model
{
    //
    
    protected $primaryKey = 'id_booking';
    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'start_usage_date',
        'end_usage_date',
        'created_by',
        'admin_center_id',
        'status',
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id' , 'id_vehicle');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id_driver');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id_admin');
    }
    public function historyVehicle()
    {
        return $this->hasMany(HistoryVehicle::class);
    }
}
