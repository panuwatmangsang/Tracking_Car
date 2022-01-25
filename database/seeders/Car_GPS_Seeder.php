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
            'car_name' => 'กฟน.1022',
            'car_address' => 'เขตบางซื่อ',
            'car_city' => 'กรุงเทพมหานคร',
            'car_state' => 'ถ.ประชาชื่น',
            'latitude' => '13.809325',
            'longtitude' => '100.534088'
        ]);

        Car_gps::create([
            'car_name' => 'กฟน.1022',
            'car_address' => 'เขตบางซื่อ',
            'car_city' => 'กรุงเทพมหานคร',
            'car_state' => 'ถ.ประชาชื่น',
            'latitude' => '13.809825',
            'longtitude' => '100.534152'
        ]);

        Car_gps::create([
            'car_name' => 'กฟน.1022',
            'car_address' => 'เขตบางซื่อ',
            'car_city' => 'กรุงเทพมหานคร',
            'car_state' => 'ถ.ประชาชื่น',
            'latitude' => '13.810211',
            'longtitude' => '100.534227'
        ]);
        
        Car_gps::create([
            'car_name' => 'กฟน.1022',
            'car_address' => 'เขตบางซื่อ',
            'car_city' => 'กรุงเทพมหานคร',
            'car_state' => 'ถ.ประชาชื่น',
            'latitude' => '13.810596',
            'longtitude' => '100.534345'
        ]);
        
        Car_gps::create([
            'car_name' => 'กฟน.1022',
            'car_address' => 'เขตบางซื่อ',
            'car_city' => 'กรุงเทพมหานคร',
            'car_state' => 'ถ.ประชาชื่น',
            'latitude' => '13.810950',
            'longtitude' => '100.534421'
        ]);
    }
}
