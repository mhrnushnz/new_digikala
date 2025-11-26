<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Repositories\admin\AdminCategoryRepository;
use Livewire\Component;

class Features extends Component
{
    public $name;
    public $featureId;
    public $categoryId;
    public $categoryTitle;
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }


    public function mount(Category $category){
        $this->categoryTitle = $category->name;
    }


    public function submit(){

        $validatedData =  $this->validate([
            'name' => 'required|string|max:30', //نام استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',                                   //این ولیدیشن از فرممون میاد!
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد',
            //
        ]);

        $this->repository->submitCategoryFeature($validatedData, $this->categoryId,  $this->featureId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    public function edit($categoryId){

        $check_category = CategoryFeature::query()->where('id', $categoryId)->first();
        if ($check_category)
            $this->name = $check_category->name;    //انتقال دادن ایدی ب مقدار name کل
            $this->categoryId = $check_category->category_id;
            $this->featureId = $check_category->id;
    }

    public function delete($featureId){
        $category = CategoryFeature::find($featureId);

        if ($category->value()->exists()){
            $this->dispatch('error', 'این ویژگی داری دسته بندی هست و نمیتوان ان را حذف کرد');
            return;
        }

        $category->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }

    public function render()
    {
        $category_info = $this->categoryTitle;
        $categoryFeature = CategoryFeature::query()->where('category_id', $this->categoryId)->paginate(10);
        return view('livewire.admin.category.features.index', compact('categoryFeature', 'category_info'))->layout('layouts.admin.app');
    }
}
