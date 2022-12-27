<section class="section">
  <div class="{{ env('BS_CONTAINER') }}">

    <div class="sec-head">
      <h2 class="sec-title">Recent Items</h2>
      @if($link)
      <a href="{{ route('products.recent') }}" class="sec-link">See More</a>
      @endif
    </div>

    <div class="row g-4">

      @foreach($products as $product)

      <div class="col-6 col-md-3">
        <livewire:app.component.products.product :product="$product" />
      </div>

      @endforeach

    </div>
  </div>
</section>