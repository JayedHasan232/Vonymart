<section class="featured-categories bg-white py-5">
  <div class="container-xl">

    <div class="sec-head text-center mb-5">
      <h2 class="title">Trending Products</h2>
      <p class="description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis aspernatur obcaecati aliquam, nam alias soluta ea dolorum recusandae magni est deleniti velit maiores ut natus beatae eum exercitationem. Dolorem, dolor.
      </p>
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