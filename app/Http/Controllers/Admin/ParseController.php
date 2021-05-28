<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\Parse\ParseFormNotepadRequest;

class ParseController extends Controller
{
    public function index()
    {
    	return view('admin.parse.index');
    }

    public function reservoir()
    {
    	return view('admin.parse.reservoir');
    }

	public function store(ParseFormNotepadRequest $request){
		$date = Carbon::createFromFormat('d-m-Y', $request['date']);
		$parts = preg_split('/\s+/', $request['data']); 

		$index = 0;
		$emptyDaysNumber = 0;


		for ($index = 0; $index <= 371; $index++) {
			 if($this->emptyDays($index, $date->isLeapYear())) {
			 	$emptyDaysNumber++;
			 	Cgms::create([
					'temperature' => -100,
					'created_at' => $date,
					'userName' => 'auto'
				]);
			 } else {
			 	Cgms::create([
					'temperature' => round(floatval($parts[$index-$emptyDaysNumber]), 2),
					'created_at' => $date,
					'userName' => 'auto'
				]);
				$date = $date->add(1, 'day');
			 }
		}

		return redirect()->route('administrator.parse.index');	
	}

	public function emptyDays($index, $leap) {
		if($leap) {
			return ($index == 60 || $index == 61 || $index == 123 || $index == 185 ||$index == 278 ||$index == 340);
		}
		return ($index == 59 || $index == 60 || $index == 61 || $index == 123 || $index == 185 ||$index == 278 ||$index == 340);
	}

	public function parseReservoir(Request $request)
	{
		$date = Carbon::createFromFormat('d-m-Y', $request['date']);
		$parts = preg_split('/\s+/', $request['data']); 

		$index = 0;
		$emptyDaysNumber = 0;

		$resevoirName = "App\Models\Reservoirs\\" . $request['reservoir'];

		for ($index = 0; $index <= 371; $index++) {
			 if($this->emptyDays($index,  $date->isLeapYear())) {
			 	$emptyDaysNumber++;
			 	$resevoirName::create([
					'waterLevel' => -100,
					'created_at' => $date,
				]);
			 } else {
			 	$resevoirName::create([
					'waterLevel' => round(floatval($parts[$index-$emptyDaysNumber]), 2),
					'created_at' => $date,
				]);
				$date = $date->add(1, 'day');
			 }
		}

		return redirect()->route('administrator.parse.reservoirPage');			
	}

}
