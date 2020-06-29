<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    protected $fillable = ['car_name', 'year', 'license_plat', 'price', 'type', 'brand_id', 'available'];
    protected $primaryKey = 'car_id';
    use SoftDeletes;
    protected $dates = ['delete_at'];



    public function bookings()
    {
        return $this->hasMany('App\Booking', 'car_id', 'car_id');
    }
}
