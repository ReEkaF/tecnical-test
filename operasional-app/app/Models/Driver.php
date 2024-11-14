<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
class Driver extends Model
{
    //
    use Notifiable,HasFactory;

    protected $primaryKey = 'id_driver';
    public $timestamps = false;
    protected $fillable = [
        'driver_name',
        'driver_address',
        'driver_contact',
    ];
    public function booking()
    {
        return $this->hasMany(Booking::class,);
    }
}
