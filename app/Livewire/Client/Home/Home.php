<?php
namespace App\Livewire\Client\Home;
use Livewire\Component;

class Home extends Component{
    public function render(){
        return view('livewire.client.home.home')->layout('layouts.client.app');
    }
}
