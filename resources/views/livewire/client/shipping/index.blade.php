<div>
    @push('link')
        <link rel="stylesheet" href="/client/assets-v2/css/shipping.css">
    @endpush



    <section class="shipping">
        <div class="mb-3 shipping-top d-flex align-items-center ">
          <span class="d-flex align-items-center">
            <i class="fa-light fa-arrow-right ml-2"></i>
            آدرس و زمان ارسال
          </span>
            <div class="logo">
                <img src="/client/assets-v2/images/full-horizontal.svg" alt=""/>
            </div>
        </div>

        <div class="shipping-content d-flex">
            <div class="shipping-right">
                <div class="shipping-address mb-3">
                    <div class="d-flex mb-3 align-items-center justify-content-between pr-2 pl-1">
                    <span class="fs-5 fw-bold">
                    آدرس های شما :
                </span>
                        <div class="add-new-address d-flex justify-content-end">
                            <button wire:click="getProvinces('add')" class="d-flex align-items-center  openModalBtn ">
                                <i class="fa fa-plus ml-2"></i>
                                افزودن آدرس جدید

                            </button>
                        </div>
                    </div>
                    @foreach($addressList as $item)
                        <div class="shipping-address__item d-flex align-items-center {{$loop->first ? 'active' : ''}}" wire:ignore.self>
                            <i class="fa-light fa-location-dot ml-3 fs-4"></i>
                            <div class="shipping-address__details">
                                <span class="d-block">ارسال به آدرس انتخاب شده</span>
                                <span>{{ $item->address }}</span>
                                <button wire:click="editAddress({{ $item->id }})" class="address-edit__btn d-flex align-items-center openModalBtn ">ویرایش آدرس
                                    <i class="fa fa-chevron-left mr-2"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="shipping-type " wire:ignore>
                <span class="fs-5 fw-bold mb-3 d-block">
                   نحوه ارسال :
                </span>
                    @foreach($deliveries as  $item)
                        <div class="shipping-type__item d-flex align-items-center {{$loop->first ? 'active' : ''}}">
                            <i class="fa fa-truck ml-3"></i>
                            <div class="">{{ $item->name }}
                                <span class="shipping-type__price">{{$item->price}}تومان</span>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>



            <div class="shipping-left">
                <div class="final-invoice">
                    <form class="discount-code mb-3">
                        <span class="mb-1 d-block">کد تحفیف</span>
                        <div class=" d-flex justify-content-between">
                            <input type="text" name="code">
                            <button>ثبت</button>
                        </div>

                    </form>
                    <div class="d-flex align-items-center mb-3 justify-content-between">
                        <span>
                            قیمت کالاها (۱)
                        </span>
                        <span>
                            ۱,۶۵۶,۰۰۰
                            تومان

                        </span>
                    </div>
                    <div class="d-flex align-items-center mb-3 justify-content-between">
                        <span>
                        هزینه ارسال
                        </span>
                        <span>
                            ۵۹,۰۰۰
                            تومان

                        </span>
                    </div>
                    <div class="d-flex  align-items-center mb-3 justify-content-between">
                        <span>
               سود شما از خرید


                        </span>
                        <span>
                           (۵٪)
۱۵۶,۰۰۰

                            تومان

                        </span>
                    </div>
                    <div class="d-flex df align-items-center mb-3 justify-content-between">
                        <span>
                       قابل پرداخت

                        </span>
                        <span>
                            ۱,۷۱۵,۰۰۰
                            تومان

                        </span>
                    </div>
                    <button class="addToBasket-btn w-100 p-2 fs-6 mt-2">
                        ثبت سفارش
                    </button>
                </div>

            </div>
        </div>
    </section>


    <!-- Add address modal box -->
    <div id="addressModal" class="modal addressModal">
        <div class="modal-content">
            <div class=" modal-header d-flex align-items-center justify-content-between pb-2">
                <h2>ویرایش آدرس</h2>
                <span class="close-btn">&times;</span>
            </div>


            <form wire:submit.prevent="submitAddress" autocomplete="on"  id="addressForm">
                <div class="field-wrapper">
                    <label for="address">نشانی پستی</label>
                    <textarea wire:model="address" name="address" id="address" rows="3"></textarea>
                    @error('address')
                    <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 field-wrapper">
                           <label for="province">استان:</label>
                           <select wire:model="province" wire:change="getProvinces($event.target.value)" id="province" name="province"> {{--  با این ترفند  مقدار ولیو عه آپشن هارو به بک انمد راحت میفرستیم  --}}
                                @foreach($getProvinces as $provinces)
                                    <option {{$province == $provinces->id? 'selected' : ''}} value="{{$provinces->id}}">{{$provinces->name}}</option>
                                @endforeach
                            </select>
                            @error('province')
                                <div class="validation-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 field-wrapper">
                            <label for="city">شهر:</label>
                            <select wire:model="city" wire:change="getCity($event.target.value)" id="city" name="city">
                                @foreach($cities as $item)
                                    <option {{$city == $item->id? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('city')
                            <div class="validation-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 field-wrapper">
                            <label for="postalCode">کدپستی:</label>
                            <input wire:model="postalCode" type="text" id="postalCode" name="postalCode" >
                        </div>
                        @error('postalCode')
                        <div class="validation-error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button class="addToBasket-btn w-100 p-2 fs-5 mt-2">
                    ثبت آدرس
                </button>
            </form>
        </div>
    </div>



    @push('script')
        <script src="/client/assets-v2/js/jquery.min.js"></script>
        <script src="/client/assets-v2/js/shipping.js"></script>
    @endpush
</div>
