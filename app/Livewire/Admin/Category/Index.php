<?php
namespace App\Livewire\Admin\Category;
use App\Models\Category;
use App\Repositories\admin\AdminCategoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component{
    use WithPagination;
    use HasFactory;

    public $categories_list = [];     //تو بک اند مقدار دادیم بهش تو تابع mount()
    public $categoryId;                       //هیچ مقداری از فرانت نمیگیره(خالی)

    public $name;                               //مقدارش رو از فرانت دریافت کرده
    public $parentId;                           //مقدارش رو از فرانت دریافت کرده
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }

    public function mount(){
         //
    }


    public function render(){
        $this->categories_list = Category::all();
        $allcategories = Category::query()->with('parent')->latest()->get();
        return view('livewire.admin.category.index', compact('allcategories'))->layout('layouts.admin.app');
    }


    public function submit(){
        $validatedData =  $this->validate([
            'name' => 'required|string|max:30', //نام استان
            'parentId' => 'nullable|exists:categories,id',    //آیدی کشور استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',                                   //این ولیدیشن از فرممون میاد!
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد',
            'parentId.exists' => 'دسته بندی نامعتبر است',
            //
        ]);

        $this->repository->submitCategory($validatedData, $this->categoryId);
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    public function edit($categoryId){

        $check_category = Category::query()->where('id', $categoryId)->first();
        if ($check_category)
            $this->name = $check_category->name;    //انتقال دادن ایدی ب مقدار name کل
            $this->categoryId = $check_category->id;
            $this->parentId = $check_category->category_id;
    }



    public function delete($categoryid){
        $category = Category::find($categoryid);

        if ($category->children()->exists()){
            $this->dispatch('error', 'این دسته بندی داری زیر شاخه هست و نمیتوان ان را حذف کرد');
            return;
        }

        $category->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }



}
