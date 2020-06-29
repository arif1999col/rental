<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $fillable = ['booking_code', 'order_date', 'duration', 'return_date_supposed', 'return_date', 'price', 'status', 'fine', 'employees_id', 'client_id', 'car_id'];
    protected $primaryKey = 'booking_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function cars()
    {
        return $this->hasMany('App\Car', 'car_id', 'car_id');
    }
}
