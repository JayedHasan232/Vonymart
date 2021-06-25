<div class="box mb-5">
    <div class="header">
        Products - ({{ $totalProducts }})
    </div>
    <div class="body table-responsive-sm">
        <div class="mb-3">
            <div class="row justify-content-start">
                <div class="col-md-2">
                    <label for="qty" class="me-2">Items:</label>
                    <div>
                        <input wire:model.lazy="qty" type="text" class="form-control" id="qty">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="searech" class="me-2">Search:</label>
                    <div>
                        <input wire:model.debounce.1000ms="keyword" type="text" class="form-control" id="searech" placeholder="Type title">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Privacy</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->privacy ? 'Visible' : 'Hidden'}}</td>
                    <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn rounded-pill bg-warning">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if( method_exists($products,'links') )
            {{ $products->links() }}
        @endif
    </div>
</div>