<?php

namespace App\Livewire\Client\Home\Slider;

use App\Models\Slider;
use Livewire\Component;

class Index extends Component
{


    public function placeholder(){
        return view('layouts.client.placeholder.first-page.slider-selecton');
    }

    public function render(){
        sleep(1);
        $sliders = Slider::query()->get();
        return view('livewire.client.home.slider.index', compact('sliders'));
    }
}
