<div>
    <a href="{{ route('categories.show', $category->url) }}" class="category" title="{{ __( $category->title ) }}">
        <div class="image-wrapper">
        <div class="image" style='background-image: url({{ asset("media/categories/cat-klock-430x430.jpg") }})'></div>
        </div>
        <div class="info d-none d-md-block">
        <span class="label">{{ __( $category->title ) }}</span>
        <span class="qty text-muted lh-1">{{ __( $category->products->count() . ' Products') }}</span>
        </div>
    </a>
    <div class="mt-2 text-center d-block d-md-none">
        <div class="fs-4 text-dark lh-1">{{ __( $category->title ) }}</div>
        <div class="fs-6 text-muted lh-1">{{ __( $category->products->count() . ' Products') }}</div>
    </div>
</div>
