<div>
    @foreach($cartItems as $cartItem)
        <div class="cart-item">
            <!-- Cart product -->
            <div class="cart-item__product d-flex">
                <div class="cart-item__img">
                    <img src="/client/assets-v2/images/product/p-t-1.jpg" alt="" />
                </div>
                <div class="cart-item__details">
                    <h3 class="cart-item__title">{{$cartItem->product->name}}</h3>
                    <ul class="cart-item__info">
                        <li class="cart-item__info-item d-flex align-items-start">
                                <span style="background: #000"></span>
                                مشکی
                            </li>
                        <li class="cart-item__info-item d-flex align-items-start">
                                <i class="fs-6 ml-2 fa fa-shield-check"></i>
                                گارانتی
                            </li>
                        <li class="cart-item__info-item d-flex align-items-start">
                                <i class="fs-6 ml-2 fa fa-truck"></i>
                                ارسال با دیجی کالا
                            </li>
                        <li class="cart-item__info-item d-flex align-items-start">
                                <i class="fs-6 ml-2 fa fa-store"></i>
                                فروشنده : دیجی کالا
                            </li>
                    </ul>
                </div>
            </div>


            <!-- Cart-counter & price -->
            <div class="cart-item__footer d-flex align-items-center mt-3">
                <!-- counter -->
                <div class="cart-counter">
                        <button {{$outOfStock ? 'disable' : ''}} class="{{ $outOfStock ? 'disable' : '' }} cart-counter__add" wire:click="updateCartQuantity({{$cartItem->id}}, 'increment')" >
                            <i class="fa fa-plus"></i>
                        </button>

                        <span class="cart-counter__number">{{$cartItem->quantity_id}}</span>


                        @if($cartItem->quantity === 1)
                            <button wire:click="updateCartQuantity({{$cartItem->id}}), 'decrement'" class="cart-counter__remove">
                                <i class="fa fa-trash"></i>
                            </button>
                        @else
                            <button wire:click="updateCartQuantity({{$cartItem->id}}), 'decrement'" class="cart-counter__remove">
                                <i class="fa fa-dash"></i>
                            </button>
                        @endif

                    </div>


                <!-- product price -->
                <div class="cart-item__footer-price">
                    <span class="cart-item__footer-discounted-price">
                        {{ number_format($cartItem->discountAmount) }} تخفیف تومان
                    </span>
                    <span class="cart-item__footer-new-price">{{$cartItem->discountPrice}}</span>تومان
                </div>
            </div>
        </div>
    @endforeach
</div>
