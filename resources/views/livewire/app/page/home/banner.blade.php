<section class="mt-5">
    <div class="{{ env('BS_CONTAINER') }}">
        @if($banner->link)
        <a href="{{$banner->link}}" class="d-block"
            style="height: 200px; width: 100%; background-image: url({{asset('storage/'.$banner->image)}}); background-repeat: no-repeat; background-size: cover; background-position: center">
        </a>
        @else
        <div
            style="height: 200px; width: 100%; background-image: url({{asset('storage/'.$banner->image)}}); background-repeat: no-repeat; background-size: cover; background-position: center">
        </div>
        @endif
    </div>
</section>