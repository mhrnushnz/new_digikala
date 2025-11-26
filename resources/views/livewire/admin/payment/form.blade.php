<div>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت روش های پرداخت</h4>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form wire:submit.prevent="submit">

                <div class="form-group mb-3">
                    <input wire:model="payment_name" type="text" name="payment_name" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="نام روش پرداخت">
                </div>

                @error('payment_name')
                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong> {{ $message }}
                </div>
                @enderror


                <div class="form-group mb-3">
                    <input wire:model="merchent_code" type="text" name="merchent_code" class="form-control" id="price" aria-describedby="emailHelp1" placeholder="مرچنت کد(کد شناسایی درگاه)">
                </div>

                @error('merchent_code')
                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong> {{ $message }}
                </div>
                @enderror

                <button  type="submit" class="btn btn-info btn-lg mb-3 mr-3">
                    <div wire:loading wire:ignore class="spinner-border text-primary align-self-center"></div>
                    <span wire:loading.remove>ثبت</span>
                </button>
            </form>
        </div>
    </div>
</div>
