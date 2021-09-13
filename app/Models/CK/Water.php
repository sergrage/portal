<?php

namespace App\Models\CK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

        protected $fillable = [
        'segozero',
        'pl21',
        'pl25',
        'pl27',
        'idleGes1',
        'idleGes2',
        'idleGes5',
        'idleGes6',
        'idleGes7',
        'idleGes9',
        'idleGes10',
        'idleGes14',
        'idleGes16',
        'oldBed',
        'ges2Reservoir',
        'status'
    ];
}

