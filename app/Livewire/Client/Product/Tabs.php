<?php
namespace App\Livewire\Client\Product;
use App\Models\Product;
use App\Models\ProductReviews;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tabs extends Component{
    public $productId;
    public $shortdescription;
    public $longdescription;
    public $price;
    public $name;
    public $check_pointly;
    public $active = 0;
    public $positiveInput= '';
    public $positiveItems = [];
    public $negativeInput = '';
    public $negativeItems = [];
    public $title;
    public $comment;
    public $submitSuccessAlert = false;
    public $productReviews = [];

    public function mount(){
        app()->setLocale('fa');    //برای ثبت تایم از دیتابیس و نمایشش تو فرانت باید لوکیشن رو روی ایران و زبان فارسی ثبت کنیم
        $this->changeTab(1);        //برای زمانیه که صفحه لود میشه تب شماره 1 به صورت دیفالت فعال باشه
    }


    public function submitReview(){
        $validatedData =  $this->validate([
            'title' => 'required|string|max:100|min:10',
            'comment' => 'required|string|max:250|min:10',
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',                                   //این ولیدیشن از فرممون میاد!
            'title.max' => ' حداکثر تعداد کاراکتر ها 100 می باشد',
            'comment.max' => ' حداکثر تعداد کاراکتر ها 250 می باشد',
            '*.min' => ' حداقل تعداد کاراکتر ها 10 می باشد',
            //
        ]);


        ProductReviews::query()->create([
            'title' => $validatedData['title'],
            'comment' => $validatedData['comment'],
            'positive' => implode(',', $this->positiveItems),
            'negative' => implode(',', $this->negativeItems),
            'product_id' => $this->productId,
            'user_id' => 1
        ]);

        $this->submitSuccessAlert = true;
        // بعد از ثبت موفق
        $this->reset(['title', 'comment', 'positiveItems', 'negativeItems']);
        $this->positiveItems = [];
        $this->negativeItems = [];
    }



    public function removeNegativeItem($index){
        array_splice($this->negativeItems, $index, 1);
    }



    public function removePositiveItem($index){
        array_splice($this->positiveItems, $index, 1);
    }



    public function addPositiveItem(){
        $this->validate([
            'positiveInput' => 'required|min:3|max:50',
        ],
        [
            'positiveInput.required'=>'پر کردن فیلد الزامی است',
            'positiveInput.min' => 'حداقل باید 3 کاراکتر باشد',
            'positiveInput.max' => 'حداکثر باید 50 کاراکتر باشد',
        ]);
        $this->positiveItems[] = $this->positiveInput;
        $this->positiveInput = '';
    }


    public function addNegativeItem(){
        $this->validate([
            'negativeInput' => 'required|min:3|max:50',
        ],
        [
            'negativeInput.required'=>'پر کردن فیلد الزامی است',
            'negativeInput.min' => 'حداقل باید 3 کاراکتر باشد',
            'negativeInput.max' => 'حداکثر باید 50 کاراکتر باشد',
        ]
        );
        $this->negativeItems[] = $this->negativeInput;
        $this->negativeInput = '';
        return response()->json($this->negativeItems);
    }


    public function changeTab($num){
        $product = Product::query()->where('id', $this->productId)->first();
        $this->active = $num;


        if($num == 1){
            $this->shortdescription = $product->short_description;
            $this->longdescription = $product->long_description;


        } elseif ($num == 2){
            $this->check_pointly = $product->long_description;
            $this->name = $product->name;


        } elseif ($num == 3){
            $this->getProductFeatures($product->id);
            $this->price = $product->price;

        } elseif ($num == 4){

            $this->getProductReviews($this->productId);

        }elseif ($num == 5){
            $this->price = $product->price;

        }
    }



    public function getProductReviews($productId){
        $this->productReviews = ProductReviews::query()->where(['product_id' => $productId , 'status' => 'approved'])->with('user')->get();
    }





    public function render(){
        return view('livewire.client.product.tabs');
    }
}
