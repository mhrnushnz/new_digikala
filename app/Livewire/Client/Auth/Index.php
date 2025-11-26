<?php
namespace App\Livewire\Client\Auth;
use App\Repositories\client\ClientAuthRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class Index extends Component{
    public $email_number;

    public function mount(){

    }




    public function login(){
        dd('این تابع اجرا میشه');
        $this->validate([
            'email_number' => 'required|min:5|max:50'
        ]);

        // چک می‌کنیم کاربر وجود دارد یا نه
        $user = \App\Models\User::firstOrCreate(
            ['email' => $this->email_number], // یا phone
            ['password' => bcrypt('password')] // برای تست
        );

        // لاگین کاربر
        \Illuminate\Support\Facades\Auth::login($user);

        // ریدایرکت
        return redirect()->route('home');
    }

    public function redirectToProvider(){


        return redirect()->to(
            Socialite::driver('google')->redirect()->getTargetUrl()
        );    //این میره وصل میشه به گوگل


    }


    public function handelProviderCallback(){
        $repository = new ClientAuthRepository();     //به روش های تابع boot نمی تونیم از ریپازیتوری استفاده کنیم برای همین اینجوری از همون ریپازیتوری شی میسازیم!
        $gmailUser = Socialite::driver('google')->stateless()->user();    //کاربر رو میسازه اکانت گوگلش رو
        $repository->CheckUser($gmailUser);
        return redirect()->route('home');
    }

    public function clientLogout(){
        session()->flush();                            //1.حذف سشن
        Auth::logout(); //2.خروج کاربر از حساب کاربری
        return redirect()->route('client.auth.index');    //3.رفتن به صفحه مورد نظر
    }


    public function render(){
        return view('livewire.client.auth.index')->layout('layouts.client.auth');
    }
}
