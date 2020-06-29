<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Returns extends Model
{
    protected $fillable = ['type', 'amount', 'date', 'client_id', 'employees_id', 'booking_code'];
    protected $primaryKey = 'payment_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'payments';
}
