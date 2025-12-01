<?php

namespace App\Livewire\Client\Product;
use App\Models\Product;
use Livewire\Component;



class Tabs extends Component{
    public $productId;
    public $shortdescription;
    public $longdescription;
    public $price;
    public $active = 0;

    public function changeTab($num){
        $product = Product::query()->where('id', $this->productId)->first();
        $this->active = $num;
        if($num == 1){
            $this->shortdescription = $product->name;


        }elseif ($num == 3){
            $this->price = $product->price;
        }
    }


    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
