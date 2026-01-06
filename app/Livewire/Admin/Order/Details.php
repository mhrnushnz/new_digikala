<?php
namespace App\Livewire\Admin\Order;
use App\Models\Order;
use Livewire\Component;

class Details extends Component{

    public $orderDatalise;
    public Order $order;

    public function mount(Order $order)
    {
        $orderDatalis =$this->orderDatalise = $order->load(
            [
                'products',
                'payment',
                'address',
                'address.country',
                'address.city',
                'address.state',
                'paymentMethod',
                'deliveryMethod',
                'orderItems.product:id,name,price,p_code',       //به صورت زنجیره ای از orderItems بهproduct وصل شدیم و فیلد های مورد نظر رو انتخاب کردیم
                'orderItems.product.coverImage:id,path,product_id',         //دوباره اینم ازorderItems بهproduct و بعد بهcoverImage وصل شدیم تا عکسای محصول هم پیدا کنیم این درواقع اتصال به صورت زنجیره وار هست
            ]);//زمانی ازload استفاده میکنیم که متغییری از مدل داشته باشیم و بخواهیم از ی ریلیشن استفاده کنیم براش

            $parts = explode("-", $orderDatalis->order_number);
            $orderDatalis->order_number = $parts[2]?? null;
            $order->statusPaymentColor = $this->getStatusColor($order->status);

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


    public function render()
    {
        return view('livewire.admin.order.details')->layout('layouts.admin.app');
    }
}
