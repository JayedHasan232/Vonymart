<section class="section">
  <div class="container-xl">

    <div class="sec-head">
      <h2 class="sec-title">New Products</h2>
      <a href="#" class="sec-link">See More</a>
    </div>

    <div class="row g-4">

      @foreach($products as $product)
      
      <div class="col-6 col-md-3">
        @livewire('app.component.products.product', ['product' => $product])
      </div>
      
      @endforeach

    </div>
  </div>
</section>