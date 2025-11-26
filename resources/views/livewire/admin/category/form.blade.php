<div>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-12"><h4>مدیریت ویژگی‌های دسته‌بندی</h4></div>
            </div>
        </div>

        <div class="widget-content widget-content-area">
            <form wire:submit.prevent="submit">
                <div class="form-group mb-3">
                    <input wire:model="name" type="text" class="form-control" placeholder="نام ویژگی">
                </div>
                @error('name')
                <div class="alert alert-danger mb-4" wire:loading.remove>{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <select wire:model="attr" class="form-control">
                        <option value="">انتخاب دسته‌بندی</option>
                        @foreach($allcategories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('attr')
                <div class="alert alert-danger mb-4" wire:loading.remove>{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-info btn-lg mb-3 mr-3">
                    <div wire:loading class="spinner-border text-primary align-self-center"></div>
                    <span wire:loading.remove>ثبت</span>
                </button>
            </form>
        </div>
    </div>
</div>

