<?php
namespace App\Livewire\Admin\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Index extends Component{
    public $password;
    public $email;
    public function Submit()
    {
        $validatedData =  validator([
            'email' => 'required|exists:admin,email', //نام استان
            'password' => 'required',    //آیدی کشور استان
        ],[
            //نوشتن ارور های دیگر و سفارشی
            '*.required' => 'پر کردن فیلد الزامی است',
            'email.exists' => 'ایمیل نامعتبر است',
            //
        ])->validate();

        $credentials = ['email' => $validatedData['email'], 'password' => $validatedData['password']];
        $admin = Auth::guard('admin');

        if ($admin->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }else{
            session()->flush('message', 'ایمیل یا رمز عبور نامعتبر است');
        }

        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد!');
    }


    public function render(){
        return view('livewire/admin/auth/index')->layout('layouts.admin.auth');
    }
}
