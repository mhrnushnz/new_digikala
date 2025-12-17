<?php
namespace App\Livewire\Client\Cart;
use App\Models\Cart;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;

class Index extends Component
{
    public $cartItems = [];
    public $inVoice = [] ;
    public $outOfStock = false;



    public function redirectTo(){
        return redirect()->route('client.shipping.index');
    }


    public function updateCartQuantity($itemId, $action){
        $cartItem = Cart::query()->where('id', $itemId)->with('product:id, stock')->first();

        if (!$cartItem) {
            return 'آیتم مورد نظر در پسبد خرید پیدا نشد';
        }


        if ($action === 'increase') {
            if ($cartItem->quantity < $cartItem->product->stock) {
                $cartItem->increment('quantity');      //این تابع به صورت پیش فرض یک عدد به کوانتیتی اضافه میکنه
            }else{
                $this->outOfStock = true;
            }

        }elseif ($action === 'decrease') {
            $cartItem->decrement('quantity');      //این تابع به صورت پیش فرض یک عدد از کوانتیتی کم میکنه

            if ($cartItem->quantity < 1) {
                $cartItem->delete();
            }
        }
    }



    public function render(){
        $this->cartItems = Cart::query()
            ->where('user_id', '=' , 1)
            ->with(['product:id,name,price,seller_id,discount,stock,p_code,featured'], 'product')->get()
            ->map(function ($item) {       //روی دیتا(اطلاعات)هر محصول مپ میزنیم ینی تمامی دیتاها داخل$item هستن حالا ما میخوایم رو قیمت محاسبات انجام بدیم
                $product = $item->product;


                //قیمت هر محصول  (quantity = تعداد محصول)
                $originalPrice = $product->price * $item->quantity;
                // محاسبه قیمت تخفیف
                $discountAmount = $product->discount ? $product->price * $product->discount / 100 * $item->quantity : 0;
                //قیمت تخفیف خورده نهایی
                $discountPrice = $originalPrice - $discountAmount;


                $this->originalPrice = $originalPrice;
                $this->discountAmount = $discountAmount;
                $this->discountPrice = $discountPrice;

                return $item;
            });


        $this->inVoice =[
            'totalProductCount' => $this->cartItems->count(),
            'totalOriginalPrice' => $this->cartItems->sum('originalPrice'),
            'totalDiscount' => $this->cartItems->sum('discountAmount'),
            'totalDiscountedPrice' => $this->cartItems->sum('discountPrice'),
        ];


         Session::put('inVoiceFormCart', $this->inVoice);



        return view('livewire.client.cart.index')->layout('layouts.client.app-v2');
    }
}
