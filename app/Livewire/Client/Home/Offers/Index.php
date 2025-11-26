<?php
namespace App\Livewire\Client\Home\Offers;
use App\Repositories\client\first_page\ClientFirstPageInterFace;
use Livewire\Component;

class Index extends Component{
    public $featuredproducts=[];
    public $repository;

    public function boot(ClientFirstPageInterFace $repository){
        $this->repository = $repository;
    }

    public function mount(){
        $this->featuredproducts = $this->repository->getFeaturedProduct()->toArray();
    }

    public function placeholder(){
        return view('layouts.client.placeholder.first-page.offers-selecton');
    }

    public function render(){
        $featuredproducts = $this->repository->getFeaturedProduct();
        sleep(1);
        return view('livewire.client.home.offers.index');
    }
}
