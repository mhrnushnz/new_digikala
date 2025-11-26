<?php
namespace App\Livewire\Admin\Category;
use App\Models\CategoryFeature;
use App\Models\CategoryFeatureValue;
use App\Repositories\admin\AdminCategoryRepository;
use Livewire\Component;

class FeatureValue extends Component
{
    public $featureName;
    public $featureId;
    public $valueId;
    public $value;
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }

    public function mount(CategoryFeature $categoryFeature){
        //معمولا برای ریختن یک مقدار در یک متغییر از متد استفاده می شود

        $this->featureName = $categoryFeature->name;
        $this->featureId = $categoryFeature->id;

    }

    public function submit(){


        $validatedData = $this->validate([
            'value' => 'required|string|max:30', //نام استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',                                   //این ولیدیشن از فرممون میاد!
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد',
            //
        ]);

        $this->repository->submitCategoryFeatureValue($validatedData,$this->valueId, $this->featureId);

        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');

        $this->reset('value');

    }


    public function edit($valueId){

        $check_value = CategoryFeatureValue::query()->where('id', $valueId)->first();
        if ($check_value)
            $this->value = $check_value->value;    //انتقال دادن ایدی ب مقدار name کل
            $this->valueId = $check_value->id;
            $this->featureId = $check_value->category_feature_id;

    }

    public function delete($valueId){
        CategoryFeatureValue::find($valueId)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }


    public function render()
    {
        $categoryFeatureValue = CategoryFeatureValue::query()->where('category_feature_id', $this->featureId)->paginate(10);
        return view('livewire.admin.category.feature_value.index', compact('categoryFeatureValue'))->layout('layouts.admin.app');
    }
}
