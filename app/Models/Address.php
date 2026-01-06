<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    protected $guarded = [];
    use SoftDeletes;


    public function country(){
        return $this->belongsTo(Country::class);
    }


    public function state(){
        return $this->belongsTo(State::class);
    }


    public function city(){
        return $this->belongsTo(City::class);
    }
}
