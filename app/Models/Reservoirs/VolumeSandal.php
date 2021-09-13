<?php

namespace App\Models\Reservoirs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolumeSandal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark',
        'volume'
    ];
}
