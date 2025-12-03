<?php
namespace App\Livewire\Client\Product;
use App\Models\Product;
use Livewire\Component;

class Tabs extends Component{
    public $productId;
    public $shortdescription;
    public $longdescription;
    public $price;
    public $name;
    public $check_pointly;
    public $active = 0;



    public function mount(){
        $this->changeTab(1);        //برای زمانیه که صفحه لود میشه تب شماره 1 به صورت دیفالت فعال باشه
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


        } elseif ($num == 4){
            $this->price = $product->price;


        }elseif ($num == 5){
            $this->price = $product->price;

        }
    }

    public function getProductFeatures($productId){

    }


    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
