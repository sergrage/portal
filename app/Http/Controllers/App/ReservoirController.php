<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\YearResource;
use App\Models\Reservoirs\ReservoirGirvas;
use App\Models\Reservoirs\ReservoirSandal;
use App\Models\Reservoirs\ReservoirSegozero;
use App\Models\Reservoirs\ReservoirUshkozero;
use App\Models\Reservoirs\ReservoirVigozero;
use App\Models\Year;
use App\Models\Reservoirs\ReservoirsStatistic;
use Carbon\Carbon;


class ReservoirController extends Controller
{
    public function index()
    {
    	return view('app.reservoirs.index');
    }

    public function reservoirJSON(Request $request)
    {
    	// return response()->json(['result' => $request]);
    	$date = $request->get('dateTo') ? $request->get('dateTo') : Carbon::now()->year;
    	$reservoir = $request->get('reservoir') ? $request->get('reservoir') : 'ReservoirGirvas';

    	$className = "App\Models\Reservoirs\\" . $reservoir;

    	$reservoir = $className::whereYear('created_at', $date)->get();

    	$countOfCgmsCollection = $reservoir->count();

        
    	// тут дополняем коллекцию до 372
        if($countOfCgmsCollection != 372) {
            $сountOfEmptyDates = 372 - $countOfCgmsCollection;

            for($i=0; $i< $сountOfEmptyDates ; $i++) {
                $r = new ReservoirGirvas;
                $r->waterLevel = -100;
                $reservoir->push($r);
            }

        }

        $result = [];
        $res= [];
        $index = 0;
        $arr = [];
        
    
        for ($i = 0; $i <= 371; $i++) {
            $in = intdiv($i , 12) +31 * ($i - 12 * intdiv($i , 12));
            $result[] =  $in;
        }
      

        foreach($result as $r) {

            if(($index+1) % 12 !== 0) {
                $arr[] = $reservoir[$r]->waterLevel;
            } else {
                $arr[] =$reservoir[$r]->waterLevel; 
                $res[] = $arr;
                $arr = []; 
            }
                $index++;
        }

        $years = YearResource::collection(Year::all());
        $leaf = false;
        return response()->json(['result' => $res, 'years' => $years, 'leaf' => $leaf, 'status' => 200, 'reservoir' => $request->get('reservoir')]);

    }

    public function charts()
    {
        return view('app.reservoirs.charts');
    }

    public function reservoirCharts()
    {
        $data = ReservoirsStatistic::all();

        $year = Carbon::now()->year;

        $reservoirGirvas = ReservoirGirvas::whereYear('created_at', $year)->where('waterLevel', '<>', -100)->get();
        $reservoirSandal = ReservoirSandal::whereYear('created_at', $year)->where('waterLevel', '<>', -100)->get();
        $reservoirSegozero = ReservoirSegozero::whereYear('created_at', $year)->where('waterLevel', '<>', -100)->get();
        $reservoirVigozero = ReservoirVigozero::whereYear('created_at', $year)->where('waterLevel', '<>', -100)->get();
        $reservoirUshkozero = ReservoirUshkozero::whereYear('created_at', $year)->where('waterLevel', '<>', -100)->get();

        $maxGirvas = $data->pluck('reservoirGirvasMax');
        $minGirvas = $data->pluck('reservoirGirvasMin');
        $avgGirvas = $data->pluck('reservoirGirvasAvg');
        $maxSandal = $data->pluck('reservoirSandalMax');
        $minSandal = $data->pluck('reservoirSandalMin');
        $avgSandal = $data->pluck('reservoirSandalAvg');
        $maxSegozero = $data->pluck('reservoirSegozeroMax');
        $minSegozero = $data->pluck('reservoirSegozeroMin');
        $avgSegozero = $data->pluck('reservoirSegozeroAvg');
        $maxVigozero = $data->pluck('reservoirVigozeroMax');
        $minVigozero = $data->pluck('reservoirVigozeroMin');
        $avgVigozero = $data->pluck('reservoirVigozeroAvg');
        $maxUshkozero = $data->pluck('reservoirUshkozeroMax');
        $minUshkozero = $data->pluck('reservoirUshkozeroMin');
        $avgUshkozero = $data->pluck('reservoirUshkozeroAvg');

        $lastGirvas = $reservoirGirvas->pluck('waterLevel');
        $lastSandal = $reservoirSandal->pluck('waterLevel');
        $lastSegozero = $reservoirSegozero->pluck('waterLevel');
        $lastVigozero = $reservoirVigozero->pluck('waterLevel');
        $lastUshkozero = $reservoirUshkozero->pluck('waterLevel');

        $date = [];

        $umoGirvas = [];
        $npuGirvas = [];
        $fpuGirvas = [];
        $umoSandal = [];
        $npuSandal = [];
        $fpuSandal = [];
        $umoSegozero = [];
        $npuSegozero = [];
        $fpuSegozero = [];
        $umoVigozero = [];
        $npuVigozero = [];
        $fpuVigozero = [];
        $umoUshkozero = [];
        $npuUshkozero = [];
        $fpuUshkozero = [];

        foreach($data as $d) {
            $date[] = $d->created_at->format('d-m');
            $umoGirvas[] = 99;
            $npuGirvas[] = 101.5;
            $fpuGirvas[] = 101.65;
            $umoSandal[] = 60.9;
            $npuSandal[] = 62.55;
            $fpuSandal[] = 62.65;
            $umoSegozero[] = 114.85;
            $npuSegozero[] = 119.90;
            $fpuSegozero[] = 120.15;
            $umoVigozero[] = 88.35;
            $npuVigozero[] = 89.3;
            $fpuVigozero[] = 89.8;
            $umoUshkozero[] = 100.3;
            $npuUshkozero[] = 102.8;
            $fpuUshkozero[] = 103.0;
        }

        // $date = $data->pluck('created_at')->format('d-m');

        return response()->json([
            'date' =>  $date,
            'maxGirvas' => $maxGirvas, 'minGirvas' => $minGirvas, 'avgGirvas' => $avgGirvas, 'lastGirvas' =>  $lastGirvas, 'umoGirvas' =>  $umoGirvas, 'npuGirvas' =>  $npuGirvas, 'fpuGirvas' =>  $fpuGirvas,
            'maxSandal' => $maxSandal, 'minSandal' => $minSandal, 'avgSandal' => $avgSandal, 'lastSandal' =>  $lastSandal, 'umoSandal' =>  $umoSandal, 'npuSandal' =>  $npuSandal, 'fpuSandal' =>  $fpuSandal,
            'maxSegozero' => $maxSegozero, 'minSegozero' => $minSegozero, 'avgSegozero' => $avgSegozero, 'lastSegozero' =>  $lastSegozero, 'umoSegozero' =>  $umoSegozero, 'npuSegozero' =>  $npuSegozero, 'fpuSegozero' =>  $fpuSegozero,
            'maxVigozero' => $maxVigozero, 'minVigozero' => $minVigozero, 'avgVigozero' => $avgVigozero, 'lastVigozero' =>  $lastVigozero, 'umoVigozero' =>  $umoVigozero, 'npuVigozero' =>  $npuVigozero, 'fpuVigozero' =>  $fpuVigozero,
            'maxUshkozero' => $maxUshkozero, 'minUshkozero' => $minUshkozero, 'avgUshkozero' => $avgUshkozero, 'lastUshkozero' =>  $lastUshkozero, 'umoUshkozero' =>  $umoUshkozero, 'npuUshkozero' =>  $npuUshkozero, 'fpuUshkozero' =>  $fpuUshkozero,
        ]);
    }

    public function reservoirVolume(Request $request)
    {
        $reservoirName = $request['reservoir'];
        $reservoirsModels = [
            'ReservoirGirvas' => 'VolumeGirvas',
            'ReservoirSandal' => 'VolumeSandal',
            'ReservoirSegozero' => 'VolumeSegozero',
            'ReservoirUshkozero' => 'VolumeUshkozero',
            'ReservoirVigozero' => 'VolumeVigozero',
        ];

        $reservoirUseful = [
            'ReservoirGirvas' => 62.21,
            'ReservoirSandal' => 298,
            'ReservoirSegozero' => 4235,
            'ReservoirUshkozero' => 1124,
            'ReservoirVigozero' => 1140,
        ];

        $classNameReservoir = "App\Models\Reservoirs\\" . $request['reservoir'];
        $classNameReservoirVolume = "App\Models\Reservoirs\\" . $reservoirsModels[$request['reservoir']];

        $reservoirLevel = $classNameReservoir::orderBy('id', 'desc')->where('waterLevel', '<>' , -100)->take(1)->first();
        $reservoirVolume = $classNameReservoirVolume::where('mark', '=' , $reservoirLevel->waterLevel)->take(1)->first();

        $date = $reservoirLevel->created_at->format('d-m-Y');
        $volume = $reservoirVolume->volume;

        $usefulVolume = $volume / $reservoirUseful[$request['reservoir']] * 100;


        return response()->json([
            'volumeDate' => $date,
            'volume' => $volume,
            'usefulVolume' => $usefulVolume,
            'MBS' =>  $reservoirLevel->waterLevel,
        ]);
    }
}
