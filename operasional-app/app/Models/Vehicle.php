<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Vehicle extends Model
{
    //
    protected static function boot()
    {
        parent::boot(); // Pastikan memanggil parent::boot()
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $primaryKey = 'id_vehicle';
    protected $fillable = [
        'vehicle_name',
        'vehicle_type',
        'vehicle_license',
        'company_id',
        'fuel_type',
        'fuel_capacity',
    ];
}
