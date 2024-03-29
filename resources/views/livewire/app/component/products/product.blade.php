<a href="{{ route('short-url-dynamic-data-show', $product->url) }}"
    class="com_product d-flex flex-column justify-content-between" title="{{ __( $product->title ) }}">
    <img class="ratio ratio-1x1" src="{{ asset('storage/' . $product->image) }}" alt="{{ __( $product->title ) }}">

    <div class="tw-h-52 tw-flex tw-flex-col tw-justify-between tw-p-6">
        <div class="text-center">
            <span class="d-block text-center text-muted text-wrap" style="width: 95%;">
                {{ __( $product->title ) }}
            </span>
            <span class="pro_price">{{ __( '৳' . $product->price ) }}</span>
        </div>

        <div class="tw-w-full tw-flex tw-justify-center">
            <div class="tw-w-full tw-flex tw-justify-center tw-items-center tw-border tw-divide-x">
                @if(!$alreadyExists)
                <div class="tw-h-10 tw-flex-1 tw-flex tw-justify-center tw-items-center hover:tw-bg-[#af0a0f] hover:tw-text-white"
                    wire:click.prevent="addToWishlist">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                    </svg>
                </div>
                @else
                <div class="tw-h-10 tw-flex-1 tw-flex tw-justify-center tw-items-center hover:tw-bg-[#af0a0f] hover:tw-text-white"
                    wire:click.prevent title="Saved">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>
                </div>
                @endif

                @if($cartTitle)
                <div class="tw-h-10 tw-flex-1 tw-flex tw-justify-center tw-items-center px-3 hover:tw-bg-[#af0a0f] hover:tw-text-white"
                    wire:click.prevent="addToCart">
                    Add to Cart
                </div>
                @endif

                <div class="tw-h-10 tw-flex-1 tw-flex tw-justify-center tw-items-center hover:tw-bg-[#af0a0f] hover:tw-text-white"
                    wire:click.prevent="addToCart">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</a>