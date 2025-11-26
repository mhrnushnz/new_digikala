<?php
namespace App\Livewire\Client\Home\Banner;
use Livewire\Component;

class Index extends Component{
    public function placeholder(){
        return view('layouts.client.placeholder.first-page.banner-selecton');
    }

    public function render(){
        sleep(1);
        return view('livewire.client.home.banner.index');
    }
}
