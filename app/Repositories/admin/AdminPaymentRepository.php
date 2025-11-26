<?php
namespace App\Repositories\admin;
use App\Models\CategoryFeatureValue;
use App\Models\PeymentMethod;

class AdminPaymentRepository implements AdminPaymentRepositoryInterface{
    public function submitPeyment($validatedData, $paymentId){
        PeymentMethod::query()->updateOrCreate([
            'id' => $paymentId,                                                      //بررسی وجود این دسته بندی
        ],[
            'name' => $validatedData['payment_name'],
            'merchent_code_payment' => $validatedData['merchent_code']//ساختن یا اپ دیت کردن دسته بندی
                   //این اطلاعات از خوده جدول دسته بندی بررسی میشه
        ]);
    }
}
