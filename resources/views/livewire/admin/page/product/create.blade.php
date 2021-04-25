<form class="box" action="" method="post">
    <div class="header">Create Product</div>
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

            <div class="form-group col-md-2">
                <label for="privacy">Privacy</label>
                <select wire:model="privacy" class="form-control @error('privacy') is-invalid @enderror" name="privacy" id="privacy">
                    <option value="1" {{ old('privacy') == 1 ? 'selected' : '' }}>Visible</option>
                    <option value="0" {{ old('privacy') == 0 ? 'selected' : '' }}>Hidden</option>
                </select>
                @error('privacy')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="brand">Brand</label>
                <select wire:model="brand" class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : '' }}> {{ $brand->title }} </option>
                    @endforeach
                </select>
                @error('brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="category">Category</label>
                <select wire:model="category" class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}> {{ $category->title }} </option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="sub_category">Sub Category</label>
                <select wire:model="sub_category" class="form-control @error('sub_category') is-invalid @enderror" name="sub_category" id="sub_category">
                    <option value="">Select Sub Category</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" {{ old('sub_category') == $sub_category->id ? 'selected' : '' }}> {{ $sub_category->title }} </option>
                    @endforeach
                </select>
                @error('sub_category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-2">
                <label for="price">Price</label>
                <input wire:model="price" class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" placeholder="Price" value="{{ old('price') }}">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false">Specification</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="meta_description-tab" data-bs-toggle="tab" data-bs-target="#meta_description" type="button" role="tab" aria-controls="meta_description" aria-selected="false">Meta Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="meta_keywords-tab" data-bs-toggle="tab" data-bs-target="#meta_keywords" type="button" role="tab" aria-controls="meta_keywords" aria-selected="false">Meta Keywords</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <textarea wire:model="overview" class="form-control @error('overview') is-invalid @enderror" type="text" name="overview" id="overview" placeholder="Overview">{{ old('overview') }}</textarea>
                        @error('overview')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                        <textarea wire:model="specification" class="form-control @error('specification') is-invalid @enderror" type="text" name="specification" id="specification" placeholder="Specification">{{ old('specification') }}</textarea>
                        @error('specification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="tab-pane fade" id="meta_description" role="tabpanel" aria-labelledby="meta_description-tab">
                        <textarea wire:model="meta_description" class="form-control @error('meta_description') is-invalid @enderror" type="text" name="meta_description" id="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="tab-pane fade" id="meta_keywords" role="tabpanel" aria-labelledby="meta_keywords-tab">
                        <textarea wire:model="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords">{{ old('meta_keywords') }}</textarea>
                        @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <button class="btn bg-accent rounded-pill px-5" type="submit">Store</button>
    </div>
</form>