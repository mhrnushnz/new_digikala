<?php

namespace App\Livewire\Admin\Category\Features;

use App\Models\Category;
use Livewire\Component;

class Index extends Component{
    public function render()
    {
        $categoryId = Category::query()->paginate(10);
        return view('livewire.admin.category.features.index', compact('categoryId'))->layout('layouts.admin.app');
    }
}
