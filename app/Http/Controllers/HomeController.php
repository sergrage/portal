<?php

namespace App\Http\Controllers;

use App\Models\CK\Pbr;
use App\Models\CK\Power;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use App\Models\CK\Temperature;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }

    public function temperature() {

        $temperatures = Temperature::whereDate('created_at', Carbon::today())->get();

        if($temperatures->isEmpty()) {
            for($i=0; $i< 24 ; $i++) {
                $p = new Temperature;
                $p->ges1 = '###';
                $p->ges2 = '###';
                $p->ges3 = '###';
                $p->ges5 = '###';
                $p->ges6 = '###';
                $p->ges7 = '###';
                $p->ges9 = '###';
                $p->ges10 = '###';
                $p->ges14 = '###';
                $p->ges16 = '###';
                $p->tec13 = '###';
                $temperatures->push($p);
            }
        } elseif($temperatures->count() !== 24) {
            $last = intval($temperatures->last()->created_at->format('H'));
            $first = intval($temperatures->first()->created_at->format('H'));

            for($i=$last; $i< 23 ; $i++) {
                $p = new Temperature;
                $p->ges1 = '###';
                $p->ges2 = '###';
                $p->ges3 = '###';
                $p->ges5 = '###';
                $p->ges6 = '###';
                $p->ges7 = '###';
                $p->ges9 = '###';
                $p->ges10 = '###';
                $p->ges14 = '###';
                $p->ges16 = '###';
                $p->tec13 = '###';

                $temperatures->push($p);
            }

            for($i=0; $i < $first ; $i++) {
                $p = new Temperature;
                $p->ges1 = '###';
                $p->ges2 = '###';
                $p->ges3 = '###';
                $p->ges5 = '###';
                $p->ges6 = '###';
                $p->ges7 = '###';
                $p->ges9 = '###';
                $p->ges10 = '###';
                $p->ges14 = '###';
                $p->ges16 = '###';
                $p->tec13 = '###';

                $temperatures->prepend($p);
            }
        }
        $result = [];
        for($i=0;  $i< 24 ; $i++) {
            $result[] = $temperatures[$i];
        }


        return view('app.temperatures.index', compact('result' ));
    }

    public function weather(){
//        return 123;

//        $response = Http::withHeaders([
//            'X-Gismeteo-Token' => '56b30cb255.3443075'
//        ])->get('https://api.gismeteo.net/v2/weather/current/?latitude=54.35&longitude=52.52');
//
//        return $response;

        $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'units' => 'metric',
            'lat' => 64.42937146965284,
            'lon' => 34.47563982643993,
            'appid' => env('OPEN_WEATHER_API')
        ]);

        dd($response->json());
    }

    public function dbTest() {

        $conn = DB::connection('sqlsrv');
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');
        $sql = "
    EXEC OIK.dbo.SrezLT
        @Cat = ?,
        @Ids = ?,
        @Time = '". $now . "'
";
        $params = array("Л", "49", $now);
        $stmt = $conn->select( $sql, $params);

        dd($stmt);
    }


    public function power() {
        return view('test' );
    }

    public function phpinfo(){
        return view(' phpinfo' );
    }

}
