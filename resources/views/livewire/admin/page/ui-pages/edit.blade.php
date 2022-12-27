@push('meta')
<title>{{ 'Page: Edit | ' . config('app.name', 'Laravel') }}</title>
@endpush

@push('scripts')
<script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/tinymce/init-tinymce-livewire.js') }}"></script>

<script>
    tinymce.init({
        ...editor_config,
        selector: "textarea.tinymce",
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('article', editor.getContent());
            });
        }
    })
</script>
@endpush

<form wire:submit.prevent="store" class="box">
    <div class="header">
        Edit Page

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
            <div class="form-group col-md-6">
                <label for="slug">Slug</label>
                <input wire:model="slug" class="form-control @error('slug') is-invalid @enderror" type="text" id="slug"
                    placeholder="Slug">
                @error('slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group" wire:ignore>
                <textarea wire:model="article" class="tinymce form-control @error('article') is-invalid @enderror"
                    type="text" name="article" id="article" placeholder="Description">{{ old('article') }}</textarea>
                @error('article')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn bg-accent rounded-pill px-5">Update</button>

    </div>
</form>