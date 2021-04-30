<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgms extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'temperature',
        'userName',
        'created_at'
    ];

    public $dates = ['created_at'];
}
