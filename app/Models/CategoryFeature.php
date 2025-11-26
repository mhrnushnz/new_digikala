<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryFeature extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function value(){
        return $this->hasMany(CategoryFeatureValue::class, 'category_feature_id');
    }

    public function categoryFeatureValues(){
        return $this->hasMany(CategoryFeatureValue::class, 'category_feature_id');
    }

}
