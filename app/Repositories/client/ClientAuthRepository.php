<?php

namespace App\Repositories\client;

class ClientAuthRepository implements ClientAuthRepositoryInterface{
    public function CheckUser($gmailUser){
        $existingUser = User::query()->where('email', $gmailUser->email)->first();   //کاربر با این ایمل رو از جدول پیدا میکنه

        if (!$existingUser) {    // اگر کاربر وجود نداشت با این ایمیل بره کاربر با این ایمیل رو بسازه یا اپ دیت کنه
            $newUser = User::query()->updateOrCreate([
                'email' => $gmailUser->email
            ],[
                'name' => $gmailUser->name,
                'picture' => $gmailUser->picture,
            ]);
            Auth::login($newUser, true);  //true به معنیه اینه منو به خاطر بسپار و از جدول حذف نکن


        } else {      //اگر کاربر وجو داشت همونو لاگین کنه تو سایت
            Auth::login($existingUser, true);
        }

    }

}
