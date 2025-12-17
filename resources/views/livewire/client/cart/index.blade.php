<div>

    @push('link')
        <link rel="stylesheet" href="/client/assets-v2/css/cart.css">
    @endpush



    <section class="d-flex cart-container">
        <!-- Cart-right -->
        <div class="cart-right">
            @include('livewire.client.cart.item')
        </div>



        <!-- Cart-left -->
        <div class="cart-left">
            @include('livewire.client.cart.invoice')
        </div>
    </section>
</div>
