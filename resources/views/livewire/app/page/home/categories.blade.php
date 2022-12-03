<section class="section">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-6 col-md-2">
                <a href="{{ route('categories.show', $category->url) }}"
                    class="d-flex flex-column justify-content-center align-items-center border"
                    style="border-radius: 1em; padding: 0.5em 1em" title="{{ __( $category->title ) }}">
                    <img style="height: 50px" src="{{ asset('storage/' . $category->image) }}">
                    <div class="">{{ __( $category->title ) }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>