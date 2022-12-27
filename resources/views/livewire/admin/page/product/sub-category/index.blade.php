@push('meta')
<title>{{ 'Subcategories | ' . config('app.name', 'Laravel') }}</title>
@endpush

<div class="box">

    <div class="header">
        Existing Subcategories
        
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
        @foreach($subcategories as $subcategory)
            <button type="button" class="btn @if($subcategory->trashed()) border text-decoration-none btn-link text-muted @elseif(!$subcategory->privacy) btn-secondary @else btn-dark @endif rounded-pill me-2 mb-2 text-capitalize" data-bs-toggle="modal" data-bs-target="#brand{{ $subcategory->id }}" title="@if($subcategory->trashed()) Deleted @elseif(!$subcategory->privacy) Hidden @else Active @endif">
                {{ $subcategory->title }}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="brand{{ $subcategory->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $subcategory->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{ $subcategory->id }}Label">Be aware!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete <strong>"{{ $subcategory->title }}"</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                        @if($subcategory->trashed())
                        <button wire:click="restoreSubCategory({{ $subcategory->id }})" type="button" class="btn btn-success rounded-pill" data-bs-dismiss="modal">Restore</button>
                        <button wire:click="deleteSubCategoryPermanently({{ $subcategory->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Delete Permanently</button>
                        @else
                        <a href="{{ route('admin.product.sub-category.edit', $subcategory->id) }}" class="btn btn-success rounded-pill">Edit</a>
                        <button wire:click="deleteSubCategory({{ $subcategory->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Delete</button>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>