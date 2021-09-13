<?php

namespace App\Models\Reservoirs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolumeSegozero extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark',
        'volume'
    ];
}
