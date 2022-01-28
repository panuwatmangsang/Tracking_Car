<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_data extends Model
{
    use HasFactory;

    protected $tabel = "car_datas";
    protected $primaryKey = "car_id";
    protected $fillable = ['car_id','car_name','section_id','space'];
}
