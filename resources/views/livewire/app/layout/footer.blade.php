<section>
    <footer class="footer">
        <div class="{{ env('BS_CONTAINER') }}">
            <div class="row">
                <div class="col-md-3">
                    <h3 class="title">Menu</h3>
                    <ul class="foo-list">
                        <li class="foo-item"><a class="foo-link" href="">Privacy Policy</a></li>
                        <li class="foo-item"><a class="foo-link" href="">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="title">Contact Us</h3>
                    <ul class="foo-list">
                        <li class="foo-item">Address: {{ $info ? $info->address : '' }}</li>
                        <li class="foo-item">Email: <a class="foo-link" href="mailto:{{ $info ? $info->email : '' }}">{{
                                $info ? $info->email : '' }}</a></li>
                        <li class="foo-item">Mobile: <a class="foo-link"
                                href="tel:+88{{ $info ? $info->mobile : '' }}">+88{{ $info ? $info->mobile : '' }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="title">Get In Touch</h3>
                    <ul class="foo-list">
                        <li class="foo-item">Facebook: <a class="foo-link"
                                href="//www.facebook.com/{{ $info ? $info->facebook_page : '' }}">{{ $info ? '@' .
                                $info->facebook_page : '' }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <div class="{{ env('BS_CONTAINER') }}">
            &copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved
        </div>
    </div>
</section>