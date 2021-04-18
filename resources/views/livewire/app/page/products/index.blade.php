<section class="section">
  <div class="container-xl">

    <div class="sec-head">
      <h2 class="sec-title">Products</h2>
    </div>

    <div class="row justify-content-between g-4 py-2 mb-5">
      <div class="col-md-3 form-group">
        <label for="">Brand</label>
        <select wire:model="brand" class="form-control">
          <option value="">--Select Brand--</option>
          @foreach($brands as $brand)
          <option value="{{ $brand->id }}">{{ $brand->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3 form-group">
        <label for="">Category</label>
        <select wire:model="category" class="form-control">
          <option value="">--Select Category--</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3 form-group">
        <label for="">Sub Category</label>
        <select wire:model="sub_category" class="form-control">
          <option value="" selected>--Select Sub Category--</option>
          @foreach($sub_categories as $sub_category)
          <option value="{{ $sub_category->id }}">{{ $sub_category->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-auto form-group">
        <button wire:click="resetFilter" class="btn btn-dark mt-4">Reset Filters</button>
      </div>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
        
            @php $keyId = $product->id . $loop->index; @endphp

            <div class="col-6 col-md-3">
              <livewire:app.component.products.product :product="$product" :key="$keyId" />
            </div>
            
        @empty
          <div class="col-12">
            No items!
          </div>
        @endforelse

        @if($qty <= count($products) && $qty < $totalProducts)
          <div class="col-12" wire:loading.remove>
              <div class="btn text-white bg-accent" wire:click="loadMore">Load more</div>
          </div>
        @endif
    </div>

    <div class="mt-3" wire:loading>
      <div class="btn text-white bg-accent">Loading...</div>
    </div>
  </div>
</section>