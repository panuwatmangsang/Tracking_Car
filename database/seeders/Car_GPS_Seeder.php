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
            'car_name' => 'car_1',
            'car_address' => 'สันทราย',
            'car_city' => 'เชียงใหม่',
            'car_state' => '102 ทางหลวง',
            'latitude' => '18.8910339',
            'longtitude' => '99.0085884'
        ]);

        Car_gps::create([
            'car_name' => 'car_1',
            'car_address' => 'สันทราย',
            'car_city' => 'เชียงใหม่',
            'car_state' => '102 ทางหลวง',
            'latitude' => '18.891422',
            'longtitude' => '99.008072'
        ]);

        Car_gps::create([
            'car_name' => 'car_1',
            'car_address' => 'สันทราย',
            'car_city' => 'เชียงใหม่',
            'car_state' => '102 ทางหลวง',
            'latitude' => '18.891508',
            'longtitude' => '99.008059'
        ]);
        
        Car_gps::create([
            'car_name' => 'car_1',
            'car_address' => 'สันทราย',
            'car_city' => 'เชียงใหม่',
            'car_state' => '102 ทางหลวง',
            'latitude' => '18.891706',
            'longtitude' => '99.008051'
        ]);
        
        Car_gps::create([
            'car_name' => 'car_1',
            'car_address' => 'สันทราย',
            'car_city' => 'เชียงใหม่',
            'car_state' => '102 ทางหลวง',
            'latitude' => '18.891822',
            'longtitude' => '99.008040'
        ]);
    }
}
