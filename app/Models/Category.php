<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model{
    use SoftDeletes;
    protected $guarded = [];

    public function parent(){
        return $this->belongsTo(Category::class);
    }


    public function children(){
        return $this->hasMany(Category::class);
    }
}
