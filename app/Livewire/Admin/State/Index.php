<?php

namespace App\Livewire\Admin\State;
use App\Models\Country;
use App\Models\State;
use App\Repositories\admin\AdminCategoryRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use HasFactory;
    use WithPagination;

    public $countries = [];  //اینا نام فید هامونه چون از لایوایر توی هر فید استفاده کردیم برای ارسالش پس باید نام خوده فیلد رو اینجا بگیریم
    public $statesId;
    public $name;
    public $country_id;
    public $state_id;
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }


    public function mount(){
        $this->countries = Country::all();
    }


    public function submit(State $state){

        $validatedData =  $this->validate([
            'name' => 'required|string|max:30', //نام استان
            'country_id' => 'required|exists:countries,id',    //آیدی کشور استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد',
            'country_id.exists' => 'نام استان نامعتبر است',
            //
        ]);

        $this->repository->submitState($validatedData, $this->statesId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    public function edit($stateId){

        $check_state = State::query()->where('id', $stateId)->first();
        if ($check_state)
            $this->name = $check_state->name;    //انتقال دادن ایدی ب مقدار name کل
            $this->statesId = $check_state->id;
            $this->country_id = $check_state->country_id;
    }


    public function delete($stateId){
        State::query()->where('id', $stateId)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد!');
    }


    public function render()
    {
        $states = State::query()->with('country')->paginate(10);
        return view('livewire.admin.state.index', compact('states'))->layout('layouts.admin.app');
    }
}
