<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lietotajs extends Model
{
    // actual database table uses plural form
    protected $table = 'lietotaji';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'vards',
        'loma',
    ];
}
