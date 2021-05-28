<?php

namespace App\Models\Reservoirs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservoirsStatisic extends Model
{
    use HasFactory;

    protected $fillable = [
    'reservoirGirvasMax', 'reservoirGirvasMin', 'reservoirGirvasAvg',
    'reservoirSandalMax', 'reservoirSandalMin', 'reservoirSandalAvg',
    'reservoirSegozeroMax', 'reservoirSegozeroMin', 'rservoirSegozeroAvg',
    'reservoirUshkozeroMax', 'reservoirUshkozeroMin', 'reservoirUshkozeroAvg',
    'reservoirVigozeroMax', 'reservoirVigozeroMin', 'reservoirVigozeroAvg',
     'created_at'];
    public $timestamps = false;

    public $dates = ['created_at'];
}
