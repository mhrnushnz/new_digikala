<?php
namespace App\Repositories\client\first_page;
use App\Models\Product;
use Illuminate\Support\Carbon;


class ClientFirstPageRepository implements ClientFirstPageInterFace{
    public function getFeaturedProduct(){
        $visitTime=Carbon::now();      //زمان حال رو میده و میریزه تو متغیر با تابع کربن!

        $featuredproducts=Product::query()->
        with('coverImage', 'seo')->
        select('id','name','price','discount','p_code')->
        where('discount_duration','>',$visitTime)->     //بتید تاریخ تخفیف از تازیخ زمان فعلی بیشتر باشه تا وقتعی ب اون زمان برسیم محصول تخفیف خورده نمایش داده میشه اگر از اون زمان بگذره حذف میشه
        where('featured',1)->get();

        return $featuredproducts->map(function($product){
            $discountAmount = $product->price ? $product->price * $product->discount / 100 : 0;
            $product->fainalprice = $product->price - $discountAmount;
            return $product;
        });


    }
}
