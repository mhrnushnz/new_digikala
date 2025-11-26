<?php
namespace App\Livewire\Admin\Product;
use App\Models\Product;
use App\Repositories\admin\ProductRepositoryInterface;
use Livewire\Component;
use App\Repositories\admin\ProductRepository;

class Index extends Component{
    public $repository;

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
