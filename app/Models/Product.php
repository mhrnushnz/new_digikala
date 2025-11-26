<?php
namespace App\Models;
use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model{
    use UploadFile;
    use SoftDeletes;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function seo(){
        return $this->hasOne(SeoItem::class, 'ref_id', 'id')->where('type', 'product');
    }
    public function coverImage(){      //یک تصویره
        return $this->hasOne(ProductImage::class, 'product_id', 'id')->where('is_cover', '=', true);
    }
    public function Images(){         //چندین تصویره
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
