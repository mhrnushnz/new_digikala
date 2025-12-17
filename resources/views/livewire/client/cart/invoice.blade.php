<div>
    <div class="cart-invoice">
            <div class="d-flex justify-content-between mb-3">
                <span>قیمت کالاها {{ $inVoice['totalProductCount'] }} </span>
                <span>{{ number_format( $inVoice['totalOriginalPrice']) }} تومان </span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span>جمع سبد خرید </span>
                <span>{{ number_format( $inVoice['totalDiscountedPrice']) }} تومان </span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span>سود شما از خرید </span>
                <span>{{ number_format( $inVoice['totalDiscount']) }}  تومان </span>
            </div>

            <button wire:click="redirectTo" class="addToBasket-btn w-100 d-md-none d-sm-none">
                تایید و تکمیل سفارش
            </button>

            <div class="complete-order-mobile d-lg-none">
                <button class="addToBasket-btn w-50 ">
                    تایید و تکمیل سفارش
                </button>
                <div>
                    <span class="d-block">جمع سبد خرید</span>
                    <span>{{ number_format( $inVoice['totalDiscountedPrice']) }} تومان </span>
                </div>
            </div>
        </div>
</div>
