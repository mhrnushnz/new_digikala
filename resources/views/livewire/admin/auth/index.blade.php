<div class="form-form">
    <div class="form-form-wrap">
        <div class="form-container">
            <form wire:submit.prevent="Submit" class="" autocomplete="on">
                <div class="form-content">

                    <h1 class="">ورودی</h1>
                    <p class="">برای ادامه به حساب کاربری خود وارد شوید</p>

                    <form class="text-left">
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <label for="email">ایمیل</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input wire:model="email" id="email" name="email" type="email" class="form-control" placeholder="iman">
                                @error('email')
                                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                    <strong>خطا!</strong> {{ $message }} </button>
                                </div>
                                @enderror
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">رمزعبور</label>
                                    <a href="/admin/auth_pass_recovery_boxed.html" class="forgot-pass-link">رمز عبور را فراموش کرده اید؟</a>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input wire:model="password" id="password" name="password" type="password" class="form-control" placeholder="رمزعبور">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                @error('password')
                                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                    <strong>خطا!</strong> {{ $message }} </button>
                                </div>
                                @enderror
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">ورودی</button>
                                </div>
                            </div>

                            <p class="signup-link">حساب ندارید؟ <a href="{{ route('client.auth.index') }}"> یک حساب کاربری ایجاد کنید</a></p>

                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
