<?php

namespace App\Models\CK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Askue extends Model
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
        'tec13',
        'mges',
        'status'
    ];

    public function returnData($ges) {
        if($this->$ges == -100) {
            return '###';
        }
        return round($this->$ges, 1);
    }
}
