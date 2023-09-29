<section x-data="{ offcanvas : !false}"
    class="tw-fixed tw-bottom-0 tw-z-50 tw-h-12 tw-w-full tw-flex tw-justify-evenly tw-items-end tw-bg-[#af0a0f] tw-text-white md:tw-hidden">
    <a href="/" class="tw-pb-1 tw-flex tw-flex-col tw-justify-center tw-items-center tw-text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="tw-w-5 tw-h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
        <span class="tw-text-white">Home</span>
    </a>

    <a href="{{route('user.wishlist')}}"
        class="tw-pb-1 tw-flex tw-flex-col tw-justify-center tw-items-center tw-text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="tw-w-5 tw-h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
        </svg>
        <span class="tw-text-white">Wishlist</span>
    </a>

    <a href="{{ route('cart') }}" class="tw-pb-1 tw-flex tw-flex-col tw-justify-center tw-items-center tw-text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="tw-w-5 tw-h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
        <span class="tw-text-white">Cart</span>
    </a>

    <button x-on:click="offcanvas = !offcanvas"
        class="tw-pb-1 tw-flex tw-flex-col tw-justify-center tw-items-center tw-text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="tw-w-5 tw-h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        Menu
    </button>

    <div x-cloak
        :class="offcanvas ? 'tw-left-0 tw-visible tw-opacity-100' : '-tw-left-[100%] tw-invisible tw-opacity-0'"
        class="tw-fixed tw-top-[75px] tw-inset-0 tw-transition-all tw-duration-300 md:tw-hidden">
        <div class="tw-h-full tw-w-full tw-bg-black/75" x-on:click="offcanvas = false"></div>
        <div class="tw-absolute tw-inset-0 tw-z-20 tw-w-[250px]">
            @livewire('app.layout.offcanvas-navigator')
        </div>
    </div>
</section>