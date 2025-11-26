<div  >
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت اسلایدر ها </h4>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form wire:submit.prevent="submit" enctype="multipart/form-data">

                {{--  تمامی اطلاعات داخل جدول با formData فرستاده میشه  --}}

                <div class="form-group mb-3">
                    <input wire:model="title" type="text" name="title" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="عنوان">
                </div>

                @error('title')
                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong> {{ $message }} </button>
                </div>
                @enderror


                <div class="form-group mb-3">
                    <input wire:model="link" type="text" name="link" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="لینک">
                </div>

                @error('link')
                <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                    <strong>خطا!</strong> {{ $message }} </button>
                </div>
                @enderror



                <div x-data="{ uploading: false, progress: 0 }"
                     x-on:livewire-upload-start="uploading = true"
                     x-on:livewire-upload-finish="uploading = false"
                     x-on:livewire-upload-cancel="uploading = false"
                     x-on:livewire-upload-error="uploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress"
                     class="custom-file-container">

                    <div class="form-group mb-3">
                        <input wire:model="image" type="file" name="image" class="form-control" id="price" aria-describedby="emailHelp1" placeholder="تصویر ">
                    </div>

                    <!-- Progress bar -->
                    <div x-show="uploading" class="progress br-30 progress-sm mt-3" style="height: 10px; overflow: hidden;">
                        <div class="progress-bar bg-gradient-secondary"
                             role="progressbar"
                             x-bind:style="'width: ' + progress + '%'"
                             aria-valuemin="0"
                             aria-valuemax="100"></div>
                    </div>

                    @error('image')
                    <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <svg> ... </svg>
                        </button>
                        <strong>خطا!</strong> {{ $message }}
                    </div>
                    @enderror

                    <!-- درصد عددی -->
                    <div x-show="uploading" class="text-center mt-2 text-secondary" x-text="progress + '%'"></div>
                </div>





                {{--  تمامی اطلاعات داخل جدول با formData فرستاده میشه  --}}


                <button  type="submit" class="btn btn-info btn-lg mb-3 mr-3">
                    <div wire:loading class="spinner-border text-primary align-self-center"></div>
                    <span wire:loading.remove>ثبت</span>
                </button>

            </form>
        </div>
    </div>
</div>
