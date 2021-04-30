<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cgms;

use Carbon\Carbon;

use  App\Http\Requests\Parse\ParseFormNotepadRequest;

class ParseController extends Controller
{
    public function index()
    {
    	return view('admin.parse.index');
    }

	public function store(ParseFormNotepadRequest $request){
		$date = Carbon::createFromFormat('d-m-Y', $request['date']);
		$parts = preg_split('/\s+/', $request['data']); 

		$index = 0;
		$emptyDaysNumber = 0;


		for ($index = 0; $index <= 371; $index++) {
			 if($this->emptyDays($index,$date)) {
			 	$emptyDaysNumber++;
			 	Cgms::create([
					'temperature' => -100,
					'created_at' => '2000-01-01',
					'userName' => 'auto'
				]);
			 } else {
			 	Cgms::create([
					'temperature' => round(floatval($parts[$index-$emptyDaysNumber]), 2),
					'created_at' => $date,
					'userName' => 'auto'
				]);
			 }
			
			$date = $date->add(1, 'day');
		}	
	}

	public function emptyDays($index, $date) {
		if($date->isLeapYear()) {
			return ($index == 60 || $index == 61 || $index == 123 || $index == 185 ||$index == 278 ||$index == 340);
		}
		return ($index == 59 || $index == 60 || $index == 61 || $index == 123 || $index == 185 ||$index == 278 ||$index == 340);
	}

}
