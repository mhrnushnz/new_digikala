<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Repositories\admin\ProductRepository;
use Livewire\Component;

class Content extends Component
{
    public $productId;
    public $productName;
    public $long_description;
    public $short_description;

    public function mount(Product $product){
        $this->productName = $product->name;
        $this->productId = $product->id;
    }


    public function submit(ProductRepository $productRepository){

//نحوه فعل و غیر فعال بودن محصول ویژه
        $validatedData = $this->validate([
            'long_description' => 'required|string',
            'short_description' => 'required|string',
        ], [
            '*.required' => 'پر کردن فیلد ضروری است',
            '*.string' => 'فرمت نام اشتباه است',
        ]);

        $productRepository->SubmitContent($validatedData, $this->productId); //بهتره که از مدلمون ابجکت بسازیم اونم مخصوصا زمانی که تصویر به دیتابیس میفرستیم چون create/update ومحصول واقعیه بهتره ابجکت رو بسازیم !
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
        $this->reset();
        return redirect()->route('admin.product.index');
    }


    public function render(){
        return view('livewire.admin.product.content')->layout('layouts.admin.app');
    }
}
