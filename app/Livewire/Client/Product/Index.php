<?php
namespace App\Livewire\Client\Product;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Index extends Component{
    public $products;


    public function mount($p_code){

        $product = Product::query()->where('p_code', $p_code)
        ->select('id', 'name', 'p_code', 'price', 'discount', 'discount_duration','category_id', 'stock', 'seller_id','featured',)
        ->with('Images','seller')->firstOrFail();



        if($product){
            $discountAmount = $product->price ? $product->price * $product->discount / 100 : 0;
            $product->finalprice = $product->price - $discountAmount;
        }
        $this->products = $product;
    }







    public function render(){
        return view('livewire.client.product.index')->layout('layouts.client.app');
    }
}
