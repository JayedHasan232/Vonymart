@push('meta')
<title>{{ 'Banner: Edit | ' . config('app.name', 'Laravel') }}</title>
@endpush

<form wire:submit.prevent="store" class="box">
    <div class="header">
        Edit Banner

        @if(session('success'))
        <span class="text-success ms-2">
            {{ session('success') }}
        </span>
        @elseif(session('warning'))
        <span class="text-danger ms-2">
            {{ session('warning') }}
        </span>
        @endif
    </div>
    <div class="body">

        <div class="row g-3 mb-4">
            <div class="form-group col-md-2">
                <label for="privacy">Privacy</label>
                <select wire:model="privacy" class="form-control @error('privacy') is-invalid @enderror">
                    <option value="1">Visible</option>
                    <option value="0">Hidden</option>
                </select>
                @error('privacy')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text"
                    id="title" placeholder="Title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="image">Image</label>
                <input wire:model="image" class="form-control @error('image') is-invalid @enderror" type="file"
                    name="image" id="image">
                <small class="text-muted">Recommended size: 1052px * 320px</small>
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-9">
                <label for="link">Link</label>
                <input wire:model="link" class="form-control @error('link') is-invalid @enderror" type="text" id="link"
                    placeholder="[Optional]">
                @error('link')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="position">Position</label>
                <input wire:model="position" class="form-control @error('position') is-invalid @enderror" type="number"
                    id="position" placeholder="Position">
                @error('position')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button wire:loading.remove type="submit" class="btn bg-accent rounded-pill px-5">Update</button>
        <button wire:loading type="button" class="btn bg-accent rounded-pill px-5">Processing...</button>

    </div>
</form>