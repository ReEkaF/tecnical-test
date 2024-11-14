<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'id_mine';
    protected $fillable = [
        'location'
    ];
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function Driver()
    {
        return $this->hasMany(Driver::class);
    }
}
