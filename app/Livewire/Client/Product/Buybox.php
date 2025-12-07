<?php

namespace App\Livewire\Client\Product;

use App\Models\Cart;
use Livewire\Component;

class Buybox extends Component{
    public $price;
    public $discount;
    public $finalprice;
    public $productId;
    public $inCart = false;
    public $seller;

    public function addtocart(){
        Cart::query()->updateOrCreate([
            'product_id' => $this->productId,
            'quantity' => 1,
        ]);

        $this->inCart = true;
    }


    public function render(){
        return view('livewire.client.product.buybox');
    }
}
