<?php
namespace App\Livewire\Admin\Order;

use function Laravel\Folio\render;
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
                'paymentMethod',
                'deliveryMethod',
                'address',
                'orderItems.product:id,name,price,p_code',       //به صورت زنجیره ای از orderItems بهproduct وصل شدیم و فیلد های مورد نظر رو انتخاب کردیم
                'orderItems.product.coverImage:id,path,product_id',         //دوباره اینم ازorderItems بهproduct و بعد بهcoverImage وصل شدیم تا عکسای محصول هم پیدا کنیم این درواقع اتصال به صورت زنجیره وار هست
            ]);//زمانی ازload استفاده میکنیم که متغییری از مدل داشته باشیم و بخواهیم از ی ریلیشن استفاده کنیم براش
            $parts = explode("-", $orderDatalis->order_number);
            $orderDatalis->order_number = $parts[2]?? null;
    }


    public function render()
    {
        return view('livewire.admin.order.details')->layout('layouts.admin.app');
    }
}
