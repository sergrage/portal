<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\CK\Pbr;
use App\Models\CK\Power;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class PowerChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $pbrs = Pbr::whereDate('created_at', Carbon::today())->get();
        $power = Power::whereDate('created_at', Carbon::today())->get();
        $ges1 = $pbrs->pluck('ges1')->toArray();
        $power1 = $power->pluck('ges1')->toArray();

        return Chartisan::build()
            ->labels(['00', '01', '02', '03', '04', '05','06', '07', '08','09', '10', '11','12', '13', '14','15', '16', '17', '18','19', '20', '21', '22', '23'])
            ->dataset('ПБР', $ges1)
            ->dataset('Генерация',  $power1);
    }
}
