<section class="featured-categories bg-white py-5">
  <div class="container-xl">

    <div class="sec-head text-center mb-5">
      <span class="label">{{ config('app.name', 'Laravel') }} Collections</span>
      <h2 class="title">Featured Categories</h2>
      <p class="description">{{ config('app.name', 'Laravel') }} is a Powerful Ecommerce Theme For Wordpress.</p>
    </div>

    <div class="row g-3">

      @for($i=1; $i <= 4; $i++)
      
      <div class="col-6 col-md-3">
        <a class="sCard" href="#">
          <div class="image-wrapper">
            <div class="image" style='background-image: url({{ asset("media/categories/cat-klock-430x430.jpg") }})'></div>
          </div>
          <div class="info d-none d-md-block">
            <span class="label">Title</span>
            <span class="qty text-muted lh-1">232 Products</span>
          </div>
        </a>
        <div class="mt-2 text-center d-block d-md-none">
          <div class="fs-4 text-dark lh-1">Title</div>
          <div class="fs-6 text-muted lh-1">232 Products</div>
        </div>
      </div>
      
      @endfor

    </div>
  </div>
</section>