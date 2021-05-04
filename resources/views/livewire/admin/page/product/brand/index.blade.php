<div class="box">

    <div class="header">
        Existing Brands
        
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
        @foreach($brands as $brand)
            <button type="button" class="btn @if($brand->trashed()) border text-decoration-none btn-link text-muted @elseif($brand->privacy) btn-secondary @else btn-dark @endif rounded-pill me-2 mb-2 text-capitalize" data-bs-toggle="modal" data-bs-target="#brand{{ $brand->id }}" title="@if($brand->trashed()) Deleted @elseif($brand->privacy) Hidden @else Active @endif">
                {{ $brand->title }}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="brand{{ $brand->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $brand->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{ $brand->id }}Label">Be aware!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete <strong>"{{ $brand->title }}"</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                        @if($brand->trashed())
                        <button wire:click="restoreBrand({{ $brand->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Restore</button>
                        <button wire:click="deleteBrandPermanently({{ $brand->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Delete Permanently</button>
                        @else
                        <a href="{{ route('admin.product.brand.edit', $brand->id) }}" class="btn btn-success rounded-pill">Edit</a>
                        <button wire:click="deleteBrand({{ $brand->id }})" type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Delete</button>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>