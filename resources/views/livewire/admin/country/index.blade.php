<div class="row ">

{{--  form  --}}
    <div class="col-md-4">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>مدیریت کشور ها </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit.prevent="submit">

                    {{--  تمامی اطلاعات داخل جدول با formData فرستاده میشه  --}}

                    <div class="form-group mb-3">

                        <input wire:model="name" type="text" name="name" class="form-control" id="sEmail" aria-describedby="emailHelp1" placeholder="کشور">
                    </div>
                    @error('name')
                   <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong> {{ $message }}
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


{{--  list  --}}
    <div class="col-md-8">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover p-4" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="w-50">نام کشور</th>
                        <th class="no-content w-[50px]"></th>
                        <th class="no-content w-[50px]"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                           <td> {{ $loop->index + 1 }} </td>   {{--  شمارش اعداد --}}
                            <td> {{ $country->name }} </td>
                            <td class="text-center hover:bg-green-600 m-4"><a wire:click="edit({{$country->id}})" href="#" class="hover:bg-succese-600">Edit</a></td>
                            <td class="text-center hover:bg-red-600 m-4"><a wire:click="delete({{$country->id}})" wire:confirm="آیا مطمئن هستید؟" href="#" class="hover:bg-danger-600">Delete</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
