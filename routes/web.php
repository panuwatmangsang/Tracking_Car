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
    $uname = "root";
    $pass = "";
    $servername = "localhost";
    $dbname = "tracking_gps";
    $db = new mysqli($servername, $uname, $pass, $dbname);

    $query =  $db->query("SELECT * FROM car_gps");

    $resultArray = array();

    while ($row = $query->fetch_assoc()) {
        $car_id = $row['car_id'];
        $car_name = $row['car_name'];
        $car_address = $row['car_address'];
        $car_city = $row['car_city'];
        $car_state = $row['car_state'];
        $latitude = $row['latitude'];
        $longtitude = $row['longtitude'];
        array_push($resultArray, [$car_id, $car_name, $car_address, $car_city, $car_state, $latitude, $longtitude]);
    }

    return ($resultArray);
})->name("car_gps_data");

