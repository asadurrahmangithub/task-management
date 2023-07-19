<table class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="text-center">
        <tr>
            <th>SL No</th>
            <th>Catagory Name</th>
            <th>Note</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>


    <tbody id="tbody" class="text-center">

        @foreach ($categories as $key => $category)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>

                    @if ($category->publication_status == 1)
                        <a class="btn btn-success text-light status" data-id="{{ $category->id }}"
                            title="UnPublich">Publich</a>
                    @else
                        <a class="btn btn-warning text-light status" data-id="{{ $category->id }}"
                            title="Publich">UnPublich</a>
                    @endif

                </td>
                <td>

                    <a class="btn btn-info text-light" id="editCategory" data-id="{{ $category->id }}"
                        data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</a>
                    <a class="btn btn-danger text-light" id="deleteRow" data-id="{{ $category->id }}">Delete</a>
                </td>
            </tr>
        @endforeach



    </tbody>
</table>

{!! $categories->links() !!}
