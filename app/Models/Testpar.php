<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testpar extends Model
{
    use HasFactory;

    protected $fillable = [
        'par',
        'created_at'
    ];

}
