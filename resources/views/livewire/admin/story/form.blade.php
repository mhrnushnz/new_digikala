<div>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>مدیریت استوری ها</h4>
                </div>
            </div>
        </div>


        <div class="widget-content widget-content-area">
            <form wire:submit.prevent="submit">

                <div class="form-group mb-3">
                    <input wire:model="title" type="text" name="title" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="عنوان استوری">
                    @error('title')
                    <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong> {{ $message }}
                    </div>
                    @enderror
                </div>




                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" class="custom-file-container">
                    <div class="form-group mb-3">
                        <input wire:model="thumbnail" type="file" name="thumbnail" class="form-control" id="price" aria-describedby="emailHelp1" placeholder="تصویر استوری">
                    </div>

                    @error('thumbnail')
                    <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong> {{ $message }}
                    </div>
                    @enderror

                    <!-- Progress bar -->
                    <div x-show="uploading" class="progress br-30 progress-sm mt-3" style="height: 10px; overflow: hidden;">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" x-bind:style="'width: ' + progress + '%'" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <!-- درصد عددی -->
                    <div x-show="uploading" class="text-center mt-2 text-secondary" x-text="progress + '%'"></div>
                </div>



                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" class="custom-file-container">
                    <div class="form-group mb-3">
                        <input wire:model="story" multiple type="file" name="story" class="form-control" id="story">
                    </div>

                    @error('story')
                    <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong> {{ $message }}
                    </div>
                    @enderror

                    <!-- Progress bar -->
                    <div x-show="uploading" class="progress br-30 progress-sm mt-3" style="height: 10px; overflow: hidden;">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" x-bind:style="'width: ' + progress + '%'" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <!-- درصد عددی -->
                    <div x-show="uploading" class="text-center mt-2 text-secondary" x-text="progress + '%'"></div>
                </div>



                <button  type="submit" class="btn btn-info btn-lg mb-3 mr-3">
                    <div wire:loading class="spinner-border text-primary align-self-center"></div>
                    <span wire:loading.remove>ثبت</span>
                </button>
            </form>
        </div>
    </div>
</div>
