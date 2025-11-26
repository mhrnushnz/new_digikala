<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>نام ویژگی</th>
                <th> مقایر</th>
                <th class="no-content"></th>
                <th class="no-content"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categoryFeature as $feature)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feature->name }}</td>
                    <td><a class="bg-primary rounded-pill p-1" href="{{ route('admin.features_value.index', ['categoryFeature' => $feature->id] )}}">مقادیر</a></td>
                    <td><a wire:click="edit({{ $feature->id }})" href="#">Edit</a></td>
                    <td><a wire:click="delete({{ $feature->id }})" wire:confirm="حذف شود؟" href="#">Delete</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

