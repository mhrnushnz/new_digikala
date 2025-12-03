<?php
namespace App\Livewire\Admin\Product;
use App\Models\Product;
use App\Repositories\admin\ProductRepositoryInterface;
use Livewire\Component;


class Index extends Component{
    protected ProductRepositoryInterface $repository;

    public function mount(ProductRepositoryInterface $repository){
        $this->repository = $repository;
    }


    public function delete(Product $product){
        $this->repository->removeProduct($product);
    }


    public function render(){
        $products = Product::query()->with('category', 'coverImage')->latest()->paginate(10);
        return view('livewire.admin.product.index', compact('products'))->layout('layouts.admin.app');
    }
}
