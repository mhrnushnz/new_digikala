<?php
namespace App\Livewire\Client\Auth;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;


class Index extends Component{
    public $email_number;



    public function login(){

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

        return Socialite::driver('google')->redirect();

    }


    public function handelProviderCallback(){
        $gmailUser = Socialite::driver('google')->stateless()->user();
        return Socialite::driver('google')->redirect();
    }




    public function clientLogout(){
        session()->flush();                            //1.حذف سشن
        Auth::logout(); //2.خروج کاربر از حساب کاربری
        return redirect()->route('home');    //3.رفتن به صفحه مورد نظر
    }



    public function render(){
        return view('livewire.client.auth.index')->layout('layouts.client.auth');
    }
}
