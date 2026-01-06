<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class Index extends Component
{
    public $search = '';



    public function changeStatus($orderId, $statusValue)
    {
        $validatedData =  $this->validate(['status'=>$statusValue , 'id'=>$orderId],[
            'status' => 'required|in: pending, completed, cancelled',
            'id' => 'required|exists:orders,id'
        ],[
            '*.required' => 'پر کردن فیلد الزامی است',
            'status.in' => 'مقدار وارد شده اشتباه است',
            'id.exists'=>'سفارش نامعتبر است'
        ]);


        Order::query()->updateOrCreate(
            ['id'=>$orderId]
            ,
            ['status' => $statusValue]
        );

        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
    }


    public function getStatusColor($status)
    {
        switch ($status) {
            case 'pending':
                return 'primary';
            case 'completed':
                return 'success';
            case 'cancelled':
                return 'danger';
            case 'processing':
                return 'info';
        }
    }



    public function render()
    {
        $ordersQuery = Order::query()->with( 'user', 'orderItems')->when($this->search, function ($query) {      //وقتی داریم$this->search رو پاس میدیم در کالبک فانکشن به صورت ورودی میشینه
            $query->where('order_number', 'like', '%' . $this->search . '%')->
                orWhereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('mobile', 'like', '%' . $this->search . '%')       //'%'.$this->search.'%' یعنی اون چیزی ک من سرچ میکنم تو اینپوت ممکنه پسوند یا پیشوند داشته باشه این درصد ها همون پسوند یا پیشوند هاس
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });

    })->latest();

        if(isset($_GET['status']) and $_GET['status'] != 'all'){
            $ordersQuery->where('status','=', $_GET['status']);    //باید قبل از paginate شرط رو بنویسیم(فیلتر کردن بر اساس نوع استاتوس)
        }



    $orders = $ordersQuery->paginate(10);



        $orders->getCollection()->transform(function($order){
            $parts = explode("-", $order->order_number);
            $order->order_number = $parts[2]?? null;
            $order->statusColor = $this->getStatusColor($order->status);
            return $order;        //این کد ایتم سوم از شماره سفارش رو میگیره و برمیگردونه
        });



        return view('livewire.admin.order.index', compact('orders'))->layout('layouts.admin.app');
    }
}
