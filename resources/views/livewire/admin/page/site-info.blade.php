@push('meta')
<title>{{ 'Configurations | ' . config('app.name', 'Laravel') }}</title>
@endpush

<form wire:submit.prevent="updateInfo" class="box">
    <div class="header">
        Website's Informations

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
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input wire:model="name" class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                    placeholder="Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="mobile">Mobile</label>
                <input wire:model="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text"
                    name="mobile" id="mobile" placeholder="Mobile">
                @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input wire:model="email" class="form-control @error('email') is-invalid @enderror" type="email"
                    name="email" id="email" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="facebook_page">Facebook Page</label>
                <input wire:model="facebook_page" class="form-control @error('facebook_page') is-invalid @enderror"
                    type="text" name="facebook_page" id="facebook_page" placeholder="Facebook">
                @error('facebook_page')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="facebook_group">Facebook Group</label>
                <input wire:model="facebook_group" class="form-control @error('facebook_group') is-invalid @enderror"
                    type="text" name="facebook_group" id="facebook_group" placeholder="Facebook_group">
                @error('facebook_group')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="twitter">Twitter</label>
                <input wire:model="twitter" class="form-control @error('twitter') is-invalid @enderror" type="text"
                    name="twitter" id="twitter" placeholder="Twitter">
                @error('twitter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="linkedin">LinkedIn</label>
                <input wire:model="linkedin" class="form-control @error('linkedin') is-invalid @enderror" type="text"
                    name="linkedin" id="linkedin" placeholder="LinkedIn">
                @error('linkedin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="youtube">YouTube</label>
                <input wire:model="youtube" class="form-control @error('youtube') is-invalid @enderror" type="text"
                    name="youtube" id="youtube" placeholder="YouTube">
                @error('youtube')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror" type="text"
                    name="address" id="address" placeholder="Address"></textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="google_map">Google Map</label>
                <textarea wire:model="google_map" class="form-control @error('google_map') is-invalid @enderror"
                    type="text" name="google_map" id="google_map" placeholder="Google Map"></textarea>
                @error('google_map')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="logo">Logo</label>
                <input wire:model="logo" class="form-control @error('logo') is-invalid @enderror" type="file"
                    name="logo" id="logo">
                @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="favicon">Favicon</label>
                <input wire:model="favicon" class="form-control @error('favicon') is-invalid @enderror" type="file"
                    name="favicon" id="favicon">
                @error('favicon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn bg-accent rounded-pill px-5">Update</button>

    </div>
</form>