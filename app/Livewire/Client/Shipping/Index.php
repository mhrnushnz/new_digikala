<?php
namespace App\Livewire\Client\Shipping;
use App\Models\Address;
use App\Models\City;
use App\Models\Coupon;
use App\Models\DeliveryMethod;
use App\Models\State;
use App\Traits\PaymentGetWay;
use Artesaos\SEOTools\Traits\SEOTools;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;


class Index extends Component{
    use PaymentGetWay;
    use SEOTools;

    public $deliveries =[];
    public $addressList = [];
    public $cities = [];
    public $getProvinces = [];



    public $city ='';
    public $province ='';
    public $address ='';
    public $number ='';
    public $postalCode ='';
    public $code = '';

    public $addressId = 0;
    public $totalProductCount = 0;
    public $totalOrginalPrice = 0;
    public $totalDiscount = 0;
    public $totalDiscountedPrice = 0;
    public $discountCodeAmount = 0;
    public $deliveryPrice = 0;
    public $totalAmount = 0;



    public function mount(){
        $this->seoConfig();
        if (Session::get('inVoiceFormCart')) {
            $this->deliveries = Session::get('inVoiceFormCart');
            $this->totalProductCount = $invoice['totalProductCount'];
            $this->totalOrginalPrice = $invoice['totalProductCount'];
            $this->totalDiscount = $invoice['totalProductCount'];
            $this->totalDiscountedPrice  = $invoice['totalProductCount'];

        }


        $this->getProvinces = State::all();
        $this->cities = City::all(); // خالی ولی امن
        $this->deliveries = DeliveryMethod::all();

        $this->deliveryPrice = $this->deliveries->first()->price;
        $this->totalAmountForPayment($this->totalDiscountedPrice, $this->deliveryPrice , $this->discountCodeAmount);

    }



    public function seoConfig()
    {
        $this->seo()
            ->setTitle('جزئیات ارسال سفارش')
            ->setDescription('هر آنچه که نیاز دارید با بهترین قیمت خرید کنید!-کلیک کنید!');
    }



    public function totalAmountForPayment($totalDiscountedPrice, $deliveryPrice, $discountCodeAmount){
        $this->totalAmount = ($totalDiscountedPrice + $deliveryPrice) - $discountCodeAmount;

    }



    public function changeDeliveryPrice($deliveryId){
        $newDeliveryPrice = $this->deliveryPrice = DeliveryMethod::query()->where('id', $deliveryId)->pluck('price')->first();
        $this->totalAmountForPayment($this->totalDiscountedPrice, $newDeliveryPrice , $this->discountCodeAmount);

    }




    public function submitAddress()
    {
        $validatedData =  $this->validate([
            'address' => 'required|string|max:100|min:10',
            'province' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'postalCode' => 'required|regex:/^[1-9][0-9]{9}$/',
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت نام اشتباه است',                                   //این ولیدیشن از فرممون میاد!
            '*.max' => ' حداکثر تعداد کاراکتر ها 100 می باشد',
            '*.min' => ' حداقل تعداد کاراکتر ها 10 می باشد',
            'province.exists' => 'استان نامعتبر است!',
            'city.exists' => 'شهر نامعتبر است!',
            'postalCode.regex' => 'کد پستی باید یک عدد ده رقمی باشد که با صفر شروع نشود'
            //
        ]);
        Address::query()->updateOrCreate([
            'id' => $this->addressId,
        ],[
            'address' => $validatedData['address'],
            'state_id' => $validatedData['province'],
            'city_id' => $validatedData['city'],
            'country_id' => 1,
            'postal_code' => $validatedData['postalCode'],
            'user_id' => 2,
        ]);


        // بعد از ثبت موفق
        $this->reset(['address', 'province', 'city_id', 'postal_code']);

    }


    public function editAddress($addressId){
        $this->addressId = $addressId;
        $addressData = Address::query()->where('id', $this->addressId)->first();
        if($addressData){
            $this->address = $addressData->address;
            $this->number = $addressData->mobile;
            $this->postalCode = $addressData->postal_code;
            $this->getProvinces('edit');
            $this->province = $addressData->state_id;
            $this->getCity($this->province);
            $this->city = $addressData->city_id;
        }
    }



    public function getProvinces($type){
        if($type == 'add'){
            $this->reset();
        }
        else{
            $this->getProvinces = State::all();
        }
    }



    public function getCity($value)
    {
        $this->addressList = Address::query()->where('user_id' , '=', 2)->latest()->get();
        $this->cities = City::query()->where('state_id', $value)->get();
    }



    public function checkDiscountCode()
    {
        $validatedData =  $this->validate([
            'code' => 'required|string|max:6|min:4|exists:coupons,code',
            ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            '*.string' => 'فرمت کد اشتباه است',                                   //این ولیدیشن از فرممون میاد!
            '*.max' => ' حداکثر تعداد کاراکتر ها 6 می باشد',
            '*.min' => ' حداقل تعداد کاراکتر ها 4 می باشد',
            'code.exists' => 'کد نامعتبر است!',
            //
        ]);
        // بعد از ثبت موفق
        $this->reset('code');

        $code = Coupon::query()->where('code', $validatedData['code'])->first();
        $this->applyDiscount($code);

    }



    public function applyDiscount($code)
    {
        if (!$code->is_active || Carbon::parse($code->expires_at)->isPast()) {
            session()->flash('error', 'این کد تخفیف معتبر نیست منقضی شده است');
            return;
        }


        if (($this->totalAmount < $code->min_purchase) || $code->limit < 0) {
            session()->flash('error', 'شرایط استفاده از این کد تخفیف برقرار نیست');
            return;
        }


        $this->discountCodeAmount = $discount = $code->type == 'precent' ? ($this->totalDiscountedPrice * $code->value) / 100 : $code->value; ;
        $this->totalAmountForPayment($this->totalDiscountedPrice, $this->deliveryPrice, $discount);
        session()->flash('success', 'کد تخفیف با موفقیت فعال شد');

    }



    public function submitOrder()
    {
        $this->zibalRequest($this->totalAmount);
    }




    public function render(){
        return view('livewire.client.shipping.index')->layout('layouts.client.app-v2');
    }
}
