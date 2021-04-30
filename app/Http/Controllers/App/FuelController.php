<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fuel;

use App\Http\Requests\Cabinet\CreateFuelRequest;

class FuelController extends Controller
{
    public function store(CreateFuelRequest $request) {
        // info('Добавлено новое знаение параметров топлива ПТЭЦ');
        $fuel = Fuel::create($request->validated());
        // return new PostResource($fuel);

        return true;
    }
}
