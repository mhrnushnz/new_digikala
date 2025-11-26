<div class="widget-content widget-content-area br-6">
    <div class="table-responsive mb-4 mt-4">
        <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>  نام دسته‌بندی</th>
                <th>دسته بندی والد</th>
                <th>ویژگی ها</th>
                <th class="no-content"></th>
                <th class="no-content"></th>
            </tr>
            </thead>
            <tbody>
            @php
                 use App\Models\Category as Category;

            @endphp
            @foreach($allcategories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ optional($category->category)->name }}</td>
                    <td><a class="bg-primary rounded-pill p-1" href="{{ route('admin.features.index', ['category' => $category,'categoryId' => $category->id]) }}">ویژگی ها</a></td>
                    <td><a wire:click="edit({{ $category->id }})" href="#">Edit</a></td>
                    <td><a wire:click="delete({{ $category->id }})" wire:confirm="حذف شود؟" href="#">Delete</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

