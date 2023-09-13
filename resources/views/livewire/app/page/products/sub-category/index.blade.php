<section class="section">
    <div class="{{ env('BS_CONTAINER') }}">

        <div class="sec-head d-block">
            <div class="breadcrumb m-0">
                <a href="{{ route('welcome') }}" class="me-2 text-capitalize">
                    {{ __( 'Home' ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
                <a href="{{ route('categories.index') }}" class="me-2 text-capitalize">
                    {{ __( 'Categories' ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
                <a href="{{ route('short-url-dynamic-data-show', $sub_category->parent->url) }}"
                    class="me-2 text-capitalize">
                    {{ __( $sub_category->parent->title ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
            <h2 class="sec-title">{{ __( $sub_category->title ) }}</h2>
        </div>

        <div class="row g-4 py-2 mb-5">
            <div class="col-md-3 form-group">
                <label for="">Brand</label>
                <select wire:model="brand" class="form-control">
                    <option value="">--Select Brand--</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-auto form-group">
                <!-- <label for="">Reset Filters</label> -->
                <button wire:click="resetFilter" class="btn btn-dark mt-4">Reset Filters</button>
            </div>
        </div>

        <div class="row g-4">
            @forelse($products as $product)

            @php $keyId = $product->id . $loop->index; @endphp

            <div class="col-6 col-md-3">
                <livewire:app.component.products.product :product="$product" :key="$keyId" />
            </div>

            @empty
            <div class="col-12">
                No items!
            </div>
            @endforelse

            @if($qty <= count($products) && $qty < $totalProducts) <div class="col-12" wire:loading.remove>
                <div class="btn text-white bg-accent" wire:click="loadMore">Load more</div>
        </div>
        @endif
    </div>

    <div class="mt-3" wire:loading>
        <div class="btn text-white bg-accent">Loading...</div>
    </div>
    </div>
</section>