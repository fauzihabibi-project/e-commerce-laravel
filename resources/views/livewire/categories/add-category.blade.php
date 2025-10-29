<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-12 mx-auto">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Add New Category</h5>

                    <form wire:submit.prevent="saveCategory" novalidate>
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input
                                wire:model.defer="name"
                                type="text"
                                id="categoryName"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter category name">
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('categories') }}" wire:navigate class="btn btn-secondary">
                                <i class="ti ti-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading.remove>Save Category</span>
                                <span wire:loading>Saving...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
