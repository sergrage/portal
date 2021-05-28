<?php

namespace App\Models\Reservoirs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservoirSegozero extends Model
{
    use HasFactory;
    protected $fillable = ['waterLevel', 'created_at'];
    public $timestamps = false;

    public $dates = ['created_at'];
}
