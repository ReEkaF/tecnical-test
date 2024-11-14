<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Company extends Model
{
    //
    public $timestamps = false;
    protected $primaryKey = 'id_company';
    protected $fillable = [
        'company_name',
        'company_address',
        'company_contact',
    ];
}
