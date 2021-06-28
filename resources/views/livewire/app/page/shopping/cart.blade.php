@push('meta')
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="title" content="">
    <meta name="description" property="og:description" content="">
    <meta name="keywords" content="">

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="">
@endpush

<section class="py-5">
  <div class="{{ env('BS_CONTAINER') }}">
  
    @if($totalQty > 0)

    <table class="table table-striped table-bordered table-hover border text-center table-responsive-sm" width="100%">
        <thead class="bg-great text-white">
          <tr>
            <th>Thumbnail</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $product)
          <tr :key="$loop->index">
            <td class="align-middle">
              <a class="media" href="{{ route('products.show', $product['item']->url) }}" target="_blank">
                @php
                  $image = $product['item']->image;
                @endphp
                <img class="mr-1" height="75" width="75" src="{{ asset('storage/' . $image) }}" title="{{ $product['item']->title }}" alt="{{ $product['item']->title }}">
              </a>
            </td>
            <td class="align-middle">
              <div class="">
                <button wire:click="minus({{ $product['item']->id }})" type="button" class="btn btn-dark">-</button>
                <input type="text" class="btn qty" value="{{ $product['qty'] }}" disabled>
                <button wire:click="plus({{ $product['item']->id }})" type="button" class="btn bg-great text-white">+</button>
              </div>
            </td>
            <td class="align-middle">৳{{ $product['item']->price }}</td>
            <td class="align-middle">৳{{ $product['price'] }}</td>
            <td class="align-middle">
                <button wire:click="removeItem({{ $product['item']->id }})" type="button" class="btn btn-danger">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
                </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="row mt-5 justify-content-start">
        <div class="col-md-8">
          <div class="card rounded-0">
            <h4 class="card-header rounded-0 bg-great text-white">Total</h4>
            <div class="card-body">
              <table class="table table-bordered">
                <tr class="">
                  <th>Total Quantity:</th>
                  <td><span class="currentTotalQty">{{ round( $totalQty ) }}</span>@if(round( $totalQty ) > 1) pcs @else piece @endif </td>
                </tr>
                <tr class="table table-bordered">
                  <th>Total Price:</th>
                  <td><strong>৳</strong><span id="currentTotalPrice">{{ round( $totalPrice ) }}</span></td>
                </tr>
              </table>
              <a href="" class="btn bg-great text-white my-3">Checkout</a>
              <small class="d-block text-muted">*You must login before checkout.</small>
            </div>
          </div>
        </div>
      </div>

    @else
      <div class="card text-center border-0 py-5">
        <h2>No products in your cart!</h2>
        <div class="card-body">
          <a class="btn bg-dark text-white mx-5" href="{{ route('checkout') }}">Back To Shop</a>
        </div>
      </div>
    @endif

  </div>
</section>