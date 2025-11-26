<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>عنوان</th>
                <th>لینک</th>
                <th>تصویر</th>
                <th class="no-content"></th>
                <th class="no-content"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td> {{ $loop->index + 1 }} </td>   {{--  شمارش اعداد --}}
                    <td> {{ $slider->name }} </td>
                    <td> {{ $slider->name }} </td>
                    <td> {{ $slider->name }} </td>
                    <td class="text-end "><a wire:click="edit({{$slider->id}})" href="#" class="hover:bg-succese-600">Edit</a></td>
                    <td class="text-start hover:bg-red-600"><a wire:click="delete({{$slider->id}})" wire:confirm="آیا مطمئن هستید؟" href="#" class="hover:bg-danger-600">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
