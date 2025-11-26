<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| این فایل برای تعریف دستورات Artisan سفارشی استفاده می‌شود. دستورات
| تعریف شده در اینجا با اجرای php artisan در کنسول شما در دسترس خواهند بود.
|
*/

// دستور پیش‌فرض لاراول برای الهام گرفتن
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
