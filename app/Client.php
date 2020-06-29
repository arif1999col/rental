<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nik', 'name', 'dob', 'phone', 'address', 'gender'];
    protected $primaryKey = 'client_id';
}
