<?php
namespace App\Livewire\Admin\Story;
use App\Models\Story;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Index extends Component{
    use WithPagination;
    use WithFileUploads;
    public $story;
    public $thumbnail;
    public $title;


    public function submit(){













        if ($this->thumbnail) {
            $this->thumbnail->store('thumbnail', 'public');
        }

        $validatedData = $this->validate([
           'title' => 'required|string|max:50',
           'thumbnail' => 'required|image|mimes:png,jpg,jpeg,webp|max:1024', //1MB
           'story' => 'required|mimes:mp3|max:51200', //50MB mimes درواقع همون فرمت ویدیو یا عکس حسبا میشه
        ],[
            '*.required' => 'پر کردن فیلد ضروری می باشد',
            '*.string' => 'فرمت ناسازگار است',
            'thumbnail.mimes' => 'فرمت های مجاز تصویر :webp,png,jpg,jpeg',
            'story.mimes' => 'فرمت های مجاز استوری : mp3',
            'title.max' => 'سایز تصویر حداکثر : 1MB',
            'story.max' => 'سایز استوری حداکثر : 50MB',
            ]);

        // ذخیره فایل‌ها
        $thumbnailPath = $this->thumbnail->store('stories/thumbnails', 'public');
        $storyPath = $this->story->store('stories/files', 'public');


        // ذخیره در دیتابیس
        Story::create([
            'title' => $validatedData['title'],
            'thumbnail' => $thumbnailPath,
            'story' => $storyPath,
        ]);

        // ریست کردن فرم
        $this->reset(['title', 'thumbnail', 'story']);
    }

    public function render(){
        $stories = Story::query()->paginate(5);
        return view('livewire.admin.story.index', compact('stories'))->layout('layouts.admin.app');
    }
}
