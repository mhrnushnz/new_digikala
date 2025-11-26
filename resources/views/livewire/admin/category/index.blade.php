<div>
    <div class="row">
        <div class="col-md-4">
            @include('livewire.admin.category.form')
        </div>

        <div class="col-md-8">
            @include('livewire.admin.category.list')
        </div>
    </div>
</div>


@push('error')
    <script>
        window.addEventListener('error', function (event) {
            swal({
                title: 'خطا!',
                text: event.detail,
                type: 'error',
                padding: '2em',
                timer: 3000
            })
        })
    </script>
@endpush
