<?php
namespace App\Livewire\Admin\Payment;
use App\Models\PeymentMethod;
use App\Repositories\admin\AdminCategoryRepository;
use Livewire\Component;


class Index extends Component{

    public $payment_name;
    public $merchent_code;
    public $peymentId;
    private $repository;

    public function boot(AdminCategoryRepository $adminCategoryRepository){
        $this->repository = $adminCategoryRepository;
    }

    public function mount(){

    }

    public function submit(){
        $validatedData =  $this->validate( [
            'payment_name' => 'required|string|max:30',
            'merchent_code' => 'nullable',
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد'
            //
        ]);

        $this->repository->submitPayment($validatedData, $this->peymentId);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }

    public function render(){
        $peyments = PeymentMethod::query()->paginate(10);
        return view('livewire.admin.payment.index', compact('peyments'))->layout('layouts.admin.app');
    }
}
