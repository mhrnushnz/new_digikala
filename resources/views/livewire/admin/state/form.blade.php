<div  >
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت استان ها </h4>
                </div>
            </div>
        </div>



        <div class="widget-content widget-content-area">
            <form wire:submit.prevent="submit">

                {{--  تمامی اطلاعات داخل جدول با formData فرستاده میشه  --}}

                <div class="form-group mb-3">
                    <input wire:model="name" type="text" name="name" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="استان">
                </div>
                @error('name')
                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong> {{ $message }} </button>
                </div>
                @enderror


                {{--  تمامی اطلاعات داخل جدول با formData فرستاده میشه  --}}

                <div class="form-group mb-3">
                    <select wire:ignore wire:model="country_id" name="country_id" class="selectpicker" placeholder="انتخاب کشور">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach

                    </select>
                </div>
                @error('countryId')
                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong> {{ $message }} </button>
                </div>
                @enderror



                <button  type="submit" class="btn btn-info btn-lg mb-3 mr-3">
                    <div wire:loading class="spinner-border text-primary align-self-center"></div>
                    <span wire:loading.remove>ثبت</span>
                </button>

            </form>
        </div>
    </div>
</div>
