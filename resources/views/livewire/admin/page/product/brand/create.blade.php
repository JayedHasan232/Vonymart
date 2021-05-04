<form class="box" action="{{ route('admin.brands.store') }}" method="post" enctype= multipart/form-data>
    @csrf
    <div class="header">
        Create Brand

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

        <div class="row g-4 mb-4">
            <div class="form-group col-md-4">
                <label for="title">Title</label>
                <input wire:model="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="meta_title">Meta Title</label>
                <input wire:model="meta_title" class="form-control @error('meta_title') is-invalid @enderror" type="text" name="meta_title" id="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}">
                @error('meta_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="url">Url</label>
                <input wire:model="url" class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" placeholder="URL" value="{{ old('url') }}">
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="privacy">Privacy</label>
                <select class="form-control @error('privacy') is-invalid @enderror" name="privacy" id="privacy">
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
                <label for="image">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea wire:model="meta_description" class="form-control @error('meta_description') is-invalid @enderror" type="text" name="meta_description" id="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="meta_keywords">Meta Keywords</label>
                <textarea class="form-control @error('meta_keywords') is-invalid @enderror" type="text" name="meta_keywords" id="meta_keywords" placeholder="Separate by comma (,)">{{ old('meta_keywords') }}</textarea>
                @error('meta_keywords')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button class="btn bg-accent rounded-pill px-5" type="submit">Store</button>
        
    </div>
</form>