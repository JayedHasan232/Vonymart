<section class="hero bg-accent">
    <div class="carousel">
        <div id="hphcarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">

            <ol class="carousel-indicators">
                @for($item = 0; $item < $sliders->count(); $item++)
                    <li data-bs-target="#hphcarousel" data-bs-slide-to="{{ $item }}"
                        class="{{ $item == 0 ? 'active' : '' }}">
                    </li>
                    @endfor
            </ol>

            <div class="carousel-inner">
                @foreach($sliders as $slider)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $slider->image) }}" class="d-block w-100"
                        alt="{{ $slider->title }}">
                    {{--<div class="carousel-caption">
                        <h5 class="title">{{ $slider->title }}</h5>
                        <p class="text">{{ $slider->overview }}</p>
                    </div>--}}
                </div>
                @endforeach
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
</section>