<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    use WithFileUploads;
    public $title;
    public $link;
    public $image;
    public $sliders;

    public function mount(){
        $this->sliders = Slider::query()->where('status', 1)->get();
    }

    public function submit(){

        if ($this->image){
            $validatedata['image'] = $this->image;
        }
        dd($this->image, $this->title, $this->link);
        $validatedata = $this->validate([
            'title' => 'required|string|max:50',
            'link' => 'required|url',
            'image' => 'required|mimes:jpeg,png,jpg,webp|max:1024',
        ],[
            '*.required' => 'فیلد نمیتواند خالی باشد',
            '*.string' => 'فرمت نامعتبر است',
            'image.max' => 'سایز تصویر حداکثر 1MB',
            'image.mimes' => 'فرمت تصویر نامعتبر است',
        ]);



        $ImageFileName = pathinfo($this->image->hashName(), PATHINFO_FILENAME). '.' . $this->image->extension();

        Slider::query()->create([
            'title' => $validatedata['title'],
            'link' => $validatedata['link'],
            'image' => $ImageFileName,
        ]);

        Storage::disk('public')->putFile('slides', $this->image);

        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->reset();


    }



    public function render()
    {
        return view('livewire.admin.slider.index')->layout('layouts.admin.app');
    }
}
