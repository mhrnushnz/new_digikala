<div>
    @push('link')
        <link href="/admin/assets/css/apps/invoice.css" rel="stylesheet" type="text/css" />

    @endpush



    <div class="row invoice layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="app-hamburger-container">
                    <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></div>
                </div>
                <div class="doc-container">
                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="search">
                                    <input type="text" class="form-control" placeholder="جستجو کنید...">
                                </div>
                                <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="00001">
                                            <div class="f-m-body">
                                                <div class="f-head">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                </div>
                                                <div class="f-body">
                                                    <p class="invoice-number">فاکتور : #{{@$orderDatalise->payment->order_number}}</p>
                                                    <p class="invoice-customer-name"><span>به :</span>{{$orderDatalise->user->name}}</p>
                                                    <p class="invoice-generated-date">تاریخ: 12 مهر 1399</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-container">
                        <div class="invoice-inbox">

                            <div class="inv-not-selected">
                                <p>یک فاکتور را از لیست باز کنید.</p>
                            </div>

                            <div class="invoice-header-section">
                                <h4 class="inv-number"></h4>
                                <div class="invoice-action">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="پرینت"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                </div>
                            </div>

                            <div id="ct" class="">

                                <div class="invoice-00001">
                                    <div class="content-section  animated animatedFadeInUp fadeInUp">

                                        <div class="row inv--head-section">

                                            <div class="col-sm-6 col-12">
                                                <h3 class="in-heading">صورت حساب </h3>
                                            </div>
                                            <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                <div class="company-info">
                                                    <img  class="rounded-full w-1/6" src="https://tse1.mm.bing.net/th/id/OIP.jyS8nIednwP0f5AwhSAIVgAAAA?pid=Api&P=0&h=180" alt="">
                                                </div>
                                                <p class="inv-customer-name">تاریخ ثبت سفارش: {{jalali($orderDatalise->created_at)->format('d m y | h:i')}}</p>
                                                <p class="inv-customer-name">تاریخ آخرین تغییر: {{jalali($orderDatalise->updated_at)->format('d m y | h:i')}}</p>

                                            </div>

                                        </div>

                                        <div class="row inv--detail-section">

                                            <div class="col-sm-12 align-self-center  text-sm-left order-sm-0 order-1">
                                                <p class="inv-detail-title">از جانب : دیجی کالا</p>
                                            </div>

                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">فاکتور به</p>
                                            </div>


                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">شماره کارت :
                                                {{@$orderDatalise->payment->cardNumber}}
                                                </p>
                                            </div>


                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">
                                                    {{@$orderDatalise->payment->refNumber}}شماره مرجع :</p>
                                            </div>


                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to">
                                                    درگاه: {{@$orderDatalise->deliveryMethod->name}}</p>
                                            </div>


                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-to text-white badge bg-{{$orderDatalise->statusPaymentColor}}">
                                                    وضعیت پرداخت :{{@$orderDatalise->status}}</p>
                                            </div>

                                            <div class="col-sm-7 align-self-center">
                                                <p class="inv-customer-name">{{$orderDatalise->user->name}}</p>
                                                <p class="inv-street-addr">{{$orderDatalise->user->email}}</p>
                                                <p class="inv-email-address">{{$orderDatalise->user->mobile}}</p>
                                                <p class="inv-email-address">
                                                    آدرس:
                                                    {{$orderDatalise->address->country->name}},
                                                    {{$orderDatalise->address->state->name}},
                                                    {{$orderDatalise->address->address}},
                                                </p>
                                                <p class="inv-email-address">کدپستی: {{$orderDatalise->address->postal_code}}</p>
                                                <p class="inv-email-address">شماره گیرنده: 0{{$orderDatalise->address->mobile}}</p>
                                            </div>
                                            <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                <p class="inv-list-number"><span class="inv-title">شماره فاکتور:</span> <span class="inv-number">{{$orderDatalise->order_number}}</span></p>
                                                <p class="inv-created-date"><span class="inv-title">تاریخ فاکتور:</span> <span class="inv-date">20 مهر 1399</span></p>
                                                <p class="inv-due-date"><span class="inv-title">موعد مقرر:</span> <span class="inv-date">26 مهر 1399</span></p>
                                            </div>
                                        </div>

                                        <div class="row inv--product-table-section">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col">ردیف</th>
                                                            <th scope="col">تصویر محصول</th>
                                                            <th scope="col">نام محصول</th>
                                                            <th class="text-right" scope="col">تعداد</th>
                                                            <th class="text-right" scope="col">قیمت واحد</th>
                                                            <th class="text-right" scope="col">قیمت کل</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orderDatalise->orderItems as $order)
                                                            <tr>
                                                                <td>{{$loop->index+1}}</td>
                                                                <td>
                                                                    <img class="rounded" src="/products/{{$order->product->id}}/small/{{@$order->product->coverImage->path}}" alt="">
                                                                </td>
                                                                <td>{{$order->product->name}}</td>
                                                                <td class="text-right">{{$order->quantity}}</td>
                                                                <td class="text-right">{{number_format($order->price)}}</td>
                                                                <td class="text-right">{{$order->price * $order->quantity}} تومان</td>
                                                            </tr>
                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                <div class="inv--payment-info">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-12">
                                                            <h6 class=" inv-title">اطلاعات پرداخت</h6>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">نام بانک : </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">بانک مرکزی ایران</p>
                                                        </div>
                                                        <div class="col-sm-4 col-12">
                                                            <p class=" inv-subtitle">شماره حساب : </p>
                                                        </div>
                                                        <div class="col-sm-8 col-12">
                                                            <p class="">1234567890</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 flex flex-col justify-content-end col-12 order-sm-1 order-0">
                                                <div class="inv--total-amounts text-sm-right">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">زیر مجموع: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">13000 تومان</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class="">مالیات: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">7000 تومان</p>
                                                        </div>
                                                        <div class="col-sm-8 col-7">
                                                            <p class=" discount-rate">تخفیف:<span class="discount-percentage">5%</span> </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5">
                                                            <p class="">7000 تومان</p>
                                                        </div>

                                                        <div class="col-sm-8 col-7 grand-total-title">
                                                            <p class="">کل: </p>
                                                        </div>
                                                        <div class="col-sm-4 col-5 grand-total-amount">
                                                            <p class="">{{number_format($orderDatalise->amount)}}تومان</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <p>تغییر وضعیت</p>
                                                    <select class="form-control bg-{{$orderDatalise->statusColor}}" wire:change="changeStatus({{$order->id}}, $event.target.value)">
                                                        <option value="pending"  {{$orderDatalise->status == 'pending'? 'selected' : ''}}>pending</option>
                                                        <option value="processing " {{$orderDatalise->status == 'processing'? 'selected' : ''}}>processing</option>
                                                        <option value="completed"  {{$orderDatalise->status == 'completed'? 'selected'  : ''}}>completed</option>
                                                        <option value="cancel"  {{$orderDatalise->status == 'cancel'? 'selected' : ''}}>cancel</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="inv--thankYou">
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <p class="">ممنون از اینکه با ما کار کردید</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>



    @push('script_order')
            <script src="/admin/assets/js/apps/invoice.js"></script>
    @endpush
</div>
