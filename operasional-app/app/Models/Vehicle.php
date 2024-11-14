<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class Vehicle extends Model
{
    use Notifiable,HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_vehicle';
    protected $fillable = [
        'vehicle_name',
        'vehicle_type',
        'vehicle_license',
        'company_id',
        'fuel_type',
        'fuel_capacity',
        'mine_id',
    ];
    public function booking()
    {
        return $this->hasMany(Booking::class,);
    }
    public function vehicleService()
    {
        return $this->hasMany(VehicleService::class);
    }
}
