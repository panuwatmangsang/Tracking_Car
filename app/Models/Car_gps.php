<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_gps extends Model
{
    use HasFactory;

    protected $tabel = "car_gps";
    protected $primaryKey = "car_id";
    protected $fillable = ['car_name','car_address','car_city','car_state','latitude','longtitude'];
}
