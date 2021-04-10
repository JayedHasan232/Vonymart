<section class="section">
  <div class="container-xl">

    <div class="sec-head">
      <h2 class="sec-title">Featured Categories</h2>
      <a href="#" class="sec-link">See More</a>
    </div>

    <div class="row g-4">

      @for($i=1; $i <= 4; $i++)
      
      <div class="col-6 col-md-3">
        @livewire('app.component.products.category')
      </div>
      
      @endfor

    </div>
  </div>
</section>