<?php
namespace App\Livewire\Client\Shipping;
use App\Models\Address;
use App\Models\City;
use App\Models\DeliveryMethod;
use App\Models\State;
use Illuminate\Support\Facades\Session;
use Livewire\Component;


class Index extends Component{
    public $deliveries =[];
    public $addressList = [];
    public $cities = [];
    public $getProvinces = [];
    public $addressId = 0;


    public $city ='';
    public $province ='';
    public $address ='';
    public $number ='';
    public $postalCode ='';

    public $totalProductCount;
    public $totalOrginalPrice;
    public $totalDiscount;
    public $totalDiscountedPrice;





    public function mount(){

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
        $this->reset(['address', 'state_id', 'city_id', 'postal_code']);

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
        $this->getProvinces = State::all();
    }



    public function getCity($value)
    {
        $this->addressList = Address::query()->where('user_id' , '=', 2)->latest()->get();
        $this->cities = City::query()->where('state_id', $value)->get();
    }




    public function render(){
        return view('livewire.client.shipping.index')->layout('layouts.client.app-v2');
    }
}
