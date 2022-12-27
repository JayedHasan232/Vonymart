@push('meta')
<!-- Primary Meta Tags -->
<title>{{ 'Contact Us | ' . config('app.name', 'Laravel') }}</title>
<meta name="title" content="">
<meta name="description" property="og:description" content="">
<meta name="keywords" content="">

<!-- Open Graph / Facebook -->
<meta property="og:url" content="">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:image" content="">

<!-- Twitter -->
<meta property="twitter:url" content="">
<meta property="twitter:title" content="">
<meta property="twitter:description" content="">
<meta property="twitter:image" content="">
@endpush

<section class="py-5">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="row">
            <div class="col-12">

                <!-- Heading -->
                <h1 class="mb-5 text-center">{{__('Contact Us')}}</h1>

            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-md-4 col-xl-3">
                <aside class="mb-9 mb-md-0">

                    <!-- Heading -->
                    <h6 class="mb-6">
                        <i class="fe fe-phone text-primary"></i>
                        {{__('Call to Us')}}:
                    </h6>

                    <p>
                        <a class="text-gray-500" href="tel:{{$appConfiguration->mobile ?? ''}}">
                            {{$appConfiguration->mobile ?? ''}}
                        </a>
                    </p>

                    <!-- Divider -->
                    <hr>

                    <!-- Heading -->
                    <h6 class="mb-6">
                        <i class="fe fe-mail text-primary"></i>
                        {{__('Write to Us')}}:
                    </h6>


                    <p>
                        <a class="text-gray-500" href="mailto:{{$appConfiguration->email ?? ''}}">
                            {{$appConfiguration->email ?? ''}}
                        </a>
                    </p>

                </aside>
            </div>
            <div class="col-12 col-md-8">

                <!-- Form -->
                <form wire:submit.prevent="send">
                    <div class="row g-4">

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="visually-hidden" for="contactName">{{__('Your Name')}} *</label>
                                <input wire:model.lazy="name" class="form-control" id="contactName" type="text"
                                    name="name" placeholder="{{__('Your Name')}} *" required>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="visually-hidden" for="contactEmail">{{__('Your Email')}} *</label>
                                <input wire:model.lazy="email" class="form-control" id="contactEmail" type="email"
                                    name="email" placeholder="{{__('Your Email')}} *" required>
                            </div>
                        </div>

                        <div class="col-12 col-lg-12">
                            <div class="form-group mb-7">
                                <label class="visually-hidden" for="contactMessage">{{__('Message')}} *</label>
                                <textarea wire:model.lazy="message" class="form-control" id="contactMessage"
                                    name="message" rows="5" placeholder="{{__('Message')}} *" required></textarea>
                            </div>
                        </div>

                        <div class="col-12 col-lg-12 d-flex justify-content-center align-items-center gap-2">
                            <button type="submit" class="btn btn-dark">
                                {{__('Send Message')}}
                            </button>

                            @if(session('success'))
                            <span class="text-success">{{session('success')}}</span>
                            @else
                            <span class="text-danger">{{session('warning')}}</span>
                            @endif
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</section>