<section class="section hp-trending">
  <div class="container-xl">

    <div class="sec-head">
      <h2 class="sec-title">Trending Products</h2>
      <a href="#" class="sec-link">See More</a>
    </div>

    <div class="row g-4">

      @for($i=1; $i <= 4; $i++)
      
      <div class="col-6 col-md-3">
        @livewire('app.component.products.product')
      </div>
      
      @endfor

    </div>
  </div>
</section>