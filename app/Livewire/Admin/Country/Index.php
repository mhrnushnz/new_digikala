<?php
namespace App\Livewire\Admin\Country;
use App\Models\Country;
use App\Repositories\admin\AdminCategoryRepository;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component{

    use WithPagination;
    public $name;
    public $country_id;
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }

//این برای اعتبار سنجیه که ببنیم چیزی که کاربر وارد
// میکنه با شرط های ما سازگاره یا ن
      // در غیر این صورت خطا میده
    public function submit(){
        $validatedData =  $this->validate( [
            'name' => 'required|string|max:30',
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد'
            //
        ]);

        $this->repository->submit($validatedData, $this->country_id);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    //عملیات ویرایش نام کشور ها
    public function edit($country_id){
        $country = Country::query()->where('id', $country_id)->first();
        if ($country)
             $this->name = $country->name;    //انتقال دادن ایدی ب مقدار name کل
             $this->country_id = $country->id;
    }

    public function delete($country_id){
        Country::query()->where('id', $country_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }


    public function render(){
        $countries = Country::query()->paginate(10); //دریافت تمامی دیتا ها از جدولcountries
        return view('livewire.admin.country.index', compact('countries'))->layout('layouts.admin.app');

    }
}
