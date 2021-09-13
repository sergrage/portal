<?php

namespace App\Models\CK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

        protected $fillable = [
        'ges1',
        'ges2',
        'ges3',
        'ges5',
        'ges6',
        'ges7',
        'ges9',
        'ges10',
        'ges14',
        'ges16',
        'status'
    ];
}
