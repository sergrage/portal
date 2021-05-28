<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
    use HasFactory;

    protected $fillable = ['girvas', 'sandal', 'segozero' , 'vigozero', 'ushkozero'];
}
