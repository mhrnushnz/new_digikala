<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th>تصویر بند انگشتی</th>
                <th>استوری</th>
                <th class="no-content"></th>
                <th class="no-content"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stories as $item)
                <tr>
                    <td> {{ $loop->index + 1 }} </td>   {{--  شمارش اعداد --}}
                    <td> {{$item->title }} </td>
                    <td> {{$item->thumbnail }} </td>
                    <td> {{$item->story }} </td>
                    <td class="text-end "><a wire:click="edit({{$item->id}})" href="#" class="hover:bg-succese-600">Edit</a></td>
                    <td class="text-start hover:bg-red-600"><a wire:click="delete({{$item->id}})" wire:confirm="آیا مطمئن هستید؟" href="#" class="hover:bg-danger-600">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
