<div class="statbox widget box box-shadow p-4">
    <form wire:submit.prevent="submit">
        @foreach($features as $index => $feature)
            <div class="row">
                <h6 class="col-md-2">{{@$feature->name}}</h6>
                <div class="col-md-6">
                    <select  wire:model="featureIdValue.{{$index}}" name="featureIdValue[{{$index}}]" class="selectpicker" placeholder="دسته بندی محصول">
                        @forelse(@$feature->categoryFeatureValues as $value)
                           <option
                               value="{{$feature->id}}_{{@$value->id}}"
                               {{$value->id == @$value->category_feature_id? 'checked' : ''}} >
                               {{$value->value}}
                           </option>
                        @empty
                            <option disabled>هیچ مقداری تعریف نشده</option>
                        @endforelse
                    </select>
                    @error('featureIdValue.*')
                    <div class="alert alert-danger mb-4" role="alert" wire:loading.remove>     {{--  از وایر دات لودینگ ریمو استفاده میکنیم که زمانی که دو باره ارور خواست نمایش داده شه در حد چند صدم ثانیع حذف بشه و دوباره نمایش داده شه --}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                        <strong>خطا!</strong> {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        @endforeach
            <br>
            <div class="">
                <button type="submit" class="btn btn-info btn-lg mb-3 mr-3">
                    <div wire:loading class="spinner-border text-primary align-self-center"></div>
                    <span wire:loading.remove>ذخیره</span>
                </button>
            </div>
    </form>


</div>
