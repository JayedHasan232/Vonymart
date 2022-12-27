<form wire:submit.prevent="save">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-3">
        <div class="col-12">
            <div class="form-group">
                <label class="form-label" for="accountName">
                    Name *
                </label>
                <input wire:model.lazy="name" type="text" class="form-control" name="name" id="accountName"
                    placeholder="Name *" value="{{auth()->user()->name}}" required="" />
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="accountEmail">
                    Email Address *
                </label>
                <input wire:model.lazy="email" type="email" class="form-control" id="accountEmail"
                    placeholder="Email Address *" value="{{auth()->user()->email}}" disabled />
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="accountPhone">
                    Phone Number *
                </label>
                <input wire:model.lazy="phone" type="text" class="form-control" id="accountPhone" name="phone"
                    placeholder="Phone Number *" value="{{auth()->user()->phone ?? ''}}" {{auth()->user()->phone ?
                'disabled' : ''}} />
            </div>
        </div>

        <div class="col-12 d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-dark">Save Changes</button>

            @if(session('success'))
            <span class="text-success">{{session('success')}}</span>
            @elseif(session('warning'))
            <span class="text-danger">{{session('warning')}}</span>
            @endif
        </div>
    </div>
</form>