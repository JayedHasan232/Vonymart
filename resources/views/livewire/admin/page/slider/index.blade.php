@push('meta')
<title>{{ 'Sliders | ' . config('app.name', 'Laravel') }}</title>
@endpush

<div class="box mb-5">
    <div class="header">
        Sliders - ({{ $totalSliders }})
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
                        <input wire:model.debounce.1000ms="keyword" type="text" class="form-control" id="searech"
                            placeholder="Type title">
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
                @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->privacy ? 'Visible' : 'Hidden'}}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                class="btn rounded-pill bg-dark text-white">Edit</a>

                            <div x-data="{ confirmDelete: false }" class="" x-cloak>
                                <button @click=" confirmDelete = true " type="button"
                                    class="btn btn-warning rounded-pill">Delete</button>
                                <button wire:click="delete({{$slider->id}})" x-show="confirmDelete" type="button"
                                    class="btn btn-danger rounded-pill">Confirm
                                    Delete</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if( method_exists($sliders,'links') )
        {{ $sliders->links() }}
        @endif
    </div>
</div>