<?php

namespace App\Models\CK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
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
        'wges1',
        'wges2',
        'wges3',
        'wges5',
        'wges6',
        'wges7',
        'wges9',
        'wges10',
        'wges14',
        'wges16',
        'status'
    ];

    public function createTimeHour() {
        return $this->created_at->format('H:00');
    }

    public function returnData($ges) {
        if($this->$ges == -100) {
            return '###';
        }
        return $this->$ges;
    }

}
