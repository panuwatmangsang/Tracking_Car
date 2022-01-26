<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_location extends Model
{
    use HasFactory;
    
    protected $tabel = "car_location";
    protected $primaryKey = "car_location_id";
    protected $fillable = ['car_id','latitude','longtitude'];
}
