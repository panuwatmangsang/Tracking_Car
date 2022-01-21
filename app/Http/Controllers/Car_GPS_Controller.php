<?php

namespace App\Http\Controllers;

use App\Models\Car_gps;
use Illuminate\Http\Request;

class Car_GPS_Controller extends Controller
{
    public function index()
    {
        // $car_gps = Car_gps::all();
        // dd($car_gps);
        return view('car_gps');
    }
}
