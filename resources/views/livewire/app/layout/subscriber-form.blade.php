<section class="bg-light mt-5 border-top">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row justify-content-center">

            <div class="col-md-6 border border-top-0 border-bottom-0 d-flex justify-content-center align-items-center text-center"
                style="height: 10em">
                Keep your trust and touch with Alokmart and get authentic products by subscribing.
            </div>

            <form wire:submit.prevent="subscribe"
                class="col-md-6 border border-start-0 border-top-0 border-bottom-0 d-flex justify-content-center align-items-center"
                style="height: 10em">
                <div class="row gx-0 align-items-center border rounded-pill overflow-hidden">

                    <div class="col">
                        <input wire:model.debounce.500ms="email" type="email" class="form-control px-4 py-2"
                            style="border: none; border-radius: 0" placeholder="{{__('Enter Email')}} *" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn bg-accent text-white py-2"
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
    </div>

    <hr class="dropdown-divider bg-secondary m-0">

    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row">
            <div class="col-lg-3 col-md-6 border border-top-0 border-end-0">
                <a class="text-reset border-left text-center p-4 d-block" href="#">
                    <i class="la la-file-text la-3x text-danger mb-2"></i>
                    <h4 class="h6">Terms & conditions</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 border border-top-0 border-end-0">
                <a class="text-reset border-left text-center p-4 d-block" href="#">
                    <i class="la la-mail-reply la-3x text-danger mb-2"></i>
                    <h4 class="h6">Return policy</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 border border-top-0 border-end-0">
                <a class="text-reset border-left text-center p-4 d-block" href="#">
                    <i class="la la-support la-3x text-danger mb-2"></i>
                    <h4 class="h6">Support policy</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 border border-top-0">
                <a class="text-reset border-left border-right text-center p-4 d-block"
                    href="#">
                    <i class="las la-exclamation-circle la-3x text-danger mb-2"></i>
                    <h4 class="h6">Privacy policy</h4>
                </a>
            </div>
        </div>
    </div>
</section>