<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Cabinet\CreateCgmsRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Cgms;
use App\Models\Year;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class CgsmController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api')->only('store');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCgmsRequest $request)
    {
        $today = Carbon::today();
        $requestDate = $request['date'];
        
        $date = $requestDate ? Carbon::createFromFormat('Y-m-d', $requestDate, 'Europe/Moscow') : false;

        $lastCgms = Cgms::orderBy('id', 'desc')->first();
        $lastCgmsDate = $lastCgms->created_at;
        $lastCgmsDateAddDayFormat = $lastCgms->created_at->add(1, 'day')->format('Y-m-d');

        // если дата не выбрана или она равна дню который надо заполнить 
        if($date == false or ($lastCgmsDateAddDayFormat == $date->format('Y-m-d'))) {
  
            $cgsm = Cgms::create([
                'temperature' => $request->get('temperature'),
                'userName' => $request->get('userName'),
                'created_at' => $lastCgmsDate->add(1, 'day')
            ]);

            if($date == false) {
                 $yearIsLeap = $cgsm->created_at->isLeapYear();
                 $newCgmsDateMD = $cgsm->created_at->format('m-d');

                 $newCgmsDateY = $cgsm->created_at->format('Y');
                 $lastCgmsYear = Year::orderBy('id', 'desc')->first()->cgms;

                 if($newCgmsDateY > $lastCgmsYear) {
                    Year::create([
                        'cgms' => (int)$newCgmsDateY,
                    ]);
                 }

                $step = 0;

                if($yearIsLeap == false  and  $newCgmsDateMD == '02-28') {
                    $step = 3;
                }

                if($yearIsLeap == true  and  $newCgmsDateMD == '02-29') {
                    $step = 2;
                }

                if($newCgmsDateMD == '04-30' or $newCgmsDateMD == '06-30' or $newCgmsDateMD == '09-30' or $newCgmsDateMD == '11-30') {
                    $step = 1;
                }

                if($step) {

                    for ($index = 1; $index <= $step; $index++)  {

                        $cgsm = Cgms::create([
                            'temperature' => -100,
                            'userName' => 'auto',
                            'created_at' => $cgsm->created_at
                        ]);
                    }
                }
            }

            return response()->json(['message' => 'Данные успешно добавлены', 'status' => true ]);
        }
         else {
            // если дата выбрана и она будущая, то возвращаем сообщение
            if($lastCgmsDate->add(1, 'day')->format('Y-m-d') < $date->format('Y-m-d')) {
                return response()->json(['message' => 'Нельзя ввести данные за выбранную дату', 'status' => false ]);
            }

            // если дата раньше сегодня, о пробуем найти соответствующаю запись 
            $date = $date->format('Y-m-d');
            
            $cgmsForUpdate = Cgms::where('created_at', '>=', date($date). ' 00:00:00')
                ->where('created_at', '<=', date($date). ' 23:59:59')
                ->get();

            // если запись найдена, то переписываем ее
            if($cgmsForUpdate->isNotEmpty()) {
                $cgmsForUpdateId = $cgmsForUpdate[0]->id; 

                DB::table('cgms')
                    ->where('id', $cgmsForUpdateId)
                    ->update([
                        'temperature' => $request->get('temperature'),
                        'userName' => $request->get('userName'),
                    ]);

                return response()->json(['message' => 'Данные были обновлены', 'status' => true ]);
            }
            // если запись не найдена, возвращаем сообщение
            return response()->json(['message' => 'Нельзя ввести данные за выбранную дату', 'status' => false ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
