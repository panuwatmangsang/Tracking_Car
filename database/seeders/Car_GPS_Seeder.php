<?php

namespace Database\Seeders;

use App\Models\Car_gps;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Car_GPS_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car_gps::create([
            'car_name' => 'Toyata',
            'car_address' => 'เมือง',
            'car_city' => 'พะเยา',
            'car_state' => '102 ทางหลวง',
            'latitude' => '19.029557927567264',
            'longtitude' => '99.93113432614608'
        ]);

        Car_gps::create([
            'car_name' => 'Isuzu',
            'car_address' => 'เมือง',
            'car_city' => 'พะเยา',
            'car_state' => '102 ทางหลวง',
            'latitude' => '19.030289318113148',
            'longtitude' => '99.92986957028076'
        ]);

        Car_gps::create([
            'car_name' => 'Honda',
            'car_address' => 'เมือง',
            'car_city' => 'พะเยา',
            'car_state' => '102 ทางหลวง',
            'latitude' => '19.030141805088093',
            'longtitude' => '99.93146020102455'
        ]);
    }
}
