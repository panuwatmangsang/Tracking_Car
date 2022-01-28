<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car_GPS_Controller;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/car_gps', [Car_GPS_Controller::class, 'index'])->name('car_gps');

Route::get('/car_gps_data', function (Request $request) {
    $uname = "tracking_gps";
    $pass = "123456";
    $servername = "192.168.1.19";
    $dbname = "tracking_gps";
    $db = new mysqli($servername, $uname, $pass, $dbname);

    $query =  $db->query("SELECT * FROM car_locations");
    // $query =  $db->query("SELECT * FROM car_gps WHERE updated_at='2022-01-25 07:13:31'");
    // $query =  $db->query("SELECT * FROM car_gps WHERE updated_at = (SELECT MIN(updated_at) AS updated_at FROM car_gps)");
    // $query = $db->query("SELECT * FROM car_locations ORDER BY updated_at ASC LIMIT 1");
    
    $resultArray = array();

    while ($row = $query->fetch_assoc()) {
        $car_location_id = $row['car_location_id'];
        $car_id = $row['car_id'];
        $latitude = $row['latitude'];
        $longtitude = $row['longtitude'];
        $created_at = $row['created_at'];
        $updated_at = $row['updated_at'];
        array_push($resultArray, [$car_location_id, $car_id, $latitude, $longtitude, $created_at, $updated_at]);
    }

    return ($resultArray);
})->name("car_gps_data");

