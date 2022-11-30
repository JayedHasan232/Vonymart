<section class="bg-light py-5 mt-5">
    <div class="{{ env('BS_CONTAINER') }} row justify-content-center py-4">
        <form wire:submit.prevent="subscribe" class="col-md-6">
            <div class="row gx-0 align-items-center border rounded-pill overflow-hidden">

                <div class="col">
                    <input wire:model.debounce.500ms="email" type="email" class="form-control px-4 py-3"
                        style="border: none; border-radius: 0" placeholder="{{__('Enter Email')}} *" required>
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn bg-accent text-white py-3"
                        style="border: none; border-radius: 0">{{__('Subscribe')}}</button>
                </div>
            </div>

            @if(session('success'))
            <small class="text-light">{{ __(session('success') )}}</small>
            @elseif(session('warning'))
            <small class="text-danger">{{ __(session('warning') )}}</small>
            @endif
        </form>
    </div>
</section>