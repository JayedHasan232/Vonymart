<section class="mt-5">
    <div class="{{ env('BS_CONTAINER') }}">
        @if($banner->link)
        <a href="{{$banner->link}}" class="d-block">
            <img width="100%" src="{{asset('storage/'.$banner->image)}}" alt="">
        </a>
        @else
        <img width="100%" src="{{asset('storage/'.$banner->image)}}" alt="">
        @endif
    </div>
</section>