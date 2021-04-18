<section class="section">
  <div class="container-xl">

    <div class="sec-head d-block">
        <span class="me-2 text-muted text-capitalize">
            {{ __( 'Search result for' ) }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
        </span>
      <h2 class="sec-title">{{ __( $keyword ) }}</h2>
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

        {{-- @if($qty <= count($products) && $qty < $totalProducts)
          <div class="col-12" wire:loading.remove>
              <div class="btn text-white bg-accent" wire:click="loadMore">Load more</div>
          </div>
        @endif --}}
    </div>

    <div class="mt-3" wire:loading>
      <div class="btn text-white bg-accent">Loading...</div>
    </div>
  </div>
</section>