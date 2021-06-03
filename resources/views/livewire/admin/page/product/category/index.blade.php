<div class="box">

    <div class="header">
        Existing Categories
        
        @if(session('success'))
        <span class="text-success ms-2">
            {{ session('success') }}
        </span>
        @elseif(session('warning'))
        <span class="text-danger ms-2">
            {{ session('warning') }}
        </span>
        @endif
    </div>

    <div class="body">
        @foreach($categories as $category)
            <button type="button" class="btn @if($category->trashed()) border text-decoration-none btn-link text-muted @elseif(!$category->privacy) btn-secondary @else btn-dark @endif rounded-pill me-2 mb-2 text-capitalize" data-bs-toggle="modal" data-bs-target="#brand{{ $category->id }}" title="@if($category->trashed()) Deleted @elseif(!$category->privacy) Hidden @else Active @endif">
                {{ $category->title }}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="brand{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $category->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{ $category->id }}Label">Be aware!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete <strong>"{{ $category->title }}"</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                        @if($category->trashed())
                        <button wire:click="restoreCategory({{ $category->id }})" type="button" class="btn btn-success rounded-pill" data-bs-dismiss="modal">Restore</button>
                        <button wire:click="deleteCategoryPermanently({{ $category->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Delete Permanently</button>
                        @else
                        <a href="{{ route('admin.product.category.edit', $category->id) }}" class="btn btn-success rounded-pill">Edit</a>
                        <button wire:click="deleteCategory({{ $category->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Delete</button>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>