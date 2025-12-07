<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReviews extends Model{
    protected $guarded = [];
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function vote(){
        return $this->hasMany(ProductReviewVote::class, 'product_review_id');
    }
}
