<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">List Categories</h5>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('category.add') }}" wire:navigate class="btn btn-primary">
                            Add Category
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('category.edit', $category->id) }}" wire:navigate class="btn btn-sm btn-warning">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $category->id }})">
                                                <i class="ti ti-trash"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No categories found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>