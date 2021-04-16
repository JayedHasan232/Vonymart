<section class="section">
  <div class="container-xl">

    <div class="sec-head">
      <h2 class="sec-title">Featured Categories</h2>
      <a href="{{ route('categories.index') }}" class="sec-link">See More</a>
    </div>

    <div class="row g-4">

      @foreach($categories as $category)
      
      <div class="col-6 col-md-3">

        <livewire:app.component.products.category :category="$category" />
        
      </div>
      
      @endforeach

    </div>
  </div>
</section>