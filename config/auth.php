
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */
    //برای تغییرات احراز هویت معمولا با دیفالت کاری نداریم
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),            //مثل ی نگهبان تو دروازه شهره که بررسی میکنه ایا کاربر اجازه ورود داره یا ن
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the Eloquent user provider.
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',            //این گاردز بر اساس سشن هست
            'provider' => 'users',           //provider که روشون تاثیر میزاره کاربران هستن
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'seller' => [
            'driver' => 'session',
            'provider' => 'sellers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved out of your database or other storage
    | system used by the application. Typically, Eloquent is utilized.
    |
    | If you have multiple user tables or models you may configure multiple
    | providers to represent the model / table. These providers may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [                //مشخص میکنه اطلاعات کاربران از کجا و چه جوری دریافت بشه
        'users' => [
            'driver' => 'eloquent',                 //اطلاعات کاربران از درایورeloquent خوانده بشه میتونیم اینجا دیتا بیس هم بزاریم
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL_ADMIN', App\Models\Admin::class),   //ینی بره از مدل ادمین بخونه
        ],


        'sellers' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL_SELLER', App\Models\Seller::class),
        ],


        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | These configuration options specify the behavior of Laravel's password
    | reset functionality, including the table utilized for token storage
    | and the user provider that is invoked to actually retrieve users.
    |
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [             //برای پسورد
        'users' => [
            'provider' => 'users',             //برای کاربران عه
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'), //تیبلی که باید بره و توکن های بازنشنانی رمز عبور ذخیره بشه password_reset_tokens این تیبل عه
            'expire' => 60,          //مدت زمان اعتبار توکن برای بازنشنانی رمز عبور 60 دقیقه است
            'throttle' => 60,        //تعداد ثانیه هایی که قبل از ایجاد توکن جدید باید منتظر بمونه
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'sellers' => [
            'provider' => 'sellers',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the number of seconds before a password confirmation
    | window expires and users are asked to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),      //زمان انقضای تایید رمز عبور

];
