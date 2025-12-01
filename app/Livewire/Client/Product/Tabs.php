<?php

namespace App\Livewire\Client\Product;
use App\Models\Product;
use Livewire\Component;



class Tabs extends Component{
    public $productId;
    public $shortdescription;
    public $longdescription;


    public function changeTab($num){
        $product = Product::query()->where('id', $this->productId)->first();

        if($num == 1){
            $this->shortdescription = $product->name;
            dd($this->shortdescription);
        }elseif ($num == 2){

        }
    }


    public function render()
    {
        return view('livewire.client.product.tabs');
    }
}
