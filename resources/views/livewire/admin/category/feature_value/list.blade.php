<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>مقدار</th>
                <th class="no-content"></th>
                <th class="no-content"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categoryFeatureValue as $featurvalue)
                <tr>
                    <td> {{ $loop->index + 1 }} </td>   {{--  شمارش اعداد --}}
                    <td> {{ $featurvalue->value }} </td>
                    <td class="text-end "><a wire:click="edit({{$featurvalue->id}})" href="#" class="hover:bg-succese-600">Edit</a></td>
                    <td class="text-start hover:bg-red-600"><a wire:click="delete({{$featurvalue->id}})" wire:confirm="آیا مطمئن هستید؟" href="#" class="hover:bg-danger-600">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
