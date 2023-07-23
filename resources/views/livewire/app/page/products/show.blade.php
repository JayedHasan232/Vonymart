<section class="productShow py-5">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="header flex-column flex-md-row border p-2">
            <div class="image overflow-hidden">
                <div class="image-wrapper">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ __( $product->title ) }}"
                        title="{{ __( $product->title ) }}">
                </div>
            </div>

            <div class="informations d-flex flex-column justify-content-between">
                <div class="h-100 border p-4 mb-2">
                    <div class="mb-4">
                        <h1 class="title fs-4">{{ __( $product->title ) }}</h1>
                        <div class="">
                            <a class="text-muted fw-bold" href="/">{{ __( 'Home' ) }}</a>

                            @if($product->category)
                            <i class="las la-arrow-right"></i>
                            <a class="text-muted fw-bold"
                                href="{{ route('categories.show', $product->category->url) }}">
                                {{ __( $product->category->title )}}
                            </a>
                            @endif

                            @if($product->category && $product->sub_category)
                            <i class="las la-arrow-right"></i>
                            <a class="text-muted fw-bold"
                                href="{{ route('sub-categories.show', ['category' => $product->category->url, 'subcategory' => $product->sub_category->url]) }}">
                                {{ __( $product->sub_category ? $product->sub_category->title : '' ) }}
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="">
                        @if($product->sku)
                        <div>Product Code: {{ __( strtoupper($product->sku) )}}</div>
                        @endif

                        <div>
                            Availability:
                            @if($product->stock_count)
                            <span class="text-success">{{__('In Stock')}}</span>
                            @else
                            <span class="text-danger">{{__('Out Stock')}}</span>
                            @endif
                        </div>
                    </div>

                    <h4 class="price fw-normal">Price: <strong>{{ __( '৳' . $product->price ) }}</strong></h4>
                    <p class="overview">{{ __( $product->overview ) }}</p>
                </div>

                <div class="d-flex justify-content-center align-items-center pointer border py-2">
                    @if(!$alreadyExists)
                    <div class="pro_icon border border-end-0 py-2 px-3" wire:click.prevent="addToWishlist">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                    </div>
                    @else
                    <div class="pro_icon text-danger border border-end-0 py-2 px-3" wire:click.prevent title="Saved">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                    </div>
                    @endif

                    <div class="pro_icon border py-2 px-3" wire:click.prevent="addToCart">
                        Add to Cart
                    </div>

                    <div class="pro_icon border border-start-0 py-2 px-3" wire:click.prevent="addToCart">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="benefits">
                <div class="item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-truck" viewBox="0 0 16 16">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                    <div class="info">
                        <h3 class="title">Fast Shipping</h3>
                        <h4 class="sub-title">Receive products in amazing time.</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                            <path
                                d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z" />
                            <path
                                d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z" />
                        </svg>
                    </div>
                    <div class="info">
                        <h3 class="title">Easy returns</h3>
                        <h4 class="sub-title">Return policy that let you shop at ease</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z" />
                        </svg>
                    </div>
                    <div class="info">
                        <h3 class="title">Always authentic product</h3>
                        <h4 class="sub-title">We only sell 100% authentic products</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg>
                    </div>
                    <div class="info">
                        <h3 class="title">Secure shopping</h3>
                        <h4 class="sub-title">Your data is always protected</h4>
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-percent" viewBox="0 0 16 16">
                            <path
                                d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                    </div>
                    <div class="info">
                        <h3 class="title">Discount</h3>
                        <h4 class="sub-title">Get {{$product->discount_rate ?? 0}}% discount</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-details py-5">
            <!-- Product Info Start -->
            <div class="productInfo">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                            href="#nav-description" role="tab" aria-controls="nav-description"
                            aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="nav-details-tab" data-bs-toggle="tab" href="#nav-details"
                            role="tab" aria-controls="nav-details" aria-selected="false">Details</a>
                        <a class="nav-item nav-link" id="nav-reviews-tab" data-bs-toggle="tab" href="#nav-reviews"
                            role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                        aria-labelledby="nav-description-tab">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="productSpecifications">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseproductSpecifications" aria-expanded="true"
                                        aria-controls="collapseproductSpecifications">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-patch-question-fill me-2 text-great"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627z" />
                                        </svg>
                                        Specifications
                                    </button>
                                </h2>
                                <div id="collapseproductSpecifications" class="accordion-collapse show"
                                    aria-labelledby="productSpecifications" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">{!! $product->specification !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                        <div class="productReview">
                            <!-- User/Visitor Comments Section Start -->
                            <div class="card-body">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="rating" class="me-2">Your Rating:</label>
                                        <div class="star-rating text-center">
                                            @for($rate = 5; $rate >= 1; $rate--)
                                            <input id="star-{{$rate}}" type="radio" name="rating" value="{{$rate}}">
                                            <label for="star-{{$rate}}" title="{{$rate}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                            </label>
                                            @endfor
                                        </div>
                                    </div>

                                    @auth
                                    <div class="form-group">
                                        <textarea class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                            name="content"
                                            placeholder="Hi {{ Auth::user()->name }}, please insert your review."
                                            required></textarea>
                                        @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                        @endif
                                        <input type="hidden" name="name" value="{{ Auth::id() }}">
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="relative_id" value="0">
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <textarea class="form-control" name="content"
                                            placeholder="Please insert your review." required></textarea>
                                        @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="row g-3 mt-2">
                                        <div class="form-group col-md-4">
                                            <label for="inputCity">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Insert your name." required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Insert your email." required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputZip">Website</label>
                                            <input type="text" class="form-control" name="website"
                                                placeholder="Insert your website.">
                                        </div>
                                    </div>
                                    <input type="hidden" name="relative_id" value="0">

                                    @endauth
                                    <button type="submit" class="btn bg-accent text-white mt-3">Submit</button>
                                </form>
                            </div>
                            <!-- Rating end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Info End -->
        </div>
    </div>
</section>