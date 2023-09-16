<section class="section">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-6 col-md-2">
                <a href="{{ route('short-url-dynamic-data-show', $category->url) }}"
                    class="d-flex flex-column justify-content-center align-items-center"
                    title="{{ __( $category->title ) }}">
                    <img style="height: 50px" src="{{ asset('storage/' . $category->image) }}">
                    <div class="">{{ __( $category->title ) }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>