<div class="p-4">
    <form wire:submit="submit" class="w-75">
        <h4> محتویات محصول {{$productName}}</h4>
        <div class="form-group mb-4">
            <label class="custom-control-label" for="long_description">معرفی محصول</label>
            <textarea wire:model="long_description" name="long_description" rows="10" type="text" class="form-control" id="long_description" ></textarea>
        </div>
        <div wire:ignore class="form-group mb-4">
            <label class="custom-control-label" for="short_description">بررسی تخصصی</label>
            <input wire:model="short_description" name="short_description"  type="text" class="form-control" id="short_description">
        </div>
        <button type="submit" class= " btn btn-primary mt-3">Submit</button>
    </form>
</div>



@push('script')            {{-- زمانی که این کامپوننت اstack باشن تو همه زمان و هر صفحه ای باشن اجرا میشن ولی اینجوری اجراشدن اسکریپت رو محدود میکنه --}}
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    document.addEventListener('livewire:init', () =>{
        const editor = CKEDITOR.replace('short_description', {
            fileBrowserUploadUrl:"{{route('admin.product.ck-upload', [ $productId , '_token'=> csrf_token() ])}}",
            fileBrowserUploadMethod: 'form',
            contentsLangDirection: 'rtl',
            height: 190,
        })

        editor.on('change',function (event){
            console.log(event.editor.getData)
            @this.set('short_description',event.editor.getData())
        })
    })
</script>
@endpush
