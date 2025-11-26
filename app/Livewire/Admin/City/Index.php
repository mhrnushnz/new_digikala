<?php
namespace App\Livewire\Admin\City;
use App\Models\City;
use App\Models\State;
use App\Repositories\admin\AdminCategoryRepository;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component{
    use WithPagination;

    public $states = [];  //اینا نام فید هامونه چون از لایوایر توی هر فید استفاده کردیم برای ارسالش پس باید نام خوده فیلد رو اینجا بگیریم

    public $name;
    public $city_id;
    public $state_id;
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }


    public function mount(){
        $this->states = State::all();
    }


    public function submit(){

        $validatedData =  $this->validate([
            'name' => 'required|string|max:30', //نام استان
            'state_id' => 'required|exists:states,id',    //آیدی کشور استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد',
            'state_id.exists' => 'نام شهر نامعتبر است',
            //
        ]);

        $this->repository->submitCity($validatedData, $this->city_id );
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    public function edit($city_id){
        $check_city = City::query()->where('id', $city_id)->first();
        if ($check_city)
            $this->name = $check_city->name;    //انتقال دادن ایدی ب مقدار name کل
            $this->city_id = $check_city->id;
            $this->state_id = $check_city->state_id;
    }



    public function delete($city_id){
        City::query()->where('id', $city_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }



    public function render(){
        $cities = City::query()->with('state')->paginate(10);
        return view('livewire.admin.city.index', compact('cities'))->layout('layouts.admin.app');
    }
}
