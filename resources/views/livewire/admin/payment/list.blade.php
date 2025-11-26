<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <div>
                <h6>لیست روش های پرداخت</h6>
            </div>
            <thead>
            <tr>
                <th>#</th>
                <th>روش پرداخت</th>
                <th>کدشناسایی درگاه</th>
                <th class="no-content"></th>
                <th class="no-content"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($peyments as $peyment)
                <tr>
                    <td> {{ $loop->index + 1 }} </td>   {{--  شمارش اعداد --}}
                    <td> {{$peyment->name }} </td>
                    <td> {{$peyment->price }} </td>
                    <td class="text-end "><a wire:click="edit({{$peyment->id}})" href="#" class="hover:bg-succese-600">Edit</a></td>
                    <td class="text-start hover:bg-red-600"><a wire:click="delete({{$peyment->id}})" wire:confirm="آیا مطمئن هستید؟" href="#" class="hover:bg-danger-600">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
