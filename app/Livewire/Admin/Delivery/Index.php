<?php
namespace App\Livewire\Admin\Delivery;
use App\Models\DeliveryMethod;
use App\Repositories\admin\AdminDeliveryRepository;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component{
    use WithPagination;
    public $name;
    public $price;
    public $deliveryId;
    private $repository;

    public function boot(AdminDeliveryRepository $adminDeliveryRepository){
        $this->repository = $adminDeliveryRepository;
    }


    public function submit(){
        $validatedData =  $this->validate([
            'name' => 'required|string|max:30', //نام استان
            'price' => 'required|numeric',    //آیدی کشور استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',
            '*.max' => ' حداکثر تعداد کاراکتر ها 30 می باشد',
            'price.numeric' => 'باید عدد وارد کنید',
            //
        ]);

        $this->repository->submiDelivery($validatedData, $this->deliveryId );
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    public function render(){
        $deliveries = DeliveryMethod::query()->paginate(10);
        return view('livewire.admin.delivery.index', compact('deliveries'))->layout('layouts.admin.app');
    }
}
