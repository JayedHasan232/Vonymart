<section class="hero">
    <div class="container-xl">
        <ul class="categories">
            @for($i=1; $i< 20; $i++)
            <li class="item"><a href="#" class="link text-capitalize">{{ Str::random(15) }}</a></li>
            @endfor
        </ul>
        <div class="carousel">
            <div id="hphcarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                
                <ol class="carousel-indicators">
                    <li data-bs-target="#hphcarousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#hphcarousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#hphcarousel" data-bs-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('media/hero/slider-main-demo.jpg') }}" class="d-block w-100" alt="Slider">
                        <div class="carousel-caption">
                            <h5 class="title">First slide label</h5>
                            <p class="text">Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('media/hero/slider-main-demo.jpg') }}" class="d-block w-100" alt="Slider">
                        <div class="carousel-caption">
                            <h5 class="title">Second slide label</h5>
                            <p class="text">Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('media/hero/slider-main-demo.jpg') }}" class="d-block w-100" alt="Slider">
                        <div class="carousel-caption">
                            <h5 class="title">Third slide label</h5>
                            <p class="text">Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" data-bs-target="#hphcarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" data-bs-target="#hphcarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>