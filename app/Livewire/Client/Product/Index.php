<?php
namespace App\Livewire\Client\Product;
use App\Models\Product;
use Artesaos\SEOTools\Traits\SEOTools;
use Livewire\Component;

class Index extends Component{
    use SEOTools;                               //باید اینو فراخونی کنیم حتما
    public $products;


    public function mount($p_code){

        $product = Product::query()->where('p_code', $p_code)
        ->select('id', 'name', 'p_code', 'price', 'discount', 'discount_duration','category_id', 'stock', 'seller_id','featured',)
        ->with('seo','seller')->firstOrFail();



        if($product){
            $discountAmount = $product->price ? $product->price * $product->discount / 100 : 0;
            $product->finalprice = $product->price - $discountAmount;
        }
        $this->products = $product;

        $this->seoConfig($product->seo);
    }




    public function seoConfig($productSeoItems)
    {
        $this->seo()
            ->setTitle($productSeoItems->meta_title)
            ->setDescription($productSeoItems->meta_description);
    }




    public function render(){
        return view('livewire.client.product.index')->layout('layouts.client.app');
    }
}
